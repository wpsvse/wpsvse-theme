<?php
/**
 * The template for displaying the front page.
 *
 * Contains all front page specific parts.
 *
 * @package WordPress Sverige
 */
get_header(); ?>

    <div class="container container-relative">
      <section id="header-content" class="row">

        <h1 class="header-content-headline"> Vad söker du? </h1>

        <p class="header-content-text">
          Bla bla bla bla.....
        </p>


        <p class="header-content-image--caption"><?=wpsv_header_image_info(wpsv_header_image_number())['place']?> </p>

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

    <div class="row wpsv-information">

      <div class="wpsv-information-story col-md-6">
        <h2> Vad är WordPress Sverige? </h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean augue ex, tincidunt ut nunc ac, lacinia egestas lacus. Nullam lobortis volutpat ante eu sollicitudin. Curabitur cursus urna at nisl pharetra maximus. Suspendisse at ligula ultricies, pharetra lectus at, pellentesque orci. Nunc vitae molestie odio. Nunc ac lacinia quam. Donec quis risus vel justo varius sagittis. Fusce finibus mauris odio, et condimentum nunc vestibulum a. Phasellus luctus ante nec felis sollicitudin vehicula. Maecenas in gravida dui, at consectetur erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec venenatis justo at nisi tincidunt ultrices. Curabitur eu convallis sapien. Integer tincidunt urna quis nisl molestie vestibulum. Cras urna est, cursus vel laoreet vel, porttitor vel lorem. </p>
        <p>Cras in lacus quis tortor scelerisque hendrerit. Curabitur sodales nunc ex, at gravida tortor lobortis a. Pellentesque semper ex at leo venenatis elementum. Aliquam maximus metus libero, sed tempor nisi sagittis at. Phasellus molestie sem ac orci ultricies varius. Aliquam scelerisque bibendum molestie. Nullam volutpat dictum aliquet. Ut hendrerit varius lacus at sodales. Duis nisl neque, mollis eget enim gravida, iaculis sodales nisi. Cras sit amet nisi ac arcu suscipit sagittis. Etiam vestibulum a nulla nec gravida.</p>

      </div>


      <div class="wpsv-information-background hidden-xs hidden-sm col-md-6">
      </div>

    </div>

    <!--- Information ends -->

	<!-- Start Latest Blog Header -->
	<section id="latest-blog-header" class="section">
		<div class="container">
			<div class="row">
				<div class="section-headline white-heading">
					<h2>Senaste ur bloggen</h2>
					<span>Det senaste ur <?php bloginfo( 'name' ); ?>s blogg</span>
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
                  'post_type'		=> 'wpsvse_blog',
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

          <a href="#"> Läs fler blogg inlägg </a>

          
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

<?php get_footer(); ?>
