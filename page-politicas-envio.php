<?php
/**
 * Template Name: Políticas de Envio
 *
 * Página institucional com as políticas de envio do Bosque Fantasma.
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
            <span class="eyebrow reveal" data-delay="1"><?php esc_html_e( 'Informações', 'o-bosque-fantasma' ); ?></span>
            <h1 class="page-sobre-hero__title display-title reveal" data-delay="2">
                <?php esc_html_e( 'Políticas de Envio', 'o-bosque-fantasma' ); ?>
            </h1>
            <p class="page-sobre-hero__lead lead reveal" data-delay="3">
                <?php esc_html_e( 'Como funciona o envio dos seus produtos do Bosque Fantasma.', 'o-bosque-fantasma' ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ===== POLÍTICAS ===== -->
<section class="section" id="politicas-envio">
    <div class="container container--narrow">
        <div class="policies-grid">

            <!-- PRAZOS -->
            <div class="policy-block reveal" data-delay="1">
                <h2><?php esc_html_e( 'Prazos de entrega', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Os prazos abaixo são estimados e contados a partir da postagem, em dias úteis. O tempo de processamento do pedido é de até 1 dia útil.', 'o-bosque-fantasma' ); ?>
                </p>
                <table class="policy-table">
                    <thead>
                        <tr>
                            <th><?php esc_html_e( 'Região', 'o-bosque-fantasma' ); ?></th>
                            <th><?php esc_html_e( 'Prazo estimado', 'o-bosque-fantasma' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php esc_html_e( 'Capitais', 'o-bosque-fantasma' ); ?></td>
                            <td><?php esc_html_e( '2 a 5 dias úteis', 'o-bosque-fantasma' ); ?></td>
                        </tr>
                        <tr>
                            <td><?php esc_html_e( 'Interior', 'o-bosque-fantasma' ); ?></td>
                            <td><?php esc_html_e( '3 a 8 dias úteis', 'o-bosque-fantasma' ); ?></td>
                        </tr>
                        <tr>
                            <td><?php esc_html_e( 'Nacional (regiões remotas)', 'o-bosque-fantasma' ); ?></td>
                            <td><?php esc_html_e( '5 a 12 dias úteis', 'o-bosque-fantasma' ); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- FRETE -->
            <div class="policy-block reveal" data-delay="2">
                <h2><?php esc_html_e( 'Cálculo do frete', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'O valor do frete é calculado automaticamente no checkout, com base no CEP de destino, no peso e nas dimensões do pacote. A integração é feita diretamente com os Correios.', 'o-bosque-fantasma' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Você pode simular o valor do frete na página do produto ou no carrinho antes de finalizar a compra.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>

            <!-- RASTREAMENTO -->
            <div class="policy-block reveal" data-delay="1">
                <h2><?php esc_html_e( 'Rastreamento', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Todo pedido recebe código de rastreamento por e-mail assim que é postado. Você pode acompanhar o status da entrega diretamente no site dos Correios.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>

            <!-- EMBALAGEM -->
            <div class="policy-block reveal" data-delay="2">
                <h2><?php esc_html_e( 'Embalagem', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Produtos são embalados com proteção adequada — cartas em sleeves, boxes em plástico-bolha. Cuidamos para que tudo chegue em perfeitas condições.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="section section--tight" id="cta-envio">
    <div class="container container--narrow">
        <div class="cta-band">
            <span class="eyebrow"><?php esc_html_e( 'Ainda com dúvidas?', 'o-bosque-fantasma' ); ?></span>
            <h2><?php esc_html_e( 'Dúvidas sobre envio? Fale conosco.', 'o-bosque-fantasma' ); ?></h2>
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
