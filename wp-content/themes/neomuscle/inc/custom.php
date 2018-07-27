<?php
/**
 * neomuscle Theme Custom Additions
 *
 * @package neomuscle
 */

/**
 * Change WooCommerce Symbol.
 */
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'UAH':$currency_symbol = 'грн';
            break;
    }
    return $currency_symbol;
}

/**
 * Add additional fields in product.
 */
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {
	global $woocommerce, $post;
	echo '<div class="options-group">';
	// Сountry field
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_country_field', 
			'label'       => __( 'Страна производитель', 'woocommerce' ), 
			'placeholder' => '',
			'desc_tip'    => 'true',
		)
	);
	// Pre-packing field
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_pre_packing_field', 
			'label'       => __( 'Фасовка', 'woocommerce' ), 
			'placeholder' => '',
			'desc_tip'    => 'true',
		)
	);
	// Amount of portions field
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_amount_of_portions', 
			'label'       => __( 'Количество порций', 'woocommerce' ), 
			'placeholder' => '',
			'desc_tip'    => 'true',
		)
	);

	echo '</div>';  
}

function woo_add_custom_general_fields_save( $post_id ){
	// Country field
	$woocommerce_country_field = $_POST['_country_field'];
	if( !empty( $woocommerce_country_field ) )
		update_post_meta( $post_id, '_country_field', esc_attr( $woocommerce_country_field ) );
	// Pre-packing field
	$woocommerce_pre_packing_field = $_POST['_pre_packing_field'];
	if( !empty( $woocommerce_pre_packing_field ) )
		update_post_meta( $post_id, '_pre_packing_field', esc_attr( $woocommerce_pre_packing_field ) );
	// Amount of portions field
	$woocommerce_amount_of_portions = $_POST['_amount_of_portions'];
	if( !empty( $woocommerce_amount_of_portions ) )
		update_post_meta( $post_id, '_amount_of_portions', esc_attr( $woocommerce_amount_of_portions ) );
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