<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neomuscle
 */

?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<nav class="breadcrumb">','</nav>' );
        }
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <?php neomuscle_post_thumbnail(); ?>

        <div class="entry-content">
          <div class="intention">
            <a class="intention-box" href="<?php echo site_url("/intention/nabor-myshechnoj-massy/"); ?>">
              <img class="intention-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/nabor-myshechnoj-massy.png" alt="Набор мышечной массы">
              <div class="intention-content">
                <h5 class="intention-title">Набор мышечной массы</h5>
                <p class="intention-text">
                  Обеспечьте себе сбалансированный рацион <br> для набора качественной мышечной массы!
                </p>
                <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
              </div>
            </a>
            
            <a class="intention-box" href="<?php echo site_url("/intention/vosstanovlenie-posle-trenirovok/"); ?>">
              <img class="intention-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/vosstanovlenie-posle-trenirovok.png" alt="Восстановление после тренировок">
              <div class="intention-content">
                <h5 class="intention-title">Восстановление после тренировок</h5>
                <p class="intention-text">
                  Не можете долго восстановиться после <br> очередной тренировки? Этот раздел для Вас!
                </p>
                <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
              </div>
            </a>

            <a class="intention-box" href="<?php echo site_url("/intention/uvelichenie-sily-i-vynoslivosti/"); ?>">
              <img class="intention-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/uvelichenie-vynoslivosti.png" alt="Увеличение выносливости">
              <div class="intention-content">
                <h5 class="intention-title">Увеличение выносливости</h5>
                <p class="intention-text">
                  Увеличьте запас энергии и выносливости на тренировке в несколько раз!
                </p>
                <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
              </div>
            </a>

            <a class="intention-box" href="<?php echo site_url("/intention/snizhenie-vesa/"); ?>">
              <img class="intention-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/snizhenie-vesa.png" alt="Снижение веса">
              <div class="intention-content">
                <h5 class="intention-title">Снижение веса</h5>
                <p class="intention-text">
                  Хотите сбросить лишние килограммы? <br> Мы знаем, как помочь в этом!
                </p>
                <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
              </div>
            </a>

            <a class="intention-box" href="<?php echo site_url("/intention/ukreplenie-zdorovja-i-immuniteta/"); ?>">
              <img class="intention-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/uluchshenie-immuniteta.png" alt="Улучшение иммунитета">
              <div class="intention-content">
                <h5 class="intention-title">Улучшение иммунитета</h5>
                <p class="intention-text">
                  Пусть никакие болезни не остановят Вас <br> на пути к спортивным достижениям!
                </p>
                <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
              </div>
            </a>

          </div>
        </div><!-- .entry-content -->
      </article><!-- #post-<?php the_ID(); ?> -->
    </div>
  </div>
</div>
