jQuery(document).ready(function ($) {
  
  // Sicky header
  if(window.innerWidth >= 768) {
    $('.site-header-wrapper').removeClass('sticky');
    if($(window).scrollTop() > $('.section-site-navigation').offset().top + $('.site-header').innerHeight()){
      if(!$('.site-header').hasClass('sticky')){
        $('.site-header').addClass('sticky');
      }
    }
  }
  else if(window.innerWidth < 768) {
    $('.site-header-wrapper').addClass('sticky');
  };
  $(window).resize(function() {
    if(window.innerWidth < 768) {
      if(!$('.site-header-wrapper').hasClass('sticky')){
        $('.site-header-wrapper').addClass('sticky');
      }
      if($('.site-header').hasClass('sticky')){
        $('.site-header').removeClass('sticky');
      }
    }
    else if(window.innerWidth >= 768) {
      if($('.site-header-wrapper').hasClass('sticky')){
        $('.site-header-wrapper').removeClass('sticky');
      }
      if($(window).scrollTop() < $('.section-site-navigation').innerHeight() + $('.site-header').innerHeight()){
        if($('.site-header').hasClass('sticky')){
          $('.site-header').removeClass('sticky');
        }
      }
    }
  });
  $(window).scroll(function() {
    if(window.innerWidth >= 768) {
      if($(window).scrollTop() > $('.section-site-navigation').offset().top + $('.site-header').innerHeight()){
        if(!$('.site-header').hasClass('sticky')){
          $('.site-header').addClass('sticky');
        }
      }
      else {
        if($('.site-header').hasClass('sticky')){
          $('.site-header').removeClass('sticky');
        }
      }
    }
  });
  
  // Mobile search line
  $('.js-open-mobile-search').click(function() {
    $('.js-open-mobile-search').toggleClass('open');
    $('.site-header-search-mobile').toggleClass('open');
    $('body').toggleClass('noscroll');
  });
  
  $('.search-placeholder').click(function() {
    $('.js-open-mobile-search').toggleClass('open');
    $('.site-header-search-mobile').toggleClass('open');
    $('body').toggleClass('noscroll');
  });

  // Mobile menu
  $('.js-open-mobile-menu').click(function() {
    $('.js-open-mobile-menu').toggleClass('open');
    $('.site-header-wrapper').toggleClass('menu-open');
    $('.section-site-navigation').toggleClass('open');
    $('body').toggleClass('menu-open');
    $('.js-open-mobile-search').removeClass('open');
    $('.site-header-search-mobile').removeClass('open');
    if(!$('body').hasClass('noscroll')) {
      $('body').addClass('noscroll');
    };
  });
  $('.section-site-navigation-placeholder').click(function() {
    $('.js-open-mobile-menu').toggleClass('open');
    $('.site-header-wrapper').toggleClass('menu-open');
    $('.section-site-navigation').toggleClass('open');
    $('body').toggleClass('menu-open');
    $('body').removeClass('noscroll');
  });
  $(window).resize(function() {
    if(window.innerWidth >= 768) {
      $('.js-open-mobile-menu').removeClass('open');
      $('.site-header-wrapper').removeClass('menu-open');
      $('.section-site-navigation').removeClass('open');
      $('body').removeClass('menu-open');
      $('body').removeClass('noscroll');
    }
  });

  // Homepage slider
  $('.homepage-slider .slider').owlCarousel({
    loop:true,
    nav:true,
    dots: true,
    autoplay: true,
    items: 1,
    navText: ["<span class='ui-icon-right-arrow prev'></span>","<span class='ui-icon-right-arrow next'></span>"]
  });

  // QTY
  function qtyUpdate(btn, value) {
    var qtyClass = '.qty';
    var field = $(btn).parent().children('input'+qtyClass);
    var currentVal = parseInt(field.val());
    if (!isNaN(currentVal)) {
      if(currentVal + value <= 0) {
        field.val(0);
      }
      else {
        field.val(currentVal + value);
      }
    } else {
      field.val(0);
    }
  }

  $('.quantityPlus').click(function(e){
    e.preventDefault();
    qtyUpdate($(this), 1);
  });

  $(".quantityMinus").click(function(e) {
    e.preventDefault();
    qtyUpdate($(this), -1);
  });

  var firstAjaxLoad = true;
  $( '.woocommerce-cart-form :input[name="update_cart"]' ).prop( 'disabled', false );
  $(document).ajaxComplete(function () {
    if(firstAjaxLoad) {
      $('.quantityPlus').click(function(e){
        e.preventDefault();
        qtyUpdate($(this), 1);
      });

      $(".quantityMinus").click(function(e) {
        e.preventDefault();
        qtyUpdate($(this), -1);
      });
      $( '.woocommerce-cart-form :input[name="update_cart"]' ).prop( 'disabled', false );
      firstAjaxLoad = false;
    }
  });

  // Read more button
  $(".description-store-more-link").click(function(){
    $(".description-store-text").addClass("open");
  });

  // Select
  // $('#vkus').selectize();

  // Fix search width
  // $('.dgwt-wcas-search-input').on('keyup', function(){
    // $('.dgwt-wcas-suggestions-wrapp').css('width', '100%');
    // $('.dgwt-wcas-suggestions-wrapp').width = 100 + '%';
  // })

  // Food Purpose
	var intention = {
    'male': ['Выбирите цель', 'Набор мышечной массы', 'Восстановление после тренировок', 'Увеличение выносливости', 'Снижение веса', 'Улучшение иммунитета'],
    'female': ['Выбирите цель', 'Восстановление после тренировок', 'Снижение веса', 'Улучшение иммунитета'],
  };

  $('#gender').change(function() {
    var value = $('#gender').val();
    if (value != '0') {
      var subItems = intention[value];
      var html = '';
      for (var i = 0; i < subItems.length; i++) {
        html += '<option value="' + value + '.' + i +'">' + subItems[i] + '</option>'
      }
      $('#intention').html(html);
      $('#intention').removeAttr('disabled');
    } else {
      $('#intention').attr('disabled', 'disabled');
    }
  });

  $('#intention').change(function() {
    var value = $('#intention').val();
    if (value != 'male.0') {
      if(value == 'male.1'){
        $('#intention-btn').click(function() {
          window.location = "/test/";
        });
      }
    }
  });

  // Sidebar accordeon
  $(document).on("click", "h2.widget-title", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass('toggled');
    $(this).next().slideToggle(400);
  });

  if(window.innerWidth < 768) {
    $("h2.widget-title").parent().removeClass('toggled');
    $("h2.widget-title").next().slideUp(400);
  }

  // Disble mobile elements on desctop
  $(window).resize(function() {
    if(window.innerWidth < 768) {
      $("h2.widget-title").parent().removeClass('toggled');
      $("h2.widget-title").next().slideUp(400);
    }
    if(window.innerWidth >= 768) { 
      if($('body').hasClass('noscroll')) {
        $('body').removeClass('noscroll');
      };
    }
  });

  $('.related .products').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    touchDrag: true,
    mouseDrag: true,
    navText : ["<span class='ui-icon-right-arrow prev'></span>","<span class='ui-icon-right-arrow next'></span>"],
    responsive:{
      0:{
        items:2
      },
      576:{
        items:3
      },
      768:{
        items:4
      },
      1200:{
        items: 5,
        loop: false,
        mouseDrag: false,
        touchDrag: false,
      }
    }
  });
  $('.related .products').addClass('owl-carousel');

});