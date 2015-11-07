<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to wpsvse_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package WordPress Sverige
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &quot;%s&quot;', 'comments title', 'wpsvse' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s kommentar till &quot;%2$s&quot;',
							'%1$s kommentarer till &quot;%2$s&quot;',
							$comments_number,
							'comments title',
							'wpsvse'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array( 'style' => 'ol','type' => 'comment','callback' => 'wpsvse_comments' ) );
			?>
		</ol>
		
		<?php if ( ! empty($comments_by_type['pingback']) ) : ?>
		<h4 id="pingbacks-header">Inkommande länkar</h4>
		<ol id="ping-list">
			<?php
				wp_list_comments( array( 'type' => 'pingback','callback' => 'wpsvse_comments' ) );
			?>
		</ol>
    <?php endif; ?>

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Kommentarer inaktiverade.', 'wpsvse' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h3>',
		) );
	?>

</div><!-- .comments-area -->
