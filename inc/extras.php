<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package WordPress Sverige
 */

// Add specific CSS class for new topic page
function wpsvse_topic_page_class( $classes ) {
	if (is_page('nytt-amne')) {
		$classes[] = 'page-new-topic';
	}
	return $classes;
}
add_filter( 'body_class', 'wpsvse_topic_page_class' );