$(document).ready(function(){

    // Add new class for download file css
    addCss();

    // Buttom share
    share();

    // Box js
    box_js();

    // Additionaly menu
    additionalyMenu();

    // Scroll Top
		scrollTop();

    // Footer menu
    footerMenu();

    // Delete empty class description
    deleteEmptyClass();

    // Accordion
    accordion();

    // Gallery Fancybox
    galleryFancybox();

    // Gallery Bxslider
    galleryBxslider();

    // Gallery Bxslider
    galleryOwl();

    // Select
    select();

    // Zrob test
    zrobTest();

    // Button search
    subtimSeacrch();

    // Responsive Iframe
    resizeRespons();
    minClicker();
    minMenuScond();

    // Select all filter
    // selectAllFilter();
});


$(window).scroll(function() {
    var $scrolTop = $('.ancLinks');

    var heeghtDesctop = $('html').height();
    var heeghtHeader = $('header').height();
    var heeghtIdMain = $('.background_home').height();

    var scroll_h = (heeghtIdMain != null) ? heeghtHeader + heeghtIdMain : heeghtHeader + 150 ;

    if ($(this).scrollTop() > scroll_h) {
      $scrolTop.css('display', 'block');
    }else{
      $scrolTop.css('display', 'none');
   }
});


function subtimSeacrch(){
    $('.btn-search').on('click', function(){
        $('.search-form').submit();
    });
  }


function addCss(){
    setTimeout(function() {
      $("head").append("<link rel='stylesheet' type='text/css' href='/wp-content/themes/natural/css/fonts-secondary.css' />")
    }, 300);
}


function share(){
    var share = $('button.single-characteristics_unit');
    share.append('<div id="share_button" class="ya-share2" data-services="facebook,gplus,linkedin"></div>');

    if($('button').hasClass("single-characteristics_unit")){
        var postitonTop = share.position().top + 50;
        var postitonLeft = share.position().left + 20;

        $('div#share_button').css({
          "top" : postitonTop,
          "left" : postitonLeft,
        });
    }

    share.on('click', function(){
      $('div#share_button').toggle();
    });
}


function additionalyMenu()
{
    var arrayAdditionalyMenu = ['9', '13', '15'];

    var href = [];
    for (var i = 0; i < arrayAdditionalyMenu.length; i++) {

      var item = arrayAdditionalyMenu[i];
      var count_a = $('.additionaly_menu_' + item).find('a').size();

      href[item] = [];

      for (var n = 0; n < count_a; n++) {
          href[item][n] = $('.additionaly_menu_' + item).find('a:eq(' + n + ')').attr("href");
      }

      var currentUrl = window.location.href;
      for (var m = 0; m < href[item].length; m++) {
          if(currentUrl.indexOf(href[item][m]) + 1)
          {
            $('.additionaly_menu_' + item).css("display", "block");
            $('a[href="' + href[item][m] + '"]').parent('li').addClass("a_border_bottom");

          }
      }
    }
}


function scrollTop()
{
    $("a.ancLinks").click(function () {
      var elementClick = $(this).attr("href");
      var destination = $(elementClick).offset().top;
      $('html,body').animate( { scrollTop: destination }, 500 );
      return false;
    });
}


function removePlusOrMinus(id)
{
    $('#' + id +  ' span').remove();
}


function footerMenu()
{
    var $menuFooterMenu = $('#menu-footer-menu > li');
    for (var i = 0; i < $menuFooterMenu.length; i++) {
        var imtemLink = $('#menu-footer-menu > li:eq(' + i + ') a');
        if($('#menu-footer-menu > li:eq(' + i + ')').children('ul').hasClass("sub-menu") === true){
            imtemLink.before("<span class='plus'></span>");
        }else{
            imtemLink.css("padding-left", "calc(10px + 0.5rem)");
        }
    }

    var time = 500;

    $('.footer_left div > ul > li').on('click', function(e){

        e.preventDefault();
        var id  = this.id;

        if($('#' +id).children('ul').hasClass("sub-menu") === true){

            $('#' +id).find('ul.sub-menu').toggle(time);

            setTimeout(function(){
                if($('#' + id).find('ul.sub-menu').is(':visible'))
                {
                    removePlusOrMinus(id);
                    $('#' + id + ' a').before("<span class='minus'></span>");
                }else{
                    removePlusOrMinus(id);
                    $('#' + id + ' a').before("<span class='plus'></span>");
                }
            }, time);

        }else{
            var url_footer_menu = $('#' + id + ' a').attr('href');
            $(location).attr('href', url_footer_menu);
        }

    }).children('ul.sub-menu').children('li').children('a').click(function(e) {
      var href = this.getAttribute('href');
      window.location.href = href;
      return false;
    });
}


function deleteEmptyClass()
{
    var arrayEmptyTags = ['description' , 'entry-header', 'text_before_product'];

    for (var i = 0; i < arrayEmptyTags.length; i++) {
      var textInTagsForClass = $('.' + arrayEmptyTags[i]).text();
      if(textInTagsForClass.trim.length == 0 && $('.' + arrayEmptyTags[i]).find(".video") == ''){
          $('.' + arrayEmptyTags[i]).remove();
      }
    }
}


function accordion()
{
    $(".accordion_set > span").on("click", function(){
      if($(this).hasClass('active')){
        $(this).find(".img-bar").attr('src','/wp-content/themes/natural/images/plu.png');
        $(this).removeClass("active");
        $(this).siblings('.content').slideUp(400);
      }else{
        $(this).find(".img-bar").attr('src','/wp-content/themes/natural/images/min.png');
      $(this).addClass("active");
      $(this).siblings('.content').slideDown(400);
      }
    });
}


// For num pagination
function select()
{
   // Hide button Select
   $('input#tchkb-0-0').parent().hide();

   $('select').select2();
   $('select').on("change", function (e) {
     process_data($(":checkbox"));
   });
}


function selectAllFilter() {
    $('input[type=checkbox]').change(function() {
        var countInputCheckbox = $('input[type=checkbox]').length;
        var ckeckedItems = 0;
        for (var i = 1; i < countInputCheckbox; i++) {
            if($('input[type=checkbox]:eq(' + i + ')').prop("checked") == true){
                ckeckedItems = ckeckedItems + 1;
            }
        }
        if(ckeckedItems == countInputCheckbox - 1){
            $('input[type=checkbox]:eq(0)').attr('checked',true);
        }else {
            $('input[type=checkbox]:eq(0)').attr('checked',false);
        }
    });
}


function galleryBxslider()
{
    $('.bxslider').bxSlider({
      mode: 'fade',
      captions: true
    });
}


function galleryOwl()
{
  var owl = $('.owl-carousel');
  owl.owlCarousel({
      margin: 45,
      loop:true,
      autoWidth:true,
      items: 7,
      autoplay:true,
      autoplayTimeout:2300,
      autoplayHoverPause:false,
      responsiveClass:true,
      responsive:{
        0:{
            items:2,
            margin: 30,
        },
        480:{
            items:3,
            margin: 60,
        },
        640:{
            items:5,
        },
        769:{
            items:7,

        }
      }
  });
}


function galleryFancybox()
{

  $(".certyfikat-gallery a[rel=example_group]").fancybox({
    'transitionIn'    : 'none',
    'transitionOut'   : 'none',
    'titlePosition'   : 'over',
    'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
        return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
    }
  });
}


function zrobTest()
{
   var sum=0;
   var datas=0;
    $('.test__var').click(function(){
      for(var i=0;i<$('.slide'+slide+' .test__var').length;i++){
         $('.slide'+slide+' .test_var_circle').eq(i).removeClass('circle-active');
      }
      $(this).find('.test_var_circle').addClass('circle-active');
    });
   var slide=1;
   $('.test__nav-right').click(function(){
    if (slide!=5){
         if (slide==4){
           for(var i=0;i<$('.test__var').length;i++){
            if ($('.test__var .test_var_circle').eq(i).attr('class')=='test_var_circle circle-active'){
          datas = $('.test__var .test_var_circle').eq(i).attr('data');
          datas = parseInt(datas);
         sum+=datas;
       }
      }
      $('article#post-142').css('background-size','100% auto');
    var proc = $('.test-final__egg-norm').height()/16*sum;
      setTimeout(function() {$('.test-final__egg-full').height(proc)}, 1000);
    }
     $('.slide'+slide).fadeOut(300);
      slide++;
     setTimeout(function(){$('.slide'+slide).show()},300);
    }
    });
   $('.test__nav-left').click(function(){
    if (slide!=1){
      $('.slide'+slide).fadeOut(300);
      slide--;
        if(slide==4){
          $('article#post-142').css('background-size','cover');
          $(document).scrollTop('0');
           slide=1;
           sum=0;
     }
     setTimeout(function(){$('.slide'+slide).show()},300);
    }
    });
}


function box_js() {
  // footer and background page 'zrob-test'
  	var test_drive = $('article.page').attr('id');

  	if(test_drive == 'post-142'){
  		$( '#colophon' ).css( 'margin-top', '0px' );


        $('.nav-last').on('click', function(){
          setTimeout(function(){
    			 $( '#colophon' ).css({
 								'margin-top' : 70 + 'px',
    		 });
       }, 300);
    	 });

       $('.test__nav-left').on('click', function(){

          $( '#colophon' ).css({
               'margin-top' : '0px'
          });
      });
    }
}


var menuIScroll = null;
function menuToDesktop() {

  if ($('.menu-main-menu-container #menu-main-menu').length <= 0)
    $('#menu-main-menu').appendTo('.menu-main-menu-container');

  $('.header-menu').show();
  $('.min_menu-cont').hide();

  if (menuIScroll !== null) {
    menuIScroll.destroy();
    menuIScroll = null;
  }

}


function menuToMobile() {
  if ($('.min_menu-header #menu-main-menu').length <= 0) {
    $('#menu-main-menu').appendTo('.min_menu-header');
  }

  $('.header-menu').hide();
  $('.min_menu-cont').show();

  if (menuIScroll === null) {
    menuIScroll = new IScroll('.min_menu-header',{
      scrollbars: true,
      mouseWheel: true,
      scrollbars: 'custom',
      click:true,
    });
    setTimeout(function () {
      menuIScroll.refresh();
    }, 20);
  }

  if (menuIScroll !== null) {
    menuIScroll.refresh();
  }

}


function menuMoving() {

  if  ($(window).width() <= 768 ) {
    menuToMobile();
  } else {
    menuToDesktop();
  }
}


function resizeRespons() {
  $( window ).resize(function() {
    for (var i=0;i<$('.accordion_set-number').length;i++) {
      var heightT = $('.accord-title').eq(i).height();
      $('.accordion_set-number').eq(i).height(heightT);
      $('.accordion_set-number').eq(i).css('line-height', heightT+'px');
    }

    if($(window).width()<=1185){
      $('.video>iframe').height($('.video>iframe').width()*0.6);
      $('.rubric-container>iframe').height($('.rubric-container>iframe').width()*0.6);
    }


    if ($(window).width()>768){
      $('.min-icon-secondMenu').siblings('div').show();
    }
    if($(window).width()<768){
      $('.min-icon-secondMenu').siblings('div').hide();
    }

    menuMoving();

    var widthFrame = parseInt($( ".video-content>iframe" ).width());
    $( ".video-content>iframe" ).height(widthFrame/1.9);
  });


  $(window).load(function(){
    menuMoving();
  })


  $( document ).ready(function() {
    for(var i=0;i<$('.accordion_set-number').length;i++){
      var heightT = $('.accord-title').eq(i).height();
      $('.accordion_set-number').eq(i).height(heightT);
      $('.accordion_set-number').eq(i).css('line-height', heightT+'px');
    }
    if ($(window).width()<=1185){
      $('.video>iframe').height($('.video>iframe').width()*0.6);
      $('.rubric-container>iframe').height($('.rubric-container>iframe').width()*0.6);
    }
    menuMoving();
    var widthFrame = parseInt($( ".video-content>iframe" ).width());
    $( ".video-content>iframe" ).height(widthFrame/1.9);
  });
}

var click=false;
function minClicker(){
  $('.min_menu-img, .footer-menu_mob').click(function(){
    if(click==false){
    $('.min_menu-header').fadeIn(100);
    $("html").css("height", "100%");
    $(".min_menu-cont").css("position", "absolute");
    $('.min_menu-img').addClass('min_menu-img-act');
    $('#header').addClass('mob-menu');
    click=true;
      if (menuIScroll !== null) {
        menuIScroll.refresh();
      }
    return ;
}
if(click==true){
    $('.min_menu-header').fadeOut(100);
    $('#header').removeClass('mob-menu');
    $("html").css("height", "auto");
    $(".min_menu-cont").css("position", "relative");
    setTimeout(function(){$('.min_menu-img').removeClass('min_menu-img-act')},100);
    click=false;
    return ;
  }
  });
}


var mybool=false;
function minMenuScond(){
 $('.min-icon-secondMenu').click(function(){
if (mybool==false){
 $('.min-icon-secondMenu').css('transform','rotateX(180deg)')
  $('.min-icon-secondMenu').siblings('div').slideDown(300);
   mybool=true;
 }
 else if(mybool==true){
   $('.min-icon-secondMenu').css('transform','rotateX(0deg)')
   $('.min-icon-secondMenu').siblings('div').slideUp(300);
    mybool=false;
 }
 });
}
