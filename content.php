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
        <div class="entry-meta-category"><?php the_category(', '); ?></div>
        <div class="entry-meta-date"><time><?php the_time('l, j F Y'); ?></time></div>
    </div><!-- .post-image -->
    
	<div class="entry-wrapper">
        <div class="entry-content">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <div class="entry-excerpt"><?php the_excerpt('&hellip;'); ?></div>
        </div><!-- .entry-content -->
        
        <div class="entry-meta clearfix">
            <div class="entry-meta-user"><?php echo get_avatar( get_the_author_meta('ID'), 48 ); ?> <?php the_author(); ?></div>
            <div class="entry-meta-comments"><?php comments_popup_link('<i class="fa fa-comment-o"></i> 0', '<i class="fa fa-comment-o"></i> 1', '<i class="fa fa-comment-o"></i> %'); ?></div>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary entry-meta-read-more">Läs mer <i class="fa fa-angle-right"></i></a>
        </div><!-- .entry-meta -->
    </div><!-- .entry-wrapper -->
    
</article><!-- #post-## -->
