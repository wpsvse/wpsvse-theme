<?php
/**
 * Custom functions
 *
 * @package WordPress Sverige
 */

/**
 * Add specific CSS class for new topic page
 */
function wpsvse_topic_page_class( $classes ) {
	if (is_page('nytt-amne')) {
		$classes[] = 'page-new-topic';
	}
	return $classes;
}
add_filter( 'body_class', 'wpsvse_topic_page_class' );

/**
 * Set specific length for excerpt on frontpage
 */
function wpsvse_fp_excerpt_length($length) {
    if (is_front_page()) {
        return 20;
    } else {
				return 35;
		}
}
add_filter('excerpt_length', 'wpsvse_fp_excerpt_length');

/**
 * Custom excerpt hellip
 */
function wpsvse_excerpt_more($more) {
    global $post;
		 return '...';
}
add_filter('excerpt_more', 'wpsvse_excerpt_more');

/**
 * Get all posts for tag archive template
 */
function wpsvse_set_term_post_types( $query ){
    if( $query->is_tag ):
        $query->set( 'post_type', array( 'post', 'wpsvse_blog' ) );
    endif;
    return $query;
}
add_action( 'pre_get_posts', 'wpsvse_set_term_post_types' );

/**
 * Customize the login screen
 */
function wpsvse_custom_login_logo() {
	$style = '<style type="text/css"> h1 a { background: transparent url(' . get_bloginfo('template_directory') . '/img/login-logo.png) no-repeat center top !important; padding-bottom: 70px!important; width: 260px!important;} </style>';
	echo $style;
}
add_action( 'login_head', 'wpsvse_custom_login_logo' );
