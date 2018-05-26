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
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'neomuscle' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="top-header-left">
                            <div class="phone">(068) 208-17-17, (073) 208-17-17, (095) 238-17-17</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="top-header-right">
                            <ul>
                                <li><a href="#">Доставка и оплата</a></li>
                                <li><a href="#">О нас</a></li>
                                <li><a href="#">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-branding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logotype">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/images/logotype.svg" alt="Логотип Neomuscle"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'neomuscle' ); ?></button>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            ) );
                            ?>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="col-lg-3">
                        <div class="rightside-nav">
                            <ul>
                                <li><span class="ui-icon-search"></span></li>
                                <li>
                                    <a class="rightside-wishlist" href="<?php echo get_home_url( null, 'wishlist/', 'null' ); ?>">
                                        <span class="ui-icon-heart"></span>
                                        <div class="wishlist-count"><?php echo YITH_WCWL()->count_products(); ?></div>
                                    </a>    
                                </li>
                                
                                <li>
                                    
                                    <a class="rightside-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
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

	<header id="masthead" class="site-headerd">
		<div class="site-branding">
			<!-- <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$neomuscle_description = get_bloginfo( 'description', 'display' );
			if ( $neomuscle_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $neomuscle_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?> -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'neomuscle' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?> -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
