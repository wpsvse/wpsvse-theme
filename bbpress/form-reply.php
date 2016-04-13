<?php

/**
 * New/Edit Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( bbp_is_reply_edit() ) : ?>

<div id="bbpress-forums">

<?php endif; ?>

<?php if ( bbp_current_user_can_access_create_reply_form() ) : ?>

	<div id="new-reply-<?php bbp_topic_id(); ?>" class="bbp-reply-form">

		<form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>">

			<?php do_action( 'bbp_theme_before_reply_form' ); ?>

			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#bbp-reply-panel" aria-expanded="false" aria-controls="bbp-reply-panel"><i class="fa fa-plus-square"></i> <?php printf( __( 'Reply To: %s', 'bbpress' ), bbp_get_topic_title() ); ?></h3>
      </div>

      <div class="panel-body collapse" id="bbp-reply-panel">

				<?php do_action( 'bbp_theme_before_reply_form_notices' ); ?>

				<?php if ( !bbp_is_topic_open() && !bbp_is_reply_edit() ) : ?>

					<div class="bbp-template-notice">
						<p><?php _e( 'This topic is marked as closed to new replies, however your posting capabilities still allow you to do so.', 'bbpress' ); ?></p>
					</div>

				<?php endif; ?>

				<?php if ( current_user_can( 'unfiltered_html' ) ) : ?>

					<div class="bbp-template-notice">
						<p><?php _e( 'Your account has the ability to post unrestricted HTML content.', 'bbpress' ); ?></p>
					</div>

				<?php endif; ?>

				<?php do_action( 'bbp_template_notices' ); ?>

				<div class="forum-form-container">

					<?php bbp_get_template_part( 'form', 'anonymous' ); ?>

					<!-- BBCode help button modal -->
					<button type="button" class="btn btn-primary btn-xs" id="bbcode-help-btn" data-toggle="modal" data-target="#bbcode-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i> Formatering
					</button>
					<!-- END BBCode help button modal -->
					<!-- BBCode help modal -->
					<div class="modal fade" tabindex="-1" role="dialog" id="bbcode-help">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Stäng"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Hjälp för formatering</h4>
								</div>
								<div class="modal-body">
									<p>Är du osäker på hur man formaterar innehåll i forumet? Här följer snabbhjälp för använding av så kallade BBkoder som används för att formatera och infoga innehåll.</p>
									<h4>Tillgängliga koder</h4>
									<p><strong>[b] - Fetstil</strong><br />
									Markera texten du vill göra fet och klicka på knappen <i class="fa fa-bold" aria-hidden="true"></i> eller skriv:</p>
									<pre>[b]text[/b]</pre>
									<p><strong>[i] - Kursiv</strong><br />
									Markera texten du vill göra till kursiv och klicka på knappen <i class="fa fa-italic" aria-hidden="true"></i> eller skriv:</p>
									<pre>[i]text[/i]</pre>
									<p><strong>[u] - Understreck</strong><br />
									Markera texten du vill göra understruken och klicka på knappen <i class="fa fa-underline" aria-hidden="true"></i> eller skriv:</p>
									<pre>[u]text[/u]</pre>
									<p><strong>[s] - Genomstrykning</strong><br />
									Markera texten du vill göra genomstruken och klicka på knappen <i class="fa fa-strikethrough" aria-hidden="true"></i> eller skriv:</p>
									<pre>[s]text[/s]</pre>
									<p><strong>[scode] - Kodvisning</strong><br />
									Markera texten du vill ska visas som kod och klicka på knappen <i class="fa fa-code" aria-hidden="true"></i> eller skriv:</p>
									<pre>[scode]kod[/scode]</pre>
									<p><strong>[blockquote] - Citat</strong><br />
									Markera texten du vill göra till ett citat och klicka på knappen <i class="fa fa-quote-right" aria-hidden="true"></i> eller skriv:</p>
									<pre>[blockquote]text[/blockquote]</pre>
									<p><strong>[ol]/[ul]/[li] - Listor</strong><br />
									Markera texten du vill göra till en lista och klicka på knappen <i class="fa fa-list-ul" aria-hidden="true"></i> (oordnad) eller <i class="fa fa-list-ol" aria-hidden="true"></i> (ordnad) och markera sedan texten för listpunkter och klicka på knappen <i class="fa fa-list" aria-hidden="true"></i> eller skriv:</p>
									<pre>[ol]text[/ol]</pre>
									<pre>[ul]text[/ul]</pre>
									<pre>[li]text[/li]</pre>
									<p><strong>[url] - Länkar</strong><br />
									Markera adressen du vill ska länkas och klicka på knappen <i class="fa fa-external-link" aria-hidden="true"></i>, använd attribut för att länka en text se nedan:</p>
									<pre>[url]adress[/url]</pre>
									<pre>[url="adress"]text[/url]</pre>
									<p><strong>[img] - Bild</strong><br />
									Markera bildadressen du vill ska infogas som bild och klicka på knappen <i class="fa fa-picture-o" aria-hidden="true"></i> eller skriv:</p>
									<pre>[img]bild_adress[/img]</pre>
									<pre>[img="{width}x{height}"]bild_adress[/img]</pre>
									<pre>[img width={x} height={y}]bild_adress[/img]</pre>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<!-- END BBCode help modal -->

					<?php do_action( 'bbp_theme_before_reply_form_content' ); ?>

					<?php if ( !function_exists( 'wp_editor' ) ) : ?>

						<p>
							<label for="bbp_reply_content"><?php _e( 'Reply:', 'bbpress' ); ?></label><br />
							<textarea id="bbp_reply_content" tabindex="<?php bbp_tab_index(); ?>" name="bbp_reply_content" rows="6" class="form-control"><?php bbp_form_reply_content(); ?></textarea>
						</p>

					<?php else : ?>

						<?php bbp_the_content( array( 'context' => 'reply' ) ); ?>

					<?php endif; ?>

					<?php do_action( 'bbp_theme_after_reply_form_content' ); ?>

					<?php if ( !current_user_can( 'unfiltered_html' ) ) : ?>

						<p class="form-allowed-tags">
							<label><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:','bbpress' ); ?></label><br />
							<code><?php bbp_allowed_tags(); ?></code>
						</p>

					<?php endif; ?>

					<?php if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags' ) ) : ?>

						<?php do_action( 'bbp_theme_before_reply_form_tags' ); ?>

						<p>
							<label for="bbp_topic_tags"><?php _e( 'Tags:', 'bbpress' ); ?></label><br />
							<input type="text" value="<?php bbp_form_topic_tags(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_tags" id="bbp_topic_tags" class="form-control" <?php disabled( bbp_is_topic_spam() ); ?> />
						</p>

						<?php do_action( 'bbp_theme_after_reply_form_tags' ); ?>

					<?php endif; ?>

					<?php if ( bbp_is_subscriptions_active() && !bbp_is_anonymous() && ( !bbp_is_reply_edit() || ( bbp_is_reply_edit() && !bbp_is_reply_anonymous() ) ) ) : ?>

						<?php do_action( 'bbp_theme_before_reply_form_subscription' ); ?>

						<p>

							<input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox" value="bbp_subscribe"<?php bbp_form_topic_subscribed(); ?> tabindex="<?php bbp_tab_index(); ?>" />

							<?php if ( bbp_is_reply_edit() && ( get_the_author_meta( 'ID' ) != bbp_get_current_user_id() ) ) : ?>

								<label for="bbp_topic_subscription"><?php _e( 'Notify the author of follow-up replies via email', 'bbpress' ); ?></label>

							<?php else : ?>

								<label for="bbp_topic_subscription"><?php _e( 'Notify me of follow-up replies via email', 'bbpress' ); ?></label>

							<?php endif; ?>

						</p>

						<?php do_action( 'bbp_theme_after_reply_form_subscription' ); ?>

					<?php endif; ?>

					<?php if ( bbp_allow_revisions() && bbp_is_reply_edit() ) : ?>

						<?php do_action( 'bbp_theme_before_reply_form_revisions' ); ?>

						<fieldset class="bbp-form">
							<legend><?php _e( 'Revision', 'bbpress' ); ?></legend>
							<div>
								<input name="bbp_log_reply_edit" id="bbp_log_reply_edit" type="checkbox" value="1" <?php bbp_form_reply_log_edit(); ?> tabindex="<?php bbp_tab_index(); ?>" />
								<label for="bbp_log_reply_edit"><?php _e( 'Keep a log of this edit:', 'bbpress' ); ?></label><br />
							</div>

							<div>
								<label for="bbp_reply_edit_reason"><?php printf( __( 'Optional reason for editing:', 'bbpress' ), bbp_get_current_user_name() ); ?></label><br />
								<input type="text" value="<?php bbp_form_reply_edit_reason(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_reply_edit_reason" id="bbp_reply_edit_reason" class="form-control" />
							</div>
						</fieldset>

						<?php do_action( 'bbp_theme_after_reply_form_revisions' ); ?>

					<?php else : ?>

						<?php bbp_topic_admin_links(); ?>

					<?php endif; ?>

					<?php do_action( 'bbp_theme_before_reply_form_submit_wrapper' ); ?>

					<div class="bbp-submit-wrapper">

						<?php do_action( 'bbp_theme_before_reply_form_submit_button' ); ?>

						<button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_reply_submit" name="bbp_reply_submit" class="btn btn-primary button submit"><?php _e( 'Submit', 'bbpress' ); ?></button>

						<?php do_action( 'bbp_theme_after_reply_form_submit_button' ); ?>

					</div>

					<?php do_action( 'bbp_theme_after_reply_form_submit_wrapper' ); ?>

				</div>

				<?php bbp_reply_form_fields(); ?>

			</div>

            </div>

			<?php do_action( 'bbp_theme_after_reply_form' ); ?>

		</form>
	</div>

<?php elseif ( bbp_is_topic_closed() ) : ?>

	<div id="no-reply-<?php bbp_topic_id(); ?>" class="bbp-no-reply">
		<div class="bbp-template-notice">
			<p><?php printf( __( 'The topic &#8216;%s&#8217; is closed to new replies.', 'bbpress' ), bbp_get_topic_title() ); ?></p>
		</div>
	</div>

<?php elseif ( bbp_is_forum_closed( bbp_get_topic_forum_id() ) ) : ?>

	<div id="no-reply-<?php bbp_topic_id(); ?>" class="bbp-no-reply">
		<div class="bbp-template-notice">
			<p><?php printf( __( 'The forum &#8216;%s&#8217; is closed to new topics and replies.', 'bbpress' ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); ?></p>
		</div>
	</div>

<?php else : ?>

	<div id="no-reply-<?php bbp_topic_id(); ?>" class="bbp-no-reply">
		<div class="bbp-template-notice">
			<p><?php is_user_logged_in() ? _e( 'You cannot reply to this topic.', 'bbpress' ) : _e( 'You must be logged in to reply to this topic.', 'bbpress' ); ?></p>
		</div>
	</div>

<?php endif; ?>

<?php if ( bbp_is_reply_edit() ) : ?>

</div>

<?php endif; ?>
