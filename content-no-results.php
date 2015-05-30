<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress Sverige
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('no-results'); ?>>

		<h2 class="page-title">Kunde inte hittas</h2>
            
    <p>Tyvärr gav din sökning inga resultat på <?php bloginfo( 'name' ); ?>. Försök med andra sökord eller förfina dina söktermer.</p>
    <?php get_search_form(); ?>
    
</article><!-- #post-## -->