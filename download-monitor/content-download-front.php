<?php
/**
 * Download button for front page
 */

global $dlm_download;
?>
<a class="btn btn-dl download-link-front" href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow"><i class="fa fa-cloud-download"></i>
	<?php printf( __( '%s ', 'download-monitor' ), $dlm_download->get_the_title() ); 
	if ( $dlm_download->has_version_number() ) {
		printf( __( '%s', 'download-monitor' ), $dlm_download->get_the_version_number() );
	} ?>&nbsp;<?php if ( get_post_meta($post->ID, 'dlm_extra_att', true) !== '') { echo ' <p>' . get_post_meta($post->ID, 'dlm_extra_att', true) . '</p>'; } ?>
	<br /><span>Det officiella paketet från wordpress.org</span>
</a>