<?php

/**
 * Template Name: bbPress - User Register
 *
 * @package bbPress
 * @subpackage Theme
 */

// No logged in users
bbp_logged_in_redirect();

// Begin Template
get_header();

 do_action( 'bbp_before_main_content' );

	while ( have_posts() ) : the_post(); ?>

	<!-- Start Page Header -->
	<section id="page-header" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title">Bli medlem</h1>
			</div>
		</div>
	</div>
	</section>
	<!-- Start Page Header -->

  <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
        <div class="col-md-12 page-content">
				
				<?php do_action( 'bbp_template_notices' );
				
				if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); 
				the_content();
				bbp_get_template_part( 'form', 'user-register' ); ?>
				
        </div>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop. ?>
	
	<?php do_action( 'bbp_after_main_content' ); ?>

<?php get_footer(); ?>

