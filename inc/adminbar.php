 <?php
/**
 * WordPress Sverige functions for the adminbar
 *
 * @package WordPress Sverige
 */

//**************************************************
// Brand Adminbar
//**************************************************
function wpsvse_brand_logo() {
    echo '
    <style type="text/css">
		html { margin:0!important; }
		#wpadminbar .fa {
			font: normal normal normal 14px/1 FontAwesome !important;
			color: rgba(240,245,250,.6);
		}
		#wpadminbar {
			background: rgba(0,0,0,.75);
			height: 48px;
			line-height: 48px;
		}
		.wp-admin #wpadminbar {
			background: #23282D;
		}
    #wpadminbar .quicklinks li#wp-admin-bar-bp-notifications #ab-pending-notifications, #wpadminbar .quicklinks li#wp-admin-bar-my-account a span.count, #wpadminbar .quicklinks li#wp-admin-bar-my-account-with-avatar a span.count {
      padding: 1px 5px;
    }
		.navbar {
			padding-top: 48px;
			padding-bottom: 7px;
		}
		#wpadminbar .quicklinks .ab-empty-item, #wpadminbar .quicklinks a, #wpadminbar .shortlink-input { height: 48px; line-height: 48px;}
    #wpadminbar>#wp-toolbar #wp-admin-bar-wpsv-logo .ab-icon {
			background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/icons/brand-icon.png) !important;
			background-position: center 8px;
			background-repeat: no-repeat;
			width: 32px;
		  height: 24px;
    }
		#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input,
		#wpadminbar .quicklinks .menupop ul.ab-sub-secondary, #wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu,
		#wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar .ab-top-menu>li:hover>.ab-item, #wpadminbar .ab-top-menu>li>.ab-item:focus, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus {
		  background: rgba(0,0,0,.75);
		}
		#wpadminbar .quicklinks .menupop ul li:hover {
			background: #000;
		}
		#wpadminbar .ab-icon, #wpadminbar .ab-item:before, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon {
			padding: 12px 0;
		}
		#wpadminbar .menupop .menupop>.ab-item:before { padding: 2px 0; }
    #wpadminbar #wp-admin-bar-wpsv-logo>.ab-item .ab-icon:before {
    	content: "";
    }
    #wpadminbar #wp-admin-bar-wpsv-logo.hover > .ab-item .ab-icon {
    	background-position: 0 0;
    }
		#wpadminbar>#wp-toolbar>#wp-admin-bar-top-secondary>#wp-admin-bar-search #adminbarsearch input.adminbar-input {
			margin-top: 8px;
			margin-right: 8px;
		}
		#wpadminbar #adminbarsearch { height: 48px; }
		#wpadminbar #adminbarsearch:before { top: 14px; }
		#wpadminbar>#wp-toolbar>#wp-admin-bar-top-secondary>#wp-admin-bar-search #adminbarsearch input.adminbar-input { height: 32px; }
		@media (min-width: 992px) {
			#wpadminbar #wp-admin-bar-wpsvse-mobile-search {
				display: none;
			}
			#wpadminbar #wp-admin-bar-search {
				display: list-item;
			}
		}
		@media screen and (max-width:989px){
			#wpadminbar #wp-admin-bar-search {
					display: none;
				}
		}
		@media screen and (max-width:782px){
				#wpadminbar .ab-icon, #wpadminbar .ab-item:before, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon {
					padding: 0;
				}
				#wpadminbar>#wp-toolbar #wp-admin-bar-wpsv-logo .ab-icon {
					width: 48px;
				}
				#wpadminbar #wp-admin-bar-wpsvse-mobile-login,
				#wpadminbar #wp-admin-bar-wpsvse-mobile-register,
				#wpadminbar #wp-admin-bar-wpsvse-mobile-search
				 {
					display: list-item;
					padding-left: 8px;
				}
				#wpadminbar #wp-admin-bar-wpsvse-mobile-search {
					padding-right: 8px;
				}
		}
		.wpseo-score-icon { margin: 18px 10px 0 4px!important; }
		html.wp-toolbar { padding-top: 48px; }
		#wpadminbar #wp-admin-bar-my-account.with-avatar>a img {
			border: none;
			background: none;
		}
    </style>
    ';
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
  if(!is_user_logged_in()) {
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
  if(!is_user_logged_in()) {
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
}
add_action( 'admin_bar_menu', 'wpsvse_remove_bplogin_link', 999 );
