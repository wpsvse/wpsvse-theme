<?php global $dlm_page_addon; ?>
<div class="download_category download_group">
	<h3><a href="<?php echo $dlm_page_addon->get_category_link( $category ); ?>"><?php echo $category->name; ?> <?php if ( $category->count ) : ?>(<?php echo $category->count; ?>)<?php endif; ?></a></h3>
	<ol>
		<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>

			<li><?php $template_handler = new DLM_Template_Handler(); $template_handler->get_template_part( 'content-download', $format, $dlm_page_addon->plugin_path() . 'templates/' ); ?></li>

		<?php endwhile; ?>
	</ol>
</div>