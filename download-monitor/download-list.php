<?php
global $wp_query, $dlm_page_addon;

echo apply_filters( 'dlm_widget_downloads_list_start', '<ul class="dlm-downloads">' );

while ( $wp_query->have_posts()) {
	$wp_query->the_post();

	echo apply_filters( 'dlm_widget_downloads_list_item_start', '<li>' );

	$template_handler = new DLM_Template_Handler();
	$template_handler->get_template_part( 'content-download', $format, $dlm_page_addon->plugin_path() . 'templates/' );

	echo apply_filters( 'dlm_widget_downloads_list_item_end', '</li>' );
}

echo apply_filters( 'dlm_widget_downloads_list_end', '</ul>' );