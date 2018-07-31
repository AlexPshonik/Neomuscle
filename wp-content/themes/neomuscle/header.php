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
        <div class="col-8 col-md-3 col-lg-3">
          <span class="js-menu-toggle d-lg-none"></span> 
          <a class="logo-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img class="logo-img" src="<?php echo get_template_directory_uri() ?>/assets/images/logotype.svg" alt="Логотип Neomuscle">
          </a>
        </div>
        <div class="col-md-7 col-lg-6 d-none d-md-block">
          <?php echo do_shortcode('[wcas-search-form]'); ?>
        </div>
        <div class="col-4 col-md-2 col-lg-3">
          <ul class="header-user-nav">
            <li class="header-user-nav-item">
              <span class="js-open-mobile-search ui-icon-search header-user-nav-link d-md-none"></span>
            </li>
            <li class="header-user-nav-item">
              <a href="#" class="my-account ui-icon-user header-user-nav-link"></a>
            </li>
            <li class="header-user-nav-item d-none d-sm-block">
              <a href="<?php echo get_home_url(null, 'wishlist/', 'null'); ?>" class="wish-list ui-icon-heart header-user-nav-link">
                <span class="wish-list-count"><?php echo YITH_WCWL()->count_products(); ?></span>
              </a>
            </li>
            <li class="header-user-nav-item">
              <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart');?>" class="shopping-bag ui-icon-shopping-bag header-user-nav-link">
                <span class="shopping-bag-count">
                  <?php echo WC()->cart->get_cart_contents_count(); ?>
                  <strong class="d-none d-lg-inline">
                    / <?php echo WC()->cart->get_cart_total(); ?>
                  </strong>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-search">
      <?php echo do_shortcode('[wcas-search-form]'); ?>
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
