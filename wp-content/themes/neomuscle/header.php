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
                  <a href="<?php echo site_url("/payments-and-deliveries/"); ?>" class="menu-link">Доставка и оплата</a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo site_url("/about-us/"); ?>" class="menu-link">О нас</a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo site_url("/contacts/"); ?>" class="menu-link">Контакты</a>
                </li>
              </ul>  
            </div>
          </div>
        </div>
      </div>
    </div>

    <header id="masthead" class="site-header-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="site-header">
              <ul class="site-header-user-nav site-header-user-nav-left">
                <li class="js-open-mobile-menu site-header-user-nav-item site-header-menu-toggle">
                  <span class="icon site-header-user-nav-link"></span>
                </li>
                <li class="site-header-user-nav-item js-open-mobile-search">
                  <span class="icon ui-icon-search site-header-user-nav-link"></span>
                  <span class="icon ui-icon-close site-header-user-nav-link"></span>
                </li>
              </ul>
              <a class="logo-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img class="logo-img" src="<?php echo get_template_directory_uri() ?>/assets/images/logotype.svg" alt="Логотип Neomuscle">
                <img class="logo-img logo-img-small" src="<?php echo get_template_directory_uri() ?>/assets/images/logotype-mobile.png" alt="Логотип Neomuscle">
              </a>
              <div class="site-header-search site-header-search-desktop">
                <?php echo do_shortcode('[wcas-search-form]'); ?>
              </div>
              <ul class="site-header-user-nav site-header-user-nav-right">
                <li class="site-header-user-nav-item">
                  <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="my-account icon ui-icon-user site-header-user-nav-link"></a>
                </li>
                <li class="site-header-user-nav-item d-none d-md-block">
                  <a href="<?php echo get_home_url(null, 'wishlist/', 'null'); ?>" class="wish-list ui-icon-heart site-header-user-nav-link">
                    <span class="wish-list-count"><?php echo YITH_WCWL()->count_products(); ?></span>
                  </a>
                </li>
                <li class="site-header-user-nav-item">
                  <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart');?>" class="shopping-bag icon ui-icon-shopping-bag site-header-user-nav-link">
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
      </div>
      <div class="site-header-search site-header-search-mobile">
        <?php echo do_shortcode('[wcas-search-form]'); ?>
        <div class="search-placeholder"></div>
      </div>
      <div class="section-site-navigation">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav id="site-navigation" class="main-navigation">
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
      <div class="section-site-navigation-placeholder"></div>
    </header>

    <div id="content" class="site-content">
