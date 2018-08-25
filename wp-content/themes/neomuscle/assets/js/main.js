jQuery(document).ready(function ($) {

  // QTY 
  $('.quantityPlus').click(function(e){
    e.preventDefault();
    fieldName = $(this).attr('field');
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    if (!isNaN(currentVal)) {
      $('input[name='+fieldName+']').val(currentVal + 1);
    } else {
      $('input[name='+fieldName+']').val(0);
    }
  });

  $(".quantityMinus").click(function(e) {
    e.preventDefault();
    fieldName = $(this).attr('field');
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    if (!isNaN(currentVal) && currentVal > 0) {
      $('input[name='+fieldName+']').val(currentVal - 1);
    } else {
      $('input[name='+fieldName+']').val(0);
    }
  });

  // Read more button
  $(".description-store-more-link").click(function(){
    $(".description-store-text").addClass("open");
  });

  // Select

  // $('select').selectize({
  //   create: false
  // });


  // Fix search width
  // $('.dgwt-wcas-search-input').on('keyup', function(){
    // $('.dgwt-wcas-suggestions-wrapp').css('width', '100%');
    // $('.dgwt-wcas-suggestions-wrapp').width = 100 + '%';
  // })


  // Sicky header
  let stickyHeader = $('.site-header');
  let siteNavigation = $('.section-site-navigation');
  $(window).scroll(function() {
    if(window.innerWidth > 768) {
      if($(this).scrollTop() > siteNavigation.offset().top + siteNavigation.innerHeight()) {
        stickyHeader.addClass('sticky');
      }
      else if($(this).scrollTop() < siteNavigation.offset().top ){
        stickyHeader.removeClass('sticky');
      }
    }
    else {
      stickyHeader.addClass('sticky');
    }
  });

  // Mobile menu
  let siteContent = $('body');
  let menuTogge = $('.menu-toggle');
  $(menuTogge).click(function() {
    $(this).toggleClass('toggled');
    $(siteContent).toggleClass('menu-open');
    $(siteContent).toggleClass('disableScroll');
  });

  // Mobile search line
  let searchBtn = $('.js-open-mobile-search');
  let searchLine = $('.mobile-search');
  $(searchBtn).click(function() {
    $(this).toggleClass('opened');
    $(searchLine).toggleClass('visible');
    setTimeout(function() {
      $('body').toggleClass('disableScroll');
    }, 500);
    $(menuTogge).removeClass('toggled');
    $(siteContent).removeClass('menu-open');
    $(menuTogge).removeClass('toggled');
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
      $(stickyHeader).removeClass('sticky');
      $(searchLine).removeClass('visible');
      $("h2.widget-title").parent().removeClass('toggled');
      $("h2.widget-title").next().slideUp(400);
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