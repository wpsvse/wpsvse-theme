<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress Sverige
 */
?>
	<div id="sidebar" class="col-md-3 widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		
		<?php if ( is_page('filer') ) {
			
		if ( ! dynamic_sidebar( 'file-widgets' ) ) : endif; ?>
		
			<aside id="file-dl-stats" class="widget widget_text">
				<h3 class="widget-title">Statistik</h3>
					<div class="textwidget">
						Totalt antal nedladdningar: <?php echo do_shortcode('[total_downloads]'); ?><br />
						Totalt antal filer: <?php echo do_shortcode('[total_files]'); ?>
					</div>
			</aside>
		
		<?php } elseif ( 'wpsvse_blog' == get_post_type() ) {
			if ( ! dynamic_sidebar( 'blog-widgets' ) ) : endif;
		} elseif ( 'post' == get_post_type() ) {
			if ( ! dynamic_sidebar( 'news-widgets' ) ) : endif;
		} elseif ( 'wpsvse_projects' == get_post_type() || 'wpsvse_translators' == get_post_type() ) {
			if ( ! dynamic_sidebar( 'translator-widgets' ) ) : endif;
		} else {
		if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'wpsvse' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; } ?>
	</div><!-- #secondary -->
