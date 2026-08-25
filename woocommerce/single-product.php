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

    /**
     * Swap the default single-product title for a gradient-styled one.
     * Done here (in the template) so functions.php stays untouched.
     */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    add_action(
        'woocommerce_single_product_summary',
        function () {
            ?>
            <h1 class="product-title single-product-title"><?php the_title(); ?></h1>
            <?php
        },
        5
    );
    ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

        <?php
        /**
         * Hook: woocommerce_before_single_product.
         */
        do_action( 'woocommerce_before_single_product' );
        ?>

        <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
            <nav class="product-breadcrumbs" aria-label="<?php esc_attr_e( 'Trilha de navegação', 'o-bosque-fantasma' ); ?>">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        <?php endif; ?>

        <div class="single-product-layout">

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

            <div class="single-product__summary product-summary">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * Title (custom, priority 5), rating, price, excerpt,
                 * TCG meta (added at priority 25), add to cart, meta.
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>

                <ul class="trust-badges" aria-label="<?php esc_attr_e( 'Garantias da loja', 'o-bosque-fantasma' ); ?>">
                    <li class="trust-badge">
                        <span class="trust-badge__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                        </span>
                        <span class="trust-badge__text"><?php esc_html_e( 'Produto autêntico', 'o-bosque-fantasma' ); ?></span>
                    </li>
                    <li class="trust-badge">
                        <span class="trust-badge__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 3h15v13H1z"/><path d="M16 8h4l3 3v5h-7z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                        </span>
                        <span class="trust-badge__text"><?php esc_html_e( 'Envio nacional', 'o-bosque-fantasma' ); ?></span>
                    </li>
                    <li class="trust-badge">
                        <span class="trust-badge__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 12l2 2 4-5"/></svg>
                        </span>
                        <span class="trust-badge__text"><?php esc_html_e( 'Verificado', 'o-bosque-fantasma' ); ?></span>
                    </li>
                    <li class="trust-badge">
                        <span class="trust-badge__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-8.5 8.5 8.5 8.5 0 0 1-4-1L3 20l1-5.5a8.5 8.5 0 1 1 17-3z"/></svg>
                        </span>
                        <span class="trust-badge__text"><?php esc_html_e( 'Suporte real', 'o-bosque-fantasma' ); ?></span>
                    </li>
                </ul>
            </div>

        </div>

        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * Tabs (description, additional info, reviews) and related products.
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
