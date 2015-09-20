$(document).ready(function() {
    //USER AGENT INIT
    var userAgent = window.navigator.userAgent.toLowerCase(),
    uaName = 'unknown';
    if((userAgent.indexOf('iphone') != -1)||(userAgent.indexOf('ipod') != -1)|| (userAgent.indexOf('ipad') != -1)||(userAgent.indexOf('android') != -1)){
      uaName = 'smartphone';
    }else{
      $('.dtophide').hide();
      $('.dtopshow').show();
    }

    //INIT
    var owl = $("#owl"),
    	hashLine = [],
    	inputTextLine = [],
 	    totalHash = 0,
    	currentHash = 0,
    	currentHashLine = 0,
    	thisValueLength = 0;

    //LANGUAGE
    var lang = ""
    lang = getUrlVars()["lang"];
    if(lang == "ja" || lang == "ja#generator"){
    	$('#typoData').addClass("japanese");
    }

    //layout INIT
    $('#owl').hide();

    //Text ⇄ Image Button
    $('#toggle-button').click(function(){
      $("#typoText").animate({height:"toggle",opacity:"toggle"},300, "easeOutExpo");
      $("#owl").animate({height:"toggle",opacity:"toggle"},300, "easeOutExpo");
      $("#toggle-button").toggleClass("typoImage");
      $('#emoji-button').toggle();
    });

    //Emoji Button
    $('#emoji-button').on('click touchend', function() {
      $("#emoji-button").toggleClass("active");
      $("#emojiList").animate({height:"show",opacity:"toggle"},500, "easeOutExpo");
      $('#typoData').toggleClass("deactive");
      $('body').append('<p class="dummy"></p>');
    });

    //detect to click or touch any-body-area function
    $('body').on('click touchend', '.dummy', function() {
      //for SOCIAL
      $("#socialSub").animate({height:"hide",opacity:"hide"},500, "easeOutExpo");
      //for EMOJI
      $("#emoji-button").removeClass("active");
      $("#emojiList").animate({height:"hide",opacity:"hide"},500, "easeOutExpo");
      $('#typoData').removeClass("deactive");
      $('p.dummy').remove();
      console.log("CLICK PAGE");
    });

    $('#urlBox').on('click touchend', function() {
//      this.setSelectionRange(0, this.value.length);
      var urlBoxText = document.getElementById ("urlBoxText");
      urlBoxText.selectionStart=0;
      urlBoxText.selectionEnd=this.value.length;
    });

    //Top image toggle
    $('#top_message_button').on('click touchend', function() {
        var speed = 500;
        var href= $(this).attr("href");
        var position = $(href).offset().top;
        $("html, body").animate({scrollTop:position}, speed, "easeOutExpo");
        return false;
    });

    //Original Image Toggle for Social Landing
    $('a.anchor').on('click touchend', function() {
        var speed = 300;
        var href= $(this).attr("href");
        var position = $(href).offset().top;
        $("html, body").animate({scrollTop:position}, speed, "easeOutExpo");
        return false;
    });

    //a href deactivate
    $('a.disable').click(function(){
      return false;
    });

    //Emoji OWL
    $("#emojiWrap").owlCarousel({
      items : 8,
      itemsDesktop : [1199,8],
      itemsDesktopSmall : [979,8],
      itemsTablet: [768,8],
      itemsTabletSmall: false,
      itemsTablet: [670,6],
      itemsMobile : [479,5],
      lazyLoad : true,
      //Basic Speeds
      slideSpeed : 300,
      paginationSpeed : 500,
      rewindSpeed : 700
/*
      items : 2,
      itemsDesktop : [1199,2],
      itemsDesktopSmall : [979,2],
      itemsTablet: [768,2],
      itemsTabletSmall: false,
      itemsMobile : [479,2],
      lazyLoad : true
*/
    });

    //Generate Image OWL
    owl.owlCarousel({
    //Basic Option
    	stopOnHover: true,
    	singleItem : true,
  	  //Basic Speeds
  	  slideSpeed : 500,
  	  paginationSpeed : 800,
  	  rewindSpeed : 1000,
  	  //CALLBACK
      beforeMove : beforeMove,
  	  afterAction : afterAction
	  });

      function beforeMove(){
//        $("#socialBox").hide();
      }

    //update Hash-key
	  function afterAction(){
  	 currentHash = this.owl.currentItem;
	   console.log("focus! currentHash:",currentHash);
     currentHashLine = hashLine[currentHash];
	   currentText = inputTextLine[currentHash];
	   console.log("currentHashLine:",currentHashLine);
     console.log("totalHash:",totalHash);
	   htmlUpdate();
    }

	  // ** HTML ** //
	  //for LINK //       
      function htmlUpdate() {               
      	if(currentHashLine == 0){ currentHashLine = jsoncontentid; }
    	  //console.log("socialHash: ",currentHashLine);

    	var imgUrl = 'http://api.typograffit.com/posts/getImage/';
    	var landingUrl = 'http://'+window.location.hostname+'/compose/?h=';
      var lineUrl = 'http://'+window.location.hostname+'/line/?h=';
    	var langLine = "";
    	if(lang == "ja"){
	    	langLine = '&lang=ja';
	    	langLine = encodeURIComponent(langLine);
    	}

        $("#socialSub").hide();
//        if ($("#social").is(':hidden')){
         // $("#social").fadeIn();
          $("#urlBoxText").removeClass("deactive");
          $("#social a").removeClass("deactive");
          $('#socialTwitter').removeClass("deactive");
          $("#social").animate({height:"show", opacity:"show"},300, "easeOutExpo");
  //      }

        $('#urlBoxText').attr("value", landingUrl+currentHashLine+langLine);

        $('#socialDownload').on('click touchend', function() {
          $('#socialDownload').attr("href", imgUrl+currentHashLine + '/imgDownload:true/');
        });
        $('#socialFacebook').on('click touchend', function() {
          window.open('https://www.facebook.com/sharer/sharer.php?u='+landingUrl+currentHashLine+langLine+'', 'fb', 'width=600 height=300');
        });
        $('#socialTwitter').on('click touchend', function() {
          window.open('http://twitter.com/intent/tweet?text='+currentText+'&amp;hashtags=typograffit&amp;url='+landingUrl+currentHashLine+langLine+'', 'twi', 'width=500 height=300');
        });
        $('#socialGplus').on('click touchend', function() {
        	window.open('https://plus.google.com/share?url='+landingUrl+currentHashLine+langLine+'', 'gplus', 'width=600 height=300');
        });
        $('#socialPinterest').on('click touchend', function() {
          window.open('http://pinterest.com/pin/create/button/?url='+landingUrl+currentHashLine+langLine+'&amp;media='+imgUrl+currentHashLine+'', 'pnt', 'width=600 height=300');
        });
        $('#socialTumblr').on('click touchend', function() {
          window.open('http://www.tumblr.com/share/link?url='+landingUrl+currentHashLine+langLine+'&amp;name=TYPOGRAFFIT : '+currentText+'', 'tum', 'width=450 height=450');
        });

        $('#socialFacebookSp').on('click touchend', function() {
          window.open('https://www.facebook.com/sharer/sharer.php?u='+landingUrl+currentHashLine+langLine+'', 'fb', 'width=600 height=300');
        });
        $('#socialFacebookMsg').on('click touchend', function() {
          $('#socialFacebookMsg').attr("href",'fb://messaging/original_message?mid='+currentText+'%0D%0A'+landingUrl+currentHashLine+langLine);
        });
        $('#socialLine').on('click touchend', function() {
          $('#socialLine').attr("href",'http://line.me/R/msg/text/?'+currentText+'%0D%0A'+lineUrl+currentHashLine);
        });
        $('#socialTwitterSp').on('click touchend', function() {
          //currentText = encodeURIComponent(currentText);
          var twitterStr = ' '+landingUrl+currentHashLine+langLine+' #typograffit';
          twitterStr = encodeURIComponent(twitterStr);
          twitterStr = currentText + twitterStr;
          $('#socialTwitterSp').attr("href",'twitter://post?message='+twitterStr);
//          document.location = 'twitter://post?message='+twitterStr;
          var time = (new Date()).getTime();
          setTimeout(function(){
          var now = (new Date()).getTime();
          if((now-time)<300) {
            window.open('http://twitter.com/intent/tweet?text='+currentText+'&amp;hashtags=typograffit&amp;url='+landingUrl+currentHashLine+langLine+'', 'twi', 'width=500 height=300');
            }
        }, 200);

        });

        //for T-Shirt //                      
        //$("#post_title").value= currentHashLine;
        $('#post_title').attr("value", currentHashLine);

      }

      $( function() {
        //set init text-area action
        $('textarea#typoData').bind('keydown keyup keypress change',function(){
          thisValueLength = $(this).val().length;
          if(thisValueLength == 0){
            $('.textClear').fadeOut("fast");
            $('#typoButton').addClass("deactive");          
          }else{
            $('.textClear').fadeIn();
            $('#typoButton').removeClass("deactive");          
          }
        });

        $('#typoButton').click(
        function () {
          //if Generate image appears, change into text area.
          if ($('#owl').is(':visible')){
            $('#owl').toggle();
            $('#typoText').toggle();
            $("#toggle-button").toggleClass("typoImage");
            $("#emoji-button").toggle();
          }

          //set input-text
          var inputData = $('textarea#typoData').val();
          inputData = encodeURIComponent(inputData);

          var src1 = 'http://api.typograffit.com/rest_json/posts/generate/body:';
          var src2 = 'http://api.typograffit.com/rest_json/posts/getImage/post_id:';
          var src3 = 'http://api.typograffit.com/posts/compose/';
          var src4 = 'http://api.typograffit.com/posts/getImage/';
          var src5 = 'http://api.typograffit.com/rest_json/posts/getInfo/post_id:';

          //set layout-css
          $("#typoButton").addClass("deactive");
          $('#typoData').addClass("deactive");
          $("#emoji-button").addClass("deactive");
          $("#loading").fadeIn("slow");
          $("#urlBoxText").addClass("deactive");
          $("#social a").addClass("deactive");
          $("#productForm input").addClass("loadmask");
          $("#msg").empty();

          // get HASH //
          $.ajax({
              url: src1+inputData+'/no_typograffit_logo:1',
              type: 'GET',
              timeout: 10000,

              // process HASH to IMAGE //
              success: function(data) {
                  console.log("SUCCESS");
                  var jsoncontentid = $.parseJSON(data).post_id;
                  inputTextLine.push(inputData);
                  hashLine.push(jsoncontentid);
                  console.log("HASH:", jsoncontentid);
                  console.log("hashLine:", hashLine);
                  totalHash += 1;

                  var sendImg = new Image();
                  //sendImg.crossOrigin = "Anonymous";
                    sendImg.src = src4+jsoncontentid;
                        
                      sendImg.onload = function() {
                        //if text area appears, change into Generate image.
              if ($('textarea#typoData').is(':visible')){
                $('#typoText').toggle();
                $('#owl').toggle();
                            $("#emoji-button").removeClass("deactive");
                            $('#emoji-button').fadeOut(30);
              }

              //set layout-css
              $('#typoData').removeClass("deactive");
              $("#loading").hide();
              $('#toggle-button').removeClass("deactive");
              $("#toggle-button").addClass("typoImage");
              $("#typoButton").removeClass("deactive");
              $("#productForm input").removeClass("loadmask");
              $("#productForm").animate({height:"show", opacity:"show"},300, "easeOutExpo");

              //insert Generate Image.
                var content = '<div class="item"><img src="' + src4+jsoncontentid + '" /></div>';
                owl.data('owlCarousel').addItem(content);

                        //Remove Item if item sum are over Maximum.
                        var maxNum = 7;
                        if(totalHash > maxNum){
                          totalHash = maxNum;
                          owl.data('owlCarousel').removeItem(0);
                          hashLine.shift();
                          inputTextLine.shift();
                        }
                        owl.data('owlCarousel').goTo(totalHash);
                    }
              },

              // miss HASH //
              error: function(data) {
                  console.log("ERROR");
                  $("#loading").hide();
                  $("#typoButton").removeClass("deactive");
                  $("#msg").html('Please try it again.');
              },
              // complete HASH //
              complete: function(data) {
                  console.log("COMPLETE");
              }
          });
      });
    });
});

//get URL parameters function
function getUrlVars() {
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++){
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}

//set Emoji function
function insertEmoji(strings){
  $("#emoji-button").removeClass("active");
  $("#emojiList").hide();
  var typoEmoji = "["+strings+"]";
  var typoData = $('textarea#typoData');
    typoData.val(typoData.val()+typoEmoji);
  $('#typoData').removeClass("deactive");
  $('#typoButton').removeClass("deactive");
  $('p.dummy').remove();
}

//set clear text-area function
function clearButton_Click(){
	this.typoForm.typoData.value="";
	$('.textClear').hide();
}

//set sub-social button function
function sOpen(){
    $("#socialSub").animate({height:"show",opacity:"toggle"},500, "easeOutExpo");
    $('body').append('<p class="dummy"></p>');
    console.log("OPEN");
}

//set urlBox button function
function urlOpen(){
    $("#urlBox").animate({height:"toggle",opacity:"toggle"},200, "easeOutExpo");
}

//for twitter-share function
!function(d,s,id) {
  var js,
    fjs=d.getElementsByTagName(s)[0],
    p=/^http:/.test(d.location)?'http':'https';
    if(!d.getElementById(id)){
      js=d.createElement(s);
      js.id=id;
      js.src=p+'://platform.twitter.com/widgets.js';
      fjs.parentNode.insertBefore(js,fjs);
    }
  }
(document, 'script', 'twitter-wjs');