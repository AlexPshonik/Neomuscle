<?php get_header();?>

<?php echo do_shortcode( '[ca_slider_shortcode]' ); ?>

<!-- Feature Section -->
<section class="feature section-padding-sm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="feature-box">
            <div class="feature-item">
              <span class="feature-item-icon ui-icon-security"></span>
              <div class="feature-item-info">
                <h6 class="title">Оригинальная продукция</h6>
                <p class="description">Гарантируем качество товара</p>
              </div>
            </div>

            <div class="feature-item">
              <span class="feature-item-icon ui-icon-wallet"></span>
              <div class="feature-item-info">
                <h6 class="title">Гарантия лучших цен</h6>
                <p class="description">Мы уверены в своих ценах</p>
              </div>
            </div>

            <div class="feature-item">
              <span class="feature-item-icon ui-icon-delivery"></span>
              <div class="feature-item-info">
                <h6 class="title">Бесплатная доставка</h6>
                <p class="description">По Украине от 2000 грн</p>
              </div>
            </div>

            <div class="feature-item">
              <span class="feature-item-icon ui-icon-support"></span>
              <div class="feature-item-info">
                <h6 class="title">Техническая поддержка</h6>
                <p class="description">Онлайн поддержка 24/7</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- End Feature Section -->

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

<!-- Instagram Section -->
<section class="instagram section-padding-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php if (is_active_sidebar('homepage-instagram-sidebar')): ?>
          <?php dynamic_sidebar('homepage-instagram-sidebar');?>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>
<!-- End Instagram Section -->

<!-- Food Purpose Section -->
  <section class="food-purpose section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
            <h2 class="food-purpose-title">Подберите для себя спортивное питание в три шага!</h2>
            <p class="food-purpose-description">Если Вы не уверены какое спортивное питание вам лучше подходит, выберите свой пол и цель тренировок для получения дальнейших рекомендаций.</p>
            <div class="food-purpose-select">
              <select>
                <option value="0">Выбирите пол</option>
                <option value="1">Мужчина</option>
                <option value="2">Женщина</option>
              <select>
              <select disabled="disabled"></select>
              <button class="btn-primary">Найти товар</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- End Food Purpose Section -->

<?php get_footer();?>
