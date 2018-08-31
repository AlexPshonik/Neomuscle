<?php get_header();?>

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
                <p class="description">Гарантируем качество товаров</p>
              </div>
            </div>

            <div class="feature-item">
              <span class="feature-item-icon ui-icon-wallet"></span>
              <div class="feature-item-info">
                <h6 class="title">Доступные цены</h6>
                <p class="description">А также скидки и акции</p>
              </div>
            </div>

            <div class="feature-item">
              <span class="feature-item-icon ui-icon-delivery"></span>
              <div class="feature-item-info">
                <h6 class="title">Бесплатная доставка</h6>
                <p class="description">При заказе от 2000 грн</p>
              </div>
            </div>

            <div class="feature-item">
              <span class="feature-item-icon ui-icon-support"></span>
              <div class="feature-item-info">
                <h6 class="title">Бесплатная консультация</h6>
                <p class="description">Доверьтесь нашим експертам</p>
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
              <select id="gender">
                <option value="0">Выбирите пол</option>
                <option value="male">Мужчина</option>
                <option value="female">Женщина</option>
              <select>
              <select id="intention" disabled="disabled"></select>
              <button id="intention-btn" class="food-purpose-select-btn btn-primary">Найти товар</button>
            </div>
        </div>
      </div>
    </div>
  </section>
<!-- End Food Purpose Section -->

<!-- Description Text Section -->
<section class="description-store section-padding-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="description-store-text">
          <h2>Интернет-магазин спортивного питания Neomuscle</h2>
          <p>Спортивное питание стало важным аспектом в жизни каждого спортсмена. Сумасшедший ритм жизни, регулярные тренировки до изнеможения. Все это не должно мешать результату: <strong>интернет-магазин Neomuscle</strong> – это большой выбор аминокислот, протеина и других типов спортивного питания с доставкой по Украине.</p>
          <p>Теперь не нужно тратить время для того, чтобы купить спортивное питание в магазинах Киева, Харькова, Одессы, Днепропетровска или других городов: все самое лучшее мы уже собрали в нашем интернет-магазине!</p>
          <strong class="title">Ваши спортивные результаты стали ближе</strong>
          <p>Почему каждый спортсмен понимает, что купить спортивное питание – это просто необходимость? Дело в том, что специальные добавки ускорят рост мышц, помогут быстрее восстановиться после тренировки, придадут сил во время занятий.</p>
          <p>Не следует пренебрегать протеином, аминокислотами, жиросжигателями – так вы получите рельефное и красивое тело еще быстрее.</p>
          <p>У нас – только качественное спортивное питание для похудения для женщин, добавки для набора массы или увеличения выносливости. Качество, проверенные сроки товара, соответствующие документы и лучшие цены в Украине – гарантированы.</p>
          <strong class="title">Преимущества покупки спортивного питания у нас</strong>
          <p>Каждый наш покупатель, выбирая оригинальное спортивное питание по доступной цене, получает следующие преимущества:</p>
          <ol>
            <li>Только качественный товар. Мы лично проверяем все документы на спортивное питание, которое приезжает в Украину из Европы. Наш ассортимент – это не только отличная цена спортивного питания, но и гарантия качества;</li>
            <li>Лучший ассортимент. Мы сами – спортсмены. Стараемся всегда обеспечить в <strong>интернет-магазине Neomuscle</strong> то спортивное питание, которое удовлетворит и по цене, и по результату. Мы находим новые бренды, товарные позиции и наполняем ими интернет-магазин;</li>
            <li>Регулярные поставки. Теперь не нужно ждать любимый вкус, объем или производителя – мы делаем так, чтобы все позиции каталога были регулярно в наличии. Своевременные поставки – это залог ваших спортивных результатов;</li>
            <li>У нас вы сможете выбрать и купить спортивное питание в <strong>интернет-магазине Neomuscle</strong>, выбирая товары не только по производителям, но и по желаемой цели. Это делает покупку в разы быстрее и проще: мы обо всем позаботились вместо вас;</li>
            <li>Быстрая доставка по всей Украине в течении нескольких дней;</li>
            <li>Мы обеспечили онлайн поддержку 24/7 чтобы в кратчайшие сроки предоставить вам ответы на все интересующиеся вопросы.</li>
          </ol>
        </div>
        <div class="description-store-more">
          <a href="javascript:void(0)" class="description-store-more-link">Читать полностью <span>&nbsp;→</span></a>
        </div>
      </div>
    </div>
  </div>
</section> 
<!-- End Description Text Section -->

<?php get_footer();?>
