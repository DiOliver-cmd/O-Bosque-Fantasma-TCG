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

            <!-- PRAZOS DE ENTREGA POR REGIÃO -->
            <div class="policy-block reveal" data-delay="1">
                <h2><?php esc_html_e( 'Prazos de entrega', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Os prazos abaixo já incluem margem de segurança de +2 dias úteis sobre a estimativa dos Correios. Entregas que abrangem finais de semana podem acrescer até +3 dias.', 'o-bosque-fantasma' ); ?>
                </p>
                <div class="policy-table-wrap">
                    <table class="policy-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'Região', 'o-bosque-fantasma' ); ?></th>
                                <th><?php esc_html_e( 'Zona', 'o-bosque-fantasma' ); ?></th>
                                <th><?php esc_html_e( 'PAC (dias úteis)', 'o-bosque-fantasma' ); ?></th>
                                <th><?php esc_html_e( 'SEDEX (dias úteis)', 'o-bosque-fantasma' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php esc_html_e( 'Sul (PR, SC, RS)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Capital', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '5–7', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '3–4', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Sul (PR, SC, RS)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Interior', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '7–11', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '4–6', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Sudeste (SP, RJ, MG, ES)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Capital', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '4–6', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '3–4', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Sudeste (SP, RJ, MG, ES)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Interior', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '6–10', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '4–6', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Centro-Oeste (GO, MT, MS, DF)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Capital', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '7–10', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '4–6', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Centro-Oeste (GO, MT, MS, DF)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Interior', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '9–13', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '5–7', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Nordeste (BA, SE, PE, AL, PB, RN, CE, PI, MA)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Capital', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '9–14', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '5–7', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Nordeste (BA, SE, PE, AL, PB, RN, CE, PI, MA)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Interior', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '11–18', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '6–9', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Norte (AM, RR, AP, PA, TO, RO, AC)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Capital', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '12–20', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '7–10', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Norte (AM, RR, AP, PA, TO, RO, AC)', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'Interior', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '16–27', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( '9–14', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-muted" style="font-size: var(--fs-xs); margin-top: var(--space-3);">
                    <?php esc_html_e( 'Prazos contados a partir do 1º dia útil seguinte à postagem. Não incluem sábados, domingos e feriados. Áreas remotas do Norte podem ter acréscimo de até 7 dias úteis.', 'o-bosque-fantasma' ); ?>
                </p>
            </div>

            <!-- VALORES MÉDIOS DE FRETE -->
            <div class="policy-block reveal" data-delay="2">
                <h2><?php esc_html_e( 'Valores médios de frete', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Valores estimados para pacotes de até 1 kg (ex: blisters, booster packs). Produtos mais pesados como ETBs podem ter frete acima da média. O valor final é calculado no checkout pelo CEP de destino.', 'o-bosque-fantasma' ); ?>
                </p>
                <div class="policy-table-wrap">
                    <table class="policy-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'Região', 'o-bosque-fantasma' ); ?></th>
                                <th><?php esc_html_e( 'PAC (R$)', 'o-bosque-fantasma' ); ?></th>
                                <th><?php esc_html_e( 'SEDEX (R$)', 'o-bosque-fantasma' ); ?></th>
                                <th><?php esc_html_e( 'Valor médio (R$)', 'o-bosque-fantasma' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php esc_html_e( 'Sul', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 25 – 32', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 36 – 44', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 34,25', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Sudeste', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 20 – 28', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 30 – 38', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 29,00', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Centro-Oeste', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 30 – 38', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 42 – 52', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 40,50', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Nordeste', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 38 – 48', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 52 – 65', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 50,75', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                            <tr>
                                <td><?php esc_html_e( 'Norte', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 48 – 62', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 65 – 85', 'o-bosque-fantasma' ); ?></td>
                                <td><?php esc_html_e( 'R$ 65,00', 'o-bosque-fantasma' ); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-muted" style="font-size: var(--fs-xs); margin-top: var(--space-3);">
                    <?php esc_html_e( 'Valores baseados na tabela dos Correios vigente em 2025/2026, sem contrato corporativo. Lojistas com contrato obtêm 15–30% de desconto. Frete grátis em compras acima de R$ 299 para as regiões Sudeste e Sul.', 'o-bosque-fantasma' ); ?>
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

            <!-- MINI ENVIOS -->
            <div class="policy-block reveal" data-delay="1">
                <h2><?php esc_html_e( 'Mini Envios (para itens leves)', 'o-bosque-fantasma' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Para itens leves como booster packs avulsos (até 300g), oferecemos o serviço Mini Envios dos Correios a partir de R$ 13,72. Prazo de 8 a 15 dias úteis.', 'o-bosque-fantasma' ); ?>
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
