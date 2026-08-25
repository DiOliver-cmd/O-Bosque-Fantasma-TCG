<?php
/**
 * O Bosque Fantasma — functions.php
 *
 * @package O_Bosque_Fantasma
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // No direct access.
}

define( 'OBF_VERSION', '1.0.0' );
define( 'OBF_DIR', get_template_directory() );
define( 'OBF_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function obf_setup() {
    load_theme_textdomain( 'o-bosque-fantasma', OBF_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );

    // WooCommerce.
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 400,
        'single_image_width'    => 600,
        'product_grid'          => array(
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 6,
        ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Image sizes for card thumbnails.
    add_image_size( 'obf-card-thumb', 400, 560, true );
    add_image_size( 'obf-card-large', 800, 1120, true );
    add_image_size( 'obf-hero', 1600, 900, true );

    // Menus.
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'o-bosque-fantasma' ),
        'footer'  => __( 'Menu do Rodapé', 'o-bosque-fantasma' ),
        'social'  => __( 'Menu Social', 'o-bosque-fantasma' ),
    ) );
}
add_action( 'after_setup_theme', 'obf_setup' );

/**
 * Set content width.
 */
function obf_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'obf_content_width', 1280 );
}
add_action( 'after_setup_theme', 'obf_content_width', 0 );

/**
 * Enqueue styles and scripts.
 */
function obf_scripts() {
    // Google Fonts: Cinzel (display) + Inter (body).
    wp_enqueue_style(
        'obf-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet (single source of truth).
    wp_enqueue_style( 'obf-style', get_stylesheet_uri(), array( 'obf-google-fonts' ), OBF_VERSION );

    // Main script.
    wp_enqueue_script( 'obf-main', OBF_URI . '/assets/js/main.js', array(), OBF_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Pass data to JS.
    wp_localize_script( 'obf-main', 'obfData', array(
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'cartUrl'   => function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : '',
        'nonce'     => wp_create_nonce( 'obf-nonce' ),
        'isFront'   => is_front_page(),
    ) );
}
add_action( 'wp_enqueue_scripts', 'obf_scripts' );

/**
 * Preconnect to Google Fonts for performance.
 */
function obf_resource_hints( $hints, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $hints[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
        $hints[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'obf_resource_hints', 10, 2 );

/**
 * WooCommerce: default product columns.
 */
function obf_loop_columns() {
    return 4;
}
add_filter( 'loop_shop_columns', 'obf_loop_columns' );

/**
 * WooCommerce: products per page.
 */
function obf_products_per_page() {
    return 12;
}
add_filter( 'loop_shop_per_page', 'obf_products_per_page' );

/**
 * WooCommerce: remove default wrapper so our templates control layout.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Add our own wrapper.
 */
function obf_wrapper_start() {
    echo '<div class="container section"><div class="woocommerce-wrapper">';
}
add_action( 'woocommerce_before_main_content', 'obf_wrapper_start', 10 );

function obf_wrapper_end() {
    echo '</div></div>';
}
add_action( 'woocommerce_after_main_content', 'obf_wrapper_end', 10 );

/**
 * Body classes.
 */
function obf_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'is-front-page';
    }
    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
        $classes[] = 'is-woocommerce';
    }
    return $classes;
}
add_filter( 'body_class', 'obf_body_classes' );

/* ============================================================
   Pokémon TCG custom product fields
   ============================================================ */

/**
 * Register the meta box for TCG product info.
 */
function obf_add_tcg_meta_box() {
    if ( ! function_exists( 'WC' ) ) {
        return;
    }
    add_meta_box(
        'obf_tcg_fields',
        __( 'Dados da Carta Pokémon TCG', 'o-bosque-fantasma' ),
        'obf_tcg_meta_box_html',
        'product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'obf_add_tcg_meta_box' );

/**
 * Meta box HTML.
 */
function obf_tcg_meta_box_html( $post ) {
    wp_nonce_field( 'obf_save_tcg_fields', 'obf_tcg_nonce' );

    $raridade   = get_post_meta( $post->ID, '_obf_raridade', true );
    $condicao   = get_post_meta( $post->ID, '_obf_condicao', true );
    $set        = get_post_meta( $post->ID, '_obf_set', true );
    $numero     = get_post_meta( $post->ID, '_obf_numero', true );
    $idioma     = get_post_meta( $post->ID, '_obf_idioma', true );

    $raridades = array(
        'common'      => __( 'Common', 'o-bosque-fantasma' ),
        'uncommon'    => __( 'Uncommon', 'o-bosque-fantasma' ),
        'rare'        => __( 'Rare', 'o-bosque-fantasma' ),
        'holo_rare'   => __( 'Holo Rare', 'o-bosque-fantasma' ),
        'ultra_rare'  => __( 'Ultra Rare', 'o-bosque-fantasma' ),
        'secret_rare' => __( 'Secret Rare', 'o-bosque-fantasma' ),
    );

    $condicoes = array(
        'mint'             => __( 'Mint', 'o-bosque-fantasma' ),
        'near_mint'        => __( 'Near Mint', 'o-bosque-fantasma' ),
        'lightly_played'   => __( 'Lightly Played', 'o-bosque-fantasma' ),
        'played'           => __( 'Played', 'o-bosque-fantasma' ),
        'heavily_played'   => __( 'Heavily Played', 'o-bosque-fantasma' ),
    );

    $idiomas = array(
        'pt' => __( 'Português', 'o-bosque-fantasma' ),
        'en' => __( 'Inglês', 'o-bosque-fantasma' ),
        'ja' => __( 'Japonês', 'o-bosque-fantasma' ),
    );
    ?>
    <div class="obf-meta-grid">
        <p>
            <label for="obf_raridade"><?php esc_html_e( 'Raridade', 'o-bosque-fantasma' ); ?></label>
            <select id="obf_raridade" name="obf_raridade">
                <option value=""><?php esc_html_e( '— Selecione —', 'o-bosque-fantasma' ); ?></option>
                <?php foreach ( $raridades as $value => $label ) : ?>
                    <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $raridade, $value ); ?>><?php echo esc_html( $label ); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="obf_condicao"><?php esc_html_e( 'Condição', 'o-bosque-fantasma' ); ?></label>
            <select id="obf_condicao" name="obf_condicao">
                <option value=""><?php esc_html_e( '— Selecione —', 'o-bosque-fantasma' ); ?></option>
                <?php foreach ( $condicoes as $value => $label ) : ?>
                    <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $condicao, $value ); ?>><?php echo esc_html( $label ); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="obf_set"><?php esc_html_e( 'Set / Coleção', 'o-bosque-fantasma' ); ?></label>
            <input type="text" id="obf_set" name="obf_set" value="<?php echo esc_attr( $set ); ?>" placeholder="<?php esc_attr_e( 'Ex: Scarlet & Violet — Paldea Evolved', 'o-bosque-fantasma' ); ?>">
        </p>
        <p>
            <label for="obf_numero"><?php esc_html_e( 'Número da carta', 'o-bosque-fantasma' ); ?></label>
            <input type="text" id="obf_numero" name="obf_numero" value="<?php echo esc_attr( $numero ); ?>" placeholder="<?php esc_attr_e( 'Ex: 045/091', 'o-bosque-fantasma' ); ?>">
        </p>
        <p>
            <label for="obf_idioma"><?php esc_html_e( 'Idioma', 'o-bosque-fantasma' ); ?></label>
            <select id="obf_idioma" name="obf_idioma">
                <option value=""><?php esc_html_e( '— Selecione —', 'o-bosque-fantasma' ); ?></option>
                <?php foreach ( $idiomas as $value => $label ) : ?>
                    <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $idioma, $value ); ?>><?php echo esc_html( $label ); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
    </div>
    <style>
        .obf-meta-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; }
        .obf-meta-grid p { margin: 0; }
        .obf-meta-grid label { display: block; font-weight: 600; margin-bottom: 4px; }
        .obf-meta-grid input, .obf-meta-grid select { width: 100%; }
    </style>
    <?php
}

/**
 * Save TCG meta box fields.
 */
function obf_save_tcg_fields( $post_id ) {
    if ( ! isset( $_POST['obf_tcg_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['obf_tcg_nonce'] ) ), 'obf_save_tcg_fields' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        '_obf_raridade' => isset( $_POST['obf_raridade'] ) ? sanitize_text_field( wp_unslash( $_POST['obf_raridade'] ) ) : '',
        '_obf_condicao' => isset( $_POST['obf_condicao'] ) ? sanitize_text_field( wp_unslash( $_POST['obf_condicao'] ) ) : '',
        '_obf_set'      => isset( $_POST['obf_set'] ) ? sanitize_text_field( wp_unslash( $_POST['obf_set'] ) ) : '',
        '_obf_numero'   => isset( $_POST['obf_numero'] ) ? sanitize_text_field( wp_unslash( $_POST['obf_numero'] ) ) : '',
        '_obf_idioma'   => isset( $_POST['obf_idioma'] ) ? sanitize_text_field( wp_unslash( $_POST['obf_idioma'] ) ) : '',
    );

    foreach ( $fields as $key => $value ) {
        if ( '' === $value ) {
            delete_post_meta( $post_id, $key );
        } else {
            update_post_meta( $post_id, $key, $value );
        }
    }
}
add_action( 'save_post_product', 'obf_save_tcg_fields' );

/**
 * Helper: get rarity label from key.
 */
function obf_get_raridade_label( $key ) {
    $map = array(
        'common'      => 'Common',
        'uncommon'    => 'Uncommon',
        'rare'        => 'Rare',
        'holo_rare'   => 'Holo Rare',
        'ultra_rare'  => 'Ultra Rare',
        'secret_rare' => 'Secret Rare',
    );
    return isset( $map[ $key ] ) ? $map[ $key ] : '';
}

/**
 * Helper: get condition label.
 */
function obf_get_condicao_label( $key ) {
    $map = array(
        'mint'           => 'Mint',
        'near_mint'      => 'Near Mint',
        'lightly_played' => 'Lightly Played',
        'played'         => 'Played',
        'heavily_played' => 'Heavily Played',
    );
    return isset( $map[ $key ] ) ? $map[ $key ] : '';
}

/**
 * Helper: get language label.
 */
function obf_get_idioma_label( $key ) {
    $map = array(
        'pt' => 'Português',
        'en' => 'Inglês',
        'ja' => 'Japonês',
    );
    return isset( $map[ $key ] ) ? $map[ $key ] : '';
}

/**
 * Helper: rarity badge class.
 */
function obf_get_raridade_badge_class( $key ) {
    $map = array(
        'common'      => 'badge--rarity-common',
        'uncommon'    => 'badge--rarity-uncommon',
        'rare'        => 'badge--rarity-rare',
        'holo_rare'   => 'badge--rarity-holo',
        'ultra_rare'  => 'badge--rarity-ultra',
        'secret_rare' => 'badge--rarity-secret',
    );
    return isset( $map[ $key ] ) ? $map[ $key ] : '';
}

/**
 * Display TCG meta on single product page (above add-to-cart).
 */
function obf_display_tcg_meta_on_product() {
    global $product;
    if ( ! $product ) {
        return;
    }
    $condicao = get_post_meta( $product->get_id(), '_obf_condicao', true );
    $set      = get_post_meta( $product->get_id(), '_obf_set', true );
    $numero   = get_post_meta( $product->get_id(), '_obf_numero', true );
    $idioma   = get_post_meta( $product->get_id(), '_obf_idioma', true );

    if ( ! $condicao && ! $set && ! $numero && ! $idioma ) {
        return;
    }
    ?>
    <div class="tcg-meta">
        <h3><?php esc_html_e( 'Dados da carta', 'o-bosque-fantasma' ); ?></h3>
        <dl>
            <?php if ( $condicao ) : ?>
                <dt><?php esc_html_e( 'Condição', 'o-bosque-fantasma' ); ?></dt>
                <dd><?php echo esc_html( obf_get_condicao_label( $condicao ) ); ?></dd>
            <?php endif; ?>
            <?php if ( $set ) : ?>
                <dt><?php esc_html_e( 'Coleção', 'o-bosque-fantasma' ); ?></dt>
                <dd><?php echo esc_html( $set ); ?></dd>
            <?php endif; ?>
            <?php if ( $numero ) : ?>
                <dt><?php esc_html_e( 'Número', 'o-bosque-fantasma' ); ?></dt>
                <dd><?php echo esc_html( $numero ); ?></dd>
            <?php endif; ?>
            <?php if ( $idioma ) : ?>
                <dt><?php esc_html_e( 'Idioma', 'o-bosque-fantasma' ); ?></dt>
                <dd><?php echo esc_html( obf_get_idioma_label( $idioma ) ); ?></dd>
            <?php endif; ?>
        </dl>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'obf_display_tcg_meta_on_product', 25 );



/**
 * Footer widget area (optional).
 */
function obf_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Barra lateral do blog', 'o-bosque-fantasma' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Aparece em páginas de blog e arquivos.', 'o-bosque-fantasma' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Rodapé — Coluna 1', 'o-bosque-fantasma' ),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Rodapé — Coluna 2', 'o-bosque-fantasma' ),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'obf_widgets_init' );

/**
 * Fallback menu when no menu assigned.
 */
function obf_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Início', 'o-bosque-fantasma' ) . '</a></li>';
    if ( function_exists( 'wc_get_page_id' ) ) {
        $shop_id = wc_get_page_id( 'shop' );
        if ( $shop_id > 0 ) {
            echo '<li><a href="' . esc_url( get_permalink( $shop_id ) ) . '">' . esc_html__( 'Loja', 'o-bosque-fantasma' ) . '</a></li>';
        }
    }
    echo '<li><a href="' . esc_url( home_url( '/?page_id=2' ) ) . '">' . esc_html__( 'Sobre', 'o-bosque-fantasma' ) . '</a></li>';
    echo '</ul>';
}

/**
 * Cart fragments: update count badge via AJAX.
 */
function obf_cart_count_fragment( $fragments ) {
    $count = function_exists( 'WC' ) ? WC()->cart->get_cart_contents_count() : 0;
    ob_start();
    ?>
    <span class="cart-link__count" data-cart-count="<?php echo esc_attr( $count ); ?>"><?php echo esc_html( $count ); ?></span>
    <?php
    $fragments['span.cart-link__count'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'obf_cart_count_fragment' );

/**
 * Helper: build a category link (WooCommerce product category).
 * Falls back to shop URL if the category slug is not found.
 *
 * @param string $slug Category slug (celebi, gengar, ghost, grass, shiny).
 * @return string URL.
 */
function obf_cat_link( $slug ) {
    if ( function_exists( 'wc_get_page_id' ) ) {
        $shop_id = wc_get_page_id( 'shop' );
        $shop_url = $shop_id > 0 ? get_permalink( $shop_id ) : home_url( '/shop' );

        if ( taxonomy_exists( 'product_cat' ) ) {
            $term = get_term_by( 'slug', $slug, 'product_cat' );
            if ( $term && ! is_wp_error( $term ) ) {
                return get_term_link( $term, 'product_cat' );
            }
        }
        return $shop_url;
    }
    return home_url( '/' );
}

/**
 * Custom excerpt length.
 */
function obf_excerpt_length( $length ) {
    return 28;
}
add_filter( 'excerpt_length', 'obf_excerpt_length' );

/**
 * Custom excerpt more.
 */
function obf_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'obf_excerpt_more' );
