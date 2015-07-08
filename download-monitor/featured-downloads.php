<?php global $dlm_page_addon; ?>
<div id="download-page-featured" class="download_group">
	<h3>Utvalda</h3>
	<ul>
		<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>

			<li><?php $template_handler = new DLM_Template_Handler(); $template_handler->get_template_part( 'content-download', $format, $dlm_page_addon->plugin_path() . 'templates/' ); ?></li>

		<?php endwhile; ?>
	</ul>
</div>