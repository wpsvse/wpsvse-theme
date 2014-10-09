<?php
/**
 * @package WordPress Sverige
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="post-image">
          <a href="<?php the_permalink(); ?>" rel="bookmark">
              <?php if ( has_post_thumbnail() ) { 
                the_post_thumbnail('post-img');
              } else { ?>
                <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/post-placeholder.jpg" alt="" />
              <?php } ?>
          </a>
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <div class="post-meta meta-date"><time>onsdag, 24 juni 2014</time></div>
        </div><!-- .post-image -->
    
	<div class="entry-content">
		<?php the_excerpt( __( 'Läs mer', 'wpsvse' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Sidor:', 'wpsvse' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
    <div class="entry-meta">
    	<div class="enty-meta-user"><i class="fa fa-user"></i> <a href="#">Kalle</a></div>
        <div class="entry-meta-category"><i class="fa fa-folder-open"></i> <a href="#">kategori</a></div>
        <div class="entry-meta-comments"><i class="fa fa-comments"></i> <a href="#">2 kommentarer</a></div>
        <a href="#" class="btn btn-primary btn-small read-more-link">Läs mer</a>
    </div><!-- .entry-meta -->
    
</article><!-- #post-## -->
