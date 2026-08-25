<?php
/**
 * Template Name: Trocas e Devoluções
 *
 * Página institucional com as políticas de trocas e devoluções do Bosque Fantasma.
 *
 * @package O_Bosque_Fantasma
 */

get_header();

/* Helpers locais para os botões do CTA final. */
$obf_contato   = home_url( '/contato/' );
$obf_contato_pg = function_exists( 'get_page_by_path' ) ? get_page_by_path( 'contato' ) : null;
if ( $obf_contato_pg && ! is_wp_error( $obf_contato_pg ) ) {
    $obf_contato = get_permalink( $obf_contato_pg );
}
?>

<!-- ===== HERO ===== -->
<section class="page-sobre-hero">
    <div class="hero__fog" aria-hidden="true"></div>
    <div class="container">
        <div class="page-sobre-hero__content">
            <span class="eyebrow reveal" data-delay="1"><?php esc_html_e( 'Garantias', 'o-bosque-fantasma' ); ?></span>
            <h1 class="page-sobre-hero__title display-title reveal" data-delay="2">
                <?php esc_html_e( 'Trocas e Devoluções', 'o-bosque-fantasma' ); ?>
            </h1>
            <p class="page-sobre-hero__lead lead reveal" data-delay="3">
                <?php esc_html_e( 'Sua compra no Bosque Fantasma é protegida.', 'o-bosque-fantasma' ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ===== POLÍTICAS ===== -->
<section class="section" id="trocas-devolucoes">
    <div class="container container--narrow">
        <div class="policies-grid">

            <!-- 7 DIAS -->
            <div class="policy-block reveal" data-delay="1">
                <h2><?php esc_html_e( 'Prazo de 7 dias', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Você tem até 7 dias após o recebimento para solicitar troca ou devolução, conforme o Código de Defesa do Consumidor. O prazo vale para produtos em perfeito estado ou com defeito de fabricação.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>

            <!-- CONDIÇÕES -->
            <div class="policy-block reveal" data-delay="2">
                <h2><?php esc_html_e( 'Condições aceitas', 'o-bosque-fantasma' ); ?></h2>
                <p><?php esc_html_e( 'Aceitamos troca ou devolução nas seguintes situações:', 'o-bosque-fantasma' ); ?></p>
                <ul>
                    <li><?php esc_html_e( 'Produto com defeito de fabricação.', 'o-bosque-fantasma' ); ?></li>
                    <li><?php esc_html_e( 'Produto diferente do pedido.', 'o-bosque-fantasma' ); ?></li>
                    <li><?php esc_html_e( 'Embalagem violada ou avariada no transporte.', 'o-bosque-fantasma' ); ?></li>
                </ul>
            </div>

            <!-- REEMBOLSO -->
            <div class="policy-block reveal" data-delay="1">
                <h2><?php esc_html_e( 'Reembolso', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Reembolsos são processados no mesmo método de pagamento da compra. O prazo para o valor aparecer na sua conta varia conforme a operadora, podendo levar até 2 faturas no caso de cartão.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>

        </div>

        <!-- PROCEDIMENTO -->
        <div class="authenticity-band reveal" data-delay="1" style="margin-top: var(--space-6);">
            <span class="eyebrow"><?php esc_html_e( 'Como solicitar', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Procedimento de troca ou devolução', 'o-bosque-fantasma' ); ?></h2>

            <ol class="steps-list">
                <li class="reveal" data-delay="1">
                    <span class="steps-list__num">1</span>
                    <p><?php esc_html_e( 'Entre em contato informando o número do pedido e o motivo da solicitação.', 'o-bosque-fantasma' ); ?></p>
                </li>
                <li class="reveal" data-delay="2">
                    <span class="steps-list__num">2</span>
                    <p><?php esc_html_e( 'Enviamos as instruções de devolução, incluindo endereço e formato da embalagem.', 'o-bosque-fantasma' ); ?></p>
                </li>
                <li class="reveal" data-delay="3">
                    <span class="steps-list__num">3</span>
                    <p><?php esc_html_e( 'Reembolso ou troca processados em até 10 dias úteis após o recebimento do produto.', 'o-bosque-fantasma' ); ?></p>
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="section section--tight" id="cta-trocas">
    <div class="container container--narrow">
        <div class="cta-band">
            <span class="eyebrow"><?php esc_html_e( 'Suporte', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Precisa de ajuda? Fale conosco.', 'o-bosque-fantasma' ); ?></h2>
            <div class="about-cta__actions">
                <a class="btn btn--primary" href="<?php echo esc_url( $obf_contato ); ?>">
                    <?php esc_html_e( 'Fale conosco', 'o-bosque-fantasma' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
