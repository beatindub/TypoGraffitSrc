<?php
/**
 * Action before reading GeneratePress templates
 */
function makeDirectory($hashName){
    $upDir = '/home1/typograf/public_html/typograffit/wp-content/uploads/typo/'.$hashName.'/';
    if(!file_exists($upDir)){
        mkdir($upDir, 0777);
    }
    return $upDir;
}


function _my_create_product(){
	if( (is_home() && isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'create_product')) ||
        (is_page( 2 ) && isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'create_product')) ||
        (is_page('compose') && isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'create_product')) ){
//    if (is_page('withproduct') && isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'create_product')){
		$time_start = microtime(true);
        //INIT
        $ratio = "";
	    $ratioT = "";
        //var_dump($_POST);
        //die();

        // GET FILEPATH
        $fileName = $_POST['post_title']; 
        $lang = $_POST['lang'];
        // tip:ZlychRK4D8Ftのノイズ //
		$imgUrl = 'http://api.typograffit.com/posts/getImage/';
		$typoAddress = $imgUrl.$fileName;

        // GET INPUT TEXT
        $baseInfoUrl = 'http://api.typograffit.com/rest_json/posts/getInfo/post_id:'.$fileName;
        $ch = curl_init(); // init
        curl_setopt($ch, CURLOPT_URL, $baseInfoUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $c = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($c);
        $input_string = $obj->{'body'};

        if(mb_strlen($input_string) > 30){
            $post_title_string = mb_substr($input_string, 0, 30).'...';
        }else{
            $post_title_string = $input_string;
        }

		// IMAGICK
		$image = new Imagick($typoAddress);
        $image->paintTransparentImage("white", 0, 0);
        $image->despeckleImage();

        $hashImage = clone $image;
		$image->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
		$image->setImageResolution(150,150);
		$hashWidth = $image->getImageWidth();
		$hashHeight = $image->getImageHeight();

        //RATIO
        if($hashWidth >= $hashHeight*3/4){
            //横長
            $ratio = "oblong";
        }else{
            //縦長
            $ratio = "verlong";
        }

        if($hashWidth >= $hashHeight*5/6){
            //横長
            $ratioT = "oblong";
        }else{
            //縦長
            $ratioT = "verlong";
        }

        //TSHIRT
        if (isset($_POST['cat_shirt'])) {
	        $tentwelveImage = clone $image;
            $resizeFlag = 0;
            // RESIZE
            $w = 1800; 
            $h = 2400;
            $w2 = 1500; 
            $h2 = 1800;
            $boxWidth = 360; //(500-$hashWidth/2,200)を始点に[360px,480px]のボックスに収める
            $boxHeight = 480;
            // DB INIT
            //$post_title_string = 'TG-SHIRT';
            $att_post_title_string = $fileName.'-tshirt';
            $att_img_title_string = $fileName.'-enlarge_12_16';
            
            //COMPOSING SHIRT
            $shirtMockPath = '/home1/typograf/public_html/typograffit/wp-content/uploads/typo/tshirt-white.png';
            $imageShirt = new Imagick($shirtMockPath);

            if($hashWidth < $w && $hashHeight < $h){
                $resizeFlag = 1;
            }
            if($resizeFlag == 1){
                $image->resampleImage(150,150,imagick::FILTER_CUBIC, 1);
                if($ratio == "oblong"){
                    //横長
                    $image->resizeImage($w, 0, imagick::FILTER_CUBIC, 1);
                    $tentwelveImage->resizeImage($w2, 0, imagick::FILTER_CUBIC, 1);
                    //$image->thumbnailImage($w, $h, true);
                    $hashImage->resizeImage($boxWidth, 0, imagick::FILTER_CUBIC, 1);
                    $shirtHashWidth = $boxWidth;
                }else{
                    //縦長
                    $image->resizeImage(0, $h, imagick::FILTER_CUBIC, 1);
                    $tentwelveImage->resizeImage(0, $h2, imagick::FILTER_CUBIC, 1);
                    //$image->thumbnailImage($w, $h, true);
                    $hashImage->resizeImage(0, $boxHeight, imagick::FILTER_CUBIC, 1);
                    $shirtHashWidth = $hashImage->getImageWidth();
                }
            }
            // SAVE 
            $saveDir = makeDirectory($fileName);
            // SAVE ENLRGE IMAGE
            //$saveEnlargePath = WP_CONTENT_URL.'/uploads/typo/'.$fileName.'-enlarge.png';
            //$saveEnlargePath = wp_upload_dir('typo').$fileName.'-enlarge.png';
            $saveEnlargePath = $saveDir.'enlarge_12_16.png';
            $image->writeImage($saveEnlargePath);
            $image->destroy();
            $saveMinEnlargePath = $saveDir.'enlarge_10_12.png';
            $tentwelveImage->writeImage($saveMinEnlargePath);
            $tentwelveImage->destroy();

            // SAVE COMPOSING IMAGE
            //$imageShirt = compositeImage($layer, Imagick::COMPOSITE_DEFAULT, $x, $y);
            $posX = 500 - $shirtHashWidth / 2;
            $posY = 200;
            //$saveCompPath = WP_CONTENT_URL.'/uploads/typo/'.$fileName.'-tshirt.png';
            $imageShirt->compositeImage($hashImage, Imagick::COMPOSITE_DEFAULT, $posX, $posY);
            $saveCompPath = $saveDir.'tshirt.png';
            $imageShirt->writeImage($saveCompPath);
            $imageShirt->destroy();

            //insert PRODUCT
            if($lang == 'ja'){
               $_POST['icl_post_language'] = $lang;
                $post_id = wp_insert_post(array(
                    'post_title' => $post_title_string,
                    'post_name' => $fileName,
                    'post_status' => 'publish',
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_type' => 'product',
                ), true);
               wp_set_post_terms( $post_id, '3031', 'product_cat' );

	        	//CHANGE VARIABLE
    	    	wp_set_object_terms( $post_id, 'variable', 'product_type' );
        		//my array for setting the attributes
	        	$avail_attributes = array(
    	        	        '2XL-ja',
        	        	    'XL-ja',
            	        	'L-ja',
	                	    'M-ja',
    	                	'S-ja',
    	                	'XS-ja'
        		);
            }else{
                $post_id = wp_insert_post(array(
                    'post_title' => $post_title_string,
                    'post_name' => $fileName,
//                  'post_date' => (string)$_POST['title'],
//                  'post_content' => (string)$_POST['content'],
                    'post_status' => 'publish',
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
//                  'post_author' => '0',
                    'post_type' => 'product',
//                  'post_category' => array(intval($_POST['cat']))
                ), true);
               wp_set_post_terms( $post_id, '3030', 'product_cat' );
               //2903 is TShirt.

	        	//CHANGE VARIABLE
    	    	wp_set_object_terms( $post_id, 'variable', 'product_type' );
        		//my array for setting the attributes
	        	$avail_attributes = array(
    	        	        '2XL',
        	        	    'XL',
            	        	'L',
	                	    'M',
    	                	'S',
    	                	'XS'
        		);
            }

	        //Sets the attributes up to be used as variations but doesnt actually set them up as variations
    	    wp_set_object_terms( $post_id, $avail_attributes, 'pa_size' );
        	$thedata = array(
                    'pa_size'=> array(
                     'name'=>'pa_size',
                     'value'=>'',
                     'position' => '0',
                     'is_visible' => '1',
                     'is_variation' => '1',
                     'is_taxonomy' => '1'
            )
         );
	        update_post_meta( $post_id,'_product_attributes',$thedata);
     	    //Sets the Default Attributes
     	    if($lang == 'ja'){
				$default_thedata = array(
					'pa_size'=> 'M-ja'
				 );
     	    }else{
				$default_thedata = array(
					'pa_size'=> 'M'
				 );
     	    }
			 update_post_meta( $post_id,'_default_attributes',$default_thedata);

			 //add SKU etc
	         update_post_meta( $post_id, '_sku', $fileName );
    	     update_post_meta( $post_id, '_price', '28.0' );
        	 update_post_meta( $post_id, '_regular_price', '28.0');
	         update_post_meta( $post_id, '_visibility', 'visible');
    	     update_post_meta( $post_id, '_stock_status', 'instock');

	         //insert VARIATION
    	     $var_shirt_post = array(
        	    'post_title'    => 'Variation #1 of ' . $fileName,
            	'post_name'     => 'product-' . $post_id . '-variation-1',
            	'post_status'   => 'publish',
	            'post_parent'   => $post_id,
    	        'post_type'     => 'product_variation',
        	    'guid'          =>  home_url() . '/product_variation/product-' . $post_id . '-variation-1/'
         	);
         	// Insert the post into the database
         	$post_var_id = wp_insert_post( $var_shirt_post );
         	update_post_meta( $post_var_id, '_price', '28.0' );
         	update_post_meta( $post_var_id, '_regular_price', '28.0');
            update_post_meta( $post_var_id, '_wcml_custom_prices_status', '1' );
            update_post_meta( $post_var_id, '_price_JPY', '2900' );
            update_post_meta( $post_var_id, '_regular_price_JPY', '2900');
         	update_post_meta( $post_var_id, 'attribute_pa_size', '');

	         //insert Generated IMAGE
    	     $attachment_post = array(
            	'post_mime_type' => 'image/png',
        	    'post_title' => $att_post_title_string,
            	'post_content' => '',
            	'post_status' => 'inherit',
         	);
         	$attachment_id = wp_insert_attachment( $attachment_post, $saveCompPath, $post_id );
         	update_post_meta( $post_id, '_thumbnail_id' , $attachment_id);
         	update_post_meta( $post_var_id, '_thumbnail_id' , $attachment_id);

            $update_postid_author = wp_update_post(array(
                'ID' => $post_id,
                'post_author' => '999',
            ));
            $update_varid_author = wp_update_post(array(
                'ID' => $post_var_id,
                'post_author' => '999',
            ));
        }

        elseif(isset($_POST['cat_tote'])){
        	//トートバッグ合成
			// RESIZE
            $w = 1500; 
            $h = 1800;
            $boxWidth = 300; //(500-$hashWidth/2,500)を始点に[300px,360px]のボックスに収める
            $boxHeight = 360;
            // DB INIT
            //$post_title_string = 'TG-TOTE';
            $att_post_title_string = $fileName.'-tote';
            $att_img_title_string = $fileName.'-enlarge_10_12';
            
            //COMPOSING SHIRT
            $toteMockPath = '/home1/typograf/public_html/typograffit/wp-content/uploads/typo/tote-white.png';
            $imageTote = new Imagick($toteMockPath);

            if($hashWidth < $w && $hashHeight < $h){
                $resizeFlag = 1;
            }
            if($resizeFlag == 1){
                $image->resampleImage(150,150,imagick::FILTER_CUBIC, 1);
                if($ratioT == "oblong"){
                    //横長
                    $image->resizeImage($w, 0, imagick::FILTER_CUBIC, 1);
                    //$image->thumbnailImage($w, $h, true);
                    $hashImage->resizeImage($boxWidth, 0, imagick::FILTER_CUBIC, 1);
                    $toteHashWidth = $boxWidth;
                }else{
                    //縦長
                    $image->resizeImage(0, $h, imagick::FILTER_CUBIC, 1);
                    //$image->thumbnailImage($w, $h, true);
                    $hashImage->resizeImage(0, $boxHeight, imagick::FILTER_CUBIC, 1);
                    $toteHashWidth = $hashImage->getImageWidth();
                }
            }
            // SAVE 
            $saveDir = makeDirectory($fileName);
            // SAVE ENLRGE IMAGE
            //$saveEnlargePath = WP_CONTENT_URL.'/uploads/typo/'.$fileName.'-enlarge.png';
            //$saveEnlargePath = wp_upload_dir('typo').$fileName.'-enlarge.png';
            $saveEnlargePath = $saveDir.'enlarge_10_12.png';
            $image->writeImage($saveEnlargePath);
            $image->destroy();

            // SAVE COMPOSING IMAGE
            //$imageShirt = compositeImage($layer, Imagick::COMPOSITE_DEFAULT, $x, $y);
            $posX = 500 - $toteHashWidth / 2 - 15;
            $posY = 500;
            //$saveCompPath = WP_CONTENT_URL.'/uploads/typo/'.$fileName.'-tshirt.png';
            $imageTote->compositeImage($hashImage, Imagick::COMPOSITE_DEFAULT, $posX, $posY);
            $saveCompPath = $saveDir.'tote.png';
            $imageTote->writeImage($saveCompPath);
            $imageTote->destroy();


            //insert PRODUCT
            if($lang == 'ja'){
               $_POST['icl_post_language'] = $lang;
                $post_id = wp_insert_post(array(
                    'post_title' => $post_title_string,
                    'post_name' => $fileName,
                    'post_status' => 'publish',
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_type' => 'product',
                ), true);
               wp_set_post_terms( $post_id, '3033', 'product_cat' );
            }else{
                $post_id = wp_insert_post(array(
                    'post_title' => $post_title_string,
                    'post_name' => $fileName,
                    'post_status' => 'publish',
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_type' => 'product',
                ), true);
               wp_set_post_terms( $post_id, '3032', 'product_cat' );
            }
             //2904 is Totes.

			 //add SKU etc
	         update_post_meta( $post_id, '_sku', $fileName );
    	     update_post_meta( $post_id, '_price', '22.0' );
        	 update_post_meta( $post_id, '_regular_price', '22.0');
             update_post_meta( $post_id, '_wcml_custom_prices_status', '1' );
             update_post_meta( $post_id, '_price_JPY', '2500' );
             update_post_meta( $post_id, '_regular_price_JPY', '2500');
	         update_post_meta( $post_id, '_visibility', 'visible');
    	     update_post_meta( $post_id, '_stock_status', 'instock');

	         //insert Generated IMAGE
    	     $attachment_post = array(
            	'post_mime_type' => 'image/png',
        	    'post_title' => $att_post_title_string,
            	'post_content' => '',
            	'post_status' => 'inherit',
         	 );
         	 $attachment_id = wp_insert_attachment( $attachment_post, $saveCompPath, $post_id );
         	 update_post_meta( $post_id, '_thumbnail_id' , $attachment_id);

             //insert Enlarged IMAGE
/*
             $attachment_enlarge_post = array(
                'post_mime_type' => 'image/png',
                'post_title' => $att_img_title_string,
                'post_content' => '',
                'post_status' => 'inherit',
            );
            $typogenerated_id = wp_insert_attachment( $attachment_enlarge_post, $saveEnlargePath, $post_id );
            update_post_meta( $post_id, '_typogenerated_id' , $typogenerated_id);
*/

            $update_author = wp_update_post(array(
                'ID' => $post_id,
                'post_author' => '998',
            ));

        }
/*
        elseif(isset($_POST['cat_mug'])){
            //マグカップ合成

        }
*/

/*
		 $time_end = microtime(true);
		 $time = $time_end - $time_start;
    		error_log($time."Seconds");
*/
		 //データの挿入に成功していたら移動
		 if(!is_wp_error($post_id)){
    		//カスタムフィールドurl_rel（参考URL）を追加
    		update_post_meta($post_id, 'url_ref', $_POST['url']);
    		//ページを移動
    		header('Location: '.get_permalink($post_id));
		    die();
		 }
	}

}
add_action('template_redirect', '_my_create_product');

?>