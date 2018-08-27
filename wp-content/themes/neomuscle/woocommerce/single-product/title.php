<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;

the_title( '<h1 class="product_title entry-title">', '</h1>' );
?>

<div class="product-info">
	<div class="product-info-stock">
		<?php 
			if ( $product->is_in_stock() ) {
				echo '<div class="in-stock"><span class="stock-icon ui-icon-check"></span>'. __( 'Есть в наличии', 'envy' ) . '</div>';
			} else {
				echo '<div class="out-of-stock"><span class="stock-icon ui-icon-cancel"></span>' . __( 'Нет в наличии', 'envy' ) . '</div>';
			}
		?>
	</div>
	<div class="rating">
		<?php 
			if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
				return;
			}
			
			$rating_count = $product->get_rating_count();
			$review_count = $product->get_review_count();
			$average      = $product->get_average_rating();
			
			if ( $rating_count > 0 ) : ?>
			
				<div class="woocommerce-product-rating">
					<?php echo wc_get_rating_html( $average, $rating_count ); ?>
					<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
				</div>
			
			<?php endif; ?>

	</div>
</div>