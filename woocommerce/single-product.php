<?php
/**
 * Single product — themed.
 *
 * Override of: woocommerce/single-product.php
 * Targets WooCommerce 8.x.
 *
 * @package O_Bosque_Fantasma
 */

defined( 'ABSPATH' ) || exit;

global $product;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 * Our functions.php adds the themed wrapper here.
 */
do_action( 'woocommerce_before_main_content' );

while ( have_posts() ) :
    the_post();
    ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

        <?php
        /**
         * Hook: woocommerce_before_single_product.
         */
        do_action( 'woocommerce_before_single_product' );
        ?>

        <div class="single-product-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); align-items: start;">

            <div class="single-product__media">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * Outputs the product gallery (images, thumbnails, zoom/lightbox).
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>

            <div class="single-product__summary">
                <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
                    <div class="breadcrumbs"><?php woocommerce_breadcrumb(); ?></div>
                <?php endif; ?>

                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * Title, rating, price, excerpt, TCG meta (added at priority 25),
                 * add to cart, meta.
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>

        </div>

        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * Tabs (description, additional info, reviews) and upsells.
         */
        do_action( 'woocommerce_after_single_product_summary' );
        ?>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_single_product.
     */
    do_action( 'woocommerce_after_single_product' );

endwhile;

/**
 * Hook: woocommerce_after_main_content.
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );

// Responsive: single-product-layout collapses to one column under 768px (see style.css).
