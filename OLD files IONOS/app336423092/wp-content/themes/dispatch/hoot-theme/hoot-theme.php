<?php
/**
 * Hoot Theme hooked into the framework
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/**
 * The Hoot Theme class launches the theme setup.
 *
 * Theme setup functions are performed on the 'after_setup_theme' hook with a priority of 10.
 * Child themes can add theme setup function with a priority of 11. This allows the Hoot
 * framework class to load theme-supported features on the 'after_setup_theme' hook with a
 * priority of 12.
 * Also, hoot constants are available at 'after_setup_theme' hook at a priority of 10 or later.
 * 
 * @since dispatch 1.0
 * @access public
 */
if ( !class_exists( 'Hoot_Theme' ) ) {
	class Hoot_Theme {

		/**
		 * Constructor method to controls the load order of the required files
		 *
		 * @since 1.0
		 * @access public
		 * @return void
		 */
		function __construct() {

			/* Load theme includes. Must keep priority 10 for theme constants to be available. */
			add_action( 'after_setup_theme', array( $this, 'includes' ), 10 );

			/* Load about page */
			add_action( 'after_setup_theme', array( $this, 'about' ), 10 );

			/* Theme setup on the 'after_setup_theme' hook. Must keep priority 10 for framework to load properly. */
			add_action( 'after_setup_theme', array( $this, 'theme_setup' ), 10 );

			/* Theme setup on the 'wp' hook. Only used for special scenarios (like enqueueing scripts/styles) based on conditional tags. */
			add_action( 'wp', array( $this, 'conditional_theme_setup' ), 10 );

			/* Handle content width for embeds and images. Hooked into 'init' so that we can pull custom content width from theme options */
			add_action( 'init', array( $this, 'content_width' ), 10 );

			/* Modify the '[...]' Read More Text */
			add_filter( 'the_content_more_link', array( $this, 'modify_read_more_link' ) );
			if ( apply_filters( 'hoot_force_excerpt_readmore', true ) ) {
				add_filter( 'excerpt_more', array( $this, 'insert_excerpt_readmore_quicktag' ), 11 );
				add_filter( 'wp_trim_excerpt', array( $this, 'replace_excerpt_readmore_quicktag' ), 11, 2 );
			} else {
				add_filter( 'excerpt_more', array( $this, 'modify_read_more_link' ) );
			}

			/* Modify the exceprt length. Make sure to set the priority correctly such as 999, else the default WordPress filter on this function will run last and override settng here.  */
			add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length' ), 999 );

		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.  Functionality 
		 * in these files should not be expected within the theme setup function.
		 *
		 * @since 1.0
		 * @access public
		 * @return void
		 */
		function includes() {

			/* Load enqueue functions */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'enqueue.php' );

			/* Load image sizes. */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'media.php' );

			/* Load the font functions. */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'fonts.php' );

			/* Load menus */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'menus.php' );

			/* Load sidebars */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'sidebars.php' );

			/* Load the custom css functions. */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'css.php' );

			/* Load the Theme Specific HTML attributes */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'attr.php' );

			/* Load the misc template functions. */
			require_once( trailingslashit( HOOT_THEMEDIR ) . 'template-helpers.php' );

			/* Load Customizer Options */
			$trt = trailingslashit( HOOT_THEMEDIR ) . 'admin/trt-customize-pro/class-customize.php';
			$trtload = apply_filters( 'hoot_customize_load_trt', file_exists( $trt ) );
			if ( $trtload ) require_once( $trt );
			if ( file_exists( trailingslashit( HOOT_THEMEDIR ) . 'admin/customizer-options.php' ) )
				require_once( trailingslashit( HOOT_THEMEDIR ) . 'admin/customizer-options.php' );

			/* Load the migration class if exist. */
			if ( file_exists( trailingslashit( HOOT_THEMEDIR ) . 'admin/migration.php' ) )
				require_once( trailingslashit( HOOT_THEMEDIR ) . 'admin/migration.php' );

		}

		/**
		 * Load the about page.
		 *
		 * @since 4.1
		 * @access public
		 * @return void
		 */
		function about() {

			if ( file_exists( trailingslashit( HOOT_THEMEDIR ) . 'admin/about.php' ) )
				require_once( trailingslashit( HOOT_THEMEDIR ) . 'admin/about.php' );

		}

		/**
		 * Add theme supports. This is how the theme hooks into the framework and loads proper modules.
		 *
		 * @since 1.0
		 * @access public
		 * @return void
		 */
		function theme_setup() {

			/** Misc **/

			// Display <title> tag in <head>
			add_theme_support( 'title-tag' );

			// Enable Font Icons
			// Disable this (remove this line) if the theme doesnt use font icons,
			// or if the font-awesome library is being enqueued by some other plugin using
			// a handle other than 'font-awesome' or 'fontawesome' (to avoid loading the
			// library twice)
			add_theme_support( 'font-awesome' );

			// Enable google fonts (fixed fonts, or entire library)
			add_theme_support( 'google-fonts' );

			// Enable widgetized template (options in Admin Panel)
			add_theme_support( 'hoot-widgetized-template' );

			/** WordPress **/

			// Add theme support for WordPress Custom Logo
			add_theme_support( 'custom-logo' );

			// Adds theme support for WordPress 'featured images'.
			add_theme_support( 'post-thumbnails' );

			// Automatically add feed links to <head>.
			add_theme_support( 'automatic-feed-links' );

			/** WordPress Jetpack **/
			add_theme_support( 'infinite-scroll', array(
				'type' => apply_filters( 'hoot_theme_jetpack_infinitescroll_type', 'click' ), // scroll or click
				'container' => apply_filters( 'hoot_theme_jetpack_infinitescroll_container', 'content' ),
				'footer' => false,
				'wrapper' => true,
				'render' => apply_filters( 'hoot_theme_jetpack_infinitescroll_render', 'hoot_jetpack_infinitescroll_render' ),
			) );
			add_filter( 'jetpack_lazy_images_blacklisted_classes', array( $this, 'jetpack_lazy_load_exclude' ) );

			/** Hoot Extensions **/

			// Enable custom widgets
			add_theme_support( 'hoot-core-widgets' );

			// Pagination.
			add_theme_support( 'loop-pagination' );

			// Nicer [gallery] shortcode implementation when Jetpack tiled-gallery is not active
			if ( !class_exists( 'Jetpack' ) || !Jetpack::is_module_active( 'tiled-gallery' ) ) 
				add_theme_support( 'cleaner-gallery' );

			// Better captions for themes to style.
			add_theme_support( 'cleaner-caption' );

			/** WooCommerce **/

			// Woocommerce support and init load theme woo functions
			if ( class_exists( 'WooCommerce' ) ) {
				add_theme_support( 'woocommerce' );
				include_once( trailingslashit( THEME_DIR ) . 'woocommerce/functions.php' );
			}

			/** Tribe The Events Calendar Plugin **/

			// Load support if plugin active
			if ( class_exists( 'Tribe__Events__Main' ) ) {
				// Hook into 'wp' to use conditional hooks
				add_action( 'wp', array( $this, 'tribeevent' ), 10 );
			}

			/** One click demo import **/

			// Disable branding
			add_filter( 'pt-ocdi/disable_pt_branding', array( $this, 'hoot_theme_disable_pt_branding' ) );

		}

		/**
		 * Disable branding
		 * @since 4.7
		 */
		function hoot_theme_disable_pt_branding() {
			return true;
		}

		/**
		 * Add hooks based on view
		 * @since 4.7.3
		 */
		function tribeevent() {
			if ( is_post_type_archive( 'tribe_events' ) || ( function_exists( 'tribe_is_events_home' ) && tribe_is_events_home() ) ) {
				add_filter( 'theme_mod_archive_type', array( $this, 'tribeevent_archivetype' ), 5 );
				add_filter( 'theme_mod_archive_post_content', array( $this, 'tribeevent_archive' ), 5 );
				add_filter( 'theme_mod_archive_post_meta', array( $this, 'tribeevent_archive_postmeta' ), 5 );
				add_action( 'hoot_display_loop_meta', array( $this, 'tribeevent_loopmeta' ), 5 );
			}
			if ( is_singular( 'tribe_events' ) ) {
				add_action( 'hoot_display_loop_meta', array( $this, 'tribeevent_loopmeta_single' ), 5 );
				add_filter( 'theme_mod_post_featured_image', array( $this, 'tribeevent_post_featured_image' ), 5 );
			}
		}

		/**
		 * Modify theme options and displays
		 * @since 4.7.3
		 */
		function tribeevent_archivetype( $type ) { return 'big'; }
		function tribeevent_archive( $content ) { return 'full-content'; }
		function tribeevent_archive_postmeta( $args ) { return ''; }
		function tribeevent_loopmeta( $display ) { return false; }
		function tribeevent_loopmeta_single( $display ) {
			the_post(); rewind_posts(); // Bug Fix
			return false;
		}
		function tribeevent_post_featured_image( $image ) { return false; }

		/**
		 * Exclude images from jetpack's lazy load
		 *
		 * @since 4.6
		 * @access public
		 * @return void
		 */
		function jetpack_lazy_load_exclude( $classes ) {
			if ( !is_array( $classes ) ) $classes = array();
			$classes[] = 'hootslider-html-slide-img';
			$classes[] = 'hootslider-html-slide-image';
			$classes[] = 'hootslider-image-slide-img';
			$classes[] = 'hootslider-carousel-slide-img';
			return $classes;
		}

		/**
		 * Theme setup on the 'wp' hook. Only used for special scenarios based on conditional tags.
		 * Like enqueueing scripts/styles conditionally, or adding theme support so that enqueue functions
		 * hooked into 'wp_enqueue_scripts' load the script/styles.
		 *
		 * @since 1.0
		 * @access public
		 * @return void
		 */
		function conditional_theme_setup() {

			/* Enable Light Slider if its the 'Widgetized Template' */
			if ( is_page_template() ) {
				$template_slug = get_page_template_slug();
				if ( 'page-templates/template-widgetized.php' == $template_slug ) {
					add_theme_support( 'light-slider' );
				}
			}

		}

		/**
		 * Handle content width for embeds and images.
		 *
		 * @since 1.0
		 * @access public
		 * @return void
		 */
		function content_width() {
			$width = intval( hoot_get_mod( 'site_width' ) );
			$width = !empty( $width ) ? $width : 1260;
			hoot_set_content_width( $width );
		}

		/**
		 * Modify the '[...]' Read More Text
		 *
		 * @since 1.0
		 * @access public
		 * @return string
		 */
		function modify_read_more_link( $more = '[...]' ) {
			if ( is_admin() )
				return $more;
			$read_more = hoot_get_mod('read_more');
			$read_more = ( empty( $read_more ) ) ? sprintf( __( 'Read More %s', 'dispatch' ), '&rarr;' ) : $read_more;
			global $post;
			$read_more = '<a class="more-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">' . $read_more . '</a>';
			return apply_filters( 'hoot_readmore', $read_more ) ;
		}

		/**
		 * Always display the 'Read More' link in Excerpts.
		 * Insert quicktag to be replaced later in 'wp_trim_excerpt()'
		 *
		 * @since 1.3
		 * @access public
		 * @return string
		 */
		function insert_excerpt_readmore_quicktag( $more = '' ) {
			if ( is_admin() )
				return $more;
			return '<!--hoot-read-more-quicktag-->';
		}

		/**
		 * Always display the 'Read More' link in Excerpts.
		 * Replace quicktag with read more link
		 *
		 * @since 1.3
		 * @access public
		 * @return string
		 */
		function replace_excerpt_readmore_quicktag( $text, $raw_excerpt ) {
			if ( is_admin() )
				return $text;
			$read_more = $this->modify_read_more_link();
			$text = str_replace( '<!--hoot-read-more-quicktag-->', '', $text );
			return $text . $read_more;
		}

		/**
		 * Modify the exceprt length.
		 *
		 * @since 1.0
		 * @access public
		 * @return void
		 */
		function custom_excerpt_length( $length ) {
			if ( is_admin() )
				return $length;
			$excerpt_length = intval( hoot_get_mod('excerpt_length') );
			if ( !empty( $excerpt_length ) )
				return $excerpt_length;
			return 105;
		}

	} // end class
} // end if