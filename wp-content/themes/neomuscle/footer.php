<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package neomuscle
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-widgets">
      <div class="container">
        <div class="footer-widgets-wrapp">
          <div class="footer-contact">
            <div class="footer-call-us">
              <div class="media">
                <span class="icon ui-icon-support"></span>
              </div>
              <div class="media-body">
                <span class="call-us-text">Есть вопросы? Позвоните нам :)</span>
                <span class="call-us-number">(068) 208-17-17, <br> (073) 208-17-17, <br> (095) 238-17-17</span>
              </div>
            </div>
            <div class="footer-work">
              <strong class="footer-work-title">График работы Call-центра:</strong>
              <p>В будние дни с 11:00 до 18:00 <br>
                Суббота, воскресенье с 11:00 до 17:00</p>
            </div>
            <div class="footer-email">
              <strong class="footer-email-title">E-mail:</strong>
              <a class="footer-email-link" href="mailto:info@neomuscle.com.ua">info@neomuscle.com.ua</a>
            </div>
            <div class="footer-social-icons">
              <ul class="social-icons">
                <li><a href="https://www.facebook.com/Neomuscle-1642830772684279/" target="_blank"><span class="icon ui-icon-facebook"></span></a></li>
                <li><a href="https://www.instagram.com/neomuscle_ua/" target="_blank"><span class="icon ui-icon-instagram"></span></a></li>
                <li><a href="#" target="_blank"><span class="icon ui-icon-telegram"></span></a></li>
                <li><a href="#" target="_blank"><span class="icon ui-icon-viber"></span></a></li>
              </ul>
            </div>
          </div>

          <div class="footer-menu-catalog">
            <div class="footer-menu-item">
              <h4 class="footer-menu-title">Каталог</h4>
              <?php wp_nav_menu( array( 'menu' => 'footer-menu-catalog') ); ?>
            </div>
          </div>
          
          <div class="footer-menu-buyer">
            <div class="footer-menu-item">
              <h4 class="footer-menu-title">Покупателю</h4>
              <?php wp_nav_menu( array( 'menu' => 'footer-menu') ); ?>
            </div>
          </div>

          <div class="footer-dev">
            <a href="https://codearty.com/" target="_blank">
              <img class="codearty-logo" src="<?php echo get_template_directory_uri() ?>/assets/images/codearty-logo.png" alt="CodeArty">
            </a>
            <span class="develop-text">Интернет-магазин разработан и поддерживается в компании CodeArty</span>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright-bar">
      <div class="container">
        <div class="copyright-bar-wrapp">
          <div class="copyright">&copy; <strong>Neomuscle</strong>, 2016 – <?php echo date('Y'); ?></div>
          <div class="payment">
            <ul class="payment-list">
              <li class="payment-list-item"><div class="mastercard"></div></li>
              <li class="payment-list-item"><div class="visa"></div></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>



