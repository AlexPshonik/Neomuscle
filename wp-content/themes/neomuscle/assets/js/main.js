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
  $(window).scroll(function() {
    if(window.innerWidth > 768) {
      if($(this).scrollTop() > stickyHeader.height()) {
        stickyHeader.addClass('sticky');
      }
      else {
        stickyHeader.removeClass('sticky');
      }
    }
  });

  // Mobile search line
  let searchBtn = $('.js-open-mobile-search');
  let searchLine = $('.mobile-search');
  // $('body').on('click', function() {
  //   if($(searchLine).hasClass('visible')){
  //     $(searchBtn).removeClass('opened');
  //     $('body').removeClass('disableScroll');
  //     $(searchLine).removeClass('visible');
  //     searchLineVisible = false;
  //   }
  // });
  $(searchBtn).click(function() {
    $(this).toggleClass('opened');
    $(searchLine).toggleClass('visible');
    setTimeout(function() {
      $('body').toggleClass('disableScroll');
    }, 500);
  });

  // Disble mobile elements on desctop
  $(window).resize(function() {
    if(window.innerWidth < 768) {
      $(stickyHeader).removeClass('sticky');
      $(searchLine).removeClass('visible');
    }
  });
});