<?php
/**
 * @package WordPress Sverige
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-results'); ?>>

    <div class="search-content clearfix">
        <h1 class="search-entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <div class="search-meta-header">Innehåll skapat <span><i class="fa fa-clock-o"></i> <?php the_time('j F, Y'); ?></span></div>
        <div class="search-content"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" class="search-readmore btn btn-primary btn-small entry-meta-read-more">Läs mer</a>
    </div><!-- .entry-meta -->

</article><!-- #post-## -->
