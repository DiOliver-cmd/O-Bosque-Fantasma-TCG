<?php
/**
 * Single post template.
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
                <span class="eyebrow"><?php echo esc_html( get_the_date() ); ?> · <?php the_category( ', ' ); ?></span>
                <h1 class="display-title"><?php the_title(); ?></h1>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="max-width: 100%; margin-top: var(--space-4); border-radius: var(--radius-lg); overflow: hidden;">
                        <?php the_post_thumbnail( 'obf-hero', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                    </div>
                <?php endif; ?>
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

            <footer class="entry-footer text-muted" style="margin-top: var(--space-5); font-size: var(--fs-sm);">
                <?php the_tags( '<span>' . esc_html__( 'Tags:', 'o-bosque-fantasma' ) . ' ', ', ', '</span>' ); ?>
            </footer>
        </article>

        <nav class="post-nav" style="display: flex; justify-content: space-between; gap: var(--space-4); margin-top: var(--space-6); flex-wrap: wrap;">
            <div><?php previous_post_link( '%link', '← %title' ); ?></div>
            <div><?php next_post_link( '%link', '%title →' ); ?></div>
        </nav>

        <?php if ( comments_open() || get_comments_number() ) : ?>
            <div class="container--narrow" style="margin-top: var(--space-6);">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
