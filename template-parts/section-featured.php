<?php
/**
 * Template part: featured products section for the front page.
 *
 * @package O_Bosque_Fantasma
 */

$obf_featured_count = apply_filters( 'obf_featured_count', 8 );

$obf_args = array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'posts_per_page'      => $obf_featured_count,
    'ignore_sticky_posts' => true,
    'tax_query'           => array(
        array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        ),
    ),
);

// Fallback: if no featured products exist, show latest.
$obf_query = new WP_Query( $obf_args );
if ( ! $obf_query->have_posts() ) {
    $obf_args['tax_query'] = array();
    $obf_query = new WP_Query( $obf_args );
}

if ( ! $obf_query->have_posts() ) {
    return;
}
?>

<section class="section" id="colecao-destaque">
    <div class="container">
        <div class="section-head">
            <div>
                <span class="eyebrow"><?php esc_html_e( 'Seleção curada', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Coleção em destaque', 'o-bosque-fantasma' ); ?></h2>
            </div>
            <?php if ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ) : ?>
                <a class="section-head__link" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
                    <?php esc_html_e( 'Ver tudo →', 'o-bosque-fantasma' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="grid grid--products">
            <?php
            while ( $obf_query->have_posts() ) :
                $obf_query->the_post();
                get_template_part( 'template-parts/product-card' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
