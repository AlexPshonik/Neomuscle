<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package neomuscle
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function neomuscle_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'neomuscle_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function neomuscle_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'neomuscle_pingback_header' );

/**
 * MegaMenu Styles.
 */
function megamenu_add_theme_default_1532714894($themes) {
  $themes["default_1532714894"] = array(
      'title' => 'Default',
      'container_background_from' => 'rgb(254, 215, 0)',
      'container_background_to' => 'rgb(254, 215, 0)',
      'container_padding_left' => '0',
      'container_padding_right' => '0',
      'menu_item_background_hover_from' => 'rgb(231, 196, 0)',
      'menu_item_background_hover_to' => 'rgb(231, 196, 0)',
      'menu_item_spacing' => '0',
      'menu_item_link_font_size' => '1em',
      'menu_item_link_height' => '45px',
      'menu_item_link_color' => 'rgb(51, 60, 72)',
      'menu_item_link_weight' => 'bold',
      'menu_item_link_color_hover' => 'rgb(51, 60, 72)',
      'menu_item_link_weight_hover' => 'bold',
      'menu_item_link_padding_left' => '20px',
      'menu_item_link_padding_right' => '20px',
      'menu_item_border_color' => 'rgb(231, 196, 0)',
      'menu_item_border_right' => '1px',
      'menu_item_border_color_hover' => 'rgb(231, 196, 0)',
      'menu_item_divider_color' => 'rgb(231, 196, 0)',
      'menu_item_divider_glow_opacity' => '1',
      'panel_header_border_color' => '#555',
      'panel_font_size' => '14px',
      'panel_font_color' => '#666',
      'panel_font_family' => 'inherit',
      'panel_second_level_font_color' => '#555',
      'panel_second_level_font_color_hover' => '#555',
      'panel_second_level_text_transform' => 'uppercase',
      'panel_second_level_font' => 'inherit',
      'panel_second_level_font_size' => '16px',
      'panel_second_level_font_weight' => 'bold',
      'panel_second_level_font_weight_hover' => 'bold',
      'panel_second_level_text_decoration' => 'none',
      'panel_second_level_text_decoration_hover' => 'none',
      'panel_second_level_border_color' => '#555',
      'panel_third_level_font_color' => '#666',
      'panel_third_level_font_color_hover' => '#666',
      'panel_third_level_font' => 'inherit',
      'panel_third_level_font_size' => '14px',
      'flyout_link_padding_left' => '20px',
      'flyout_link_padding_right' => '20px',
      'flyout_link_size' => '14px',
      'flyout_link_color' => '#666',
      'flyout_link_color_hover' => '#666',
      'flyout_link_family' => 'inherit',
      'toggle_background_from' => '#222',
      'toggle_background_to' => '#222',
      'toggle_font_color' => 'rgb(51, 60, 72)',
      'mobile_background_from' => '#222',
      'mobile_background_to' => '#222',
      'mobile_menu_item_link_font_size' => '14px',
      'mobile_menu_item_link_color' => '#ffffff',
      'mobile_menu_item_link_text_align' => 'left',
      'mobile_menu_item_link_color_hover' => '#ffffff',
      'mobile_menu_item_background_hover_from' => '#333',
      'mobile_menu_item_background_hover_to' => '#333',
      'custom_css' => '/** Push menu onto new line **/ 
#{$wrap} { 
  clear: both; 
}',
  );
  return $themes;
}
add_filter("megamenu_themes", "megamenu_add_theme_default_1532714894");