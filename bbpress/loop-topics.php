<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>

<a href="#new-post" title="Skapa ett nytt ämne i forumet" class="btn btn-primary bbp-new-topic-btn" data-toggle="collapse" data-target="#bbp-reply-panel" aria-expanded="false" aria-controls="bbp-reply-panel"><i class="fa fa-plus-square"></i> Nytt ämne</a>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">

    <li class="bbp-header">
        <ul class="forum-titles row">
            <li class="bbp-topic-title col-lg-8">Ämne</li>
            <li class="bbp-topic-counts col-lg-1">Inlägg</li>
            <li class="bbp-topic-freshness col-lg-3">Aktivitet</li>
        </ul>
    </li>
                        
	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>

	<li class="bbp-footer">

		<div class="tr">
			<p>
				<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
			</p>
		</div><!-- .tr -->

	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<a href="#new-post" title="Skapa ett nytt ämne i forumet" class="btn btn-primary bbp-new-topic-btn" data-toggle="collapse" data-target="#bbp-reply-panel" aria-expanded="false" aria-controls="bbp-reply-panel"><i class="fa fa-plus-square"></i> Nytt ämne</a>

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
