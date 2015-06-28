<form method="GET" id="download-search">
	<div>
		<i class="fa fa-search"></i>
		<label for="download_search"><?php _e( 'Hitta filen', 'dlm_page_addon' ); ?></label>
		<div class="input-group">
			<input class="form-control input-lg" type="text" id="download_search" name="download_search" placeholder="<?php _e( 'Sök efter filer...', 'dlm_page_addon' ); ?>" />
			<span class="input-group-btn">
				<input type="submit" class="btn btn-primary input-lg" value="<?php _e( 'Sök', 'dlm_page_addon' ); ?>" />
			</span>
			<?php if ( isset( $_GET['page_id'] ) ) : ?>
				<input type="hidden" name="page_id" value="<?php echo esc_attr( absint( $_GET['page_id'] ) ); ?>" />
			<?php endif; ?>
		</div>
	</div>
</form>