<?php
/**
 * The template for displaying the footer.
 *
 * Contains the footer with essential links.
 *
 * @package WordPress Sverige
 */
?>

	<!-- Start Footer -->
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<p>Copyright &copy; 2007-<?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
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

	<!-- Back to Top -->	
	<a href="#" class="back-to-top" title="Till toppen"><i class="fa fa-arrow-up"></i></a>
	<!-- End Back to Top -->

<?php wp_footer(); ?>

</body>
</html>