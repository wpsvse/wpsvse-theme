<?php
/**
 * The template for displaying forum pages.
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
						<h1 class="page-title">Forum</h1>
					</div>
				</div>
			</div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php bbp_breadcrumb(); ?>
					<div class="bbp-search-form-forum">
						<?php bbp_get_template_part( 'form', 'search' ); ?>
					</div>
					<h2 class="page-title-forum"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
		<div class="share-frame">
			<?php if ( bbp_is_single_topic() ) :
				if ( function_exists( 'sharing_display' ) ) echo sharing_display();
			endif; ?>
		</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop.
    
get_footer(); ?>
