<?php
/**
 * Functions for handling theme main stylesheets in the frontend.
 *
 * @package hoot
 * @subpackage framework
 * @since hoot 1.0.0
 */

/* Register Main styles. */
add_action( 'wp_enqueue_scripts', 'hoot_register_styles', 0 );

/* Load Main styles. It's a good practice to load any other stylesheet before the main style. Hence users can enqueue custom stylesheets at default priority 10, so that the main style.css is always loaded at the end. */
add_action( 'wp_enqueue_scripts', 'hoot_enqueue_styles', 12 );

/* Load the development stylsheet (unminified) in script debug mode. */
add_filter( 'stylesheet_uri', 'hoot_min_stylesheet_uri', 5, 2 );

/**
 * Registers stylesheets for the framework. This function merely registers styles with WordPress using
 * the wp_register_style() function. It does not load any stylesheets on the site. If a theme wants to 
 * register its own custom styles, it should do so on the 'wp_enqueue_scripts' hook.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function hoot_register_styles() {

	/* Get styles. */
	$styles = hoot_get_styles();

	/* Loop through each style and register it. */
	foreach ( $styles as $style => $args ) {

		$defaults = array( 
			'handle'  => $style, 
			'src'     => '',
			'deps'    => null,
			'version' => false,
			'media'   => 'all'
		);

		$args = wp_parse_args( $args, $defaults );

		if ( !empty( $args['src'] ) ) {
			wp_register_style(
				sanitize_key( $args['handle'] ),
				esc_url( $args['src'] ),
				is_array( $args['deps'] ) ? $args['deps'] : null,
				preg_replace( '/[^a-z0-9_\-.]/', '', strtolower( $args['version'] ) ),
				esc_attr( $args['media'] )
			);
		}

	}

}

/**
 * Tells WordPress to load the styles using the wp_enqueue_style() function.
 *
 * @since 1.0.0
 * @access public
 * @return void
 */
function hoot_enqueue_styles() {

	/* Get styles. */
	$styles = hoot_get_styles();

	/* Loop through each style and enqueue it. */
	foreach ( $styles as $style => $args )
		if ( !empty( $args['src'] ) )
			wp_enqueue_style( sanitize_key( $style ) );

}

/**
 * Returns an array of the available styles for use in themes.
 *
 * @since 1.0.0
 * @access public
 * @return array
 */
function hoot_get_styles() {

	/* Initialize */
	$styles = array();

	/* If a child theme is active, add the parent theme's style. */
	// Cannot use 'hoot_locate_style()' as the function will always return child
	// theme stylesheet. Hence we have to manually locate and add parent stylesheet.
	if ( is_child_theme() ) {

		if ( defined( 'HOOT_DEBUG' ) )
			$loadminified = ( HOOT_DEBUG ) ? false : true;
		else
			$loadminified = hoot_get_mod( 'load_minified', 0 );

		/* Get the parent theme stylesheet (if a '.min' version of the stylesheet exists, use it) */
		if ( $loadminified && file_exists( trailingslashit( THEME_DIR ) . "style.min.css" ) )
			$src = trailingslashit( THEME_URI ) . "style.min.css";
		else
			// We can skip file_exists for src as parent style.css will always be there.
			$src = trailingslashit( THEME_URI ) . "style.css";

		$styles['parent'] = array(
			'src' => $src,
			'version' => THEME_VERSION,
			);
	}

	/* Add the active theme style. */
	$styles['style'] = array(
		'src' => get_stylesheet_uri(),
		'version' => ( is_child_theme() ) ? CHILD_THEME_VERSION : THEME_VERSION,
		);

	/* Return the array of styles. */
	return apply_filters( 'hoot_styles', $styles );
}

/**
 * Filters the 'stylesheet_uri' returned by get_stylesheet_uri() to allow theme developers to offer a
 * minimized version of their main 'style.css' file. It will detect if a 'style.min.css' file is available
 * and use it if HOOT_DEBUG is disabled.
 *
 * @since 1.0.0
 * @access public
 * @param string  $stylesheet_uri      The URI of the active theme's stylesheet.
 * @param string  $stylesheet_dir_uri  The directory URI of the active theme's stylesheet.
 * @return string $stylesheet_uri
 */
function hoot_min_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {

	if ( defined( 'HOOT_DEBUG' ) )
		$loadminified = ( HOOT_DEBUG ) ? false : true;
	else
		$loadminified = hoot_get_mod( 'load_minified', 0 );

	/* Use the .min stylesheet if available. */
	if ( $loadminified ) {

		/* Remove the stylesheet directory URI from the file name. */
		$stylesheet = str_replace( trailingslashit( $stylesheet_dir_uri ), '', $stylesheet_uri );

		/* Change the stylesheet name to 'style.min.css'. */
		$stylesheet = str_replace( '.css', ".min.css", $stylesheet );

		/* If the stylesheet exists in the stylesheet directory, set the stylesheet URI to the dev stylesheet. */
		if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $stylesheet ) )
			$stylesheet_uri = trailingslashit( $stylesheet_dir_uri ) . $stylesheet;

	}

	/* Return the theme stylesheet. */
	return $stylesheet_uri;

}