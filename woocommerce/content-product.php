<?php
/**
 * Content product — list item (uses product-card style).
 *
 * Override of: woocommerce/content-product.php
 * Targets WooCommerce 8.x.
 *
 * @package O_Bosque_Fantasma
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

// Defer to our shared product-card template part so the look is consistent
// across the shop archive, front-page featured grid, and any custom loop.
get_template_part( 'template-parts/product-card' );
