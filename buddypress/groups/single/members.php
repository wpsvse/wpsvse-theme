<?php if ( bp_group_has_members( 'exclude_admins_mods=0' ) ) : ?>

	<?php do_action( 'bp_before_group_members_content' ); ?>

	<div class="item-list-tabs" id="subnav" role="navigation">
		<ul>

			<?php do_action( 'bp_members_directory_member_sub_types' ); ?>

		</ul>
	</div>

	<div id="pag-top" class="pagination no-ajax">

		<div class="pag-count" id="member-count-top">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_group_members_list' ); ?>

	<ul id="member-list" class="item-list" role="main">

		<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

			<li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 buddypress-listing">
				<div class="item">
					<a href="<?php bp_group_member_domain(); ?>"> <?php bp_group_member_avatar_thumb(); ?> </a>
					<div class="item-type-wrapper clearfix">
						<div class="item-type item-title"><?php bp_group_member_link(); ?></div>
						<div class="item-type item-meta"><?php bp_group_member_joined_since(); ?></div>

						<?php do_action( 'bp_group_members_list_item' ); ?>

						<?php if ( bp_is_active( 'friends' ) ) : ?>

							
					</div>
					<div class="item-type action">

						<?php bp_add_friend_button( bp_get_group_member_id(), bp_get_group_member_is_friend() ); ?>

						<?php do_action( 'bp_group_members_list_item_action' ); ?>

					</div>
				</div>

				<?php endif; ?>
			</li>

		<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_group_members_list' ); ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<div class="pag-count" id="member-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_after_group_members_content' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'This group has no members.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>
