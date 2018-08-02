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
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <?php neomuscle_post_thumbnail(); ?>

        <div class="entry-content">
          <?php
          the_content();

          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neomuscle' ),
            'after'  => '</div>',
          ) );
          ?>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
          <footer class="entry-footer">
            <?php
            edit_post_link(
              sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Edit <span class="screen-reader-text">%s</span>', 'neomuscle' ),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                get_the_title()
              ),
              '<span class="edit-link">',
              '</span>'
            );
            ?>
          </footer><!-- .entry-footer -->
        <?php endif; ?>
      </article><!-- #post-<?php the_ID(); ?> -->
    </div>
  </div>
</div>
