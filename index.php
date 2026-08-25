<?php
/**
 * Main template — fallback blog/listing.
 *
 * @package O_Bosque_Fantasma
 */

get_header();
?>

<div class="container section">
    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-hero">
            <h1 class="display-title"><?php single_post_title(); ?></h1>
            <?php if ( get_option( 'page_for_posts' ) ) : ?>
                <p class="lead text-muted" style="margin-inline: auto;">
                    <?php esc_html_e( 'Histórias, novidades e drops do Bosque Fantasma.', 'o-bosque-fantasma' ); ?>
                </p>
            <?php endif; ?>
        </header>
    <?php elseif ( is_archive() ) : ?>
        <header class="page-hero">
            <span class="eyebrow"><?php esc_html_e( 'Arquivo', 'o-bosque-fantasma' ); ?></span>
            <h1 class="display-title"><?php the_archive_title(); ?></h1>
            <div class="lead text-muted" style="margin-inline: auto;"><?php the_archive_description(); ?></div>
        </header>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid--products" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'product-card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a class="product-card__media" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'obf-card-thumb', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                        </a>
                    <?php endif; ?>
                    <div class="product-card__body">
                        <span class="product-card__meta"><?php echo esc_html( get_the_date() ); ?></span>
                        <h3 class="product-card__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="text-muted"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
                        <div class="product-card__footer">
                            <a class="btn btn--ghost btn--sm" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Ler mais', 'o-bosque-fantasma' ); ?></a>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>

        <div class="text-center" style="margin-top: var(--space-6);">
            <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '← Anterior', 'o-bosque-fantasma' ),
                'next_text' => __( 'Próxima →', 'o-bosque-fantasma' ),
            ) ); ?>
        </div>

    <?php else : ?>
        <p class="text-center text-muted"><?php esc_html_e( 'Nenhum conteúdo encontrado.', 'o-bosque-fantasma' ); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>

<?php
get_footer();
