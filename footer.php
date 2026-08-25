<?php
/**
 * The footer template.
 *
 * @package O_Bosque_Fantasma
 */
?>
</main><!-- #main -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">

        <div class="site-footer__grid">

            <div class="widget">
                <a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <span class="site-brand__mark" aria-hidden="true"></span>
                    <span>
                        <span class="site-brand__name">O Bosque <span>Fantasma</span></span>
                        <span class="site-brand__tag">Pokémon TCG</span>
                    </span>
                </a>
                <p class="text-muted" style="margin-top: 16px; max-width: 38ch;">
                    <?php esc_html_e( 'Cartas Pokémon TCG autênticas com alma de floresta e sombra. Curadoria de Celebi e Gengar para colecionadores.', 'o-bosque-fantasma' ); ?>
                </p>
                <div class="social-links">
                    <?php
                    if ( has_nav_menu( 'social' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'social',
                            'container'      => false,
                            'menu_class'     => '',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                    } else {
                        // Placeholder social links.
                        echo '<a href="#" aria-label="Instagram"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><circle cx="17.5" cy="6.5" r="1" fill="currentColor"></circle></svg></a>';
                        echo '<a href="#" aria-label="YouTube"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="currentColor"></polygon></svg></a>';
                        echo '<a href="#" aria-label="Discord"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18.93 5.36a16.6 16.6 0 0 0-4.07-1.25 12 12 0 0 0-.53 1.07 15.4 15.4 0 0 0-4.66 0 12 12 0 0 0-.53-1.07A16.6 16.6 0 0 0 5.07 5.36C2.4 9.36 1.7 13.26 2.05 17.1a16.7 16.7 0 0 0 5.06 2.56c.41-.56.77-1.15 1.08-1.77-.59-.22-1.15-.5-1.68-.82.14-.1.28-.21.41-.32a11.93 11.93 0 0 0 10.16 0c.13.11.27.22.41.32-.53.32-1.1.6-1.68.82.31.62.67 1.21 1.08 1.77a16.7 16.7 0 0 0 5.06-2.56c.41-4.45-.7-8.32-3.03-11.74zM8.52 14.84c-.99 0-1.81-.91-1.81-2.03s.8-2.03 1.81-2.03 1.83.92 1.81 2.03c0 1.12-.81 2.03-1.81 2.03zm6.96 0c-.99 0-1.81-.91-1.81-2.03s.8-2.03 1.81-2.03 1.83.92 1.81 2.03c0 1.12-.8 2.03-1.81 2.03z"></path></svg></a>';
                    }
                    ?>
                </div>
            </div>

            <div class="widget">
                <h4><?php esc_html_e( 'Navegação', 'o-bosque-fantasma' ); ?></h4>
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => '',
                        'depth'          => 1,
                    ) );
                } else {
                    echo '<ul>';
                    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Início', 'o-bosque-fantasma' ) . '</a></li>';
                    if ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ) {
                        echo '<li><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">' . esc_html__( 'Loja', 'o-bosque-fantasma' ) . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>

            <div class="widget">
                <h4><?php esc_html_e( 'Coleção', 'o-bosque-fantasma' ); ?></h4>
                <ul>
                    <li><a href="#"><?php esc_html_e( 'ETB', 'o-bosque-fantasma' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Displays', 'o-bosque-fantasma' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Blisters', 'o-bosque-fantasma' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Decks', 'o-bosque-fantasma' ); ?></a></li>
                </ul>
            </div>

            <div class="widget">
                <h4><?php esc_html_e( 'Ajuda', 'o-bosque-fantasma' ); ?></h4>
                <ul>
                    <li><a href="#"><?php esc_html_e( 'Envios e prazos', 'o-bosque-fantasma' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Trocas e devoluções', 'o-bosque-fantasma' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Autenticidade', 'o-bosque-fantasma' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Contato', 'o-bosque-fantasma' ); ?></a></li>
                </ul>
            </div>

        </div>

        <div class="site-footer__bottom">
            <p>
                <?php
                /* translators: 1: current year, 2: site name */
                printf( esc_html__( '© %1$s %2$s. Todos os direitos reservados.', 'o-bosque-fantasma' ), esc_html( date_i18n( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
                ?>
            </p>
            <p class="site-footer__tag"><?php esc_html_e( 'Feito com sombra e floresta', 'o-bosque-fantasma' ); ?></p>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
