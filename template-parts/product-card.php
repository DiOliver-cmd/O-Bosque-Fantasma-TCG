<?php
/**
 * Template part: reusable product card.
 *
 * Works both inside custom WP_Query loops (front-page, archive)
 * and within WooCommerce loops. Expects global $product when used
 * in a WooCommerce context.
 *
 * @package O_Bosque_Fantasma
 */

global $product, $post;

if ( ! $product && $post && 'product' === $post->post_type ) {
    $product = wc_get_product( $post->ID );
}

if ( ! $product ) {
    return;
}

$obf_id       = $product->get_id();
$obf_permalink = $product->get_permalink();
$obf_title     = $product->get_name();
$obf_set       = get_post_meta( $obf_id, '_obf_set', true );
$obf_numero    = get_post_meta( $obf_id, '_obf_numero', true );
$obf_meta_line = array_filter( array( $obf_set, $obf_numero ) );
$obf_in_stock  = $product->is_in_stock();
?>

<article <?php wc_product_class( 'product-card', $product ); ?> data-product-id="<?php echo esc_attr( $obf_id ); ?>">

    <div class="product-card__media">
        <?php
        if ( has_post_thumbnail( $obf_id ) ) {
            echo '<a href="' . esc_url( $obf_permalink ) . '" aria-label="' . esc_attr( $obf_title ) . '">';
            echo get_the_post_thumbnail( $obf_id, 'obf-card-thumb', array( 'alt' => esc_attr( $obf_title ) ) );
            echo '</a>';
        } else {
            echo '<a href="' . esc_url( $obf_permalink ) . '" class="product-card__placeholder" aria-label="' . esc_attr( $obf_title ) . '">';
            echo '<svg width="80" height="100" viewBox="0 0 80 100" fill="none" aria-hidden="true"><rect x="6" y="6" width="68" height="88" rx="6" stroke="rgba(67,198,161,0.4)" stroke-width="2"/><circle cx="40" cy="42" r="14" stroke="rgba(126,48,138,0.5)" stroke-width="2"/><path d="M30 70h20" stroke="rgba(67,198,161,0.4)" stroke-width="2"/></svg>';
            echo '</a>';
        }
        ?>

        <?php if ( ! $obf_in_stock ) : ?>
            <span class="product-card__sold-out badge"><?php esc_html_e( 'Esgotado', 'o-bosque-fantasma' ); ?></span>
        <?php endif; ?>
    </div>

    <div class="product-card__body">
        <h3 class="product-card__name">
            <a href="<?php echo esc_url( $obf_permalink ); ?>"><?php echo esc_html( $obf_title ); ?></a>
        </h3>

        <?php if ( ! empty( $obf_meta_line ) ) : ?>
            <p class="product-card__meta"><?php echo esc_html( implode( ' · ', $obf_meta_line ) ); ?></p>
        <?php endif; ?>

        <?php if ( $obf_in_stock ) : ?>
        <div class="product-card__price">
            <?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
        <?php else : ?>
        <div class="product-card__price product-card__price--hidden"><?php esc_html_e( 'Preço sob consulta', 'o-bosque-fantasma' ); ?></div>
        <?php endif; ?>

        <div class="product-card__footer">
            <?php
            $obf_atc_url = $product->is_purchasable() && $product->is_in_stock()
                ? $product->add_to_cart_url()
                : $obf_permalink;
            $obf_atc_text = $product->is_in_stock()
                ? __( 'Adicionar ao carrinho', 'o-bosque-fantasma' )
                : __( 'Esgotado', 'o-bosque-fantasma' );

            printf(
                '<a class="btn btn--primary btn--block btn--sm %s" href="%s" data-product_id="%s" data-product_sku="%s" aria-label="%s">%s</a>',
                $product->is_in_stock() ? 'ajax_add_to_cart add_to_cart_button' : '',
                esc_url( $obf_atc_url ),
                esc_attr( $obf_id ),
                esc_attr( $product->get_sku() ),
                esc_attr( sprintf( /* translators: %s: product name */ __( 'Adicionar %s ao carrinho', 'o-bosque-fantasma' ), $obf_title ) ),
                esc_html( $obf_atc_text )
            );
            ?>
        </div>
    </div>

</article>
