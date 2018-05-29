<?php get_header();?>

<?php echo do_shortcode('[metaslider id="37"]'); ?>

<div style="height:500px;"></div>

<div class="container-fluid">
    <div class="row">
        <div class="section-instagram">
            <?php if (is_active_sidebar('homepage-instagram-sidebar')): ?>
                <?php dynamic_sidebar('homepage-instagram-sidebar');?>
            <?php endif;?>
        </div>
    </div>
</div>

<?php get_footer();?>

