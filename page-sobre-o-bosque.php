<?php
/**
 * Template Name: Sobre o Bosque
 *
 * Página "Sobre nós" do Bosque Fantasma.
 *
 * @package O_Bosque_Fantasma
 */

get_header();

/* Helpers locais para os botões do CTA final. */
$obf_shop_url  = ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 ) ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/' );
$obf_contato   = home_url( '/contato/' );
$obf_contato_pg = function_exists( 'get_page_by_path' ) ? get_page_by_path( 'contato' ) : null;
if ( $obf_contato_pg && ! is_wp_error( $obf_contato_pg ) ) {
    $obf_contato = get_permalink( $obf_contato_pg );
}
?>

<!-- ===== HERO SOBRE ===== -->
<section class="page-sobre-hero">
    <div class="hero__fog" aria-hidden="true"></div>
    <div class="container">
        <div class="page-sobre-hero__content">
            <span class="eyebrow reveal" data-delay="1"><?php esc_html_e( 'Sobre nós', 'o-bosque-fantasma' ); ?></span>
            <h1 class="page-sobre-hero__title display-title reveal" data-delay="2">
                <?php esc_html_e( 'O Bosque Fantasma', 'o-bosque-fantasma' ); ?>
            </h1>
            <p class="page-sobre-hero__lead lead reveal" data-delay="3">
                <?php esc_html_e( 'Onde a floresta encontra a sombra — nascemos da paixão por duas lendas para construir um refúgio exclusivo para colecionadores e jogadores de Pokémon TCG.', 'o-bosque-fantasma' ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ===== NOSSA HISTÓRIA ===== -->
<section class="section" id="nossa-historia">
    <div class="container">
        <div class="about-story">
            <div class="story__visual reveal" data-delay="1" aria-hidden="true"></div>
            <div class="reveal" data-delay="2">
                <span class="eyebrow"><?php esc_html_e( 'Nossa história', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Entre o verde-mint e o roxo-profundo', 'o-bosque-fantasma' ); ?></h2>
                <p class="lead">
                    <?php esc_html_e( 'Tudo começou com duas lendas: Celebi, o guardião do tempo e da floresta, e Gengar, a sombra que espreita no escuro. Entre o verde-mint e o roxo-profundo, nasceu um espaço onde cartas Pokémon TCG autênticas encontram quem sabe valorizá-las.', 'o-bosque-fantasma' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'O Bosque Fantasma é uma loja especializada em produtos Pokémon TCG — de Elite Trainer Boxes a displays, blisters, decks e acessórios. Trabalhamos com coleções em português, inglês e japonês, sempre com foco em autenticidade e procedência.', 'o-bosque-fantasma' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Cada produto que entra na nossa coleção passa por conferência. Não vendemos falsificações, não inflamos preços, não prometemos o que não podemos entregar. O bosque é transparente.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ===== NOSSOS PILARES ===== -->
<section class="section section--tight" id="nossos-pilares">
    <div class="container">
        <div class="section-head">
            <div>
                <span class="eyebrow"><?php esc_html_e( 'Nossos pilares', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'O que sustenta o bosque', 'o-bosque-fantasma' ); ?></h2>
            </div>
        </div>

        <div class="pillars-grid">
            <article class="pillar-card reveal" data-delay="1">
                <span class="pillar-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3l7 3v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </span>
                <h3><?php esc_html_e( 'Autenticidade', 'o-bosque-fantasma' ); ?></h3>
                <p><?php esc_html_e( 'Todo produto é verificado antes de entrar no estoque. Trabalhamos apenas com distribuidores oficiais.', 'o-bosque-fantasma' ); ?></p>
            </article>

            <article class="pillar-card reveal" data-delay="2">
                <span class="pillar-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 3h12l3 6-9 12L3 9l3-6z"/>
                        <path d="M3 9h18M9 3l-3 6 6 12 6-12-3-6"/>
                    </svg>
                </span>
                <h3><?php esc_html_e( 'Curadoria', 'o-bosque-fantasma' ); ?></h3>
                <p><?php esc_html_e( 'Selecionamos produtos com base em qualidade, demanda e raridade. O que está no bosque, está aqui por um motivo.', 'o-bosque-fantasma' ); ?></p>
            </article>

            <article class="pillar-card reveal" data-delay="3">
                <span class="pillar-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>
                <h3><?php esc_html_e( 'Transparência', 'o-bosque-fantasma' ); ?></h3>
                <p><?php esc_html_e( 'Preços justos, condições claras, estoque real. O que você vê é o que você compra.', 'o-bosque-fantasma' ); ?></p>
            </article>

            <article class="pillar-card reveal" data-delay="4">
                <span class="pillar-card__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9.5" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13A4 4 0 0 1 16 11"/>
                    </svg>
                </span>
                <h3><?php esc_html_e( 'Comunidade', 'o-bosque-fantasma' ); ?></h3>
                <p><?php esc_html_e( 'Colecionadores e jogadores têm lugar aqui. Dúvidas? Fale com a gente — respondemos de verdade.', 'o-bosque-fantasma' ); ?></p>
            </article>
        </div>
    </div>
</section>

<!-- ===== O QUE VENDEMOS ===== -->
<section class="section" id="o-que-vendemos">
    <div class="container">
        <div class="section-head">
            <div>
                <span class="eyebrow"><?php esc_html_e( 'O que vendemos', 'o-bosque-fantasma' ); ?></span>
                <h2><?php esc_html_e( 'Mapa do bosque', 'o-bosque-fantasma' ); ?></h2>
            </div>
        </div>

        <div class="about-cats">
            <a class="cat-card cat-card--etb reveal" data-delay="1" href="<?php echo esc_url( obf_cat_link( 'etb' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'ETB', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Elite Trainer Box com boosters, sleeves e acessórios.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--display reveal" data-delay="2" href="<?php echo esc_url( obf_cat_link( 'display-de-booster' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Displays', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Caixas lacradas com 36 boosters.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--blister reveal" data-delay="1" href="<?php echo esc_url( obf_cat_link( 'blister' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Blisters', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Pacotes individuais, triplos e quádruplos.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--box reveal" data-delay="2" href="<?php echo esc_url( obf_cat_link( 'box' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Boxes', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Box especial e premium com cartas promocionais.', 'o-bosque-fantasma' ); ?></p>
                </div>
            </a>
            <a class="cat-card cat-card--deck reveal" data-delay="3" href="<?php echo esc_url( obf_cat_link( 'deck' ) ); ?>">
                <div class="cat-card__inner">
                    <h3><?php esc_html_e( 'Decks', 'o-bosque-fantasma' ); ?></h3>
                    <p><?php esc_html_e( 'Deck de batalha pronto para jogar.', 'o-bosque-fantasma' ); ?></p>
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

<!-- ===== AUTENTICIDADE ===== -->
<section class="section section--tight" id="autenticidade">
    <div class="container container--narrow">
        <div class="authenticity-band">
            <span class="eyebrow"><?php esc_html_e( 'Como verificamos', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Autenticidade sem atalhos', 'o-bosque-fantasma' ); ?></h2>

            <ol class="authenticity-band__steps">
                <li class="reveal" data-delay="1">
                    <span class="authenticity-band__num">1</span>
                    <p><?php esc_html_e( 'Conferência de lacre e embalagem original.', 'o-bosque-fantasma' ); ?></p>
                </li>
                <li class="reveal" data-delay="2">
                    <span class="authenticity-band__num">2</span>
                    <p><?php esc_html_e( 'Validação de procedência com distribuidores oficiais.', 'o-bosque-fantasma' ); ?></p>
                </li>
                <li class="reveal" data-delay="3">
                    <span class="authenticity-band__num">3</span>
                    <p><?php esc_html_e( 'Checagem de condição e descrição do produto.', 'o-bosque-fantasma' ); ?></p>
                </li>
            </ol>

            <p class="authenticity-band__closing reveal" data-delay="4">
                <?php esc_html_e( 'Se algo não passa, não entra no bosque. Simples assim.', 'o-bosque-fantasma' ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ===== CTA FINAL ===== -->
<section class="section" id="cta-final">
    <div class="container container--narrow">
        <div class="about-cta">
            <span class="eyebrow"><?php esc_html_e( 'Pronto para explorar?', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Entre no bosque', 'o-bosque-fantasma' ); ?></h2>
            <div class="about-cta__actions">
                <a class="btn btn--primary" href="<?php echo esc_url( $obf_shop_url ); ?>">
                    <?php esc_html_e( 'Ver coleção', 'o-bosque-fantasma' ); ?>
                </a>
                <a class="btn btn--ghost" href="<?php echo esc_url( $obf_contato ); ?>">
                    <?php esc_html_e( 'Fale conosco', 'o-bosque-fantasma' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
