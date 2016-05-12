<?php
/**
 * The template for displaying the form for docs page.
 *
 * @package WordPress Sverige
 */

/*
Template Name: Formulär, Dokumentation
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
        <div class="col-md-9 page-content">
          <?php
					if ( is_user_logged_in() ) {
					    the_content();
					} else { ?>
							<h3>Inloggning krävs</h3>
							<p>WordPress Sveriges dokumentation är öppen för alla att delta i. Man måste dock vara inloggad för att kunna skapa nya artiklar eller för att redigera befintliga artiklar. Detta för att undvika oseriös användning av dokumentationen och motverka skräpposter. <a href="<?php echo esc_url( home_url( '/logga-in/' ) ); ?>">Logga in</a> eller <a href="<?php echo esc_url( home_url( '/bli-medlem/' ) ); ?>">bli medlem</a> för att skapa/redigera artiklar i dokumetationen.</p>
					<?php } ?>
				</div>
        <?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
