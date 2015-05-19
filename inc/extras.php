<?php
/**
 * Custom functions
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

// Set specific length for excerpt on frontpage
function wpsvse_fp_excerpt_length($length) {
    if (is_front_page()) {
        return 20;
    } 
}
add_filter('excerpt_length', 'wpsvse_fp_excerpt_length');