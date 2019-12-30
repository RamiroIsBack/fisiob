<?php
/**
 * Functions for handling JavaScript in the framework (frontend).
 *
 * @package hoot
 * @subpackage framework
 * @since hoot 1.0.0
 */

/* Register Core scripts. */
add_action( 'wp_enqueue_scripts', 'hoot_register_scripts', 0 );

/* Load Core scripts. It's a good practice to load any other script before the main script. Hence users can enqueue scripts at default priority 10, so that the main script.js is always loaded at the end. */
add_action( 'wp_enqueue_scripts', 'hoot_enqueue_scripts', 12 );

/**
 * Registers JavaScript files for the framework. This function merely registers scripts with WordPress
 * using the wp_register_script() function. It does not load any script files on the site. If a theme
 * wants to register its own custom scripts, it should do so on the 'wp_enqueue_scripts' hook.
 *
 * It also allows theme to localize the script using wp_localize_script using 'wp_enqueue_scripts' hook
 * at the default priority of 10.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function hoot_register_scripts() {

	/* Get scripts. */
	$scripts = hoot_get_scripts();

	/* Loop through each script and register it. */
	foreach ( $scripts as $script => $args ) {

		$defaults = array( 
			'handle'    => $script, 
			'src'       => '',
			'deps'      => null,
			'version'   => false,
			'in_footer' => true
		);

		$args = wp_parse_args( $args, $defaults );

		if ( !empty( $args['src'] ) ) {
			wp_register_script(
				sanitize_key( $args['handle'] ),
				esc_url( $args['src'] ),
				is_array( $args['deps'] ) ? $args['deps'] : null,
				preg_replace( '/[^a-z0-9_\-.]/', '', strtolower( $args['version'] ) ),
				is_bool( $args['in_footer'] ) ? $args['in_footer'] : ''
			);
		}

	}

}

/**
 * Tells WordPress to load the scripts using the wp_enqueue_script() function.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function hoot_enqueue_scripts() {

	/* Load the comment reply script on singular posts with open comments if threaded comments are supported. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
		wp_enqueue_script( 'comment-reply' );

	/* Get scripts. */
	$scripts = hoot_get_scripts();

	/* Loop through each script and enqueue it. */
	foreach ( $scripts as $script => $args )
		if ( !empty( $args['src'] ) )
			wp_enqueue_script( sanitize_key( $script ) );

}

/**
 * Returns an array of the available scripts for use in themes.
 *
 * @since 2.1.0
 * @access public
 * @return array
 */
function hoot_get_scripts() {

	/* Initialize */
	$scripts = array();

	if ( defined( 'HOOT_DEBUG' ) )
		$loadminified = ( HOOT_DEBUG ) ? false : true;
	else
		$loadminified = hoot_get_mod( 'load_minified', 0 );

	/* If a child theme is active, add the parent theme's scripts. */
	// Cannot use 'hoot_locate_script()' as the function will always return child
	// theme script. Hence we have to manually locate and add parent script.
	if ( is_child_theme() ) {

		/* Get the parent theme script (if a '.min' version of the script exists, use it) */
		if ( $loadminified && file_exists( trailingslashit( THEME_DIR ) . 'script.min.js' ) ) {
			$src = trailingslashit( THEME_URI ) . 'script.min.js';
		} elseif ( file_exists( trailingslashit( THEME_DIR ) . 'script.js' ) ) {
			$src = trailingslashit( THEME_URI ) . 'script.js';
		}

		if ( !empty( $src ) )
			$scripts['parent-theme-script'] = array(
				'src' => $src,
				'version' => THEME_VERSION,
				);
	}

	/* Add the active theme script (if a '.min' version of the script exists, use it) */
	// CHILD_THEME_{DIR|URI} uses get_stylesheet_directory function and hence refers to active theme
	if ( $loadminified && file_exists( trailingslashit( CHILD_THEME_DIR ) . 'script.min.js' ) ) {
		$scriptsrc = trailingslashit( CHILD_THEME_URI ) . 'script.min.js';
	} elseif ( file_exists( trailingslashit( CHILD_THEME_DIR ) . 'script.js' ) ) {
		$scriptsrc = trailingslashit( CHILD_THEME_URI ) . 'script.js';
	}

	if ( !empty( $scriptsrc ) )
		$scripts['theme-script'] = array(
			'src' => $scriptsrc,
			'version' => ( is_child_theme() ) ? CHILD_THEME_VERSION : THEME_VERSION,
			);

	/* Return the array of scripts. */
	return apply_filters( 'hoot_scripts', $scripts );
}