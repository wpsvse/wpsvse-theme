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
            'orderby' => 'title',
			'order' => 'ASC',
			'posts_per_page' => -1
		)
	);

	ob_start();
	?>

	<?php /* @var $person WP_Post */ ?>
	<?php foreach($person_query->posts as $person) : ?>

        <?php
		$background_image_data = wp_get_attachment_image_src(get_post_meta($person->ID, 'background_image_id', true), 'large');
		$background_image_url = isset($background_image_data[0]) ? esc_attr($background_image_data[0]) : null;

		$avatar_data = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID), 'about-grid-image');
		$avatar_url = isset($avatar_data[0]) ? esc_attr($avatar_data[0]) : null;
        ?>

        <div class="col-md-4 m-b-lg wpsv-profile">
            <div class="panel panel-default panel-profile m-b-0">
                <div class="panel-heading" style="background-color: #21759b; <?php echo $background_image_url ? "background-image: url({$background_image_url});" : ''; ?>"></div>
                <div class="panel-body text-center">
                    <img class="panel-profile-img" src="<?php echo $avatar_url; ?>">
                    <h5 class="panel-title"><?php echo get_the_title($person->ID); ?></h5>
                    <p class="m-b"><?php echo wp_strip_all_tags($person->post_content); ?></p>

                    <?php if($twitter = get_post_meta($person->ID, 'twitter', true)): ?>
                    <span class="fa fa-twitter btn btn-primary profile-button"> <a href="<?php echo esc_attr($twitter); ?>"> Twitter </a> </span>
                    <?php endif; ?>

	                <?php if($github = get_post_meta($person->ID, 'github', true)): ?>
                        <span class="fa fa-github btn btn-primary profile-button"> <a href="<?php echo esc_attr($github); ?>"> Github </a> </span>
	                <?php endif; ?>

	                <?php if($linkedin = get_post_meta($person->ID, 'linkedin', true)): ?>
                        <span class="fa fa-linkedin btn btn-primary profile-button"> <a href="<?php echo esc_attr($linkedin); ?>"> Linkedin </a> </span>
	                <?php endif; ?>

                </div>
            </div>
        </div>

	<?php endforeach; ?>

    <div class="clearfix"></div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'personer', 'wpsvse_personer_shortcode' );
