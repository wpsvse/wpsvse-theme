<ul class="download-monitor-orderby">
	<li><?php _e( 'Ordna efter:', 'dlm_page_addon' ); ?></li>
	<?php
		$order_by = apply_filters( 'dlm_page_addon_order_by', array(
			'title'          => __( 'Titel', 'dlm_page_addon' ),
			'date'           => __( 'Datum', 'dlm_page_addon' ),
			'download_count' => __( 'Antal nedladdningar', 'dlm_page_addon' )
		) );

		foreach ( $order_by as $key => $value ) {
			?><li><a class="<?php echo $current_orderby == $key ? 'active' : ''; ?>" href="<?php echo add_query_arg( 'orderby', $key ); ?>"><?php echo $value; ?></a></li><?php
		}
	?>
</ul>