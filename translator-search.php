<?php
/**
 * Template for displaying custom Search Results pages.
 *
 * @package WordPress Sverige
 */

get_header(); ?>

    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
              <div class="col-md-12">
            	<h1 class="page-title">Översättningsvaliderare</h1>
              </div>
            </div>
        </div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
			 <?php if ( $post_type == 'wpsvse_projects' ) { ?>

        <div id="translation-projects" class="col-md-9">

				<p class="tp-breadcrumbs"><a href="<?php echo esc_url( home_url( '/oversattning/' ) ); ?>">Översättning</a> <i class="fa fa-angle-right"></i> <a href="<?php echo esc_url( home_url( '/oversattningsprojekt/' ) ); ?>">Översättningsprojekt</a> <i class="fa fa-angle-right"></i> <?php printf( __( 'Sökresultat för &quot;%s&quot;', 'wpsvse' ), '<span>' . get_search_query() . '</span>' ); ?></p>

				<?php if ( $wp_query->have_posts() ) : ?>

					<?php
					// Find connected pages (for all posts)
					p2p_type( 'translator_to_projects' )->each_connected( $wp_query );
					?>

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

									<?php	get_template_part( 'template-parts/content', 'projects' ); ?>

					<?php endwhile; ?>

							<?php wpsvse_content_nav( 'nav-below' ); ?>

					<?php else : ?>

					<div id="translator-search" class="row">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="col-md-6">
						<div>
							<i class="fa fa-search"></i>
							<label for="translator_search">Hitta projekt</label>
							<div class="input-group">
								<input class="form-control input-lg" type="text" id="translator_search" name="s" placeholder="Sök efter projekt...">
								<input type="hidden" name="post_type" value="wpsvse_projects" />
								<span class="input-group-btn">
									<input type="submit" class="btn btn-primary input-lg" value="Sök">
								</span>
							</div>
						</div>
					</form>
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="col-md-6">
						<div>
							<i class="fa fa-search"></i>
							<label for="translator_search">Hitta validerare</label>
							<div class="input-group">
								<input class="form-control input-lg" type="text" id="translator_search" name="s" placeholder="Sök efter validerare...">
								<input type="hidden" name="post_type" value="wpsvse_translators" />
								<span class="input-group-btn">
									<input type="submit" class="btn btn-primary input-lg" value="Sök">
								</span>
							</div>
						</div>
					</form>
					</div>

					<p>Inga resultat kunde hittas för din sökning.</p>

					<?php endif; ?>

				</div>

				<?php } elseif ( $post_type == 'wpsvse_translators' ) { ?>

        <div id="translation-projects" class="col-md-9 validators">

				<p class="tp-breadcrumbs"><a href="<?php echo esc_url( home_url( '/oversattning/' ) ); ?>">Översättning</a> <i class="fa fa-angle-right"></i> <a href="<?php echo esc_url( home_url( '/oversattningsvaliderare/' ) ); ?>">Översättningsvaliderare</a> <i class="fa fa-angle-right"></i> <?php printf( __( 'Sökresultat för &quot;%s&quot;', 'wpsvse' ), '<span>' . get_search_query() . '</span>' ); ?></p>

				<?php if ( $wp_query->have_posts() ) : ?>

					<?php
					// Find connected pages (for all posts)
					p2p_type( 'translator_to_projects' )->each_connected( $wp_query );
					?>

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

									<?php	get_template_part( 'template-parts/content', 'translators' ); ?>

							<?php endwhile; ?>

							<?php wpsvse_content_nav( 'nav-below' ); ?>

					<?php else : ?>

					<div id="translator-search" class="row">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="col-md-6">
						<div>
							<i class="fa fa-search"></i>
							<label for="translator_search">Hitta projekt</label>
							<div class="input-group">
								<input class="form-control input-lg" type="text" id="translator_search" name="s" placeholder="Sök efter projekt...">
								<input type="hidden" name="post_type" value="wpsvse_projects" />
								<span class="input-group-btn">
									<input type="submit" class="btn btn-primary input-lg" value="Sök">
								</span>
							</div>
						</div>
					</form>
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="col-md-6">
						<div>
							<i class="fa fa-search"></i>
							<label for="translator_search">Hitta validerare</label>
							<div class="input-group">
								<input class="form-control input-lg" type="text" id="translator_search" name="s" placeholder="Sök efter validerare...">
								<input type="hidden" name="post_type" value="wpsvse_translators" />
								<span class="input-group-btn">
									<input type="submit" class="btn btn-primary input-lg" value="Sök">
								</span>
							</div>
						</div>
					</form>
					</div>

					<p>Inga resultat kunde hittas för din sökning.</p>

					<?php endif; ?>

				</div>

				<?php } ?>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

<?php get_footer(); ?>
