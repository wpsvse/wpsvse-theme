<?php
/**
 * The template for displaying BuddyPress pages.
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
					<h1 class="page-title"><?php if ( 'bp_doc' == get_post_type() || is_post_type_archive('bp_doc') ) { echo 'Dokumentation'; } else { the_title(); } ?></h1>
				</div>
			</div>
		</div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
			<?php if ( 'bp_doc' == get_post_type() || is_post_type_archive('bp_doc') ) { ?>
				<div class="col-md-9 page-content">
					<?php the_content(); ?>
				</div>
				<?php include ( bp_docs_locate_template( 'single/sidebar.php' ) ) ?>
			<?php } else { ?>
				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop.
    
get_footer(); ?>
