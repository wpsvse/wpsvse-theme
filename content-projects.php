<?php
/**
 * @package WordPress Sverige
 */
 
 // Get some data to manipulate
 if ( has_term( 'tillagg', 'wpsvse_project_type' ) ) {
	 $project_type = 'wp-plugins';
	 $project_page = 'plugins';
	 $project_icon = '<span class="fa-stack icon-plugin" title="Tillägg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-plug fa-stack-1x fa-inverse"></i></span> ';
 } elseif ( has_term( 'tema', 'wpsvse_project_type' ) ) {
	 $project_type = 'wp-themes';
	 $project_page = 'themes';
	 $project_icon = '<span class="fa-stack icon-theme" title="Tema"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-paint-brush fa-stack-1x fa-inverse"></i></span> ';
 } elseif ( has_term( 'app', 'wpsvse_project_type' ) ) {
	 $project_type = 'apps';
	 $project_page = '';
	 $project_icon = '<span class="fa-stack icon-app" title="App"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-tablet fa-stack-1x fa-inverse"></i></span> ';
 } elseif ( has_term( 'meta', 'wpsvse_project_type' ) ) {
	 $project_type = 'meta';
	 $project_page = '';
	 $project_icon = '<span class="fa-stack icon-meta" title="Meta"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-info-circle fa-stack-1x fa-inverse"></i></span> ';
 } elseif ( has_term( 'wordpress', 'wpsvse_project_type' ) ) {
	 $project_type = 'wp';
	 $project_page = '';
	 $project_icon = '<span class="fa-stack" title="WordPress"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-wordpress fa-stack-1x fa-inverse"></i></span> ';
 }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
    <div class="project-entry-content clearfix">
        <h2 class="project-entry-title"><?php echo $project_icon; ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php $project_id = get_post_meta($post->ID, '_wpsvse_project_project_id', true); ?>
				<div class="project-meta">
					<div class="project-type"><i class="fa fa-folder"></i> <?php echo get_the_term_list( $post->ID, 'wpsvse_project_type', '', '', '' ); ?></div>
					<div class="project-sv-translate"><i class="fa fa-language"></i> <a href="https://translate.wordpress.org/locale/sv/default/<?php echo $project_type; ?>/<?php echo $project_id; ?>" title="Svenskt översättningsprojekt på WordPress.org">Visa översättningsprojekt</a></div>
					<?php if ( !has_term( array ( 'meta','app','wordpress' ), 'wpsvse_project_type' ) ) { ?><div class="project-sv-repository"><i class="fa fa-wordpress"></i> <a href="https://sv.wordpress.org/<?php echo $project_page; ?>/<?php echo $project_id; ?>/" title="Tema/tillägg i katalogen på WordPress.org">Visa i katalogen på WordPress.org</a></div><?php } ?>
				</div>
        <div class="project-editors row">
					<ul>
					<?php foreach ( $post->connected as $post ) : setup_postdata( $post );?>
							<li class="col-md-4">
							<div class="translation-user clearfix">
								<?php 
									$translation_user = get_post_meta($post->ID, '_wpsvse_translator_user_se', true);
									$user = get_user_by( 'slug', $translation_user );
									$user_email = $user->user_email;
									echo get_avatar( $user_email, 128 );
								?>
								<div class="profile-link wporg"><a href="https://profiles.wordpress.org/<?php the_title_attribute(); ?>" title="Profil på WordPress.org"><?php the_title(); ?></a></div>
								<div class="profile-link wpse"><?php if ( $translation_user !='' ) { ?><a href="http://wpsv.se/medlemmar/<?php echo $translation_user; ?>/profile/" title="Profil på WordPress Sverige">@<?php echo $translation_user; ?></a> på wpsv.se<?php } else { ?><small><em>Ingen användare angiven för wpsv.se</em></small><?php } ?></div>
							</div>
							</li>
					<?php endforeach; ?>
					<?php 
					// Prevent weirdness
					wp_reset_postdata();					
					?>
					</ul>
					
        </div>
    </div><!-- .entry-meta -->
    
</article><!-- #post-## -->
