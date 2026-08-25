<?php
/**
 * Shop archive — themed.
 *
 * Override of: woocommerce/archive-product.php
 * Targets WooCommerce 8.x.
 *
 * @package O_Bosque_Fantasma
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * Our functions.php adds the wrapper here.
 */
do_action( 'woocommerce_before_main_content' );
?>

<header class="page-hero">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <span class="eyebrow"><?php esc_html_e( 'Coleção', 'o-bosque-fantasma' ); ?></span>
        <h1 class="display-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     */
    do_action( 'woocommerce_archive_description' );
    ?>

    <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
        <div class="breadcrumbs"><?php woocommerce_breadcrumb(); ?></div>
    <?php endif; ?>
</header>

<?php
if ( woocommerce_products_will_display() ) {
    /**
     * Hook: woocommerce_before_shop_loop.
     */
    do_action( 'woocommerce_before_shop_loop' );
}
?>

<?php
if ( woocommerce_product_loop() ) {

    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();
            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action( 'woocommerce_shop_loop' );
            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     */
    do_action( 'woocommerce_after_shop_loop' );
} else {
    /**
     * Hook: woocommerce_no_products_found.
     */
    do_action( 'woocommerce_no_products_found' );
}
?>

<?php
/**
 * Hook: woocommerce_after_main_content.
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
