<?php get_header();?>

<!-- <?php echo do_shortcode('[metaslider id="37"]'); ?> -->

<!-- <div style="height:500px;"></div> -->

<div class="section-instagram">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('homepage-instagram-sidebar')): ?>
                <?php dynamic_sidebar('homepage-instagram-sidebar');?>
            <?php endif;?>
        </div>
    </div>
</div>

<?php get_footer();?>
