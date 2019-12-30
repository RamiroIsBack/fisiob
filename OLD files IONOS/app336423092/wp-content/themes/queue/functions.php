<?php
/**
 * queue functions and definitions
 *
 * @package queue
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'queue_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function queue_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on queue, use a find and replace
	 * to change 'queue' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'queue', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'queue_get_featured_posts',
		'max_posts' => 6,
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'queue_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // queue_setup
add_action( 'after_setup_theme', 'queue_setup' );

function queue_customizer_css() {
    ?>
    <style type="text/css">
	a {
		color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.globalnav {
		border-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.globalnav h1 a {
		color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.site-footer {
		background-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	hr {
		border-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	article .entry-header .edit-link a {
		background-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.pull-quote {
		color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.comment-list a:hover {
		color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	#searchbox {
		border-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.widget-area:hover a {
		color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.widget_search input:focus {
		border-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	input[type="text"]:focus,
	input[type="password"]:focus,
	input[type="email"]:focus,
	textarea:focus {
		border-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.page-links a {
		border-bottom-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.page-links a:hover {
		color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.bypostauthor .vcard .fn {
		border-bottom-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}

	.button,
	button,
	input[type="submit"],
	input[type="reset"],
	input[type="button"] {
	  background-color: <?php echo get_theme_mod( 'queue_accent_color' ); ?>;
	}
    </style>
    <?php
}
add_action( 'wp_head', 'queue_customizer_css' );

add_filter('img_caption_shortcode','queue_img_caption_shortcode',10,3);

function queue_img_caption_shortcode($output,$attr,$content) {
	// New-style shortcode with the caption inside the shortcode with the link and image tags.
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	$atts = shortcode_atts( array(
		'id'	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => '',
		'class'   => '',
	), $attr, 'caption' );

	$atts['width'] = (int) $atts['width'];
	if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
		return $content;

	if ( ! empty( $atts['id'] ) )
		$atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';

	$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

	/*
	* Inline width attribute has been removed. The bulk of this function is from wp-includes/media.php.
	*/

	if ( current_theme_supports( 'html5', 'caption' ) ) {
		return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
	}

	return '<div ' . $atts['id'] . 'class="' . esc_attr( $class ) . '">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $atts['caption'] . '</p></div>';
}

if ( ! function_exists( 'queue_custom_excerpt_more' ) ) :
function queue_custom_excerpt_more( $more ) {
	return __( '&hellip;', 'queue');
}
add_filter( 'excerpt_more', 'queue_custom_excerpt_more' );
endif;

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Queue 1.0
 *
 * @return array An array of WP_Post objects.
 */
function queue_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Queue.
	 *
	 * @since Queue 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'queue_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Queue 1.0
 *
 * @return bool Whether there are featured posts.
 */
function queue_has_featured_posts() {
	return ! is_paged() && (bool) queue_get_featured_posts();
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function queue_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'queue' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'queue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function queue_scripts() {
	wp_enqueue_style( 'queue-style-fonts', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://fonts.googleapis.com/css?family=Lato:400,700|Linden+Hill:400italic|Lusitana:400,700" );
	wp_enqueue_style( 'queue-style-skeleton', get_template_directory_uri() . '/css/skeleton.css' );
	wp_enqueue_style( 'queue-style-base', get_template_directory_uri() . '/css/base.css' );
	wp_enqueue_style( 'queue-style', get_stylesheet_uri() );

    wp_enqueue_script( 'queue-main', get_template_directory_uri() . '/js/main.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_front_page() && queue_has_featured_posts()) {
		wp_enqueue_script( 'queue-featured-posts', get_template_directory_uri() . '/js/featured-posts.js', array( 'jquery' ), false, false );
	}
}
add_action( 'wp_enqueue_scripts', 'queue_scripts' );

function queue_register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Nav', 'queue' ),
      'secondary' => __( 'Secondary Nav', 'queue' )
    )
  );
}
add_action( 'init', 'queue_register_my_menus' );

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

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}
