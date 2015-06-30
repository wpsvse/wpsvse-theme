<?php
/**
 * Custom metabox fields using the CMB2 class
 *
 * @package WordPress Sverige
 */

//**************************************************
// Initiate CMB2 class for metaboxes
//**************************************************
if ( file_exists(  __DIR__ .'/cmb2/init.php' ) ) {
	require_once  __DIR__ .'/cmb2/init.php';
}

//**************************************************
// Metaboxes for front page downloads
//**************************************************
add_action( 'cmb2_init', 'wpsvse_front_page_dl_metabox' );

function wpsvse_front_page_dl_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_dl_meta_';
	/**
	 * Metabox to be displayed on the front page
	 */
	$cmb_dl_meta = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Nedladdningsboxar', 'wpsvse' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on' => array( 'key' => 'front-page', 'value' => '' ), // Specific post IDs to display this metabox
	) );
	$cmb_dl_meta->add_field( array(
		'name' => __( 'Svensk nedladdning', 'wpsvse' ),
		'desc' => __( 'ID för den svenska nedladdningsboxen (ange ID för nedladdning, inte version).', 'wpsvse' ),
		'id'   => $prefix . 'sv_se',
		'type' => 'text_small',
	) );
	$cmb_dl_meta->add_field( array(
		'name' => __( 'Internationell nedladdning', 'wpsvse' ),
		'desc' => __( 'ID för den internationella nedladdningsboxen (ange ID för nedladdning, inte version).', 'wpsvse' ),
		'id'   => $prefix . 'inter',
		'type' => 'text_small',
	) );
}

//**************************************************
// Add CMB show_on filter for front page display
//**************************************************
function wpsvse_metabox_on_front_page( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return $display;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
add_filter( 'cmb2_show_on', 'wpsvse_metabox_on_front_page', 10, 2 );
