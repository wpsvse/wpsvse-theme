<form method="GET" id="download-search">
	<div>
		<label for="download_search"><?php _e( 'Search Downloads', 'dlm_page_addon' ); ?>:</label>
		<input type="text" id="download_search" name="download_search" placeholder="<?php _e( 'Search downloads...', 'dlm_page_addon' ); ?>" />
		<input type="submit" value="<?php _e( 'Search', 'dlm_page_addon' ); ?>" />
		<?php if ( isset( $_GET['page_id'] ) ) : ?>
			<input type="hidden" name="page_id" value="<?php echo esc_attr( absint( $_GET['page_id'] ) ); ?>" />
		<?php endif; ?>
	</div>
</form>