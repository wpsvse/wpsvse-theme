<?php
/**
 * The template for displaying the Slack invite page.
 *
 * @package WordPress Sverige
 */

/*
Template Name: Slack
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
        <div class="col-md-12 page-content">
          <?php
          the_content();

					if ( is_user_logged_in() ) {
					    if ( ! dynamic_sidebar( 'slack-members' ) ) : endif;
					} else {
					    if ( ! dynamic_sidebar( 'slack' ) ) : endif;
					}

          edit_post_link( 'Redigera', '<span class="edit-link">', '</span>' );
          ?>
        </div>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
