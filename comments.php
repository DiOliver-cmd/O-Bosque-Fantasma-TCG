<?php
/**
 * Comments template.
 *
 * @package O_Bosque_Fantasma
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $obf_comment_count = get_comments_number();
            if ( '1' === (string) $obf_comment_count ) {
                esc_html_e( '1 comentário', 'o-bosque-fantasma' );
            } else {
                printf(
                    /* translators: %s: comment count */
                    esc_html__( '%s comentários', 'o-bosque-fantasma' ),
                    esc_html( number_format_i18n( $obf_comment_count ) )
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 48,
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments text-muted"><?php esc_html_e( 'Comentários encerrados.', 'o-bosque-fantasma' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( array(
        'title_reply'        => __( 'Deixe um comentário', 'o-bosque-fantasma' ),
        'title_reply_to'     => __( 'Responder a %s', 'o-bosque-fantasma' ),
        'cancel_reply_link'  => __( 'Cancelar resposta', 'o-bosque-fantasma' ),
        'label_submit'       => __( 'Enviar comentário', 'o-bosque-fantasma' ),
        'class_submit'       => 'btn btn--primary',
        'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comentário', 'o-bosque-fantasma' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" required></textarea></p>',
    ) );
    ?>

</div>
