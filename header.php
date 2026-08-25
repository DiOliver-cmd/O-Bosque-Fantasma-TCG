<?php
/**
 * The header template.
 *
 * @package O_Bosque_Fantasma
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Pular para o conteúdo', 'o-bosque-fantasma' ); ?></a>

<header id="masthead" class="site-header" role="banner">
    <div class="container site-header__inner">

        <?php if ( has_custom_logo() ) : ?>
            <div class="site-brand"><?php the_custom_logo(); ?></div>
        <?php else : ?>
            <a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img class="site-brand__logo" src="<?php echo esc_url( OBF_URI . '/assets/images/logo.jfif' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="48" height="48">
                <span>
                    <span class="site-brand__name">O Bosque <span>Fantasma</span></span>
                    <span class="site-brand__tag">Pokémon TCG</span>
                </span>
            </a>
        <?php endif; ?>

        <nav class="primary-nav" id="primary-nav" aria-label="<?php esc_attr_e( 'Navegação principal', 'o-bosque-fantasma' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'depth'          => 2,
                ) );
            } else {
                obf_fallback_menu();
            }
            ?>
        </nav>

        <div class="header-actions">
            <?php get_search_form( array( 'echo' => true ) ); ?>

            <?php if ( function_exists( 'woocommerce_get_page_id' ) ) : ?>
                <a class="cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'Ver carrinho', 'o-bosque-fantasma' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="cart-link__label"><?php esc_html_e( 'Carrinho', 'o-bosque-fantasma' ); ?></span>
                    <span class="cart-link__count" data-cart-count="<?php echo esc_attr( function_exists( 'WC' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0 ); ?>">
                        <?php echo esc_html( function_exists( 'WC' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0 ); ?>
                    </span>
                </a>
            <?php endif; ?>

            <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="<?php esc_attr_e( 'Abrir menu', 'o-bosque-fantasma' ); ?>">
                <span></span><span></span><span></span>
            </button>
        </div>

    </div>
</header>

<main id="main" class="site-main">
