<?php get_header();?>

<?php echo do_shortcode( '[ca_slider_shortcode]' ); ?>

<!-- <section class="promo section-padding-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="promo-box">
                    <div class="icon">
                        <span class="ui-icon-shield"></span>
                    </div>
                    <div class="info">
                        <h6>Оригинальная продукция</h6>
                        <p>Гарантируем качество и подлинность товара</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="promo-box">
                    <div class="icon">
                        <span class="ui-icon-wallet"></span>
                    </div>
                    <div class="info">
                        <h6>Гарантия лучших цен</h6>
                        <p>Мы уверены в своих ценах!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="promo-box">
                    <div class="icon">
                        <span class="ui-icon-truck"></span>
                    </div>
                    <div class="info">
                        <h6>Бесплатная доставка</h6>
                        <p>Бесплатная доставка по Украине от 2000 грн</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="promo-box last">
                    <div class="icon">
                        <span class="ui-icon-support"></span>
                    </div>
                    <div class="info">
                        <h6>Техническая поддержка</h6>
                        <p>Онлайн поддержка 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="featured-products section-padding">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Новинки</h2>
            <div class="product-carousel owl-carousel">
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'stock' => 1,
                        'posts_per_page' => 7,
                        'orderby' =>'date',
                        'order' => 'DESC' 
                    );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <div class="item">
                            <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
                            <h3><?php the_title(); ?></h3>
                            <span class="price"><?php echo $product->get_price_html(); ?></span>
                            </a>
                            <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                        </div>    
                    <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="instagram section-padding">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('homepage-instagram-sidebar')): ?>
                <?php dynamic_sidebar('homepage-instagram-sidebar');?>
            <?php endif;?>
        </div>
    </div>
</section> -->

<?php get_footer();?>
