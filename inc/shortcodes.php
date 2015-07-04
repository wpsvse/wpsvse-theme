<?php
/**
 * Shortcodes for use in editors.
 *
 * @package WordPress Sverige
 */


//**************************************************
// Shortcode [box]
//**************************************************
function wpsvse_box_shortcode( $atts, $content = null ) {
	return '<div class="box-shortcode box-primary">' . $content . '</div>';
}
add_shortcode( 'box', 'wpsvse_box_shortcode' );

//**************************************************
// Shortcode [varning]
//**************************************************
function wpsvse_warning_box_shortcode( $atts, $content = null ) {
	return '<div class="box-shortcode box-warning">' . $content . '</div>';
}
add_shortcode( 'varning', 'wpsvse_warning_box_shortcode' );

//**************************************************
// Shortcode [info]
//**************************************************
function wpsvse_info_box_shortcode( $atts, $content = null ) {
	return '<div class="box-shortcode box-info">' . $content . '</div>';
}
add_shortcode( 'info', 'wpsvse_info_box_shortcode' );