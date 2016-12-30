<?php
/**
 * WordPress branding and custom adminbar
 *
 * @package WordPress Sverige
 */

//**************************************************
// Customize the login screen
//**************************************************
function wpsvse_custom_login_logo() {
	$style = '<style type="text/css"> h1 a { background: transparent url(' .  get_stylesheet_directory_uri() . '/img/login-logo.png) no-repeat center top !important; padding-bottom: 70px!important; width: 260px!important;} </style>';
	echo $style;
}
add_action( 'login_head', 'wpsvse_custom_login_logo' );


//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpsvse_brand_logo');
