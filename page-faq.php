<?php
/**
 * The template for displaying faq pages.
 *
 * @package WordPress Sverige
 */
 
/*
Template Name: Vanliga frågor
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
          <?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); 
          the_content(); ?>
					
					<div class="panel-group faq-page" id="accordion" role="tablist" aria-multiselectable="true">
					<?php $faq_posts = get_post_meta( get_the_ID(), '_faq_group_faq', true ); 
					foreach((array)$faq_posts as $faq_post ){ ?>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="heading-faq-<?php echo $faq_post['permalink']; ?>">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#faq-<?php echo $faq_post['permalink']; ?>" aria-expanded="false" aria-controls="collapse-faq-<?php echo $faq_post['permalink']; ?>">
										<i class="fa fa-question-circle"></i> <?php echo $faq_post['question']; ?>
									</a>
									<a href="#faq-<?php echo $faq_post['permalink']; ?>" class="share-faq" title="Dela den här frågan och svaret"><i class="fa fa-share-alt"></i></a>
								</h4>
							</div>
							<div id="faq-<?php echo $faq_post['permalink']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-faq-<?php echo $faq_post['permalink']; ?>">
								<div class="panel-body">
									<?php echo wpautop($faq_post['answer']); ?>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
					
					<?php echo sharing_display(); ?>
          
          <?php wp_link_pages( array(
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
