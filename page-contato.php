<?php
/**
 * Template Name: Contato
 *
 * Página de contato do Bosque Fantasma.
 *
 * @package O_Bosque_Fantasma
 */

get_header();

/* Helpers locais para os botões do CTA final. */
$obf_shop_url = ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ) ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/' );

$obf_instagram = 'https://instagram.com/obosquefantasma';
$obf_email     = 'contato@obosquefantasma.com.br';
$obf_discord   = 'https://discord.gg/obosquefantasma';
?>

<!-- ===== HERO ===== -->
<section class="page-sobre-hero">
    <div class="hero__fog" aria-hidden="true"></div>
    <div class="container">
        <div class="page-sobre-hero__content">
            <span class="eyebrow reveal" data-delay="1"><?php esc_html_e( 'Fale conosco', 'o-bosque-fantasma' ); ?></span>
            <h1 class="page-sobre-hero__title display-title reveal" data-delay="2">
                <?php esc_html_e( 'Contato', 'o-bosque-fantasma' ); ?>
            </h1>
            <p class="page-sobre-hero__lead lead reveal" data-delay="3">
                <?php esc_html_e( 'Tire dúvidas, peça laudos de autenticidade ou converse com a gente.', 'o-bosque-fantasma' ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ===== MÉTODOS DE CONTATO ===== -->
<section class="section" id="metodos-contato">
    <div class="container">
        <div class="section-head">
            <div>
                <span class="eyebrow"><?php esc_html_e( 'Canais diretos', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Onde nos encontrar', 'o-bosque-fantasma' ); ?></h2>
            </div>
        </div>

        <div class="contact-methods">
            <a class="contact-card reveal" data-delay="1" href="<?php echo esc_url( $obf_instagram ); ?>" target="_blank" rel="noopener noreferrer">
                <span class="contact-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                    </svg>
                </span>
                <span class="contact-card__label"><?php esc_html_e( 'Instagram', 'o-bosque-fantasma' ); ?></span>
                <span class="contact-card__value"><?php esc_html_e( '@obosquefantasma', 'o-bosque-fantasma' ); ?></span>
            </a>

            <a class="contact-card reveal" data-delay="2" href="<?php echo esc_url( 'mailto:' . $obf_email ); ?>">
                <span class="contact-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </span>
                <span class="contact-card__label"><?php esc_html_e( 'E-mail', 'o-bosque-fantasma' ); ?></span>
                <span class="contact-card__value"><?php echo esc_html( $obf_email ); ?></span>
            </a>

            <a class="contact-card reveal" data-delay="3" href="<?php echo esc_url( $obf_discord ); ?>" target="_blank" rel="noopener noreferrer">
                <span class="contact-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        <path d="M15 9a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        <path d="M7.5 7.5C9 7 10.5 6.75 12 6.75s3 .25 4.5.75c2 3 3 6 3 9-1.5 1.25-3 2-4.5 2.25l-.75-1.5M7.5 7.5C5.5 10.5 4.5 13.5 4.5 16.5 6 17.75 7.5 18.5 9 18.75l.75-1.5"/>
                    </svg>
                </span>
                <span class="contact-card__label"><?php esc_html_e( 'Discord', 'o-bosque-fantasma' ); ?></span>
                <span class="contact-card__value"><?php esc_html_e( 'Servidor do Bosque', 'o-bosque-fantasma' ); ?></span>
            </a>
        </div>
    </div>
</section>

<!-- ===== FORMULÁRIO ===== -->
<section class="section section--tight" id="formulario-contato">
    <div class="container container--narrow">
        <div class="section-head">
            <div>
                <span class="eyebrow"><?php esc_html_e( 'Envie uma mensagem', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Formulário de contato', 'o-bosque-fantasma' ); ?></h2>
            </div>
        </div>

        <?php
        /*
         * Formulário de contato — handler real via admin-post (action "obf_contato").
         * Implementado em functions.php (obf_handle_contato).
         */

        $obf_contato_status = isset( $_GET['status'] ) ? sanitize_key( wp_unslash( $_GET['status'] ) ) : '';
        $obf_contato_erros  = get_transient( 'obf_contato_erros_' . COOKIEHASH );

        if ( 'ok' === $obf_contato_status ) :
            ?>
            <div class="obf-feedback obf-feedback--ok" role="status">
                <?php esc_html_e( 'Mensagem enviada com sucesso! Em breve entraremos em contato.', 'o-bosque-fantasma' ); ?>
            </div>
            <?php
        elseif ( 'erro' === $obf_contato_status ) :
            ?>
            <div class="obf-feedback obf-feedback--erro" role="alert">
                <p><?php esc_html_e( 'Não foi possível enviar sua mensagem.', 'o-bosque-fantasma' ); ?></p>
                <?php if ( $obf_contato_erros && is_array( $obf_contato_erros ) ) : ?>
                    <ul>
                        <?php foreach ( $obf_contato_erros as $obf_erro ) : ?>
                            <li><?php echo esc_html( $obf_erro ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php
            if ( $obf_contato_erros ) {
                delete_transient( 'obf_contato_erros_' . COOKIEHASH );
            }
        endif;
        ?>
        <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <?php wp_nonce_field( 'obf_contato_action', 'obf_contato_nonce' ); ?>
            <input type="hidden" name="action" value="obf_contato">

            <div class="contact-form__row">
                <div class="contact-form__field">
                    <label for="obf-nome"><?php esc_html_e( 'Nome', 'o-bosque-fantasma' ); ?></label>
                    <input type="text" id="obf-nome" name="obf_nome" required autocomplete="name">
                </div>
                <div class="contact-form__field">
                    <label for="obf-email"><?php esc_html_e( 'E-mail', 'o-bosque-fantasma' ); ?></label>
                    <input type="email" id="obf-email" name="obf_email" required autocomplete="email">
                </div>
            </div>

            <div class="contact-form__field">
                <label for="obf-assunto"><?php esc_html_e( 'Assunto', 'o-bosque-fantasma' ); ?></label>
                <input type="text" id="obf-assunto" name="obf_assunto" required>
            </div>

            <div class="contact-form__field">
                <label for="obf-mensagem"><?php esc_html_e( 'Mensagem', 'o-bosque-fantasma' ); ?></label>
                <textarea id="obf-mensagem" name="obf_mensagem" rows="6" required></textarea>
            </div>

            <div class="contact-form__actions">
                <button type="submit" class="btn btn--primary btn--block">
                    <?php esc_html_e( 'Enviar mensagem', 'o-bosque-fantasma' ); ?>
                </button>
            </div>
        </form>
    </div>
</section>

<!-- ===== HORÁRIO ===== -->
<section class="section section--tight" id="horario">
    <div class="container container--narrow text-center">
        <span class="contact-hours">
            <?php esc_html_e( 'Atendimento: segunda a sexta, 9h às 18h', 'o-bosque-fantasma' ); ?>
        </span>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="section section--tight" id="cta-contato">
    <div class="container container--narrow">
        <div class="cta-band">
            <span class="eyebrow"><?php esc_html_e( 'Conheça a loja', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Prefere navegar? Veja a coleção.', 'o-bosque-fantasma' ); ?></h2>
            <div class="about-cta__actions">
                <a class="btn btn--primary" href="<?php echo esc_url( $obf_shop_url ); ?>">
                    <?php esc_html_e( 'Ver coleção', 'o-bosque-fantasma' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
