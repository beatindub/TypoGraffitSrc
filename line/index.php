<?php 
$homeUrl = '../?lang=ja';
$hash = $_GET['h'];
if(isset($hash)){
  $baseImageUrl = 'http://api.typograffit.com/posts/getImage/'.$hash;
  if(empty($baseImageUrl)){
  //Redirect
	header('location: http://typograffit.com');
	exit();  	
  }

}else{
  //Redirect
	header('location: http://typograffit.com');
	exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>LINE Message | TYPOGRAFFIT</title>
  <link rel="stylesheet" type="text/css" href="../wp-content/src/css/owl.carousel.css" />
  <link rel="stylesheet" type="text/css" href="../wp-content/src/css/owl.theme.css" />
  <link rel="stylesheet" type="text/css" href="../wp-content/themes/generatepress/style.css" />
  <link rel="stylesheet" type="text/css" href="../wp-content/src/css/typograffit_line.css" />
  <link rel="icon" href="../wp-content/uploads/2015/02/TG-favicon1-54de3595v1_site_icon.png?fit=32%2C32" sizes="32x32" />
  <!--  jQuery -->
  <script src="../wp-content/src/js/jquery-2.1.3.min.js"> </script>
  <script src="../wp-content/src/js/jquery.easing.1.3.js"> </script>
  <!-- owlcarousel -->
  <script src="../wp-content/src/js/owl.carousel.min.js"> </script>
  <!-- typograffit.js  -->
  <script src="../wp-content/src/js/typograffit_line.js"> </script>
  <script src="http://platform.tumblr.com/v1/share.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-56390153-2', 'auto');
  ga('require', 'linkid', 'linkid.js');
  ga('send', 'pageview');

</script>

</head>
<body>

<div id="headlabel">
	<?php echo '<a href="' . $homeUrl . '">'; ?><img src="../wp-content/src/images/TG-logo-new-small.png"></a>
</div>

<div id="baseImage">
	<?php echo '<img src="' . $baseImageUrl . '">'; ?>
</div>

<div id="baseImageToggle"><a href="#functions" class="anchor"><img src="../wp-content/src/images/baseImageToggle.png"></a></div>

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
					<li class=""><a href="#" class="disable" onclick="insertEmoji('smile'); return false;"><img src="../wp-content/src/images/emoji/smile.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('kissing'); return false;"><img src="../wp-content/src/images/emoji/kissing.png" alt="" /></a></li>
	      		</ul>
			  </div>
			  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('laughing'); return false;"><img id="" src="../wp-content/src/images/emoji/laughing.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('sweat'); return false;"><img id="" src="../wp-content/src/images/emoji/sweat.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('scream'); return false;"><img id="" src="../wp-content/src/images/emoji/scream.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('sunglasses'); return false;"><img id="" src="../wp-content/src/images/emoji/sunglasses.png" alt="" /></a></li>
		      	</ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('wink'); return false;"><img id="" src="../wp-content/src/images/emoji/wink.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('angry'); return false;"><img id="" src="../wp-content/src/images/emoji/angry.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('sleeping'); return false;"><img id="" src="../wp-content/src/images/emoji/sleeping.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('sob'); return false;"><img id="" src="../wp-content/src/images/emoji/sob.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('heart'); return false;"><img id="" src="../wp-content/src/images/emoji/heart.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('kiss'); return false;"><img id="" src="../wp-content/src/images/emoji/kiss.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('star'); return false;"><img id="" src="../wp-content/src/images/emoji/star.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('poop'); return false;"><img id="" src="../wp-content/src/images/emoji/poop.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('dash'); return false;"><img id="" src="../wp-content/src/images/emoji/dash.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('notes'); return false;"><img id="" src="../wp-content/src/images/emoji/notes.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('eyes'); return false;"><img id="" src="../wp-content/src/images/emoji/eyes.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('skull'); return false;"><img id="" src="../wp-content/src/images/emoji/skull.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('musical_note'); return false;"><img id="" src="../wp-content/src/images/emoji/musical_note.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('zzz'); return false;"><img id="" src="../wp-content/src/images/emoji/zzz.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('sweat_drops'); return false;"><img id="" src="../wp-content/src/images/emoji/sweat_drops.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('thumbsup'); return false;"><img id="" src="../wp-content/src/images/emoji/thumbsup.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('thumbsdown'); return false;"><img id="" src="../wp-content/src/images/emoji/thumbsdown.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('hand'); return false;"><img id="" src="../wp-content/src/images/emoji/hand.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('v'); return false;"><img id="" src="../wp-content/src/images/emoji/v.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('pray'); return false;"><img id="" src="../wp-content/src/images/emoji/pray.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('clap'); return false;"><img id="" src="../wp-content/src/images/emoji/clap.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('metal'); return false;"><img id="" src="../wp-content/src/images/emoji/metal.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
	      	  <div class="item">
	      		<ul class="">
					<li class=""><a href="#" class="disable" onclick="insertEmoji('see_no_evil'); return false;"><img id="" src="../wp-content/src/images/emoji/see_no_evil.png" alt=":smile:" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('hear_no_evil'); return false;"><img id="" src="../wp-content/src/images/emoji/hear_no_evil.png" alt="" /></a></li>
	      	    </ul>
			  </div>
	      	  <div class="item">
		      	<ul class="">
	      			<li class=""><a href="#" class="disable" onclick="insertEmoji('speak_no_evil'); return false;"><img id="" src="../wp-content/src/images/emoji/speak_no_evil.png" alt="" /></a></li>
	      			<li class="lower"><a href="#" class="disable" onclick="insertEmoji('running'); return false;"><img id="" src="../wp-content/src/images/emoji/running.png" alt="" /></a></li>
	      		</ul>
	      	  </div>
			</div>
        </div>
                        
	<div id="loading"><img src="../wp-content/src/images/ajax-loader.gif"/></div>
	</div>

    <div id="owl" class="owl-carousel"></div>

	<div id="typoButton" class="deactive">
		<a href="#" id="hash-button" class="disable"></a>
		<img src="../wp-content/src/images/generate-icon.png"/>
	</div>
    </form>
    
    <div id="msg"></div>
    <div id="socialBox"><div id="social">
    <a id="socialLine" href="#"></a>
    <img src="../wp-content/src/images/line.png" width="45" height="45" alt="Line" />
	</div></div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Blog Body -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5536591918634918"
     data-ad-slot="1913210001"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

	<div id="footer">© 2015 GRAFFIT LLC.</div>

</body>
</html>