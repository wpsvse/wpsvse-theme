<?php
/**
 * Category output for page addon
 */

global $dlm_download, $dlm_page_addon;
?>
<div class="file-info">
	<a class="download-link" href="<?php echo $dlm_page_addon->get_download_info_link( $dlm_download ); ?>" rel="nofollow"> 
	<?php echo $dlm_download->get_the_image( 'thumbnail' ); ?><?php $dlm_download->the_title(); ?> <?php echo $dlm_download->get_the_version_number();?><?php if ( get_post_meta($post->ID, 'dlm_extra_att', true) !== '') { echo ' <p>' . get_post_meta($post->ID, 'dlm_extra_att', true) . '</p>'; } ?></a> - <?php echo $dlm_download->get_the_filesize(); ?>
	<br />
	<span class="dl-date-time"><i class="fa fa-clock-o"></i> <?php echo date_i18n( get_option( 'date_format' ), strtotime( $dlm_download->post->post_date ) ); ?></span> <span class="dl-stats"><i class="fa fa-bar-chart"></i> Nedladdad <?php echo sprintf( _n( '1 gång', '%d gånger', $dlm_download->get_the_download_count(), 'dlm_page_addon' ), $dlm_download->get_the_download_count() ); ?></span>
</div>

<a href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow" class="btn btn-primary"><i class="fa fa-cloud-download"></i> Ladda ner</a>