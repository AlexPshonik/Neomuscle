jQuery(document).ready(function ($) {

  // Main Slider
  $('.slider').owlCarousel({
    autoplay: true,
    loop: true,
    items: 1,
    nav: true
  });

  // Select

  // $('select').selectize({
  //   create: true,
  //   sortField: 'text'
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

  // Disble mobile elements on desctop
  $(window).resize(function() {
    if(window.innerWidth < 768) {
      $(stickyHeader).removeClass('sticky');
      $(searchLine).removeClass('visible');
    }
  });
});