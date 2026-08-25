<?php
/**
 * Standard page template.
 *
 * @package O_Bosque_Fantasma
 */

get_header();
?>

<div class="container section">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
            <header class="page-hero">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="max-width: 100%; margin-bottom: var(--space-4); border-radius: var(--radius-lg); overflow: hidden;">
                        <?php the_post_thumbnail( 'obf-hero', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                    </div>
                <?php endif; ?>
                <h1 class="display-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php
                the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'o-bosque-fantasma' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class="container--narrow" style="margin-top: var(--space-6);">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>
        </article>
        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
