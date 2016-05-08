<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress Sverige
 */

get_header(); ?>

    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
              <div class="col-md-12">
            	<h1 class="page-title"><?php printf( __( 'Sökresultat för: %s', 'wpsvse' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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

						<?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'search' ); ?>

                <?php endwhile; ?>

                <?php wpsvse_content_nav( 'nav-below' ); ?>

            <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'no-results' ); ?>

            <?php endif; ?>

        </div>
        <?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

<?php get_footer(); ?>
