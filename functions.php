<?php
/**
 * fighter functions and definitions
 *
 * @package fighter
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 670; /* pixels */
}

if ( ! function_exists( 'fighter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fighter_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fighter, use a find and replace
	 * to change 'fighter' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fighter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 100, 100, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fighter' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fighter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // fighter_setup
add_action( 'after_setup_theme', 'fighter_setup' );


register_default_headers( array(
			'Photo 1' => array(
				'url'           => '%s/images/header.jpg',
				'thumbnail_url' => '%s/images/header-thumbnail.jpg',
				'description'   => _x( 'Photo 1', 'header image description', '' )
			),
			'Photo 2' => array(
				'url'           => '%s/images/header-2.jpg',
				'thumbnail_url' => '%s/images/header-2-thumbnail.jpg',
				'description'   => _x( 'Photo 2', 'header image description', '' )
			)
		) );
add_action( 'after_setup_theme', 'fighter_setup');
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function fighter_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fighter' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'fighter' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'fighter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fighter_scripts() {
	wp_enqueue_style( 'fighter-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fighter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fighter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fighter_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';