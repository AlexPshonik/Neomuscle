<?php
/**
 * neomuscle Theme Custom Additions
 *
 * @package neomuscle
 */

/**
* Disable admin bar.
*/
show_admin_bar(false);

/**
 * Change WooCommerce Symbol.
 */
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol($currency_symbol, $currency) {
  switch ($currency) {
    case 'UAH':$currency_symbol = 'грн';
      break;
    }
  return $currency_symbol;
}

/**
 * Change Add to Cart Text.
 */

// Single Product
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text() {
  return __('Купить', 'woocommerce');
}

// Default 
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_add_to_cart_text' ); 
function custom_add_to_cart_text() {
	return __('Купить', 'woocommerce');
}

/**
* Change default text in variation select
*/
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'neomuscle_wc_filter_dropdown_args', 10 );
function neomuscle_wc_filter_dropdown_args( $args ) {
  $variation_tax = get_taxonomy( $args['attribute'] );
	if( $variation_tax ) {
		$args['show_option_none'] = 'Выберите ' . apply_filters( 'the_title', $variation_tax->labels->singular_name );
	} else {
		$args['show_option_none'] = 'Выберите ' . $args['attribute'];
	}
  return $args;
}

/**
* Add intention taxonomies.
*/
function edit_taxonomies() {         
    register_taxonomy( 'intention',
        array('product'),
        apply_filters( 'register_taxonomy_intention', array(
            'hierarchical'          => true,
            'update_count_callback' => '_update_post_term_count',
            'label'                 => 'По цели',
            'labels'                => array(
                    'name'              => 'По цели',
                    'singular_name'     => 'Цель',
                    'search_items'      => 'Поиск цели',
                    'all_items'         => 'Все цели',
                    'parent_item'       => 'Родительская', 
                    'parent_item_colon' => 'Родительская:',
                    'edit_item'         => 'Изменить цель',
                    'update_item'       => 'Обновить цель',
                    'add_new_item'      => 'Добавить цель',
                    'new_item_name'     => 'Имя новой цели'
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'capabilities'      => array(
                'manage_terms' => 'manage_product_terms',
                'edit_terms'   => 'edit_product_terms',
                'delete_terms' => 'delete_product_terms',
                'assign_terms' => 'assign_product_terms'
            ),
            'rewrite' => array( 'slug' => 'intention', 'with_front' => false, 'hierarchical' => true )
        ) )
    );
    unregister_taxonomy('product_tag');
}
add_action( 'init', 'edit_taxonomies', 0 );

/**
 * Remove Plugins Styles.
 */
add_action( 'wp_print_styles', 'remove_plugin_scripts_styles', 100 ); 
function remove_plugin_scripts_styles() {
  wp_deregister_style( 'dgwt-wcas-style' );
  wp_deregister_style('wcapf-nouislider-style');
  wp_deregister_style('wcapf-style');
}

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' <span class="delimiter ui-icon-right-arrow"></span> ';
	return $defaults;
}

/**
 * Change the count of related products
 */
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
  $args['posts_per_page'] = 5;
  $args['columns'] = 5;
  return $args;
}

/**
 * Reorder product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'neomuscle_reorder_tabs', 98 );
function neomuscle_reorder_tabs( $tabs ) {
  $tabs['description']['priority'] = 1;
  $tabs['composition_application']['priority'] = 2;	
  $tabs['reviews']['priority'] = 3;
	return $tabs;
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'neomuscle_rename_tabs', 98 );
function neomuscle_rename_tabs( $tabs ) {
	$tabs['reviews']['title'] = __( 'Отзывы' );
	return $tabs;
}

/**
 * Add the custom tab
 */
function neomuscle_custom_product_tab( $tabs ) {
  global $post;

  $terms = wp_get_post_terms( $post->ID, 'product_cat' );
  foreach ( $terms as $term ) $categories[] = $term->slug;

  if ( !(in_array( 'aksessuary', $categories )) ) {
    $tabs['composition_application'] = array(
      'title'    => __( 'Состав и применение', 'textdomain' ),
      'callback' => 'neomuscle_product_tab_content',
      'priority' => 2,
    );
  }
  
  return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'neomuscle_custom_product_tab' );

/**
 * Function that displays output for the shipping tab.
 */
function neomuscle_product_tab_content()  {
  echo the_field('composition_application');
}

/**
 * Remove standart rating template in pdp page
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );