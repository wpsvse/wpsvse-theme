<?php
/**
 * WordPress Sverige functions and definitions
 *
 * @package WordPress Sverige
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'wpsvse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function wpsvse_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on WordPress Sverige, use a find and replace
	 * to change 'wpsvse' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wpsvse', get_template_directory() . '/languages' );

	/**
	 * Always show toolbar
	 */
	show_admin_bar( true );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	/**
	 * Extra image sizes
	 */
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'post-image', 850, 550, true );
	}

	/**
	 * Resizes avatars (buddypress)
	 */
	define ( 'BP_AVATAR_THUMB_WIDTH', 256 );
	define ( 'BP_AVATAR_THUMB_HEIGHT', 256 );
	define ( 'BP_AVATAR_FULL_WIDTH', 512 );
	define ( 'BP_AVATAR_FULL_HEIGHT', 512 );
	define ( 'BP_AVATAR_ORIGINAL_MAX_WIDTH', 512 );
	define ( 'BP_AVATAR_ORIGINAL_MAX_FILESIZE', 819200 );
	define ( 'BP_AVATAR_TINY_WIDTH', 50);
	define ( 'BP_AVATAR_TINY_HEIGHT', 50);

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Huvudmeny', 'wpsvse' ),
		'footer' => __( 'Sidfot', 'wpsvse' ),
	) );

	// Register Custom Navigation Walker
	require_once('inc/wp_bootstrap_navwalker.php');

}
endif; // wpsvse_setup
add_action( 'after_setup_theme', 'wpsvse_setup' );

if ( ! function_exists( 'wpsvse_widgets_init' ) ) :
/**
 * Register widgetized area and update sidebar with default widgets
 */
add_filter('widget_text', 'do_shortcode');

function wpsvse_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidofält', 'wpsvse' ),
		'id'            => 'sidebar-1',
		'description'   => 'Allmänt widgetfält för sidopaneler i generella mallar, så som t.ex sökresultat.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidofält för nyheter', 'wpsvse' ),
		'id'            => 'news-widgets',
		'description'   => 'Widgetfält för sidopaneler på nyhetssidor.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidofält för blogg', 'wpsvse' ),
		'id'            => 'blog-widgets',
		'description'   => 'Widgetfält för sidopaneler på bloggsidor.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidofält för filarkiv', 'wpsvse' ),
		'id'            => 'file-widgets',
		'description'   => 'Widgetfält för sidofält på bloggsidor.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Huvudsponsor', 'wpsvse' ),
		'id'            => 'sponsor-widget',
		'description'   => 'Widgetfält på startsidan för huvudsponsor.',
		'before_widget' => '<div id="%1$s" class="widget sponsor-link %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Widgets för 404', 'wpsvse' ),
		'id'            => 'error-404',
		'description'   => 'Widgetfält som visas på felsidan för 404.',
		'before_widget' => '<aside id="%1$s" class="col-md-4 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Gruppregler', 'wpsvse' ),
		'id'            => 'groups-creation-rules',
		'description'   => 'Widgetfält som används för att visa regler för att skapa nya grupper.',
		'before_widget' => '<div id="%1$s" class="box-shortcode box-info %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'TOS Registrering', 'wpsvse' ),
		'id'            => 'register-tos',
		'description'   => 'Widgetfält som används för att visa webbplatsens förhållningsregler vid registrering.',
		'before_widget' => '<div id="%1$s" class="register-tos-content %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidofält för översättningsprojekt', 'wpsvse' ),
		'id'            => 'translator-widgets',
		'description'   => 'Widgetfält för sidofält på sidor för översättningsprojekt och validatorer.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Flikar för Twitter', 'wpsvse' ),
		'id'            => 'tab-widget',
		'description'   => 'Widgetfält för flik-widget på startsidan.',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Slack (inloggad)', 'wpsvse' ),
		'id'            => 'slack-members',
		'description'   => 'Widgetfält för inbjudan till Slack (Medlemmar).',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Slack (inte inloggad)', 'wpsvse' ),
		'id'            => 'slack',
		'description'   => 'Widgetfält för inbjudan till Slack (ej inloggad).',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Twitter-flik - #wpse', 'wpsvse' ),
		'id'            => 'twitter-wpse',
		'description'   => 'Twitterwidget för #wpse.',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Twitter-flik - @WPSverige', 'wpsvse' ),
		'id'            => 'twitter-wpsverige',
		'description'   => 'Twitterwidget för @WPSverige.',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
}
endif;
add_action( 'widgets_init', 'wpsvse_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function wpsvse_scripts() {

	// Enqueue Stylesheets
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'dropdowns-enhancement-style', get_template_directory_uri() . '/css/dropdowns-enhancement.min.css' );
	// wp_enqueue_style( 'bbpress-style', get_template_directory_uri() . '/css/bbpress.css' );
	wp_enqueue_style( 'wpsvse-style', get_stylesheet_uri() );

	// Engueue Javascripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/dropdowns-enhancement.js', array('jquery'), '3.2.0', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.8.3' );
	wp_enqueue_script( 'HTML5shiv', get_template_directory_uri() . '/js/html5shiv.js', array('jquery'), '3.7.0' );
	wp_enqueue_script( 'respond_js', get_template_directory_uri() . '/js/respond.min.js', array('jquery'), '1.3.0' );
	wp_enqueue_script( 'magnific_popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'wpsvse-scripts', get_template_directory_uri() . '/js/wpsvse.js', array(), '20140719', true );

}
add_action( 'wp_enqueue_scripts', 'wpsvse_scripts' );

// Set editor style
add_filter('the_editor_content', 'wpsvse_add_editor_styles');
function wpsvse_add_editor_styles($content) {
    add_editor_style('css/wpsvse-editor-style.css');

    if ( ! is_admin() ) {
        global $editor_styles;
        $editor_styles = (array) $editor_styles;
        $stylesheet    = (array) $stylesheet;

        $stylesheet[] = 'css/wpsvse-editor-style.css';

        $editor_styles = array_merge( $editor_styles, $stylesheet );

    }
    return $content;
}

/*
 * Set WordPress email and name
 */
// Set from email
add_filter( 'wp_mail_from', 'wpsvse_mail_from' );
function wpsvse_mail_from( $email )
{
    return "utskick@wpsv.se";
}
// Set from name
add_filter( 'wp_mail_from_name', 'wpsvse_mail_from_name' );
function wpsvse_mail_from_name( $name )
{
    return "WordPress Sverige";
}

/**
 * Custom callback function for comments.
 */
require get_template_directory() . '/inc/wpsvse_comments.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom functions metaboxes
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Custom shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Branding and adminbar functions
 */
require get_template_directory() . '/inc/branding.php';

/**
 * Custom BuddyPress Docs
 */
// require get_template_directory() . '/inc/bp-doc-functions.php';
