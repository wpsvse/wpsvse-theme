<?php do_action( 'bp_before_member_friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<div id="pag-top" class="pagination no-ajax">

		<div class="pag-count" id="member-dir-count-top">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<ul id="friend-list" class="item-list" role="main">
		<?php while ( bp_members() ) : bp_the_member(); ?>

			<li id="friendship-<?php bp_friend_friendship_id(); ?>" class="col-xs-12 col-sm-6 col-md-4 col-lg-3 buddypress-listing">
				<div class="item-avatar">
					<a href="<?php bp_member_link(); ?>"><?php bp_member_avatar(); ?></a>
				</div>

				<div class="item">
					<div class="item-type-wrapper clearfix">
						<div class="item-title item-type"><a href="<?php bp_member_link(); ?>"><?php bp_member_name(); ?></a></div>
						<div class="item-meta item-type"><span class="activity"><?php bp_member_last_active(); ?></span></div>
						<?php do_action( 'bp_friend_requests_item' ); ?>
						<div class="action item-type">
							<a class="button accept" href="<?php bp_friend_accept_request_link(); ?>"><?php _e( 'Accept', 'buddypress' ); ?></a> &nbsp;
							<a class="button reject" href="<?php bp_friend_reject_request_link(); ?>"><?php _e( 'Reject', 'buddypress' ); ?></a>
								<?php do_action( 'bp_friend_requests_item_action' ); ?>
						</div>
					</div>
				</div>
			</li>

		<?php endwhile; ?>
	</ul>

	<?php do_action( 'bp_friend_requests_content' ); ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<div class="pag-count" id="member-dir-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'You have no pending friendship requests.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_member_friend_requests_content' ); ?>
