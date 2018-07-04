<?php get_header();?>

<?php echo do_shortcode( '[ca_slider_shortcode]' ); ?>

<section class="promo section-padding-sm">
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
</section>

<section class="instagram section-padding">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('homepage-instagram-sidebar')): ?>
                <?php dynamic_sidebar('homepage-instagram-sidebar');?>
            <?php endif;?>
        </div>
    </div>
</section>

<?php get_footer();?>
