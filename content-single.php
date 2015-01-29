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
            <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/default.jpg" alt="" />
          <?php } ?>
      </a>
        <div class="single-meta-comments"><?php comments_popup_link('0 kommentarer', '1 kommentar', '% kommentarer'); ?></div>
        <div class="single-meta-date"><time><?php the_time('l, j F Y'); ?></time></div>
    </div><!-- .post-image -->
    
    <div class="single-content clearfix">
        <h1 class="single-entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <div class="single-meta-header"><span><i class="fa fa-clock-o"></i> <?php the_time('j F'); ?></span> <span><i class="fa fa-bookmark"></i> <?php the_category(', '); ?></span> <?php the_tags( '<span><i class="fa fa-tags"></i> ', ', ', '</span>' ); ?></div>
        <div class="single-content"><?php the_content(); ?></div>
        <div class="single-footer-meta">
            <div class="single-meta-user"><?php echo get_avatar( get_the_author_meta('ID'), 96 ); ?> Det här inlägget publicerades av <strong><?php the_author(); ?></strong> för WordPress Sverige. <br />
			Direktlänk/kortlänk till denna nyhet <a href="<?php echo wp_get_shortlink(); ?>"><?php echo wp_get_shortlink(); ?></a></div>
        </div>
    </div><!-- .entry-meta -->
    
</article><!-- #post-## -->
