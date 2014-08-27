<?php
/**
 * @package WordPress Sverige
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        
        <div class="post-image">
          <a href="<?php the_permalink(); ?>" rel="bookmark">
              <?php if ( has_post_thumbnail() ) { 
                the_post_thumbnail('post-img');
              } else { ?>
                <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/post-placeholder.jpg" alt="" />
              <?php } ?>
          </a>
          <div class="post-meta">
            <div class="meta-date">onsdag, 24 juni 2014</div>
            <div class="meta-comments"><a href="#">2 kommentarer</a></div>
          </div>
        </div><!-- .post-image -->
            
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <div class="entry-meta">Publicerat av <a href="#">Kalle</a> under <a href="#">kategori</a></div>
        
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Läs mer', 'wpsvse' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Sidor:', 'wpsvse' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
</article><!-- #post-## -->
