<?php

/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_groups_loop' ); ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-top">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<ul id="groups-list" class="item-list" role="main">
	<?php while ( bp_groups() ) : bp_the_group(); ?>

		<li class="col-xs-12 col-sm-6 col-md-3 bp-group-listing">
	  	<div class="item">
	  		<a href="<?php bp_group_permalink(); ?>" class="wpsvse-tooltip" data-toggle="tooltip" data-placement="top" title="<?php bp_group_name(); ?> - <?php bp_group_member_count(); ?>"><?php bp_group_avatar( 'type=thumb&width=256&height=256' ); ?>
	  			<div class="item-title item-type"><?php bp_group_name(); ?></div>
	  			<div class="item-meta item-type"><?php printf( __( 'Active %s', 'buddypress' ), bp_get_group_last_active() ); ?></div>
	  			<div class="item-count item-type"><?php bp_group_type(); ?> / <?php bp_group_member_count(); ?> </div>
	  		</a>
				<?php do_action( 'bp_directory_groups_item' ); ?>
		</div>

	  	<?php do_action( 'bp_directory_groups_actions' ); ?>

		</li>

		<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
