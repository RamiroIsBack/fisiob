<?php
/**
 * trance functions and definitions
 *
 * @package trance
 */
 
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 640;


if ( ! function_exists( 'trance_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function trance_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on trance, use a find and replace
	 * to change 'trance' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'trance', get_template_directory() . '/languages' );

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
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'trance' ),
		'footer'	=> esc_html__( 'Footer Menu', 'trance' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'trance_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'custom-header' );
	
	// Declare Support for Post-Thumbnails
	add_theme_support('post-thumbnails');
	
	add_image_size('trance-most-popular', 600, 500, true);
	add_image_size('trance-home-thumb', 600, 500, true);
}
endif; // trance_setup
add_action( 'after_setup_theme', 'trance_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function trance_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'trance' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'trance' ),
		'id'            => 'sidebar-2',
		'description'   => __('The left-most widget column in the footer','trance'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'trance' ),
		'id'            => 'sidebar-3',
		'description'   => __('The second widget column in the footer','trance'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'trance' ),
		'id'            => 'sidebar-4',
		'description'   => __('The third widget column in the footer','trance'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'trance' ),
		'id'            => 'sidebar-5',
		'description'   => __('The last widget column in the footer','trance'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'trance_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function trance_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_style('bootstrap-style',get_template_directory_uri()."/assets/bootstrap/css/bootstrap.css", array('style'));
	
	wp_enqueue_style('trance-main-skin',get_template_directory_uri()."/assets/css/main.css", array('bootstrap-style'));
	
	wp_enqueue_style('font-awesome', get_template_directory_uri()."/assets/font-awesome/css/font-awesome.min.css", array('trance-main-skin'));
	
	wp_enqueue_style('slider', get_template_directory_uri()."/assets/slider/jquery.bxslider.css", array('font-awesome'));

	wp_enqueue_script( 'trance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script("jquery");
	
	wp_enqueue_script('slider-js', get_template_directory_uri()."/js/jquery.bxslider.js", array('jquery'));
	
	wp_enqueue_script('nav-js', get_template_directory_uri()."/js/jquery.slicknav.min.js", array('jquery'));
	
	wp_enqueue_script('trance-custom-js', get_template_directory_uri()."/js/custom.js", array('jquery'), null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'trance_scripts' );

function trance_fonts_url() {
    $fonts_url = '';
    
    $play = _x('on', 'Play font: on or off', 'trance');
    
    $maven_pro = _x('on', 'Maven Pro font: on or off', 'trance');

	if ( 'off' !== $play || 'off' !== $maven_pro) {
	    $font_families = array();
	
	    if ('off' !== $play ) {
		    $font_families[] = 'Play:400,700';
	    }
	    
	    if ('off' !== $maven_pro ) {
		    $font_families[] = 'Maven Pro:400,500,700,900';
	    }
	    
		$query_args = array(
		    'family' => urlencode( implode( '|', $font_families ) ),
		    'subset' => urlencode( 'latin,latin-ext' ),
		);
	}
	
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
 
    return $fonts_url;
}

function trance_scripts_styles() {
    wp_enqueue_style( 'trance-fonts', trance_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'trance_scripts_styles' );

function trance_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function trance_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo esc_html( mb_substr( $subex, 0, $excut ) );
		} else {
			echo esc_html($subex, 'trance');
		}
		echo '...';
	} else {
		echo esc_html($excerpt, 'trance');
	}
}

function trance_comment($comment, $args, $depth) {
//	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<cite class="fn">%s</cite>', 'trance' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','trance' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo esc_html( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( '%1$s', get_comment_date() ); ?></a><?php edit_comment_link( __( '(Edit)','trance' ), '  ', '' );
		?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

function custom_css() {

	$desc	= esc_attr( get_theme_mod('trance-desc', '#ffffff') );
	$tcolor = esc_attr( get_theme_mod('trance-title', '#6f1f1f') );
	
		$css1	= ".site-branding .site-title a {
				   		color: $tcolor;
				   }
				   .site-description {
				   		color: $desc;
				   }
				   ";
	if ( esc_url( get_theme_mod('trance-mpbg') ) != '' ) { 
	
				$bg 	= esc_url( get_theme_mod('trance-mpbg') );
				$css2 	= "#most-popular{
								background: url($bg);
							}";
	}
	else 
	{
		$css2 = '';
	}
	
	if ( get_theme_mod('trance-sidebar') == 'left' ) {
		$css3	= "#primary {
						float: right;
					}	
				  ";
	}
	else {
		$css3	= '';
	}
	
	wp_add_inline_style( 'trance-main-skin', $css1 . $css2 . $css3 );
}

add_action('wp_enqueue_scripts','custom_css');



function trance_customize_preview() {
	?>
    <script type="text/javascript">
        ( function( jQuery ) {
            wp.customize('trance-title',function( value ) {
                value.bind(function(to) {
                    jQuery('.site-branding .site-title a').css('color', to );
                });
            });
            
            wp.customize('trance-desc',function( value ) {
                value.bind(function(to) {
                    jQuery('.site-branding .site-description').css('color', to );
                });
            });
        } )( jQuery )
    </script>
    <?php
}

/**
 * Implement Favicon Support
 */

function trance_favicon() { ?>
	<link rel="shortcut icon" href="<?php echo get_theme_mod( 'trance-favicon' ); ?>">
<?php 
}

add_action('wp_head', 'trance_favicon');



/**
 * Custom Scripts for the theme.
 */
 
function trance_effects() {

	$custom_js	=	array(
		'social'	=> get_theme_mod( 'social' ),
		'head_hover'=> get_theme_mod( 'trance-head-hover' ),
	);
	
	wp_localize_script('trance-custom-js', 'js_param', $custom_js);
}

add_action('wp_head','trance_effects'); 



/**
 * Enqueue the stylesheet.
 */
function trance_customizer_stylesheet() {

    wp_register_style( 'trance-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'trance-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'trance_customizer_stylesheet' );

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
