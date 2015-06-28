<?php
/**
 * The template for displaying files.
 *
 * @package WordPress Sverige
 */

get_header();

global $dlm_download;

	while ( have_posts() ) : the_post(); ?>

	<!-- Start Page Header -->
    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
              <div class="col-md-12">
            	<h1 class="page-title">Filarkiv</h1>
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
				<p class="dlm-breadcrumbs"><?php the_title(); ?></p>
				
          <?php 
          the_content(); 
          
          wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Sidor:', 'wpsvse' ),
            'after'  => '</div>',
          ) );
          
          edit_post_link( 'Redigera', '<span class="edit-link">', '</span>' );
          ?>
        </div>
        <?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop. ?>
    
<?php get_footer(); ?>
