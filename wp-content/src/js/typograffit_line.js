$(document).ready(function() {
    //INIT
    var owl = $("#owl"),
      hashLine = [],
      inputTextLine = [],
      totalHash = 0,
      currentHash = 0,
      currentHashLine = 0,
      thisValueLength = 0;

    //layout INIT
    $('#owl').hide();
    $("#social").hide();

    //Original Image Toggle
    $('a.anchor').on('click touchend', function() {
        var speed = 200;
        var href= $(this).attr("href");
        var position = $(href).offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

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

    //a href deactivate
    $('a.disable').click(function(){
      return false;
    });

    //detect to click or touch any-body-area function
    $('body').on('click touchend', '.dummy', function() {
      //for EMOJI
      $("#emoji-button").removeClass("active");
      $("#emojiList").animate({height:"hide",opacity:"hide"},500, "easeOutExpo");
      $('#typoData').removeClass("deactive");
      $('p.dummy').remove();
      console.log("CLICK PAGE");
    });

    //Emoji OWL
    $("#emojiWrap").owlCarousel({
      items : 2,
      itemsDesktop : [1199,2],
      itemsDesktopSmall : [979,2],
      itemsTablet: [768,2],
      itemsTabletSmall: false,
      itemsMobile : [479,2],
      lazyLoad : true
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

         var lineUrl = 'http://'+window.location.hostname+'/~typograf/blog/line/?h=';
        
        $("#social").html('<a href="http://line.me/R/msg/text/?'+currentText+'%0D%0A'+lineUrl+currentHashLine+'"><img src="../wp-content/src/images/line.png" width="45" height="45" alt="LINE" /></a>');

        if ($("#social").is(':hidden')){
         // $("#social").fadeIn();
          $("#social a").removeClass("deactive");
          $("#social").animate({height:"show", opacity:"show"},300, "easeOutExpo");
        }
        //for T-Shirt //                      
        $("#post_title").value= currentHashLine;
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

          var src1 = 'http://typograffit.com/rest_json/posts/generate/body:';
          var src2 = 'http://typograffit.com/rest_json/posts/getImage/post_id:';
          var src3 = 'http://typograffit.com/posts/compose/';
          var src4 = 'http://typograffit.com/posts/getImage/';
          var src5 = 'http://typograffit.com/rest_json/posts/getInfo/post_id:';

          //set layout-css
          $("#typoButton").addClass("deactive");
          $('#typoData').addClass("deactive");
          $("#emoji-button").addClass("deactive");
          $("#loading").fadeIn("slow");
          $("#social a").addClass("deactive");
          $("#msg").empty();

          // get HASH //
          $.ajax({
              url: src1+inputData+'/no_typograffit_logo:1',
              type: 'GET',
              timeout: 10000,

              // process HASH to IMAGE //
              success: function(data) {
                  console.log("SUCCESS");
                  var datatxt = $(data.responseText).text();
                  var jsoncontentid = $.parseJSON(datatxt).post_id;
                  inputTextLine.push(inputData);
                  hashLine.push(jsoncontentid);
                  console.log("HASH:", jsoncontentid);
                  console.log("hashLine:", hashLine);
                  totalHash += 1;

                  // get IMAGE //
                  $.ajax({
                    url: src2+jsoncontentid,
                    contentType: "image/png",
                    type: 'GET',
                    timeout: 10000,

                    // get IMAGE to URL(save/share/tShirt) //
                    success: function(data2) {
                      console.log("SUCCESS2");
                      var datatxt2 = $(data2.responseText).text();
                      //console.log("COMPOSE IMAGE:", src2+jsoncontentid);
                      //console.log("CONPOSE URL:", src3+jsoncontentid);

                      //for IMAGE //
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

                        //if baseImage appears, disappear.
/*
                        if ($('#baseImage').is(':visible')){
                          $("#baseImage").animate({height:"toggle",opacity:"toggle"},500, "easeOutExpo");
                        }
*/
                        //set layout-css
                        $('#typoData').removeClass("deactive");
                        $("#loading").hide();
                        $('#toggle-button').removeClass("deactive");
                        $("#toggle-button").addClass("typoImage");
                        $("#typoButton").removeClass("deactive");

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

                    // miss IMAGE //
                    error: function(data2) {
                      console.log("ERROR2");
                      $("#loading").hide();
                      $("#typoButton").removeClass("deactive");
                      $("#msg").html('Please try it again.');
                    },
                    // complete IMAGE //
                    complete: function(data2) {
                      console.log("COMPLETE2");
                    }
                  });
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
