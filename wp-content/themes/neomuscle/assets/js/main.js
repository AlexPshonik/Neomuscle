jQuery(document).ready(function ($) {

  /**
   * QTY
  */
  $('.quantityPlus').click(function(e){
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If is not undefined
    if (!isNaN(currentVal)) {
        // Increment
        $('input[name='+fieldName+']').val(currentVal + 1);
    } else {
        // Otherwise put a 0 there
        $('input[name='+fieldName+']').val(0);
    }
  });

  $(".quantityMinus").click(function(e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 0) {
      // Decrement one
      $('input[name='+fieldName+']').val(currentVal - 1);
    } else {
      // Otherwise put a 0 there
      $('input[name='+fieldName+']').val(0);
    }
  });
  /**
   * End QTY
  */


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
});