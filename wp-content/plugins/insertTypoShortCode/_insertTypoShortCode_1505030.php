<?php
/*
Plugin Name: Typograffit HTML Shortcode
Plugin URI: 
Description: add Typograffit HTML Shortcode
Author: Yusuke Nakada
Version: 0.1
Author URI: 
 */
//get_template_part('functions/create-product');

function typoProductForm_shortcode() {
?>
<?php
$html='';
$contentUrl = content_url(wp-content);
?>
<?php $html ='
<link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/owl.theme.css" />
  <link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/typograffit.css" />
  <!--  jQuery -->
  <script src="'.$contentUrl.'/src/js/jquery-2.1.3.min.js"> </script>
  <script src="'.$contentUrl.'/src/js/jquery.easing.1.3.js"> </script>
  <!-- owlcarousel -->
  <script src="'.$contentUrl.'/src/js/owl.carousel.min.js"> </script>
  <!-- typograffit.js  -->
  <script src="'.$contentUrl.'/src/js/typograffit.js"> </script>
  <script src="'.$contentUrl.'/src/js/tumblr-share.js"> </script>

     <div id="functions">
      <a href="#" id="toggle-button" class="disable left deactive"></a>
      <a href="#" id="emoji-button" class="disable right"></a>
    </div>

    <form id="typoForm" name="typoForm" action="" method="" class="">
    <!-- TEXT -->
      <div id="typoText">
        <textarea id="typoData" name="typoData" rows="" cols="" placeholder=" "/></textarea>
        <!--<div class="textClear" onclick="clearButton_Click()">×</div>-->
        <div id="emojiList">
        	<div id="emojiWrap">
		      <div class="item">
		      	<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'smile\'); return false;"><img src="'.$contentUrl.'/src/images/emoji/smile.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'kissing\'); return false;"><img src="'.$contentUrl.'/src/images/emoji/kissing.png" alt="" /></a></li>
	      		</ul>
			  </div>
			  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'laughing\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/laughing.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sweat\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sweat.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'scream\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/scream.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sunglasses\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sunglasses.png" alt="" /></a></li>
		      	</ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'wink\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/wink.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'angry\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/angry.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'sleeping\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sleeping.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sob\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sob.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'heart\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/heart.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'kiss\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/kiss.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'star\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/star.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'poop\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/poop.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'dash\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/dash.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'notes\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/notes.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'eyes\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/eyes.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'skull\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/skull.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'musical_note\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/musical_note.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'zzz\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/zzz.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'sweat_drops\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sweat_drops.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'thumbsup\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/thumbsup.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'thumbsdown\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/thumbsdown.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'hand\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/hand.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'v\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/v.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'pray\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/pray.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'clap\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/clap.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'metal\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/metal.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'see_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/see_no_evil.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'hear_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/hear_no_evil.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'speak_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/speak_no_evil.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'running\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/running.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
			</div>
        </div>
            
            
	<div id="loading"><img src="'.$contentUrl.'/src/images/ajax-loader.gif"/></div>
	</div>

    <div id="owl" class="owl-carousel"></div>

	<div id="typoButton" class="deactive">
		<a href="#" id="hash-button" class="disable"></a>
		<img src="'.$contentUrl.'/src/images/generate-icon.png"/>
	</div>

    </form>
    
    <div id="msg"></div>
    <div id="socialBox"><div id="social">

		<a id="socialDownload" href="#" target="_blank" download><img src="'.$contentUrl.'/src/images/download.png" width="45" height="45" alt="Download" /></a>
		<a id="socialFacebook" href="#" class="disable"><img src="'.$contentUrl.'/src/images/facebook.png" width="45" height="45" alt="Facebook" /></a>
		<a id="socialTwitter" href="#" class="disable"><img src="'.$contentUrl.'/src/images/twitter.png" width="45" height="45" alt="Twitter" /></a>
		<a id="socialLine" href="#" class="dtophide"><img src="'.$contentUrl.'/src/images/line.png" width="45" height="45" alt="Line" /></a>
		<a href="javascript:void(0)" class="dtophide" onClick="sOpen();"><img id="socialmore" src="'.$contentUrl.'/src/images/more.png" width="45" height="45" alt="MORE" /></a>
		<a id="socialGplus" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/gplus.png" width="45" height="45" alt="Google Plus" /></a>
		<a id="socialPinterest" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/pinterest.png" width="45" height="45" alt="Pinterest" /></a>
		<a id="socialTumblr" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/tumblr.png" width="45" height="45" alt="Tumblr" /></a>

		<div id="socialSub" style="display:none;"><div id="socialSubWrap">
			<a id="socialGplus" href="#" class="disable"><img src="'.$contentUrl.'/src/images/gplus.png" width="45" height="45" alt="Google Plus" /></a>
			<a id="socialPinterest" href="#" class="disable"><img src="'.$contentUrl.'/src/images/pinterest.png" width="45" height="45" alt="Pinterest" /></a>
			<a id="socialTumblr" href="#" class="disable"><img src="'.$contentUrl.'/src/images/tumblr.png" width="45" height="45" alt="Tumblr" /></a>
		</div></div>

	</div></div>

    <div id="productForm">
	<p><span style="color: #ffffff; background-color: red;">↓ NEW ↓</span> Create your Original Products using your Message!</p>
    <input type="hidden" id="post_title" name="post_title" value="">
    <input type="submit" class="deactive off" id="cat_shirt" name="cat_shirt" value="shirt">
    <input type="submit" class="deactive off" id="cat_tote" name="cat_tote" value="tote">
    </form>
    </div>
';
?>
<?php
return $html;
}
add_shortcode('typoProductForm', 'typoProductForm_shortcode');
?>


<?php
function typoProductFormSocial_shortcode() {
?>
<?php
$pieces = explode("/", $_SERVER["REQUEST_URI"]);
//$baseImageUrl = 'http://api.typograffit.com/posts/getImage/'.$pieces[2];
$baseImageUrl = 'http://api.typograffit.com/posts/getImage/'.$_SERVER["REQUEST_URI"];
/*
if(isset($_GET['h'])) {
  $hash = $_GET['h'];
  $baseImageUrl = 'http://api.typograffit.com/posts/getImage/'.$hash;
}
*/
$html='';
$contentUrl = content_url(wp-content);
?>
<?php $html ='
<link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/owl.theme.css" />
  <link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/typograffit.css" />
  <!--  jQuery -->
  <script src="'.$contentUrl.'/src/js/jquery-2.1.3.min.js"> </script>
  <script src="'.$contentUrl.'/src/js/jquery.easing.1.3.js"> </script>
  <!-- owlcarousel -->
  <script src="'.$contentUrl.'/src/js/owl.carousel.min.js"> </script>
  <!-- typograffit.js  -->
  <script src="'.$contentUrl.'/src/js/typograffit.js"> </script>
  <script src="'.$contentUrl.'/src/js/tumblr-share.js"> </script>

	<div id="baseImage"><img src="'.$baseImageUrl.'"></div>
	<div id="baseImageToggle"><a href="#functions" class="anchor"><img src="'.$contentUrl.'/src/images/baseImageToggle.png"></a></div>

     <div id="functions">
      <a href="#" id="toggle-button" class="disable left deactive"></a>
      <a href="#" id="emoji-button" class="disable right"></a>
    </div>

    <form id="typoForm" name="typoForm" action="" method="" class="">
    <!-- TEXT -->
      <div id="typoText">
        <textarea id="typoData" name="typoData" rows="" cols="" placeholder=" "/></textarea>
        <!--<div class="textClear" onclick="clearButton_Click()">×</div>-->
        <div id="emojiList">
        	<div id="emojiWrap">
		      <div class="item">
		      	<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'smile\'); return false;"><img src="'.$contentUrl.'/src/images/emoji/smile.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'kissing\'); return false;"><img src="'.$contentUrl.'/src/images/emoji/kissing.png" alt="" /></a></li>
	      		</ul>
			  </div>
			  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'laughing\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/laughing.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sweat\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sweat.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'scream\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/scream.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sunglasses\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sunglasses.png" alt="" /></a></li>
		      	</ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'wink\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/wink.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'angry\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/angry.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'sleeping\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sleeping.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sob\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sob.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'heart\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/heart.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'kiss\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/kiss.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'star\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/star.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'poop\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/poop.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'dash\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/dash.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'notes\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/notes.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'eyes\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/eyes.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'skull\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/skull.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'musical_note\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/musical_note.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'zzz\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/zzz.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'sweat_drops\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sweat_drops.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'thumbsup\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/thumbsup.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'thumbsdown\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/thumbsdown.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'hand\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/hand.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'v\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/v.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'pray\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/pray.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'clap\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/clap.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'metal\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/metal.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'see_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/see_no_evil.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'hear_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/hear_no_evil.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'speak_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/speak_no_evil.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'running\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/running.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
			</div>
        </div>
            
            
	<div id="loading"><img src="'.$contentUrl.'/src/images/ajax-loader.gif"/></div>
	</div>

    <div id="owl" class="owl-carousel"></div>

	<div id="typoButton" class="deactive">
		<a href="#" id="hash-button" class="disable"></a>
		<img src="'.$contentUrl.'/src/images/generate-icon.png"/>
	</div>

    </form>
    
    <div id="msg"></div>
    <div id="socialBox"><div id="social">

		<a id="socialDownload" href="#" target="_blank" download><img src="'.$contentUrl.'/src/images/download.png" width="45" height="45" alt="Download" /></a>
		<a id="socialFacebook" href="#" class="disable"><img src="'.$contentUrl.'/src/images/facebook.png" width="45" height="45" alt="Facebook" /></a>
		<a id="socialTwitter" href="#" class="disable"><img src="'.$contentUrl.'/src/images/twitter.png" width="45" height="45" alt="Twitter" /></a>
		<a id="socialLine" href="#" class="dtophide"><img src="'.$contentUrl.'/src/images/line.png" width="45" height="45" alt="Line" /></a>
		<a href="javascript:void(0)" class="dtophide" onClick="sOpen();"><img id="socialmore" src="'.$contentUrl.'/src/images/more.png" width="45" height="45" alt="MORE" /></a>
		<a id="socialGplus" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/gplus.png" width="45" height="45" alt="Google Plus" /></a>
		<a id="socialPinterest" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/pinterest.png" width="45" height="45" alt="Pinterest" /></a>
		<a id="socialTumblr" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/tumblr.png" width="45" height="45" alt="Tumblr" /></a>

		<div id="socialSub" style="display:none;"><div id="socialSubWrap">
			<a id="socialGplus" href="#" class="disable"><img src="'.$contentUrl.'/src/images/gplus.png" width="45" height="45" alt="Google Plus" /></a>
			<a id="socialPinterest" href="#" class="disable"><img src="'.$contentUrl.'/src/images/pinterest.png" width="45" height="45" alt="Pinterest" /></a>
			<a id="socialTumblr" href="#" class="disable"><img src="'.$contentUrl.'/src/images/tumblr.png" width="45" height="45" alt="Tumblr" /></a>
		</div></div>

	</div></div>

    <div id="productForm">
    <p>Create your original products !</p>
    <input type="hidden" id="post_title" name="post_title" value="">
    <input type="submit" class="deactive off" id="cat_shirt" name="cat_shirt" value="shirt">
    <input type="submit" class="deactive off" id="cat_tote" name="cat_tote" value="tote">
    </form>
    </div>
';
?>
<?php
return $html;
}
add_shortcode('typoProductFormSocial', 'typoProductFormSocial_shortcode');
?>


<?php
function typoProductFormWithProduct_shortcode() {
?>
<?php
$html='';
$lang = '';
$productText = '';
$contentUrl = content_url(wp-content);
//$nonceStr = wp_nonce_field("create_product");
if(isset($_GET['lang'])) {
  $lang = $_GET['lang'];
  $productText = '<p><span style="color: #ffffff; background-color: red;"> <i class="fa  fa-arrow-circle-down"></i> 新機能! <i class="fa  fa-arrow-circle-down"></i> </span> あなたのメッセージからオリジナル商品がつくれます！</p>';
}else{
  $productText = '<p><span style="color: #ffffff; background-color: red;"> <i class="fa  fa-arrow-circle-down"></i> NEW! <i class="fa  fa-arrow-circle-down"></i></span> Create your Original Products using your Message!</p>';	
}
?>
<?php $html ='
<link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/owl.theme.css" />
  <link rel="stylesheet" type="text/css" href="'.$contentUrl.'/src/css/typograffit.css" />
  <!--  jQuery -->
  <script src="'.$contentUrl.'/src/js/jquery-2.1.3.min.js"> </script>
  <script src="'.$contentUrl.'/src/js/jquery.easing.1.3.js"> </script>
  <!-- owlcarousel -->
  <script src="'.$contentUrl.'/src/js/owl.carousel.min.js"> </script>
  <!-- typograffit.js  -->
  <script src="'.$contentUrl.'/src/js/typograffit.js"> </script>
  <script src="'.$contentUrl.'/src/js/tumblr-share.js"> </script>

     <div id="functions">
      <a href="#" id="toggle-button" class="disable left deactive"></a>
      <a href="#" id="emoji-button" class="disable right"></a>
    </div>

    <form id="typoForm" name="typoForm" action="" method="" class="">
    <!-- TEXT -->
      <div id="typoText">
        <textarea id="typoData" name="typoData" rows="" cols="" placeholder=" "/></textarea>
        <!--<div class="textClear" onclick="clearButton_Click()">×</div>-->
        <div id="emojiList">
        	<div id="emojiWrap">
		      <div class="item">
		      	<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'smile\'); return false;"><img src="'.$contentUrl.'/src/images/emoji/smile.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'kissing\'); return false;"><img src="'.$contentUrl.'/src/images/emoji/kissing.png" alt="" /></a></li>
	      		</ul>
			  </div>
			  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'laughing\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/laughing.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sweat\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sweat.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'scream\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/scream.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sunglasses\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sunglasses.png" alt="" /></a></li>
		      	</ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'wink\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/wink.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'angry\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/angry.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'sleeping\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sleeping.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'sob\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sob.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'heart\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/heart.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'kiss\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/kiss.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'star\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/star.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'poop\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/poop.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'dash\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/dash.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'notes\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/notes.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'eyes\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/eyes.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'skull\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/skull.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'musical_note\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/musical_note.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'zzz\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/zzz.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'sweat_drops\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/sweat_drops.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'thumbsup\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/thumbsup.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'thumbsdown\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/thumbsdown.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'hand\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/hand.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'v\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/v.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'pray\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/pray.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'clap\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/clap.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'metal\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/metal.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji(\'see_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/see_no_evil.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'hear_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/hear_no_evil.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji(\'speak_no_evil\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/speak_no_evil.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji(\'running\'); return false;"><img id="" src="'.$contentUrl.'/src/images/emoji/running.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
			</div>
        </div>
            
	<div id="loading"><img src="'.$contentUrl.'/src/images/ajax-loader.gif"/></div>
	</div>

    <div id="owl" class="owl-carousel"></div>

	<div id="typoButton" class="deactive">
		<a href="#" id="hash-button" class="disable"></a>
		<img src="'.$contentUrl.'/src/images/generate-icon.png"/>
	</div>

    </form>
    
    <div id="msg"></div>
    <div id="socialBox"><div id="social">

		<a id="socialDownload" href="#" target="_blank" class="dtopshow" download><img src="'.$contentUrl.'/src/images/download.png" width="45" height="45" alt="Download" /></a>
		<a id="socialFacebook" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/facebook.png" width="45" height="45" alt="Facebook" /></a>
		<a id="socialTwitter" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/twitter.png" width="45" height="45" alt="Twitter" /></a>
		<a id="socialGplus" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/gplus.png" width="45" height="45" alt="Google Plus" /></a>
		<a id="socialPinterest" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/pinterest.png" width="45" height="45" alt="Pinterest" /></a>
		<a id="socialTumblr" href="#" class="disable dtopshow"><img src="'.$contentUrl.'/src/images/tumblr.png" width="45" height="45" alt="Tumblr" /></a>

		<a href="javascript:void(0)" onClick="urlOpen();" class="dtophide"><img id="" src="'.$contentUrl.'/src/images/link.png" width="45" height="45" alt="LINK" /></a>
		<a id="socialFacebookSp" href="#" class="dtophide"><img src="'.$contentUrl.'/src/images/facebook.png" width="45" height="45" alt="Facebook" /></a>
		<a id="socialTwitterSp" href="#" class="dtophide"><img src="'.$contentUrl.'/src/images/twitter.png" width="45" height="45" alt="Twitter" /></a>
		<a id="socialLine" href="#" class="dtophide"><img src="'.$contentUrl.'/src/images/line.png" width="45" height="45" alt="Line" /></a>

	</div></div>

    <div id="urlBox"><input type="text" id="urlBoxText" value="" readonly></div>

    <div id="productForm">
	'.$productText.'
    <form action="./" method="post">
    '.wp_nonce_field("create_product").'
    <input type="hidden" id="lang" name="lang" value="'.$lang.'">
    <input type="hidden" id="post_title" name="post_title" value="">
    <input type="submit" id="cat_shirt" name="cat_shirt" value="shirt">
    <input type="submit" id="cat_tote" name="cat_tote" value="tote">
    </form>
    </div>
';
?>
<?php
return $html;
}
add_shortcode('typoProductFormWithProduct', 'typoProductFormWithProduct_shortcode');
?>