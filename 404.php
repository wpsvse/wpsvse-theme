<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress Sverige
 */

get_header(); ?>

	<!-- Start Page Header -->
    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
        <div class="col-md-12">
          <h1 class="page-title">404 - Kunde inte hittas</h1>
        </div>
      </div>
    </div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
      <span class="back-headline">404</span>
        <div class="col-md-12">  	
        	<h2>Oops! Sidan kunde inte hittas</h2>
          <p>Den här sidan laddade troligen inte det du förväntade dig, men bara lugn. Du kan ta dig vidare genom att använda huvudmenyn eller sökfältet längst upp till höger på sidan. Annars kanske någon av följande länkar kan hjälpa dig.</p>  
        </div>
        <section id="latest-news">
        <div class="col-md-12">
        <div class="divider-line"></div>
        	<h2>Senaste nyheterna</h2>
        </div>
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
        </section>
        <div class="col-md-12">
        <div class="divider-line"></div>
        	<h2>Senaste aktiviteten i portalen</h2>
        </div>
        <section class="error-404-widgets">
        	<?php if ( ! dynamic_sidebar( 'error-404' ) ) : endif;?>
        </section>
			</div>
		</div>
	</section>
	<!-- End Page Content -->
    
<?php get_footer(); ?>