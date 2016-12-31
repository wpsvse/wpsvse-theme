<?php
/**
 * Custom metabox fields using the CMB2 class
 *
 * @package WordPress Sverige
 */

//**************************************************
// Initiate CMB2 class for metaboxes
//**************************************************
if ( file_exists(  __DIR__ .'/../inc-embedded/cmb2/init.php' ) ) {
	require_once  __DIR__ .'/../inc-embedded/cmb2/init.php';
}

//**************************************************
// Metaboxes for front page downloads
//**************************************************

add_action( 'cmb2_admin_init', 'wpsvse_front_page_fields' );

function wpsvse_front_page_fields() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'frontpage_data';

	$cmb_meta = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Övriga fält', 'wpsvse' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_on' => array( 'key' => 'front-page', 'value' => '' ), // Specific post IDs to display this metabox
	));

	$cmb_meta->add_field( array(
		'name'    => 'Topprubrik för hero-bilden',
		'desc'    => '',
		'default' => '',
		'id'      => "{$prefix}_head_title_top",
		'type'    => 'text',
	) );

	$cmb_meta->add_field( array(
		'name'    => 'Underrubrik för hero-bilden',
		'desc'    => '',
		'default' => '',
		'id'      => "{$prefix}_head_title",
		'type'    => 'text',
	) );

	$cmb_meta->add_field(array(
		'name'    => 'Beskrivningstext (efter header)',
		'desc'    => 'Beskrivningstext längre ner på sidan',
		'id'      => "{$prefix}_description_bottom",
		'type'    => 'wysiwyg',
		'options' => array(),
	));
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

//**************************************************
// Repeatable metaboxes for FAQ pages
//**************************************************
add_action( 'cmb2_admin_init', 'wpsvse_faq_page_field_groups' );
/**
 * Hook in and add a metabox to repeatable grouped fields
 */
function wpsvse_faq_page_field_groups() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_faq_group_';
	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Poster för vanliga frågor', 'wpsvse' ),
		'object_types' => array( 'page', ),
		'show_on_cb' => array( 'key' => 'page-template', 'value' => 'page-faq.php' ),
	) );
	// $group_field_id is the field id string
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'faq',
		'type'        => 'group',
		'description' => __( 'Generera paneler för vanliga frågor', 'wpsvse' ),
		'options'     => array(
			'group_title'   => __( 'Post {#}', 'wpsvse' ), // {#} gets replaced by row number
			'add_button'    => __( 'Lägg till post', 'wpsvse' ),
			'remove_button' => __( 'Ta bort post', 'wpsvse' ),
			'sortable'      => true, // beta
		),
	) );
	/**
	 * The parent field's id needs to be passed as the first argument
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Fråga', 'wpsvse' ),
		'id'         => 'question',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Svar', 'wpsvse' ),
		'description' => __( 'Ange svaret på frågan som ställs.', 'wpsvse' ),
		'id'          => 'answer',
		'type'   			=> 'wysiwyg',
		'options' 		=> array( 'textarea_rows' => 10, ),
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Permalänk', 'wpsvse' ),
		'description' => __( 'Anges <strong>endast</strong> med små bokstäver och bindestreck. (Undvik svenska tecken).', 'wpsvse' ),
		'id'         => 'permalink',
		'type'       => 'text_small',
	) );
}
