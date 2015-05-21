<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_topics_loop' ); ?>

	<ul class="bbp-topics">
		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'latest-single-topic' ); ?>

		<?php endwhile; ?>
	</ul>

	<?php do_action( 'bbp_template_after_topics_loop' ); ?>
