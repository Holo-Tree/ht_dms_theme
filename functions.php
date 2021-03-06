<?php
/**
 * htdms_theme functions and definitions
 *
 * @package htdms_theme
 */

/**
 * Set HT_DMS_THEME constant true
 *
 * @since 0.0.1
 */
define( 'HT_DMS_THEME', true );
/**
 * Define version in a constant
 *
 * @since 0.0.1
 */
if ( !defined( 'HT_DMS_THEME_VERSION' ) ) {
	define( 'HT_DMS_THEME_VERSION', '0.0.1' );
}
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'htdms_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function htdms_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on htdms_theme, use a find and replace
	 * to change 'htdms_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'htdms_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'off-canvas-right' => __( 'Right Off Canvas Menu', 'htdms_theme' ),
		'off-canvas-left' => __( 'Left Off Canvas Menu', 'htdms_theme' ),
	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'htdms_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // htdms_theme_setup
add_action( 'after_setup_theme', 'htdms_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function htdms_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'htdms_theme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'Off Canvas Left Sidebar', 'htdms_theme' ),
		'id'            => 'offcanvas-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'Off Canvas Right Sidebar', 'htdms_theme' ),
		'id'            => 'offcanvas-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'htdms_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function htdms_theme_scripts() {
	wp_enqueue_style( 'htdms_theme-style', get_stylesheet_uri(), array(), HT_DMS_THEME_VERSION );

	wp_enqueue_script( 'htdms_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), HT_DMS_THEME_VERSION, true );

	wp_enqueue_script( 'htdms_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), HT_DMS_THEME_VERSION, true );

	wp_enqueue_script( 'ht-dms-theme', get_stylesheet_directory_uri().'/js/theme-functions.min.js', array( 'jquery', 'foundation' ), HT_DMS_THEME_VERSION, true );

	//data for ajaxing
	$data = get_stylesheet_directory_uri().'/inc/preloader.gif';

	wp_localize_script( 'ht-dms-theme', 'htdms_theme', $data );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'htdms_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Add Foundation
 */
require get_template_directory() . '/inc/foundation.php';

if ( ! function_exists( 'htdms_theme_sidebar' ) ) :
/**
 * Sidebar function
 *
 * @since 0.0.1
 */
function htdms_theme_sidebar( $name = null ) {
	/**
	 * Filter to override which sidebar we are using.
	 *
	 * @see https://core.trac.wordpress.org/ticket/26636
	 *
	 * @since 0.0.1
	 */
	$name = apply_filters( 'htdms_theme_get_sidebar', $name );
	$view = trailingslashit( HT_DMS_VIEW_DIR ) . $name . '.php';

	/**
	 * Filter to prevent sidebar
	 *
	 * @param bool
	 *
	 * @since 0.0.1
	 */
	if ( apply_filters( 'htdms_theme_no_sidebar', FALSE ) === FALSE ) {
		if ( file_exists( $view ) ) {
			pods_view( $view, $expires = DAY_IN_SECONDS, $cache_mode = 'cache' );
		}
		else {

			get_sidebar( $name );
		}
	}

}
endif;

if ( ! function_exists( 'htdms_theme_header' ) ) :
	/**
	 * Header function
	 *
	 * @param 	string	$name	Name of header.
	 *
	 * @returns	string			The header.
	 */
	function htdms_theme_header( $name = null ) {
		/**
		 * Override which header is returned;
		 *
		 * @param string $name Name of header.
		 *
		 * @since 0.0.1
		 */
		$name = apply_filters( 'htdms_theme_header', $name );
		pods_view( get_header( $name ), $expires = DAY_IN_SECONDS, $cache_mode = 'cache' );
	}
endif;

if ( ! function_exists( 'htdms_theme_footer' ) ) :
	/**
	 * footer function
	 *
	 * @param 	string	$name	Name of footer.
	 *
	 * @returns	string			The footer.
	 */
	function htdms_theme_footer( $name = null ) {
		/**
		 * Override which footer is returned;
		 *
		 * @param string $name Name of footer.
		 *
		 * @since 0.0.1
		 */
		$name = apply_filters( 'htdms_theme_footer', $name );
		pods_view( get_footer( $name ), $expires = DAY_IN_SECONDS, $cache_mode = 'cache' );
	}
endif;