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
            <div class="intention-box">
              <div class="intention-box-inner">
                <a class="intention-media" href="<?php echo site_url("/intention/nabor-myshechnoj-massy/"); ?>">
                  <div class="intention-media-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/nabor-myshechnoj-massy.png" alt="">
                  </div>
                  <div class="intention-media-body">
                    <div class="intention-title">Набор мышечной массы</div>
                    <div class="intention-text">
                      Обеспечьте себе сбалансированный рацион <br> для набора качественной мышечной массы!
                    </div>
                    <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
                  </div>
                </a>
              </div>
            </div>
            
            <div class="intention-box">
              <div class="intention-box-inner">
                <a class="intention-media" href="<?php echo site_url("/intention/vosstanovlenie-posle-trenirovok/"); ?>">
                  <div class="intention-media-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/vosstanovlenie-posle-trenirovok.png" alt="">                  </div>
                  <div class="intention-media-body">
                    <div class="intention-title">Восстановление после тренировок</div>
                    <div class="intention-text">
                      Не можете долго восстановиться после <br> очередной тренировки? Этот раздел для Вас!
                    </div>
                    <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
                  </div>
                </a>
              </div>
            </div>

            <div class="intention-box">
              <div class="intention-box-inner">
                <a class="intention-media" href="<?php echo site_url("/intention/uvelichenie-sily-i-vynoslivosti/"); ?>">
                  <div class="intention-media-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/uvelichenie-vynoslivosti.png" alt="">                  </div>
                  <div class="intention-media-body">
                    <div class="intention-title">Увеличение выносливости</div>
                    <div class="intention-text">
                    Увеличьте запас энергии и выносливости на тренировке в несколько раз!
                    </div>
                    <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
                  </div>
                </a>
              </div>
            </div>

            <div class="intention-box">
              <div class="intention-box-inner">
                <a class="intention-media" href="<?php echo site_url("/intention/snizhenie-vesa/"); ?>">
                  <div class="intention-media-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/snizhenie-vesa.png" alt="">
                  </div>
                  <div class="intention-media-body">
                    <div class="intention-title">Снижение веса</div>
                    <div class="intention-text">
                      Хотите сбросить лишние килограммы? <br> Мы знаем, как помочь в этом!
                    </div>
                    <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
                  </div>
                </a>
              </div>
            </div>

            <div class="intention-box">
              <div class="intention-box-inner">
                <a class="intention-media" href="<?php echo site_url("/intention/ukreplenie-zdorovja-i-immuniteta/"); ?>">
                  <div class="intention-media-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/intention/uluchshenie-immuniteta.png" alt="">
                  </div>
                  <div class="intention-media-body">
                    <div class="intention-title">Улучшение иммунитета</div>
                    <div class="intention-text">
                      Пусть никакие болезни не остановят Вас <br> на пути к спортивным достижениям!
                    </div>
                    <div class="intention-action">Перейти <span class="ui-icon-right-arrow intention-action-icon"></span></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div><!-- .entry-content -->
      </article><!-- #post-<?php the_ID(); ?> -->
    </div>
  </div>
</div>
