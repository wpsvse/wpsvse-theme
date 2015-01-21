<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">
	<?php do_action( 'bbp_template_before_single_forum' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>
    
    	<?php bbp_single_forum_description(); ?>
        
        <?php if ( bb_is_user_logged_in() ) { ?><a href="#" title="Skapa ett nytt ämne i forumet" class="btn btn-primary bbp-new-topic-btn"><i class="fa fa-plus-square"></i> Nytt ämne</a><?php } ?>
        
        <div class="bbp-breadcrumb"><?php bbp_breadcrumb(); ?></div>

		<?php if ( bbp_get_forum_subforum_count() && bbp_has_forums() ) : ?>

			<?php bbp_get_template_part( 'loop', 'forums' ); ?>

		<?php endif; ?>

		<?php if ( !bbp_is_forum_category() && bbp_has_topics() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

			<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>
            
        <?php if ( bb_is_user_logged_in() ) { ?><a href="#" title="Skapa ett nytt ämne i forumet" class="btn btn-primary bbp-new-topic-btn"><i class="fa fa-plus-square"></i> Nytt ämne</a><?php } ?>

			<?php bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php elseif ( !bbp_is_forum_category() ) : ?>

			<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

			<?php bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php endif; ?>
        
	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_forum' ); ?>

</div>
