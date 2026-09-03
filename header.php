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
            /**
             * Custom primary navigation: exactly 3 top-level items.
             * Início · Sobre · Loja (with dropdown of categories).
             *
             * If the site owner assigns a menu to the 'primary' location,
             * that menu is rendered instead. Otherwise the custom structure
             * below is rendered so the header always matches the store's
             * vision.
             */
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'depth'          => 2,
                ) );
            } else {
                // Resolve the "Sobre o Bosque" page URL.
                $sobre_url = home_url( '/sobre/' );
                $sobre_page = get_page_by_path( 'sobre' );
                if ( ! $sobre_page ) {
                    $sobre_template = locate_template( 'page-sobre-o-bosque.php' );
                    if ( $sobre_template ) {
                        $sobre_pages = get_posts( array(
                            'post_type'   => 'page',
                            'meta_key'    => '_wp_page_template',
                            'meta_value'  => 'page-sobre-o-bosque.php',
                            'numberposts' => 1,
                        ) );
                        if ( ! empty( $sobre_pages ) ) {
                            $sobre_page = $sobre_pages[0];
                        }
                    }
                }
                if ( $sobre_page ) {
                    $sobre_url = get_permalink( $sobre_page );
                }

                // Resolve the WooCommerce shop URL.
                $loja_url = home_url( '/loja/' );
                if ( function_exists( 'wc_get_page_id' ) ) {
                    $shop_id = wc_get_page_id( 'shop' );
                    if ( $shop_id > 0 ) {
                        $loja_url = get_permalink( $shop_id );
                    }
                }
                ?>
                <ul class="primary-nav__list">
                    <li class="nav-item">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Início', 'o-bosque-fantasma' ); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url( $sobre_url ); ?>"><?php esc_html_e( 'Sobre', 'o-bosque-fantasma' ); ?></a>
                    </li>
                    <li class="nav-item nav-item--has-dropdown">
                        <button type="button" class="nav-item__trigger" aria-expanded="false" aria-controls="loja-dropdown">
                            <span><?php esc_html_e( 'Loja', 'o-bosque-fantasma' ); ?></span>
                            <svg class="nav-item__chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="nav-dropdown" id="loja-dropdown" role="menu" aria-label="<?php esc_attr_e( 'Categorias da loja', 'o-bosque-fantasma' ); ?>">
                            <a class="nav-dropdown__all" href="<?php echo esc_url( $loja_url ); ?>" role="menuitem">
                                <?php esc_html_e( 'Ver tudo', 'o-bosque-fantasma' ); ?>
                            </a>
                            <span class="nav-dropdown__divider" aria-hidden="true"></span>
                            <a href="<?php echo esc_url( obf_cat_link( 'etb' ) ); ?>" role="menuitem"><?php esc_html_e( 'ETB', 'o-bosque-fantasma' ); ?></a>
                            <a href="<?php echo esc_url( obf_cat_link( 'display-de-booster' ) ); ?>" role="menuitem"><?php esc_html_e( 'Displays', 'o-bosque-fantasma' ); ?></a>
                            <a href="<?php echo esc_url( obf_cat_link( 'blister' ) ); ?>" role="menuitem"><?php esc_html_e( 'Blisters', 'o-bosque-fantasma' ); ?></a>
                            <a href="<?php echo esc_url( obf_cat_link( 'box' ) ); ?>" role="menuitem"><?php esc_html_e( 'Boxes', 'o-bosque-fantasma' ); ?></a>
                            <a href="<?php echo esc_url( obf_cat_link( 'deck' ) ); ?>" role="menuitem"><?php esc_html_e( 'Decks', 'o-bosque-fantasma' ); ?></a>
                            <a href="<?php echo esc_url( obf_cat_link( 'acessorio' ) ); ?>" role="menuitem"><?php esc_html_e( 'Acessórios', 'o-bosque-fantasma' ); ?></a>
                        </div>
                    </li>
                </ul>
                <?php
            }
            ?>
        </nav>

        <div class="header-actions">
            <?php get_search_form( array( 'echo' => true ) ); ?>

            <button class="search-toggle" id="search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Abrir busca', 'o-bosque-fantasma' ); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

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

<div class="nav-backdrop" id="nav-backdrop" aria-hidden="true"></div>

<main id="main" class="site-main">
