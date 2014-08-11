<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress Sverige
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

	<!-- Start Page Header -->
    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
              <div class="col-md-12">
            	<h1 class="page-title"><?php the_title(); ?></h1>
              </div>
            </div>
        </div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
              <div class="col-md-9">
              	<?php 
				the_content();
				
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'wpsvse' ),
					'after'  => '</div>',
				) );
				
                edit_post_link( __( 'Edit', 'wpsvse' ), '<span class="edit-link">', '</span>' );
				?>
              </div>
              <?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop. ?>
    
    <section id="other" class="section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>

<?php get_footer(); ?>
