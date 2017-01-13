<?php
/**
 * The template for displaying the front page.
 *
 * Contains all front page specific parts.
 *
 * @package WordPress Sverige
 */
get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	    <div class="container container-relative">
	      <section id="header-content" class="row">

	        <h6 class="header-content-headline-top">
		        <?php echo esc_html(get_post_meta( get_the_ID(), 'frontpage_data_head_title_top', true )); ?>
	        </h6>
	        <h1 class="header-content-headline">
		        <?php echo esc_html(get_post_meta( get_the_ID(), 'frontpage_data_head_title', true )); ?>
	        </h1>

	        <div class="header-content-text">
	          <?php the_content(); ?>
	        </div>

		    <?php $header_info = wpsv_header_image_info(); ?>
	        <p class="header-content-image--caption"><?=$header_info['place']?></p>
		    <p class="header-content-image--author"><?=$header_info['author']?></p>
	    </div>
	    </div>
		<!-- End Top-part -->

	  <!-- Start Quick Buttons -->
	    <section id="quick-buttons" class="section">
			<div class="container">
				<div class="row">
	        <!-- Start QUICK BUTTONS -->
					<?php get_template_part( 'template-parts/quickbuttons' ); ?>
	        <!-- End QUICK BUTTONS -->
	      </div>
	    </div>
	    </section>
	    <!-- Start Quick Buttons -->


	    <!-- Information --->

			<div class="hidden-md hidden-lg clearfix">
				<img src="/wp-content/themes/wpsvse-theme/img/wordcamp.jpg" alt="wordcamp" />
			</div>

	    <div class="row container-lg wpsv-information">

	      <div class="wpsv-information-story col-md-offset-1 col-md-5">
	        <h2>
		        <?php echo esc_html(get_post_meta( get_the_ID(), 'frontpage_data_about_header', true )); ?>
	        </h2>

	        <div class="wpsv-information-story-wrapper">
		        <?php echo apply_filters('the_content', get_post_meta( get_the_ID(), 'frontpage_data_about_text', true )); ?>
	        </div>
	      </div>


	      <div class="wpsv-information-background hidden-xs hidden-sm col-md-5 col-md-offset-1">
	      </div>

	    </div>

	    <!--- Information ends -->

		<!-- Start Latest Blog Header -->
		<section id="latest-blog-header" class="section">
			<div class="container">
				<div class="row">
					<div class="section-headline white-heading">
						<h2>Senaste ur bloggen</h2>
					</div>
				</div>
			</div>
	    <div class="carr-down"></div>
		</section>
		<!-- End Latest Blog Header -->

		<!-- Start Latest Blog Items -->
		<section id="latest-blog-items" class="section">
		<div class="container">
	        <div class="row">
	          <div class="blog-item-content">
	              <!-- Start BLOG LOOP -->
	              <?php // WP_Query arguments
	              $args = array (
	                  'post_type'		=> 'post',
	                  'posts_per_page'	=> '8',
	              );

	              // The Query
	              $blog_query = new WP_Query( $args );

	              // The Loop
	              if ( $blog_query->have_posts() ) {
	                  while ( $blog_query->have_posts() ) {
	                      $blog_query->the_post(); ?>

	                    <article class="col-md-3 blog-item article-item">
	                        <a href="<?php the_permalink() ?>" title="Direktlänk till <?php the_title_attribute(); ?>" class="img-overlay">
													<?php if ( has_post_thumbnail() ) {
	                              the_post_thumbnail( 'post-image', array('class' => 'img-responsive img-thumbnail') );
	                        } else { ?>
	                          <img class="img-responsive img-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
	                        <?php } ?>
	                        </a>
	                        <h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
	                        <span><i class="fa fa-clock-o"></i> <time datetime="<?php the_time('c'); ?>"><?php the_time('j F'); ?></time> <i class="fa fa-comments-o"></i> <?php comments_number( '0 kommentarer', '1 kommentar', '% kommentarer' ); ?></span>
	                        <?php the_excerpt(); ?>
	                        <a href="<?php the_permalink() ?>" class="btn-primary btn-sm">Läs mer</a>
	                    </article>

	              <?php  }
	              }

	              // Restore original Post Data
	              wp_reset_postdata(); ?>
	              <!-- End BLOG LOOP -->
	            <div class="clearfix"></div>

	          </div>

						<div class="read-more-posts">
	          	<a href="#"> Läs fler blogg inlägg </a>
						</div>

	        </div>
		</div>
		</section>
		<!-- End Latest Blog Items -->


	  <!-- Start Statistics -->
		<section id="statistics" class="section">
			<div class="container">
				<div class="row">
	        <!-- Start SITEWIDE STATISTICS -->
	        <?php // Check if bbPress plugin is loaded
	        if ( class_exists( 'bbPress' ) ) { ?>

	        <?php $stats = bbp_get_statistics(); ?>
					<?php do_action( 'bbp_before_statistics' ); ?>
	        <div class="clearfix col-sm-6 col-md-3">
						<div class="stats">
							<i class="fa fa-group"></i>
							<h1><?php echo esc_html( $stats['user_count'] ); ?><span>Medlemmar</span></h1>
						</div>
					</div>
					<div class="clearfix col-sm-6 col-md-3">
						<div class="stats">
							<i class="fa fa-thumb-tack"></i>
							<h1><?php echo esc_html( $stats['reply_count'] ); ?><span>Ämnen</span></h1>
						</div>
					</div>
					<div class="clearfix col-sm-6 col-md-3">
						<div class="stats">
							<i class="fa fa-comments"></i>
							<h1><?php echo esc_html( $stats['topic_count'] ); ?><span>Svar</span></h1>
						</div>
					</div>

					<?php do_action( 'bbp_after_statistics' ); ?>

	        <?php unset( $stats ); ?>

	        <?php }
	        // Check if BuddyPress plugin is loaded
	        if ( class_exists( 'buddypress' ) ) { ?>
					<div class="clearfix col-sm-6 col-md-3">
						<div class="stats">
							<i class="fa fa-sitemap"></i>
							<h1><?php echo bp_get_total_group_count(); ?><span>Grupper</span></h1>
						</div>
					</div>
	        <?php } ?>
	      <!-- End SITEWIDE STATISTICS -->
				</div>
			</div>
		</section>
		<!-- End Statistics -->

	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

<?php get_footer(); ?>
