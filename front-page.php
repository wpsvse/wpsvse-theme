<?php
/**
 * The template for displaying the front page.
 *
 * Contains all front page specific parts.
 *
 * @package WordPress Sverige
 */
get_header(); ?>

    <div class="container">
      <section id="header-content" class="row">
        <!-- Start welcome -->
        <section id="welcome" class="section">
          <div class="col-md-7">

        	<?php while ( have_posts() ) : the_post(); ?>

            	<?php the_content('Läs mer'); ?>

            <section id="latest-downloads">
							<h3>Ladda ner senaste WordPress</h3>
								<div id="dl-btns">
									<?php // Get main download IDs
									$dlsvse = get_post_meta($post->ID, '_dl_meta_sv_se', true);
									$dlinter = get_post_meta($post->ID, '_dl_meta_inter', true); 
									?>
									<div class="col-md-6 dl-btn-sv">
										<?php echo do_shortcode('[download id="'. $dlsvse .'" template="front"]'); ?>
									</div>
									<div class="col-md-6 dl-btn-inter">
										<?php echo do_shortcode('[download id="'. $dlinter .'" template="front"]'); ?>
									</div>
									<p class="col-md-12"><a href="<?php echo esc_url( home_url( '/filer/hjalp/' ) ); ?>" class="extra-download-link">Behöver du andra format? Ladda ner dom här &rarr;</a></p>
								</div>
            </section>
						
					<?php endwhile; ?>
					
          </div>
        </section>
        <!-- End welcome -->
        <!-- Start Slider -->
        <section id="header-slider" class="section carousel slide col-md-5 hidden-xs">
            <div class="slide-inner">
              <!-- Start SLIDER LOOP -->
              <?php // WP_Query arguments
              $slider_args = array (
                    'posts_per_page' 	=> '3',
                    'post_type' 		=> 'wpsvse_slider'
              );

              // The Query
              $slider_query = new WP_Query( $slider_args );

              // The Loop
              if ( $slider_query->have_posts() ) {
                  while ( $slider_query->have_posts() ) {
                      $slider_query->the_post(); ?>

                  <div class="item row">
                      <?php the_content(); ?>
                  </div>

              <?php }
              }

              // Restore original Post Data
              wp_reset_postdata(); ?>
              <!-- End SLIDER LOOP -->
            </div>
        </section>
      </section>
    </div>
    <!-- End Slider -->
   	</div>
	<!-- End Top-part -->


	<!-- Start Quick Buttons -->
    <section id="quick-buttons" class="section">
		<div class="container">
			<div class="row">
      	<!-- Start QUICK BUTTONS -->
				<?php get_template_part( 'quickbuttons' ); ?>
        <!-- End QUICK BUTTONS -->
      </div>
    </div>
    </section>
    <!-- Start Quick Buttons -->

    <!-- Start Latest News -->
	<section id="latest-news" class="section">
		<div class="container">
			<div class="row">
      <!-- Start NEWS LOOP -->
      <?php // WP_Query arguments
			  $news_args = array ( 'posts_per_page' => '3' );

			  // The Query
			  $news_query = new WP_Query( $news_args );

			  // The Loop
			  if ( $news_query->have_posts() ) {
				  while ( $news_query->have_posts() ) {
					  $news_query->the_post(); ?>

                    <div class="col-md-4 article-item">
                        <article>
                          <div class="news-meta">
                          	  <div class="comments-meta"><?php comments_popup_link('0 kommentarer', '1 kommentar', '% kommentarer'); ?></div>
                              <time datetime="<?php the_time('c'); ?>"><?php the_time('l, j F'); ?></time>
                              <a href="<?php the_permalink() ?>" title="Direktlänk till <?php the_title_attribute(); ?>" class="img-overlay">
							  <?php if ( has_post_thumbnail() ) {
                                	the_post_thumbnail( 'post-image', array('class' => 'img-responsive') );
                        	  } else { ?>
                              	<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
                              <?php } ?>
                              </a>
                          </div>
                          <div class="news-title-frame">
                              <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                              <div class="category-meta">Postat under <?php the_category(', '); ?></div>
                          </div>
                        </article>
                    </div>

			  <?php  }
			  }

			  // Restore original Post Data
			  wp_reset_postdata(); ?>
      <!-- End NEWS LOOP -->
			</div>
		</div>
	</section>
	<!-- End Latest News -->

	<!-- Start Sponsor -->
	<section id="sponsor" class="section">
		<div class="container">
			<div class="row">
         <!-- Start SPONSOR WIDGET -->
           <?php if ( ! dynamic_sidebar( 'sponsor-widget' ) ) : endif; // end sidebar widget area ?>
         <!-- End SPONSOR WIDGET -->
			</div>
		</div>
	</section>
	<!-- End Sponsor -->

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
                  'posts_per_page'	=> '4',
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
        </div>
	</div>
	</section>
	<!-- End Latest Blog Items -->

	<!-- Start Latest Forum -->
	<section id="latest-forum" class="section">
		<div class="container">
			<div class="row">
				<div class="section-headline">
					<h2>Diskussionsforum</h2>
					<span>Behöver du hjälp, har du funderingar, vill du hjälpa andra eller vara en del av communityn? Då är vårt <a href="<?php echo esc_url( home_url( '/forum/' ) ); ?>" rel="help">forum</a> platsen för dig!</span>
				</div>
			</div>
			<div class="row">

        <div class="latest-forum-topics col-md-9">
          <div class="tapatalk-note hidden-md hidden-lg">
            <p>Du vet väl att vårt forum har stöd för appen <strong>Tapatalk</strong>! Ladda ner Tapatalk för din enhet.</p>
            <p>
              <a href="https://play.google.com/store/apps/details?id=com.quoord.tapatalkpro.activity" class="btn btn-android"><i class="fa fa-android"></i> Android</a>
              <a href="https://itunes.apple.com/se/app/tapatalk-community-reader/id307880732?mt=8" class="btn btn-apple"><i class="fa fa-apple"></i> iOS</a>
              <a href="http://www.windowsphone.com/sv-se/store/app/tapatalk/913ffd61-3ba0-435c-a894-9d3ec7e78d6e" class="btn btn-wphone"><i class="fa fa-windows"></i> Windows Phone</a>
              <a href="http://apps.microsoft.com/windows/sv-se/app/0ea0706f-33ea-4842-8706-77e89cecda16" class="btn btn-windows"><i class="fa fa-windows"></i> Windows 8</a>
            </p>
          </div>
          <!-- Start LATEST FORUM POSTS -->
            <?php bbp_get_template_part( 'content-latest-topics' ); ?>
          <!-- End LATEST FORUM POSTS -->
          </div>

          <div id="latest-forum-sidebar" class="col-md-3">
            <div class="forum-widget bbp-forum-search">
              <h3>Hitta svar</h3>
              <p>Vårt forum är som en stor databas med frågor och svar. Testa att söka efter din fråga och få ett svar direkt&hellip;</p>
              <form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
              <label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
              <div class="input-group">
               <!-- Start BBPRESS SEARCH FORM -->
                <input type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" class="form-control">
                <input type="hidden" name="action" value="bbp-search-request" />
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit" id="bbp_search_submit">Sök</button>
                </span>
               <!-- End BBPRESS SEARCH FORM -->
              </div><!-- /input-group -->
              </form>
            </div>

            <div class="forum-widget new-bbp-post">
            <h3>Ställ en fråga</h3>
              <p>Behöver du hjälp? Då är vårt forum den perfekta platsen för att be om support. Skapa ett inlägg med din fråga nu&hellip;</p>
              <!-- Start BBPRESS NEW POST BUTTON -->
              <a href="<?php echo esc_url( home_url( '/nytt-amne/' ) ); ?>" type="button" class="btn btn-dark btn-bbp-new-post"><i class="fa fa-plus-square"></i> Nytt ämne</a>
              <!-- End BBPRESS NEW POST BUTTON -->
            </div>

            <!-- Start BBPRESS TAGCLOUD -->
            <div class="forum-widget bbp-forum-tagcloud widget_tag_cloud">
                <h3 class="widgettitle">Populära ämnestaggar</h3>
                <div class="tagcloud">
                  <?php echo do_shortcode('[bbp-topic-tags]'); ?>
                </div>
            </div>
            <!-- End BBPRESS TAGCLOUD -->
          </div>

			</div>
		</div>
	</section>
	<!-- End Latest Forum -->

	<!-- Start Statistics -->
	<section id="statistics" class="section">
		<div class="container">
			<div class="row">
      <!-- Start SITEWIDE STATISTICS -->
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
						<h1><?php echo esc_html( $stats['topic_count'] ); ?><span>Ämnen</span></h1>
					</div>
				</div>
				<div class="clearfix col-sm-6 col-md-3">
					<div class="stats">
						<i class="fa fa-comments"></i>
						<h1><?php echo esc_html( $stats['reply_count'] ); ?><span>Svar</span></h1>
					</div>
				</div>

				<?php do_action( 'bbp_after_statistics' ); ?>

        <?php unset( $stats ); ?>

				<div class="clearfix col-sm-6 col-md-3">
					<div class="stats">
						<i class="fa fa-sitemap"></i>
						<h1><?php echo bp_get_total_group_count(); ?><span>Grupper</span></h1>
					</div>
				</div>
      <!-- End SITEWIDE STATISTICS -->
			</div>
		</div>
	</section>
	<!-- End Statistics -->

	<!-- Start Activity -->
	<section id="activity" class="section">
		<div class="container">
			<div class="row">
				<div class="section-headline">
					<h2>Aktivitetsflöde</h2>
					<span>Följ den senaste <a href="<?php echo esc_url( home_url( '/aktivitet/' ) ); ?>">aktiviteten</a> på <?php bloginfo( 'name' ); ?></span>
				</div>
			</div>
			<div class="row">
				<?php bp_get_template_part( 'activity/front' ); ?>
			</div>
		</div>
	</section>
	<!-- End Activity -->

	<!-- Start Other -->
	<section id="other" class="section">
		<div class="container">
			<div class="row col-md-6">

          <div class="section-headline">
            <h2>Aktiva grupper</h2>
            <span>Skapa kontakter via olika <a href="<?php echo esc_url( home_url( '/grupper/' ) ); ?>">grupper</a> inom WordPress</span>
          </div>

          <div id="bp-groups">
            <?php bp_get_template_part( 'groups/front' ); ?>
          </div>
      </div>

      <div class="row col-md-6 twitter-container">
          <div class="section-headline">
            <h2>Socialt med WordPress?</h2>
            <span>Få koll på vad som skrivs om WordPress <a href="https://twitter.com/hashtag/wpse?src=hash">#wpse</a></span>
          </div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#wpsvse-twitter" role="tab" data-toggle="tab">@WPSverige</a></li>
              <li><a href="#wpse-twitter" role="tab" data-toggle="tab">#wpse</a></li>
          </ul>

                  <!-- Tab panes -->
          <div class="tab-content">
              <div class="tab-pane text-center active" id="wpsvse-twitter">
                <a class="twitter-timeline" width="100%" href="https://twitter.com/WPSverige" data-widget-id="498245749222543361" data-chrome="noborders transparent noscrollbar" data-tweet-limit="5">Tweets by @WPSverige</a>
  					    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
              </div>

              <div class="tab-pane text-center" id="wpse-twitter">
                <a class="twitter-timeline" width="100%" href="https://twitter.com/hashtag/wpse" data-widget-id="498246358826897408" data-chrome="noborders transparent noscrollbar" data-tweet-limit="5">#wpse Tweets</a>
              </div>
          </div>
		</div>
	</section>
	<!-- End Other -->

<?php get_footer(); ?>
