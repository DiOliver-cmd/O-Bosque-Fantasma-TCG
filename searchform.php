<?php
/**
 * Custom search form — compact, used in header.
 *
 * @package O_Bosque_Fantasma
 */
?>
<form role="search" method="get" class="header-search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text" for="obf-search-field"><?php esc_html_e( 'Buscar', 'o-bosque-fantasma' ); ?></label>
    <input type="search" id="obf-search-field" class="search-field" placeholder="<?php esc_attr_e( 'Buscar cartas…', 'o-bosque-fantasma' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit" aria-label="<?php esc_attr_e( 'Buscar', 'o-bosque-fantasma' ); ?>">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>
    <?php if ( function_exists( 'is_woocommerce' ) ) : ?>
        <input type="hidden" name="post_type" value="product" />
    <?php endif; ?>
</form>
