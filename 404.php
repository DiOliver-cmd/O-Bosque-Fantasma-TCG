<?php
/**
 * 404 template.
 *
 * @package O_Bosque_Fantasma
 */

get_header();
?>

<div class="container section error-404">
    <div>
        <div class="error-404__glitch" aria-hidden="true">404</div>
        <h1 class="display-title" style="margin-top: var(--space-4);"><?php esc_html_e( 'Você se perdeu no bosque…', 'o-bosque-fantasma' ); ?></h1>
        <p class="lead" style="margin-inline: auto;">
            <?php esc_html_e( 'A névoa engoliu o caminho. Talvez Celebi tenha mexido no tempo, ou Gengar pregou uma peça. Tente buscar uma saída.', 'o-bosque-fantasma' ); ?>
        </p>

        <div style="max-width: 480px; margin: var(--space-5) auto;">
            <?php get_search_form(); ?>
        </div>

        <div class="hero__actions" style="justify-content: center; margin-top: var(--space-5);">
            <a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Voltar ao início', 'o-bosque-fantasma' ); ?></a>
            <?php if ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ) : ?>
                <a class="btn btn--ghost" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'Ver a loja', 'o-bosque-fantasma' ); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
