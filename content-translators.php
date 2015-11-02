<?php
/**
 * @package WordPress Sverige
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
    <div class="project-entry-content clearfix">
				<?php 
					$translation_user = get_post_meta($post->ID, '_wpsvse_translator_user_se', true);
					$user = get_user_by( 'slug', $translation_user );
					$user_email = $user->user_email;
				?>
        <h2 class="project-entry-title"><?php echo get_avatar( $user_email, 128 ); ?> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        
				<div class="project-meta">
					<div class="project-sv-translate"><i class="fa fa-wordpress"></i> <a href="https://profiles.wordpress.org/<?php the_title_attribute(); ?>" title="Användarens profil på WordPress.org">Visa profil på WordPress.org</a></div>
					<?php if ( get_post_meta($post->ID, '_wpsvse_translator_user_se', true) !='' ) { ?><div class="project-sv-repository"><i class="fa fa-user"></i> <a href="http://wpsv.se/medlemmar/<?php echo $translation_user; ?>/profile/" title="Användarens profil på WordPress Sverige">Visa profil på WordPress Sverige</a></div><?php } ?>
				</div>
        <div class="project-editors row">
					<ul>
					<?php foreach ( $post->connected as $post ) : setup_postdata( $post );
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
					 $project_id = get_post_meta($post->ID, '_wpsvse_project_project_id', true); ?>
							<li class="col-md-4">
							<div class="translation-user validator-project clearfix">
								<?php echo $project_icon; ?>
								<div class="profile-link wporg"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
								<div class="project-link-icons"><a href="https://translate.wordpress.org/locale/sv/default/<?php echo $project_type; ?>/<?php echo $project_id; ?>" title="Svenskt översättningsprojekt på WordPress.org"><i class="fa fa-language"></i></a><?php if ( !has_term( array ( 'meta','app','wordpress' ), 'wpsvse_project_type' ) ) { ?><a href="https://sv.wordpress.org/<?php echo $project_page; ?>/<?php echo $project_id; ?>/" title="Tema/tillägg i katalogen på WordPress.org"><i class="fa fa-wordpress"></i></a><?php } ?></div>
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
