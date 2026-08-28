<?php
/**
 * Front page template — landing page.
 *
 * @package O_Bosque_Fantasma
 */

get_header();
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero__fog" aria-hidden="true"></div>
    <div class="hero__rings" aria-hidden="true"></div>
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow reveal" data-delay="1"><?php esc_html_e( 'Loja Pokémon TCG', 'o-bosque-fantasma' ); ?></span>
            <h1 class="hero__title display-title reveal" data-delay="2">
                <?php esc_html_e( 'O Bosque Fantasma', 'o-bosque-fantasma' ); ?>
            </h1>
            <p class="hero__tagline reveal" data-delay="3">
                <?php esc_html_e( 'Entre nas sombras da nossa floresta mágica e descubra um refúgio exclusivo para colecionadores e jogadores.', 'o-bosque-fantasma' ); ?>
            </p>
            <div class="hero__actions reveal" data-delay="4">
                <?php if ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ) : ?>
                    <a class="btn btn--primary" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
                        <?php esc_html_e( 'Explorar coleção', 'o-bosque-fantasma' ); ?>
                    </a>
                <?php endif; ?>
                <a class="btn btn--ghost" href="#sobre-o-bosque">
                    <?php esc_html_e( 'Sobre o bosque', 'o-bosque-fantasma' ); ?>
                </a>
            </div>

            <div class="hero__stats reveal" data-delay="4">
                <div class="hero__stat">
                    <strong>+500</strong>
                    <span><?php esc_html_e( 'cartas em estoque', 'o-bosque-fantasma' ); ?></span>
                </div>
                <div class="hero__stat">
                    <strong>100%</strong>
                    <span><?php esc_html_e( 'autênticas', 'o-bosque-fantasma' ); ?></span>
                </div>
                <div class="hero__stat">
                    <strong>BR</strong>
                    <span><?php esc_html_e( 'envio nacional', 'o-bosque-fantasma' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== COLEÇÃO EM DESTAQUE ===== -->
<?php get_template_part( 'template-parts/section-featured' ); ?>

<!-- ===== CATEGORIAS ===== -->
<section class="section" id="categorias">
    <div class="container">
        <div class="section-head">
            <div>
                <span class="eyebrow"><?php esc_html_e( 'Por tema', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Categorias', 'o-bosque-fantasma' ); ?></h2>
            </div>
        </div>

        <div class="grid grid--cats">
            <a class="cat-card cat-card--etb reveal" data-delay="1" href="<?php echo esc_url( obf_cat_link( 'etb' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'ETB', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Elite Trainer Box — caixas completas com boosters e acessórios.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--display reveal" data-delay="2" href="<?php echo esc_url( obf_cat_link( 'display-de-booster' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Displays', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Caixas de booster lacradas com 36 pacotes.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--blister reveal" data-delay="1" href="<?php echo esc_url( obf_cat_link( 'blister' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Blisters', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Pacotes individuais, triplos e qudruplos com promocional.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--box reveal" data-delay="2" href="<?php echo esc_url( obf_cat_link( 'box' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Boxes', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Box especial e premium com cartas exclusivas.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--deck reveal" data-delay="3" href="<?php echo esc_url( obf_cat_link( 'deck' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Decks', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Deck de batalha pronto para jogar — Liga e Deluxe.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--acessorio reveal" data-delay="1" href="<?php echo esc_url( obf_cat_link( 'acessorio' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Acessórios', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Fichários, minilatas, coleções com pôster e adesivos.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- ===== SOBRE O BOSQUE ===== -->
<section class="section" id="sobre-o-bosque">
    <div class="container">
        <div class="story">
            <div class="story__visual reveal" data-delay="1" aria-hidden="true"></div>
            <div class="reveal" data-delay="2">
                <span class="eyebrow"><?php esc_html_e( 'Sobre o bosque', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Onde a floresta encontra a sombra', 'o-bosque-fantasma' ); ?></h2>
                <p class="lead">
                    <?php esc_html_e( 'O Bosque Fantasma nasceu da paixão por duas lendas: Celebi, que guarda o tempo da floresta, e Gengar, que espreita nas sombras. Juntamos cartas autênticas, verificadas uma a uma, para colecionadores que valorizam raridade e procedência.', 'o-bosque-fantasma' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Cada carta passa por conferência de autenticidade e condição antes de entrar na coleção. Trabalhamos com português, inglês e japonês — do comum ao Secret Rare.', 'o-bosque-fantasma' ); ?>
                </p>
                <p>
                    <a class="btn btn--ghost" href="<?php echo esc_url( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/' ) ); ?>">
                        <?php esc_html_e( 'Ver a coleção completa', 'o-bosque-fantasma' ); ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ===== NEWSLETTER / CONTATO ===== -->
<section class="section section--tight">
    <div class="container container--narrow">
        <div class="cta-band">
            <span class="eyebrow"><?php esc_html_e( 'Fique por dentro', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Novidades do bosque', 'o-bosque-fantasma' ); ?></h2>
            <p class="lead" style="margin-inline: auto;">
                <?php esc_html_e( 'Receba alertas de novas cartas, drops de raridades e promoções. Sem spam — só floresta e sombra.', 'o-bosque-fantasma' ); ?>
            </p>
            <?php
            /*
             * Newsletter — handler real via admin-post (action "obf_newsletter").
             * Implementado em functions.php (obf_handle_newsletter).
             */
            $obf_nl_status = isset( $_GET['nl'] ) ? sanitize_key( wp_unslash( $_GET['nl'] ) ) : '';

            if ( 'ok' === $obf_nl_status ) :
                ?>
                <div class="obf-feedback obf-feedback--ok" role="status">
                    <?php esc_html_e( 'Inscrição confirmada! Bem-vindo ao bosque.', 'o-bosque-fantasma' ); ?>
                </div>
                <?php
            elseif ( 'duplicado' === $obf_nl_status ) :
                ?>
                <div class="obf-feedback obf-feedback--info" role="status">
                    <?php esc_html_e( 'Você já está inscrito! Obrigado por fazer parte do bosque.', 'o-bosque-fantasma' ); ?>
                </div>
                <?php
            elseif ( 'erro' === $obf_nl_status ) :
                ?>
                <div class="obf-feedback obf-feedback--erro" role="alert">
                    <?php esc_html_e( 'Não foi possível concluir sua inscrição. Verifique o e-mail informado.', 'o-bosque-fantasma' ); ?>
                </div>
                <?php
            endif;
            ?>
            <form class="cta-band__form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <?php wp_nonce_field( 'obf_newsletter_action', 'obf_newsletter_nonce' ); ?>
                <input type="hidden" name="action" value="obf_newsletter">
                <input type="email" name="obf_newsletter_email" placeholder="<?php esc_attr_e( 'Seu e-mail', 'o-bosque-fantasma' ); ?>" required aria-label="<?php esc_attr_e( 'E-mail', 'o-bosque-fantasma' ); ?>">
                <button type="submit" class="btn btn--primary"><?php esc_html_e( 'Assinar', 'o-bosque-fantasma' ); ?></button>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
