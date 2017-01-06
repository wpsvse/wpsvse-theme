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

//**************************************************
// Shortcode [personer]
//**************************************************
function wpsvse_personer_shortcode( $atts, $content = null ) {

	$person_query = new WP_Query(array(
			'post_type' => 'person',
			'order' => 'ASC',
			'limit' => -1
		)
	);

	ob_start();
	?>

	<?php /* @var $person WP_Post */ ?>
	<?php foreach($person_query->posts as $person) : ?>

		<div class="col-md-4 m-b-lg">
			<div class="panel panel-default panel-profile m-b-0">
	    	<div class="panel-heading" style="background-color: #21759b; background-image: url(//cdn.shopify.com/s/files/1/0691/5403/t/130/assets/insta-2.jpg?1331440162089783574);"></div>
	      <div class="panel-body text-center">
	        <img class="panel-profile-img" src="//cdn.shopify.com/s/files/1/0691/5403/t/130/assets/avatar-fat.jpg?1331440162089783574">
	        <h5 class="panel-title"><?php echo get_the_title($person->ID); ?></h5>
	        <p class="m-b">body......</p>
	          <span class="fa fa-twitter btn btn-primary profile-button"> <a href=""> Twitter </a> </span>
						<span class="fa fa-github btn btn-primary profile-button"> <a href=""> Github </a> </span>
						<span class="fa fa-linkedin btn btn-primary profile-button"> <a href=""> Linkedin </a> </span>
	      </div>
	    </div>
		</div>

		<?php var_dump(get_post_meta($person->ID)); ?>

	<?php endforeach; ?>

	<?php
	return ob_get_clean();
}
add_shortcode( 'personer', 'wpsvse_personer_shortcode' );
