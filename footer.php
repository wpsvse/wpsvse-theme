<?php
/**
 * The template for displaying the footer.
 *
 * Contains the footer with essential links.
 *
 * @package WordPress Sverige
 */
?>

	<?php if ( !is_front_page() ) { ?>
    <section id="other" class="section">
        <div class="container">
            <div class="row">
            <?php if ( is_bbpress() ) { ?>
            	<div class="col-md-7 forum-legend">
                	<p><small>Information för forummarkeringar</small></p>
                  <ul>
                    	<li><i class="fa fa-bullhorn"></i> Forumnotis</li>
											<li><i class="fa fa-thumb-tack"></i> Klistrat ämne</li>
											<li><i class="fa fa-exclamation-triangle"></i> Rapporterat ämne</li>
											<li><i class="fa fa-lock"></i> Stängt/låst ämne</li>
									</ul>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

	<!-- Start Footer Widgets -->
	<section id="footer-widgets" class="section">
		<div class="container">
			<div class="row">
				<div class="section-headline nomargin-bottom white-heading">
					<h2>Följ <?php bloginfo( 'name' ); ?></h2>
					<span>Få flöden serverade från <?php bloginfo( 'name' ); ?> och den svenska communityn</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="social-container">
            <ul class="social">
             <!-- Start FOLLOW WORDPRESS -->
              <li class="facebook"><a href="https://www.facebook.com/wpsv.se" class="wpsvse-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php bloginfo( 'name' ); ?>s Facebooksida"><i class="fa fa-facebook"></i></a></li>
              <li class="fb-group"><a href="https://www.facebook.com/groups/wpsvse/" class="wpsvse-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php bloginfo( 'name' ); ?>s officiella Facebookgrupp"><i class="fa fa-facebook-square"></i></a></li>
              <li class="twitter"><a href="https://twitter.com/WPSverige" class="wpsvse-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php bloginfo( 'name' ); ?> på Twitter"><i class="fa fa-twitter"></i></a></li>
              <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>" class="wpsvse-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php bloginfo( 'name' ); ?>s RSS-flöden"><i class="fa fa-rss"></i></a></li>
             <!-- End FOLLOW WORDPRESS -->
            </ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Footer Widgets -->

	<!-- Start Footer -->
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<p><i class="fa fa-info-circle"></i> <abbr title="Gnu Public Licens version 2">GPLv2</abbr> - 2007-<?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				</div>
				<div class="col-md-7">
					<!-- Start FOOTER MENU -->
						<?php wp_nav_menu( array( 'theme_location' => 'footer','container' => false,'items_wrap' => '<ul id="menu-footer" class="hidden-xs footer-links pull-right %2$s">%3$s</ul>' ) ); ?>
					<!-- End FOOTER MENU -->
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<?php if ( is_page('oversatt') ) { ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Iframe Auto Height
		$('iframe.gp-frame').iframeAutoHeight();
	});
	</script>
	<?php } ?>
	<script type="text/javascript">
	(function() {
		var cl = document.createElement('script'); cl.type = 'text/javascript'; cl.async = true;
		cl.src = document.location.protocol + '//www.adrecord.com/cl.php?u=5649&ref=' + document.location.hostname;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(cl, s);
	})();
	</script>

<?php wp_footer(); ?>

</body>
</html>
