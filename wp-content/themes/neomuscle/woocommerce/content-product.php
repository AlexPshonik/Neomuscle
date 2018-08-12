<?php

defined( 'ABSPATH' ) || exit;

global $product, $post;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class(); ?>>
	<div class="product-card">
    <div class="product-card-categories">
      <?php echo '<span class="loop">' . wc_get_product_category_list( get_the_id(), ', ', '',  '' ) . '</span>'; ?>
    </div>
		<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<div class="product-card-buy">
      <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
		<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		</div>
      <ul class="product-description">
        <li class="item"><span class="item-title">Страна производства:</span><span><?php echo the_field('country_field'); ?></</span></li>
        <li class="item"><span class="item-title">Фасовка: </span><span><?php echo the_field('pack'); ?></span></li>
        <li class="item"><span class="item-title">Количество порций: </span><span><?php echo the_field('amount_portions'); ?></span></li>
        <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
          <li class="item"><span class="item-title">Артикул:</span><span><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></li>
        <?php endif; ?>
      </ul>
	</div>
</li>