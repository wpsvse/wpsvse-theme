<?php
/**
 * Default output for a download via the [download] shortcode
 */

global $dlm_download, $dlm_page_addon;
?>
<a class="download-link" href="<?php echo $dlm_page_addon->get_download_info_link( $dlm_download ); ?>" rel="nofollow">
	<?php $dlm_download->the_title(); ?> (<?php printf( _n( '1', '%d', $dlm_download->get_the_download_count(), 'dlm_page_addon' ), $dlm_download->get_the_download_count() ) ?>)
</a>