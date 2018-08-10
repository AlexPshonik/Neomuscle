<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'intention' ) );
?>
<div class="product-meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

  
		<div class="specification">
      <h4 class="title h4">Спецификация товара:</h4>
      <ul class="specification-list">
        <li class="item"><span class="item-title">Бренд:</span><?php echo get_the_term_list( $post->ID, 'product_brand', '', ', ', '' ); ?></span></li>
        <li class="item"><span class="item-title">Страна производитель:</span><span><?php echo get_post_meta( $post->ID, '_country_field', true );?></span></li>
        <li class="item"><span class="item-title">Фасовка: </span><span><?php echo get_post_meta( $post->ID, '_pre_packing_field', true );?></span></li>
        <li class="item"><span class="item-title">Количество порций: </span><span><?php echo get_post_meta( $post->ID, '_amount_of_portions', true );?></span></li>
      </ul>
    </div>
		

	<!-- <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?> -->

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
