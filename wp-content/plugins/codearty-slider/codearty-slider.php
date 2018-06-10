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
 * Setup plugin constants
 */
define( 'CA_SLIDER_DIR', plugin_dir_path( __FILE__ ) );
 
/**
 * Include required core files.
 */
require_once(CA_SLIDER_DIR.'includes/functions.php');

