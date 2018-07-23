jQuery(document).ready(function ($) {
    $('.slider').owlCarousel({
        autoplay: true,
        loop: true,
        items: 1,
        nav: true
    });

    $('.product-carousel').owlCarousel({
        autoplay: true,
        items: 4,
        loop: true,
        nav: true
    });
});