<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package neomuscle
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head();?>
</head>

<body <?php body_class();?>>
  <div id="page" class="site">
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="top-bar-left">
              <ul class="menu">
                <strong class="menu-title">Call-центр:</strong>
                <li class="menu-item">
                  <a href="tel: +380682081717" class="menu-link">(068) 208-17-17,</a>
                </li>
                <li class="menu-item">
                  <a href="tel: +380732081717" class="menu-link">(073) 208-17-17,</a>
                </li>
                <li class="menu-item">
                  <a href="tel: +380952381717" class="menu-link">(095) 238-17-17</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="top-bar-right">
              <ul class="menu">
                <li class="menu-item">
                  <a href="#" class="menu-link">Отследить ваш заказ</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">Наша команда</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">Контакты</a>
                </li>
              </ul>  
            </div>
          </div>
        </div>
      </div>
    </div>

  <header id="masthead" class="site-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="logo">
            <a class="logo-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <img class="logo-img" src="<?php echo get_template_directory_uri() ?>/assets/images/logotype.svg" alt="Логотип Neomuscle">
            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <?php echo do_shortcode('[wcas-search-form]'); ?>
        </div>
        <div class="col-lg-3">
          <div class="rightside-nav">
            <ul>
              <li>
                <a class="rightside-wishlist" href="<?php echo get_home_url(null, 'wishlist/', 'null'); ?>">
                  <span class="ui-icon-heart"></span>
                  <div class="wishlist-count"><?php echo YITH_WCWL()->count_products(); ?></div>
                </a>
              </li>
              <li>
                <a class="rightside-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart');?>">
                  <div class="cart-icon"><span class="ui-icon-shopping-bag"></span></i></div>
                  <?php echo WC()->cart->get_cart_contents_count(); ?> / <?php echo WC()->cart->get_cart_total(); ?>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .site-branding -->

  </header>
    <div class="section-site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav id="site-navigation" class="main-navigation">
                        <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'neomuscle');?></button> -->
                        <?php
                          wp_nav_menu(array(
                              'theme_location' => 'menu-1',
                              'menu_id' => 'primary-menu',
                          ));
                          ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div id="content" class="site-content">
