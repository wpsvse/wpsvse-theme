<?php
/**
 * The Template for displaying all single posts.
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
        <div id="translation-projects" class="col-md-9 validators">
				
				<p class="tp-breadcrumbs"><a href="<?php echo esc_url( home_url( '/oversattning/' ) ); ?>">Översättning</a> <i class="fa fa-angle-right"></i> <a href="<?php echo esc_url( home_url( '/oversattningsvaliderare/' ) ); ?>">Översättningsvaliderare</a> <i class="fa fa-angle-right"></i> <?php the_title(); ?></p>
              
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
	
							<?php get_template_part( 'content', 'single-translator' );
										
					endwhile; ?>
        
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

<?php get_footer(); ?>