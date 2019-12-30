<?php
/**
 * Theme functions and definitions
 *
 * @package Photoline Lite
 */


/**
 * Only works in WordPress 4.3 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Set the content width for theme design
 */
if ( ! isset( $content_width ) ) {
	$content_width = 860; /* pixels */
}

if ( ! function_exists( 'photoline_content_width' ) ) :

	function photoline_content_width() {
		global $content_width;

		if ( is_front_page() || is_page_template( array( 'page-templates/fullpage.php', 'page-templates/home-one.php' ) ) ) {
			$content_width = 1200;
		}
	}

endif;
add_action( 'template_redirect', 'photoline_content_width' );

if ( ! function_exists( 'photoline_setup' ) ) :
function photoline_setup() {

	 /** Markup for search form, comment form, and comments
	 * valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/**
	 * Make theme available for translation
	 */
	load_theme_textdomain( 'photoline-lite', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', photoline_fonts_url() ) );

	/*
	 * Let WordPress 4.1+ manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
                set_post_thumbnail_size( 300, 300, true );

                add_image_size( 'photoline-aside', 800, 1200, true );
                add_image_size( 'photoline-medium', 1200, 980, true );
                add_image_size( 'photoline-big', 1600, 1200, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'top' => __( 'Top Menu', 'photoline-lite' ),
		'primary' => __( 'Primary Menu', 'photoline-lite' ),
		'social' => __( 'Social Menu', 'photoline-lite' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'image', 'video', 'audio', 'quote', 'link', 'aside', 'status' ) );

	/**
	 * Setup the WordPress core custom header image.
	 */
	add_theme_support( 'custom-header', apply_filters( 'photoline_custom_header_args', array(
                                'header-text'            => true,
		'default-text-color'     => '2d2d2d',
		'width'                  => 1020,
		'height'                 => 450,
		'flex-height'            => true,
                                'flex-width'    => true
	) ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'photoline_custom_background_args', array(
		'default-color' => 'FFFFFF',
	) ) );
}
endif; // photoline_setup
add_action( 'after_setup_theme', 'photoline_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function photoline_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Posts', 'photoline-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Pages', 'photoline-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
       register_sidebar(array(
            'name' => __('Blog Intro', 'photoline-lite'),
            'description' => __('The headline area Blog page.', 'photoline-lite'),
            'id' => 'blog-intro',
            'before_title' => '<h1 class="intro-txt">',
            'after_title' => '</h1>',
            'before_widget' => '<div class="blog-widget clearfix">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Home Top', 'photoline-lite'),
            'description' => __('The area Home Page template at the top - above - page content in one line with no columns', 'photoline-lite'),
            'id' => 'home-top',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<div class="home-widget">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Home Above', 'photoline-lite'),
            'description' => __('The area Home Page template at the above page content in 2,3,4 column.', 'photoline-lite'),
            'id' => 'home-above',
            'before_title' => '<p class="widget-title">',
            'after_title' => '</p>',
            'before_widget' => '<div class="col">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Home Below', 'photoline-lite'),
            'description' => __('The area Home Page template at the below page content in 2,3,4 column.', 'photoline-lite'),
            'id' => 'home-below',
            'before_title' => '<p class="widget-title">',
            'after_title' => '</p>',
            'before_widget' => '<div class="col">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Footer Left', 'photoline-lite'),
            'description' => __('Located in the footer left.', 'photoline-lite'),
            'id' => 'footer1',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Footer Center', 'photoline-lite'),
            'description' => __('Located in the footer center.', 'photoline-lite'),
            'id' => 'footer2',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Footer Right', 'photoline-lite'),
            'description' => __('Located in the footer right.', 'photoline-lite'),
            'id' => 'footer3',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>'
        ));
}
add_action( 'widgets_init', 'photoline_widgets_init' );

/**
 * Register Google fonts for Theme
 * Better way
 */
if ( ! function_exists( 'photoline_fonts_url' ) ) :

function photoline_fonts_url() {
    $fonts_url = '';
 
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'photoline-lite' );
 
    if ( 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300italic,400italic,700italic,400,600,700,300';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,cyrillic' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}
endif;

/**
 *=Enqueue scripts
 */
function photoline_scripts() {
	// styles
    wp_enqueue_style( 'photoline-style', get_stylesheet_uri() );
				
	wp_enqueue_style( 'photoline-fonts', photoline_fonts_url(), array(), null );

	wp_enqueue_style( 'font-genericons', get_template_directory_uri() . '/genericons/genericons.css?v=3.4' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css?v=4.4' );

	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );

	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array( 'jquery' ), '25062015', true );

	wp_enqueue_style( 'style-flexslider', get_template_directory_uri() . '/css/flexslider.css?v=25062015' );

	wp_enqueue_style('style-prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css?v=25062015' );

	// scripts
	wp_enqueue_script( 'jquery-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '1.0', true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '25062015', true );

	wp_enqueue_script( 'photoline-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '25062015', true );

	wp_enqueue_script( 'photoline-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'photoline-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.0' );
	wp_script_add_data( 'photoline-html5', 'conditional', 'lt IE 9' );

	if ( is_page_template( 'page-templates/home-mosaic.php' ) ) {
		wp_enqueue_script( 'jquery-masonry', array('jquery') );
		wp_enqueue_script('masonry.init', get_template_directory_uri() . '/js/masonry.init.js');
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '25062015' );
	}
}
add_action( 'wp_enqueue_scripts', 'photoline_scripts' );

/**
 * Add lightbox prettyPhoto for link to image
 */
function photoline_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

function photoline_addrel_replace ($content) {
global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 rel="lightbox['.$post->ID.']"$6>$7</a>';
	$content = preg_replace($pattern, $replacement, $content);
return $content;
}

if ( false === get_theme_mod( 'photoline_lightbox_img' ) ) {
	add_filter( 'wp_get_attachment_link', 'photoline_prettyPhoto', 10, 6 );
	add_filter('the_content', 'photoline_addrel_replace', 12);
}

/**
 * Extracting the first's image of post
 */
if ( ! function_exists( 'photoline_catch_image' ) ) :
	function photoline_catch_image() {
  		global $post, $posts;
  		ob_start();
  		ob_end_clean();
  		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

			if ( 0 != $output ) {
		$first_img = $matches [1][0];
			}

			if ( empty($first_img) ) {
		$first_img = get_template_directory_uri() .'/img/no-image.png';
			}

   		return $first_img;
		}
endif;

/**
 * Add post class
*/
function photoline_post_class_filter( $classes ) {

    if ( ! is_page() && ! is_single() && ! is_tax( 'post_format', 'post-format-image' ) && ! is_search() )

        $classes[] = sanitize_html_class( 'col' );

    return $classes;
}
add_filter( 'post_class', 'photoline_post_class_filter' );

/**
 * Add body class
*/
function photoline_body_class_filter( $classes ) {

    if ( is_page_template( 'page-templates/fullpage.php' ) )
        $classes[] = sanitize_html_class( 'fullpage' );

    if ( ! is_page() && ! is_single() && ! is_tax( 'post_format', 'post-format-image' ) && ! is_search() )
        $classes[] = sanitize_html_class( 'colgrid' );

    return $classes;
}
add_filter( 'body_class', 'photoline_body_class_filter' );

/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom gallery layout
 */
require( get_template_directory() . '/inc/gallery-layout.php');

/**
 * Icons Set: used in the widget icon&text
 */
require_once( get_template_directory() .'/inc/awesome-icons.php' );

/**
 * Remove website URL field in the comment form
 */
add_filter('comment_form_default_fields', 'photoline_remove_url');
 
function photoline_remove_url($arg) {
    $arg['url'] = '';
    return $arg;
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Contextual Help Function File
 */
require( get_template_directory() . '/inc/contextual-help.php' );

/**
 * Wellcom Screen
 */
require_once( get_template_directory() . '/inc/welcome.php' );

/**
 * Theme hooks
 */
// see template-tags.php
//add_action( 'before_content', 'photoline_before_content' );
//add_action( 'before_loop_posts', 'photoline_before_loop_posts' );
//add_action( 'after_main_posts', 'photoline_after_main_posts' );
add_action( 'display_submenu_sidebar', 'photoline_get_submenu' );
add_action( 'photoline_credits', 'photoline_txt_credits' );


/**
 * HOOKs
 * see page.php, single.php and sidebar.php
 */

add_action( 'photoline_after_main_content', 'page_hook_example' );
function page_hook_example() {
	echo '<!-- HOOK-Page -->'; 
}

add_action( 'photoline_after_post_content', 'post_hook_example' );
function post_hook_example() {
	echo '<!-- HOOK-Post -->'; 
}

add_action( 'before_sidebar', 'sidebar_hook_example' );
function sidebar_hook_example() {
	echo '<!-- HOOK-Sidebar -->'; 
}

/**
 * Custom Widgets.
 *-----------------------------------------------------------------*/
// Check for files
$files = glob( get_template_directory() .'/inc/widgets/widget-*.php' );

// Load files if they exist
if ( $files ) {
	foreach ( $files as $file ) {
		require_once( $file );
	}
}

/**
 * Add metabox Excerpt for Page.
 */
function photoline_add_excerpt_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'photoline_add_excerpt_to_pages');

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';