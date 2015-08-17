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

//**************************************************
// Brand Adminbar
//**************************************************
function wpsvse_brand_logo() {
    echo '<style type="text/css">@import url("' . get_stylesheet_directory_uri() . '/css/wpsvse_adminbar.css");</style>';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpsvse_brand_logo');

//**************************************************
// Toolbar search link
//**************************************************
function wpsvse_toolbar_search_link( $wp_admin_bar ) {
	global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'id'     => 'wpsvse-mobile-search',
			'parent' => 'top-secondary',
			'title'  => '<i class="fa fa-search"></i>',
			'href'		=> get_home_url() . '/sok/',
		) );
}
add_action( 'admin_bar_menu', 'wpsvse_toolbar_search_link' );

//**************************************************
// Toolbar login form
//**************************************************
function wpsvse_toolbar_login( $wp_admin_bar ) {
	global $wp_admin_bar;
  if( !is_user_logged_in() ) {
		$form_args = array( 'echo' => false, 'label_username' => '', 'label_password' => '', 'label_remember' => 'Kom ihåg', );
		$wpsvse_login_form = wp_login_form( $form_args );
		$wp_admin_bar->add_menu( array(
			'id'     => 'wpsvse-login',
			'parent' => 'top-secondary',
			'title'  => $wpsvse_login_form,
		) );
  }
}
add_action( 'admin_bar_menu', 'wpsvse_toolbar_login' );

//**************************************************
// Add custom links for register and login
//**************************************************
function wpsvse_toolbar_links( $wp_admin_bar ) {
	global $wp_admin_bar;
  if( !is_user_logged_in() ) {
		$wp_admin_bar->add_menu( array(
			'id'     => 'wpsvse-mobile-login',
			'parent' => 'top-secondary',
			'title'  => 'Logga in',
			'href'		=> get_home_url() . '/logga-in/',
		) );
		$wp_admin_bar->add_menu( array(
			'id'     => 'wpsvse-mobile-register',
			'parent' => 'top-secondary',
			'title'  => 'Bli medlem',
			'href'		=> get_home_url() . '/bli-medlem/',
		) );
  }
}
add_action( 'admin_bar_menu', 'wpsvse_toolbar_links' );

//**************************************************
// Modify toolbar logo links
//**************************************************
function wpsvse_modify_toolbar_links( $wp_admin_bar ) {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => false,
		'id'     => 'wpsv-logo',
		'title' => '<span class="ab-icon"></span><span class="screen-reader-text">WordPress Sverige</span>',
		'href'   => get_home_url(),
	) );
}
add_action( 'admin_bar_menu', 'wpsvse_modify_toolbar_links', 1 );

// Remove standard items
function wpsvse_remove_toolbar_links( $wp_admin_bar ) {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'wpsvse_remove_toolbar_links' );

//**************************************************
// Remove BP login link
//**************************************************
function wpsvse_remove_bplogin_link( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'bp-login' );
	$wp_admin_bar->remove_node( 'bp-register' );
}
add_action( 'admin_bar_menu', 'wpsvse_remove_bplogin_link', 999 );
