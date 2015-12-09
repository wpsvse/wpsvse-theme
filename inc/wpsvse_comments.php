<?php
/**
 * Custom callback for comments and pingbacks.
 *
 * @package WordPress Sverige
 */

if ( ! function_exists( 'wpsvse_comments' ) ) :

function wpsvse_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?>>
		Ping <?php comment_author_link(); ?> <?php edit_comment_link( 'Redigera', ' - ', '' ); ?>
	<?php
		break;
		default :
	?>
	<li <?php comment_class(); ?> id='comment-<?php comment_ID(); ?>'>
		<div class='comment-avatar'>
			<?php echo get_avatar( $comment, 72 ); ?>
		</div>
		<div class='comment-content'>
			<div class='comment-header'>
				<p><?php comment_author_link(); ?> &bull; <time datetime='<?php comment_date( 'c' ); ?>' class='comment-time'><a href='<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>' rel='bookmark' title='Direktlänk till denna kommentar' class="comlink"><?php comment_date( 'j F, Y' ); ?> kl. <?php comment_time('H:i'); ?></a></time></p>
			</div>
				<div class='comment-inner'>
					<?php if ( $comment->comment_approved == '0' ) : ?>
							<p class='comment-awaiting-moderation'>Din kommentar inväntar granskning.</p>
					<?php endif;
					comment_text(); ?>
				</div>
			<div class='comment-meta'>
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Svara', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( 'Redigera','','' ); ?>
			</div>
		</div>
          
<?php
	break;
	endswitch;
}
endif; // ends check for wpsvse_comments()
