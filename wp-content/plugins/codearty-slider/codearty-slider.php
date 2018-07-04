<?php
/*
    Plugin Name: CodeArty Slider
    Description: Implementation of a slideshow into WordPress
    Author: Serge Bubyr
    Author URI: https://codearty.com
    Version: 1.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup plugin
 */
function ca_init() {
    $args = array(
        'public' => true,
        'labels' => array(
            'name' => 'Слайдер',
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый слайдер',
        ),
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('slider', $args);
}
add_action('init', 'ca_init');

// Register Styles
function ca_slider_register_styles() {
    // register
    wp_register_style('ca_slider_styles', plugins_url('assets/owl.carousel.min.css', __FILE__));
    wp_register_style('ca_slider_styles_theme', plugins_url('assets/owl.theme.default.min.css', __FILE__));
 
    // enqueue
    wp_enqueue_style('ca_slider_styles');
    wp_enqueue_style('ca_slider_styles_theme');
}
add_action('wp_print_styles', 'ca_slider_register_styles');


add_theme_support( 'post-thumbnails' );
add_image_size('ca_function', 1920, 600, true);


function ca_function($type='ca_function') {
    global $post;
    
    $args = array(
        'post_type' => 'slider',
        'posts_per_page' => 5
    );
    $result = '<section class="main-slider">';
    $result .= '<div class="owl-carousel owl-theme">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .='<div id="item"><img title="'.get_the_title().'" src="' . $the_url[0] . '"  alt="'.get_the_title().'"/></div>';
    }
    $result .= '</div>';
    // $result .='<div id = "htmlcaption" class = "nivo-html-caption">';
    // $result .='<strong>This</strong> is an example of a <em>HTML</em> caption with <a href = "#">a link</a>.';
    // $result .='</div>';
    $result .='</section>';
    
    return $result;
}

// Create Shortcode
add_shortcode('ca_slider_shortcode', 'ca_function');

