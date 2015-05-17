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
    #wpadminbar>#wp-toolbar #wp-admin-bar-wp-logo .ab-icon { 
        background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/icons/brand-icon.png) !important; 
        background-position: 0 5px;
        background-repeat: no-repeat;
        width: 24px;
    }
    #wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
        content: "";
    }
    #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
        background-position: 0 0;
    }   
    </style>
    ';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpsvse_brand_logo');