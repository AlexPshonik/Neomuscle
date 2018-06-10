<?php if ( ! defined( 'WPINC' ) ) die; ?>

<?php _e('Brand', 'premmerce-brands'); ?>:

<a href="<?= get_term_link($brand->slug, 'product_brand'); ?>"><?= $brand->name; ?></a>
