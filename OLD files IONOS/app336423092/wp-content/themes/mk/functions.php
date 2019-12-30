<?php
/**
 * Mk functions and definitions
 *
 * @package Mk
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'mk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mk_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Mk, use a find and replace
	 * to change 'mk' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	 
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio','gallery','quote','video'
	) );

	// Set up the WordPress core custom background feature.
	/*
	$args = array(
		'wp-head-callback' => 'custom_background_cb'
	);
	
	add_theme_support( 'custom-background', $args);
	*/
	// Gallery image size
	add_image_size('mk-galleries',550,600,true);
	add_image_size('mk-wide',720,380,true);
	add_image_size('archive-thumb',220,180,true);
	
	// Custom Headers
	
	$defaults = array( 
	'default-image' => get_template_directory_uri() . '/images/custom-header.jpg',
	 'random-default' => false,
	 'width' => 1280,
	 'height' => 280,
	 'flex-height' => false,
	 'flex-width' => false,
	 'default-text-color' => '',
	 'header-text' => true,
	 'uploads' => true,
	 'wp-head-callback' => '',
	 'admin-head-callback' => '',
	 'admin-preview-callback' => '',
 ); 
 
 add_theme_support( 'custom-header', $defaults );
	add_editor_style();
}
endif; // mk_setup
add_action( 'after_setup_theme', 'mk_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mk_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'mk' ),
		'id'            => 'mk-left-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Middle', 'mk' ),
		'id'            => 'mk-mid-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'mk' ),
		'id'            => 'mk-right-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Fixed Sidebar', 'mk' ),
		'id'            => 'mk-sidenav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	
}
add_action( 'widgets_init', 'mk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mk_scripts() {
	
	global $theme_name; 
	
	wp_enqueue_style( 'mk-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'mk-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'mk-theme', get_template_directory_uri() . '/css/mk.css' );
	wp_enqueue_style( 'mk-customscrollbars', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css' );
	
	wp_enqueue_style( 'mk-fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css' );
	wp_enqueue_style( 'mk-zocial', get_template_directory_uri() . '/fonts/zocial/zocial.css' );
	wp_enqueue_style( 'mk-pixons', get_template_directory_uri() . '/fonts/pixons/pixons.css' );
	 wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom-style.css' );
    $mask_color = get_theme_mod( 'mk_slide_mask_color' ); 
    $opacity = get_theme_mod('mk_slide_mask_opacity','5');
    //$sidenavtop_items_align = get_theme_mod('sidenavtop_items_align','center');
	$custom_inline_style = '';
    $custom_inline_style .= '.slides-container li:before { background: ' . $mask_color . '; opacity: .'.$opacity.' ;}';
	//$custom_inline_style .= '.sidebar-footer,.sidebar ul#side-menu li a, .sidebar{text-align: '.$sidenavtop_items_align.';}';
    wp_add_inline_style( 'custom-style', $custom_inline_style );
	
	if(is_home() || is_front_page()):
	wp_enqueue_script( 'mk-superslides', get_template_directory_uri() .'/js/jquery.superslides.js',array('jquery'), $theme_name, null, true );
	wp_enqueue_script( 'mk-home-slider-init', get_template_directory_uri() . '/js/mk-home-slider-init.js', array( 'jquery' ), '1.0',true );
	wp_localize_script( 'mk-home-slider-init', 'homeSLIDER', array(
	'slideSPEED' => get_theme_mod('mk_slide_speed','5000')
	) );

	endif;
	
	wp_enqueue_script( 'mk-metisMenu', get_template_directory_uri() .'/js/metisMenu.js',array('jquery'), $theme_name, null, true );
	wp_enqueue_script( 'mk-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.js',array('jquery'), $theme_name, null, true );
	wp_enqueue_script( 'mk-cycle-js', get_template_directory_uri() .'/js/jquery.cycle2.js',array('jquery'), $theme_name, null, true );
	wp_enqueue_script( 'mk-init', get_template_directory_uri() .'/js/mk-init.js', false,array('jquery'),$theme_name, null, true );
	wp_enqueue_script( 'mk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $theme_name, true );
	wp_enqueue_script( 'mk-custom-scrollbars', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array(), $theme_name, true );
	
	wp_enqueue_script( 'mk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js',array('jquery'), $theme_name, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
		}
		
		
add_action( 'wp_enqueue_scripts', 'mk_scripts' );

	

/**
 * Custom functions for this theme.
 */
 
define('FRAMEWORK_FUNCTIONS', get_template_directory() . '/LNT-framework/');
define('FRAMEWORK_FUNCTIONS_URI', get_template_directory_uri() . '/LNT-framework/');

//require_once('page-builder/pb-functions.php');

/**
 * Side navigation and custom menu functions
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-sidenav.php');
/**
 * Theme pagination class
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-pagination.php');
/**
 * Various presentation related functions
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-misc.php');
/**
 * Opening and closing html wrappers
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-layout-classes.php');

/**
 * Media grabber
 */
require (FRAMEWORK_FUNCTIONS . 'lnt_themes-media-grabber.php');

/**
 * Get the image
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-get-the-image.php');

/**
 * Resize images on the fly
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-image-resizer.php');

/**
 * Custom template tags for this theme.
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-extras.php');

/**
 * Customizer additions.
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-customizer.php');

/**
 * Load Jetpack compatibility file.
 */
require (FRAMEWORK_FUNCTIONS . 'lnt-jetpack.php');

/*
* Theme customizer functions
*
*/

// Helper library for the theme customizer.
require FRAMEWORK_FUNCTIONS . 'customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require FRAMEWORK_FUNCTIONS . 'customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require FRAMEWORK_FUNCTIONS . 'customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require FRAMEWORK_FUNCTIONS . 'customizer/mods.php';


if(function_exists('wp_get_theme')){
	$theme = wp_get_theme();
	$lnt_version = $theme->get('Version');
	$themename 	= $theme->get('Name');
	global $theme_name;
	$theme_name = $themename.'-'.$lnt_version;
}
