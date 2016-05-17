<?php
/**
 * Custom extra functions
 *
 * @package WordPress Sverige
 */

//**************************************************
// Add specific CSS class for new topic page
//**************************************************
function wpsvse_topic_page_class( $classes ) {
	if ( is_page('nytt-amne') ) {
		$classes[] = 'page-new-topic';
	}
	return $classes;
}
add_filter( 'body_class', 'wpsvse_topic_page_class' );

//**************************************************
// Set specific length for excerpt on frontpage
//**************************************************
function wpsvse_fp_excerpt_length($length) {
    if ( is_front_page() ) {
        return 20;
    } else {
				return 35;
		}
}
add_filter('excerpt_length', 'wpsvse_fp_excerpt_length');

//**************************************************
// Custom excerpt hellip
//**************************************************
function wpsvse_excerpt_more($more) {
    global $post;
		 return '...';
}
add_filter('excerpt_more', 'wpsvse_excerpt_more');

//**************************************************
// Get all posts for tag archive template
//**************************************************
function wpsvse_set_term_post_types( $query ){
    if( $query->is_tag ):
        $query->set( 'post_type', array( 'post', 'wpsvse_blog' ) );
    endif;
    return $query;
}
add_action( 'pre_get_posts', 'wpsvse_set_term_post_types' );

//**************************************************
// Include topics i global search
//**************************************************
function wpsvse_bbp_topic_search( $wpsvse_topic_search ) {
    $wpsvse_topic_search['exclude_from_search'] = false;
    return $wpsvse_topic_search;
}
add_filter( 'bbp_register_topic_post_type', 'wpsvse_bbp_topic_search' );

//**************************************************
// Include replies i global search
//**************************************************
function wpsvse_bbp_reply_search( $wpsvse_reply_search ) {
    $wpsvse_reply_search['exclude_from_search'] = false;
    return $wpsvse_reply_search;
}
add_filter( 'bbp_register_reply_post_type', 'wpsvse_bbp_reply_search' );

//**************************************************
// Set subscribe checkbox as checked by default
//**************************************************
function wpsvse_bbp_subscribe_as_default( $checked, $topic_subscribed  ) {
    if( $topic_subscribed == 0 )
        $topic_subscribed = true;

    return checked( $topic_subscribed, true, false );
}
add_filter( 'bbp_get_form_topic_subscribed', 'wpsvse_bbp_subscribe_as_default', 10, 2 );

//**************************************************
// Set KSES for superadmins for BP-groups
//**************************************************
if ( is_super_admin() ) {
	remove_filter( 'groups_group_description_before_save', 'wp_filter_kses', 1 );
	remove_filter( 'bp_get_group_description', 'bp_groups_filter_kses', 1 );
}

//**************************************************
// Add allowed file types
//**************************************************
function wpsvse_custom_upload_mimes ( $existing_mimes=array() ) {

	$existing_mimes['po'] = 'text/x-gettext-translation';
	$existing_mimes['pot'] = 'text/x-gettext-translation';

	return $existing_mimes;
}
add_filter('upload_mimes', 'wpsvse_custom_upload_mimes');
