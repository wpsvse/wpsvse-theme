<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordPress Sverige
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" type='image/x-icon' href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( is_page('prenumerera') ) { ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>

	<div class="top-part">
		<!-- Start Header -->
		<header id="header">
		<div class="container">
			<div class="row">
			<!-- Start Navigation -->
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Start Logo / Text -->
					<a class="navbar-brand text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-64.png" alt="logo"><span>WordPress</span>Sverige</a>
					<!-- End Logo / Text -->
				</div>
				<div class="navbar-collapse collapse">
					<?php wp_nav_menu( array( 'theme_location' => 'primary','container' => false,'items_wrap' => '<ul id="menu" class="nav navbar-nav %2$s">%3$s</ul>', 'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 'walker' => new wp_bootstrap_navwalker() ) ); ?>
				</div>
			</nav>
			</div>
		<!-- End Navigation -->
		</div>
		</header>
		<!-- End Header -->
  <?php if ( !is_front_page() ) { ?>
	</div>
	<!-- End Top-part -->
  <?php } ?>
