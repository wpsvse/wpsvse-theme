<?php

add_action( 'init', 'wpsvse_cpt_blog' );

function wpsvse_cpt_blog() {

	$labels = array(
		'name' => _x( 'Blogginlägg', 'wpsvse' ),
		'singular_name' => _x( 'Blogginlägg', 'wpsvse' ),
		'add_new' => _x( 'Skapa nytt', 'wpsvse' ),
		'add_new_item' => _x( 'Skapa nytt blogginlägg', 'wpsvse' ),
		'edit_item' => _x( 'Redigera blogginlägg', 'wpsvse' ),
		'new_item' => _x( 'Nytt blogginlägg', 'wpsvse' ),
		'view_item' => _x( 'Visa blogginlägg', 'wpsvse' ),
		'search_items' => _x( 'Sök blogginlägg', 'wpsvse' ),
		'not_found' => _x( 'Inga blogginlägg funna', 'wpsvse' ),
		'not_found_in_trash' => _x( 'Inga blogginlägg funna i papperskorgen', 'wpsvse' ),
		'menu_name' => _x( 'Blogg', 'wpsvse' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments' ),
		'taxonomies' => array( 'blog_category', 'post_tag' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-nametag',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array(
			'slug' => 'blogg',
			'with_front' => true,
			'feeds' => true,
			'pages' => true
		),
		'capability_type' => 'post'
	);
	register_post_type( 'wpsvse_blog', $args );
}
/**
 * Register custom taxonomy for blog categories.
 */
add_action( 'init', 'wpsvse_taxonomy_categories' );
function wpsvse_taxonomy_categories() {
    $labels = array(
        'name' => _x( 'Bloggkategorier', 'wpsvse' ),
        'singular_name' => _x( 'Bloggkategori', 'wpsvse' ),
        'search_items' => _x( 'Sök bloggkategori', 'wpsvse' ),
        'popular_items' => _x( 'Populära bloggkategorier', 'wpsvse' ),
        'all_items' => _x( 'Alla bloggkategorier', 'wpsvse' ),
        'parent_item' => _x( 'Huvudkategori', 'wpsvse' ),
        'parent_item_colon' => _x( 'Bloggkategori', 'wpsvse' ),
        'edit_item' => _x( 'Redigera bloggkategori', 'wpsvse' ),
        'update_item' => _x( 'Uppdatera bloggkategori', 'wpsvse' ),
        'add_new_item' => _x( 'Lägg till ny bloggkategori', 'wpsvse' ),
        'new_item_name' => _x( 'Ny bloggkategori', 'wpsvse' ),
        'add_or_remove_items' => _x( 'Lägg till eller ta bort bloggkategorier', 'wpsvse' ),
        'choose_from_most_used' => _x( 'Välj bland mest använda bloggkategorier', 'wpsvse' ),
        'menu_name' => _x( 'Bloggkategorier', 'wpsvse' ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'blogg-kategori',
            'with_front' => true,
            'hierarchical' => true
        ),
        'query_var' => true
    );
    register_taxonomy( 'blog_category', array('wpsvse_blog'), $args );
}
