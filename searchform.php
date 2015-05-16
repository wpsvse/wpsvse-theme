<?php
/**
 * The template for displaying search forms in WordPress Sverige
 *
 * @package WordPress Sverige
 */
?>
<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-form-short">
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'wpsvse' ); ?></span>
		<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wpsvse' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="btn btn-primary right" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wpsvse' ); ?>">
</form>
