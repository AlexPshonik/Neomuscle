<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

function ca_init() {
    $args = array(
        'public' => true,
        'label' => 'Слайдер',
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('ca_images', $args);
}
add_action('init', 'ca_init');