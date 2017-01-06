<?php
add_action( 'init', 'cptui_register_my_cpts_person' );

function cptui_register_my_cpts_person() {
	$labels = array(
		"name" => __( 'Nyckelpersoner', 'wpsvse' ),
		"singular_name" => __( 'Nyckelperson', 'wpsvse' ),
	);

	$args = array(
		"label" => __( 'Nyckelpersoner', 'wpsvse' ),
		"labels" => $labels,
		"description" => "Nyckelpersoner inom WordPress Sverige",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false,
		"query_var" => false,
		"menu_icon" => "dashicons-universal-access",
		"supports" => array( "title", "editor", "thumbnail" ));

	register_post_type( "person", $args );

}