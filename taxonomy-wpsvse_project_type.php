<?php
/**
 * The template for displaying translation project archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress Sverige
 */

get_header(); ?>

    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
              <div class="col-md-12">
            	<h1 class="page-title">Översättningsvaliderare</h1>
              </div>
            </div>
        </div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
        <div id="translation-projects" class="col-md-9">

				<p class="tp-breadcrumbs"><a href="<?php echo esc_url( home_url( '/oversattning/' ) ); ?>">Översättning</a> <i class="fa fa-angle-right"></i> <a href="<?php echo esc_url( home_url( '/oversattningsprojekt/' ) ); ?>">Översättningsprojekt</a> <i class="fa fa-angle-right"></i> Översättningsprojekt av typen &quot;<?php single_tag_title(); ?>&quot;</p>

				<?php if ( $wp_query->have_posts() ) : ?>

					<?php
					// Find connected pages (for all posts)
					p2p_type( 'translator_to_projects' )->each_connected( $wp_query );
					?>

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

									<?php	get_template_part( 'template-parts/content', 'projects' ); ?>

							<?php endwhile; ?>

							<?php wpsvse_content_nav( 'nav-below' ); ?>

					<?php else : ?>

							<?php get_template_part( 'no-results', 'index' ); ?>

					<?php endif; ?>

				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

<?php get_footer(); ?>
