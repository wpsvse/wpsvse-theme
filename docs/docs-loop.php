<div id="buddypress">

<?php include( apply_filters( 'bp_docs_header_template', bp_docs_locate_template( 'docs-header.php' ) ) ) ?>

<?php if ( is_post_type_archive('bp_doc') ) { echo '<h2>Innehållsförteckning</h2>'; } ?>

<div class="docs-info-header">
	<?php bp_docs_info_header(); ?>
</div>

 <?php  
 $myDoccats = get_terms('bp_docs_associated_item','child_of=0&hide_empty=0'); 

	foreach ($myDoccats as $cat) :
	$args = array(
		'post_type' => 'bp_doc',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'bp_docs_associated_item',
				'field' => 'id',
				'terms' => array( $cat->term_id ),
				'operator' => 'IN'
			)
		)
	);

	$myInDocQuery = new WP_Query($args); 

	if ($myInDocQuery->have_posts()) : ?>
	<div>
	<h3><?php echo $cat->name; ?></h3>
	<ul>  
	<?php while ($myInDocQuery->have_posts()) : $myInDocQuery->the_post(); ?>

	<li>
		<a class="doc-permalink" href="<?php the_permalink(); ?>" title="<?php if ( bp_docs_get_excerpt_length() ) : ?><?php echo get_the_excerpt(); ?><?php endif; ?>"><?php the_title(); ?></a>
		<span class="bp-docs-trash-notice"><?php bp_docs_doc_trash_notice(); ?></span> 
		<?php
		if ( current_user_can( 'bp_docs_edit', get_the_ID() ) ) {
			echo '<a href="' . bp_docs_get_doc_link() . BP_DOCS_EDIT_SLUG . '" class="bp-docs-edit-link" title="Redigera"><i class="fa fa-pencil-square-o"></i></a>';
		}
		?>
		<span class="bp-docs-date">(Senast uppdaterat <?php echo get_the_modified_date(); ?>)</span>
	</li>

<?php
endwhile; 
echo '</ul></div>'; 
?>

<?php else : 
	echo '<h3>'.$cat->name.'</h3>';
	echo '<p><em>Det finns för närvarande inga dokument under <strong>'.$cat->name.'</strong>. ';
if ( bp_docs_current_user_can_create_in_context() ) {
	echo 'Varför inte <a href="'. bp_docs_get_create_link() .'">skapa ett</a>!';
}
	echo '</em></p>';
endif; 
wp_reset_query();
endforeach; 
?>

</div><!-- /#buddypress -->
