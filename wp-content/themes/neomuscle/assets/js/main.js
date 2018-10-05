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
    items: 1,
    autoplay: true,
    navText: ["<span class='ui-icon-right-arrow prev'></span>","<span class='ui-icon-right-arrow next'></span>"],
    responsive:{
      0:{
        nav: false
      },
      992:{
        nav: true
      }
    }
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

  // Billing address fields
  var region = document.getElementById('billing_nova_poshta_region');
  var city = document.getElementById('billing_nova_poshta_city');
  var warehouse = document.getElementById('billing_nova_poshta_warehouse');

  $(region).selectize();
  $(city).selectize({});
  $(warehouse).selectize({});

  $(region).prop('disabled', true);
  $(city).prop('disabled', true);
  $(warehouse).prop('disabled', true);

  $(region).change(function () {
      $(city)[0].selectize.destroy();
      city.options[0].text = 'Выберите опцию';
      $(warehouse)[0].selectize.destroy();
      warehouse.options[0].text = 'Выберите опцию';
      setTimeout(function() {
        $(city).selectize({});
        $(warehouse).selectize({});
      }, 4000);
    });

    $(city).change(function () {
      warehouse.options[0].text = 'Выберите опцию';
      $(warehouse)[0].selectize.destroy();
      setTimeout(function() {
        $(warehouse).selectize({});
      }, 4000);
    });

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
          window.location = "/intention/nabor-myshechnoj-massy/";
        });
      }
      if(value == 'male.2'){
        $('#intention-btn').click(function() {
          window.location = "/intention/vosstanovlenie-posle-trenirovok/";
        });
      }
      if(value == 'male.3'){
        $('#intention-btn').click(function() {
          window.location = "/intention/uvelichenie-sily-i-vynoslivosti/";
        });
      }
      if(value == 'male.4'){
        $('#intention-btn').click(function() {
          window.location = "/intention/snizhenie-vesa/";
        });
      }
      if(value == 'male.5'){
        $('#intention-btn').click(function() {
          window.location = "/intention/ukreplenie-zdorovja-i-immuniteta/";
        });
      }
    }
    if (value != 'female.0') {
      if(value == 'female.1'){
        $('#intention-btn').click(function() {
          window.location = "/intention/vosstanovlenie-posle-trenirovok/";
        });
      }
      if(value == 'female.2'){
        $('#intention-btn').click(function() {
          window.location = "/intention/snizhenie-vesa/";
        });
      }
      if(value == 'female.3'){
        $('#intention-btn').click(function() {
          window.location = "/intention/ukreplenie-zdorovja-i-immuniteta/";
        });
      }
    }
  });

  // Sidebar accordeon
  $(document).on("click", ".widget-area h2.widget-title", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass('toggled');
    $(this).next().slideToggle(400);
  });

  // Sidebar read more
  var maxWidgetItems = 5;

  function addWidgetLoadMoreButton(widget) {
    var listItems = $(widget).find('li');
    if (listItems.length > maxWidgetItems) {
      $(listItems).not(':lt(' + maxWidgetItems + ')').hide();
      $(widget).append('<p class="load show-more">Показать больше</p>');
    }
  }

  var widgets = $('.wcapf-layered-nav');
  for (var i = 0; i < widgets.length; i++) {
    addWidgetLoadMoreButton(widgets[i]);
  }

  function toggleWidgetItems(widgetButton) {
    if($(widgetButton).hasClass('show-more')) {
      $(widgetButton).parent().find('li').not(':lt('+maxWidgetItems+')').show();
      $(widgetButton).text('Скрыть');
      $(widgetButton).removeClass('show-more');
      $(widgetButton).addClass('show-less');
    }
    else if($(widgetButton).hasClass('show-less')) {
      $(widgetButton).parent().find('li').not(':lt(' + maxWidgetItems + ')').hide();
      $(widgetButton).text('Показать больше');
      $(widgetButton).removeClass('show-less');
      $(widgetButton).addClass('show-more');
    }
  }

  $('.load').click(function() {
    toggleWidgetItems($(this))
  });

  $(document).ajaxComplete(function () {
    $('.load').remove();
    var widgets = $('.wcapf-layered-nav');
    for (var i = 0; i < widgets.length; i++) {
      addWidgetLoadMoreButton($(widgets[i]));
    }

    $('.load').click(function() {
      toggleWidgetItems($(this))
    });

  });

  if(window.innerWidth < 768) {
    $(".widget-area h2.widget-title").parent().removeClass('toggled');
    $(".widget-area h2.widget-title").next().slideUp(400);
  }

  // Disble mobile elements on desctop
  $(window).resize(function() {
    if(window.innerWidth < 768) {
      $(".widget-area h2.widget-title").parent().removeClass('toggled');
      $(".widget-area h2.widget-title").next().slideUp(400);
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

  //  Billing phone mask
  $('#billing_phone').iMask({
    type: 'fixed',
    mask: '099-999-99-99'
  })
});