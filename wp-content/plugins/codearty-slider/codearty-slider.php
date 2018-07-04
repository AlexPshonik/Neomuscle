<?php
/*
    Plugin Name: CodeArty Slider
    Description: Implementation of a slideshow into WordPress
    Author: Serge Bubyr
    Author URI: https://codearty.com
    Version: 1.0.1
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

// Add meta boxes for slider link
function ca_slider_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "ca-slider-meta-box-nonce");

    ?>
        <div>
            <label for="ca-slider-meta-box-url"><?php echo get_site_url(); ?>/</label>
            <input name="ca-slider-meta-box-url" type="text" style="margin-left: 5px; min-width: 320px;" value="<?php echo get_post_meta($object->ID, "ca-slider-meta-box-url", true); ?>">
        </div>
    <?php  
}

function add_ca_slider_meta_box() {
    add_meta_box("ca_slider_url", "Ссылка на слайдер", "ca_slider_meta_box_markup", "slider", "advanced", "high", null);
}

add_action("add_meta_boxes", "add_ca_slider_meta_box");

function save_cs_slider_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["ca-slider-meta-box-nonce"]) || !wp_verify_nonce($_POST["ca-slider-meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "slider";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_url_value = "";

    if(isset($_POST["ca-slider-meta-box-url"]))
    {
        $meta_box_url_value = $_POST["ca-slider-meta-box-url"];
    }   
    update_post_meta($post_id, "ca-slider-meta-box-url", $meta_box_url_value);

}

add_action("save_post", "save_cs_slider_meta_box", 10, 3);


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
 
        $slide_url = get_post_meta($post->ID, "ca-slider-meta-box-url", true);
        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);

        $result .= '<div id="item">';
        $result .= '<a href="'.get_site_url() .'/'. $slide_url . '">';
        $result .= '<img title="'.get_the_title().'" src="' . $image_url[0] . '"  alt="'.get_the_title().'"/>';
        $result .= '</a>';
        $result .= '</div>';
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

