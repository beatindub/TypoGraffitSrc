<?php
/*
Plugin Name: Create and post API to Printful
Plugin URI: 
Description: Create JSON and post API to Printful to order. Action hook when WooCommerce thankyou page loads.
Author: Yusuke Nakada
Version: 0.1
Author URI:
*/
/*
require_once( dirname( __FILE__ ) . '/PrintfulClient.php' );
require_once( ABSPATH . 'wp-content/plugins/createPrintfulOrder/PrintfulClient.php' );
require_once( dirname( __FILE__ ) . '/../woocommerce/includes/abstracts/abstract-wc-order.php' );
require_once( '/home1/typograf/public_html/typograffit/wp-content/plugins/woocommerce/includes/abstracts/abstract-wc-order.php' );
require_once( '/home1/typograf/public_html/typograffit/wp-content/plugins/woocommerce/includes/class-wc-order.php' );
*/
//Replace this with your API key
define('API_KEY', 'a05dtjrv-k44x-1493:w2hg-hyxolkgsf60c');

$dtp = new Typograffit_to_Printful ;

class Typograffit_to_Printful{
    function __construct(){
        //add_action('woocommerce_checkout_order_processed', array( $this, 'typograffit_woocommerce_payment_complete' ),10,1);
      add_filter( 'woocommerce_payment_complete_order_status', 'typograffit_woocommerce_payment_complete', 10, 2 );
    }

    //function typograffit_woocommerce_payment_complete( $order_id ) {
    function typograffit_woocommerce_payment_complete( $order_status, $order_id ) {

      //OK
     if('processing' == $order_status && isset($order_id)){

        $order = new WC_Order( $order_id );

        //Create Printful API Object 
    	$pf = new PrintfulClient(API_KEY);

        //ITEMS
        $items = $order->get_items(); 
        $items_arr = array();
            error_log('items : ');
            error_log(print_r($items,true));
            error_log( "Get orderlist from $order_id", 0 );
        $shippingMethod = $order->get_shipping_methods();

        foreach ( $items as $item ) {
           $product_id = $item['product_id'];
           $product_author = $this->getAuthor($product_id);

           //create JSON every products 
           $product_name = $item['name'];
           $product_variation_id = $item['variation_id'];
           $qty = $item['qty'];
           $product_line_total = $item['line_total'];
           $product_retail_price = $product_line_total / $qty;
           round($product_retail_price,2);
	
           $size = $item['pa_size'];
           $hashLine = $this->getPostName($product_id);
           $enlarge_image_url = '';

           if($product_author == 999){
            //this is 'Custom Product'.
               if(isset($size)){
                //this is 'T-shirt'.
                    //$thumbnailSize = $this->getThumbnailSize( $size );
                    $printful_variant_id = $this->getPrintfulVarId( $size );
                    //$preview_thumbnail_id = get_post_meta($product_variation_id, '_thumbnail_id', true);
                    if($size == 'XS' || $size == 'XS-ja'){
                      //XS
                      $enlarge_image_url = 'http://typograffit.com/wp-content/uploads/typo/'.$hashLine.'/enlarge_10_12.png';
                    }else{
                      //S - 2XL
                      $enlarge_image_url = 'http://typograffit.com/wp-content/uploads/typo/'.$hashLine.'/enlarge_12_16.png';
                    }
                   //$front_thumbnail_id = get_post_meta($product_id, '_typogenerated_id', true);
                   //$front_thumbnail_att = wp_get_attachment_image_src($front_thumbnail_id,'full');
                    $preview_thumbnail_id = get_post_meta($product_id, '_thumbnail_id', true);
                    $preview_thumbnail_att = wp_get_attachment_image_src($preview_thumbnail_id,'full');
               }
            }elseif($product_author == 998){
            //this is 'Tote'.
              //$thumbnailSize = '';
              $printful_variant_id = '863';
              $enlarge_image_url = 'http://typograffit.com/wp-content/uploads/typo/'.$hashLine.'/enlarge_10_12.png';
              //$front_thumbnail_id = get_post_meta($product_id, '_typogenerated_id', true);
              //$front_thumbnail_att = wp_get_attachment_image_src($front_thumbnail_id,'full');
              $preview_thumbnail_id = get_post_meta($product_id, '_thumbnail_id', true);
              $preview_thumbnail_att = wp_get_attachment_image_src($preview_thumbnail_id,'full');
           }
           else{
            //This is 'Store Product'.
                $printful_variant_id = $product_variation_id;
                /* Q. NO front image */
                //$front_thumbnail_att = wp_get_attachment_image_src($front_thumbnail_id,'full');
                $preview_thumbnail_id = get_post_meta($product_id, '_thumbnail_id', true);
                $preview_thumbnail_att = wp_get_attachment_image_src($preview_thumbnail_id,'full');
           }

           $item_arr = array(
                'variant_id'    => $printful_variant_id,
                'name'   => $product_name,
                'quantity'   => $qty,
                'files' => array(
                            array(//Front print
                                'url' => $enlarge_image_url
                            ),
                            array(//Mockup image
                                'type' => 'preview',
                                'url' => $preview_thumbnail_att[0]
                            )
                        )
            );
           array_push($items_arr,$item_arr);
        }

        //SHIPPING ADDRESS
        $shipping_first_name = $order->shipping_first_name;
        $shipping_last_name = $order->shipping_last_name;        
        $shipping_name = $shipping_first_name.' '.$shipping_last_name;

        $shipping_address = $order->shipping_address_1.' '.$order->shipping_address_2;
        $shipping_city = $order->shipping_city;
        $shipping_state_code = $order->shipping_state;
        $shipping_country_code = $order->shipping_country;
        $shipping_zip = $order->shipping_postcode;

        //POST to Printful API
        $order_arr = $pf->post('orders',
            array(
    	        'external_id' => $order_id,
              'shipping' => $shippingMethod,
                'recipient' => array(
                    'name' => $shipping_name,
                    'address1' => $shipping_address,
                    'city' => $shipping_city,
                    'state_code' => $shipping_state_code,
                    'country_code' => $shipping_country_code,
                    'zip' => $shipping_zip
                ),
                'items' => $items_arr,
                )//,
            //If, confirm immediately
            //array('confirm'=>1)
        );
    }

      //NG
      else{
          error_log( "ERROR : No Order ID" );
      }
      
    }


//######################
//get post_author
//######################
private function getAuthor( $productID ){
    $post = get_post( $productID );
    return $post->post_author;
}

//######################
//get post_name(#HASH)
//######################
private function getPostName( $productID ){
    $post = get_post_meta( $productID, '_sku', true);
    return $post;
}

//######################
//get thumbnail size
//######################
private function getThumbnailSize( $size ){
    $tSize = '';
    if($size == 'xxlarge' || $size == 'extra-large' || $size == 'large' || $size == 'medium' || $size == 'small'){
        $tSize = 'large';
    }elseif($size == 'extra-small' || $size == '12yrs' || $size == '10yrs' || $size == '8yrs' || $size == '6yrs' || $size == '4yrs'){
        $tSize = 'medium';
    }elseif($size == '2yrs'){
        $tSize = 'small';
    }
    return $tSize;
}

//######################
//Get Printful Variable ID
//######################
private function getPrintfulVarId( $size ){
    $id = 0;
/*
    if($size == '2XL'){ $id = '9022'; }
    elseif($size == 'XL'){ $id = '9023'; }
    elseif($size == 'L'){ $id = '9024'; }
    elseif($size == 'M'){ $id = '9025'; }
    elseif($size == 'S'){ $id = '9026'; }
*/
    if($size == '2Xl' || $size == '2Xl-ja'){ $id = '378'; }
    elseif($size == 'XL' || $size == 'Xl-ja'){ $id = '316'; }
    elseif($size == 'L' || $size == 'l-ja'){ $id = '254'; }
    elseif($size == 'M' || $size == 'M-ja'){ $id = '192'; }
    elseif($size == 'S' || $size == 'S-ja'){ $id = '130'; }
    elseif($size == 'XS' || $size == 'XS-ja'){ $id = '68'; }
    return $id;
}
}
?>