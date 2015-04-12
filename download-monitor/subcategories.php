<?php
global $dlm_page_addon;

$categories = get_terms( 'dlm_download_category', apply_filters( 'dlm_page_addon_get_category_args', array(
	'orderby'    => 'name',
	'order'      => 'ASC',
	'hide_empty' => true,
	'parent'     => $term->term_id,
	'exclude'    => array_filter( array_map( 'absint', explode( ',', $exclude_categories ) ) )
) ) );

if ( ! $categories )
	return;
?>
<ul class="download-monitor-subcategories">
	<li><?php _e( 'Subcategories:', 'dlm_page_addon' ); ?></li>
	<?php
		foreach ( $categories as $term ) {
			?><li><a href="<?php echo $dlm_page_addon->get_category_link( $term ); ?>"><?php echo $term->name . ' (' . $term->count . ')';; ?></a></li><?php
		}
	?>
</ul>