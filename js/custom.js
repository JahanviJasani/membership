jQuery(document).ready(function($){

  jQuery.rsCSS3Easing.easeOutBack = 'cubic-bezier(0.175, 0.885, 0.320, 1.275)';
  $('#slider-with-blocks-1').royalSlider({
    arrowsNav: false,
    arrowsNavAutoHide: true,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 10,
    controlNavigation: 'bullets',
    imageScaleMode: 'none',
    imageAlignCenter: false,
    blockLoop: true,
    loop: true,
    numImagesToPreload: 4,
    transitionType: 'fade',
    keyboardNavEnabled: true,
    block: {
        delay: 300
    },
    autoPlay: {
        enabled: true,
        pauseOnHover: false,
        delay:6000
    }
  });

  $('.loader').delay(1500).fadeOut();
  $('#preloader').delay(2000).fadeOut('slow');
  
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      $('header').addClass("header-fix");
    } else {            
      $('header').removeClass("header-fix");
    }
  });

  // Smoth scroll on page hash links
  $('a[href*="#"]:not([href="#"],.tab-link)').on('click', function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;
        if ($('#header').length) {
          top_space = $('#header').outerHeight();
          if (!$('#header').hasClass('header-fixed')) {
            top_space = top_space - 20;
          }
        }
        $('html, body').stop().animate({
           scrollTop: $(target).offset().top-50
        }, 600);
        $('.fx-strip li').removeClass('active');
        $(this).parent().addClass('active');

        return false;
      }
    }
  });
  $(".hamburder").click(function(){
    $("body").toggleClass("open-menu");
  });
	$('.memslider').slick({
    lazyLoad: 'ondemand',
		dots: true,
		arrows: false,
		infinite: false,
		speed: 3000,
		slidesToShow: 1,
		autoplay: true,  
	});
  $('.first-slider').mouseover(function() {
    $('.second-slider').slick('pause')
  });
  $('.first-slider').mouseout(function() {
    $('.second-slider').slick('play')
  });

  $('.second-slider').mouseover(function() {
    $('.first-slider').slick('pause')
  });
  $('.second-slider').mouseout(function() {
    $('.first-slider').slick('play')
  });

  $('.destination-slider').slick({
    lazyLoad: 'ondemand',
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    autoplay: true,  
    centerMode: true,
    pauseOnHover:false,
    centerPadding: '10px',
    responsive: [
     {
       breakpoint: 768,
       settings: {
           slidesToShow: 2,
            centerMode: false,
       }
     },
       {
       breakpoint: 480,
       settings: {
           slidesToShow: 1,
       }
     },
   ]
  }); 

  var ret = $('.banner').height();
  $(window).scroll(function(){
    if($(window).scrollTop() > ret){
      $('.fx-strip').addClass('fx-box');
    }else{
      $('.fx-strip').removeClass('fx-box');
    }
  });

  var get_wd_height = $(window).height();
  $(".royalSlider").css({
    "height": get_wd_height
  });
  var get_wd_height = $(window).height();
  $(".rsOverflow").css({
    "height": get_wd_height
  });

  AOS.init();
  $(window).on('load', function () { 
    AOS.refresh(); 
    $('.fx-strip li').removeClass('active');
  });

  // $(window).scroll(function() {
  //   var e = $(window).scrollTop();
  //   e > 300 ? $(".gotop").addClass("active") : 300 > e && $(".gotop").removeClass("active")
  //   }), $(".gotop").click(function() {
  //   return $("html, body").animate({
  //       scrollTop: 0
  //   }, 700), !1
  // });

  if (window.matchMedia('(max-width: 1023px)').matches){ 
    $(".fx-strip li a").click(function(){
      $("body").removeClass("open-menu");
    }); 
  }

  // Pricing Tabs
  $('.pricing-tabs a').click(function(){
    var pricing_tab = $(this).attr("data-tab");
    $('.'+pricing_tab+' li').removeClass('active');
    $(this).parent().addClass('active');
    var pricing_inner = $(this).attr("data-slide");
    $('.'+pricing_inner).hide();
    var activeTab = $(this).attr('href');
    $(activeTab).fadeIn();
    $('html, body').stop().animate({
       scrollTop: $(activeTab).offset().top-60
    }, 600);
    AOS.refresh();
    return false;
  });

  $('.share-expand').click(function(e){
    $(this).toggleClass('active');
    $(document).click(function (e) {
      var container = $(".share-expand");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.share-expand').removeClass('active');
      }
    });
  });

});