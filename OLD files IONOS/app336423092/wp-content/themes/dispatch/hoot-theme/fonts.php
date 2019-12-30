<?php
/**
 * Functions for sending list of fonts available.
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 2.0
 */

/**
 * Build URL for loading Google Fonts
 * @credit http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hoot_google_fonts_enqueue_url() {
	$fonts_url = '';
	$query_args = apply_filters( 'hoot_google_fonts_enqueue_url_args', array() );

	/** If no google font loaded, load the default ones **/
	if ( !is_array( $query_args ) || empty( $query_args ) ):
 
		/* Translators: If there are characters in your language that are not
		* supported by this font, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$oswald = _x( 'on', 'Oswald font: on or off', 'dispatch' );

		/* Translators: If there are characters in your language that are not
		* supported by this font, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$open_sans = _x( 'on', 'Open Sans font: on or off', 'dispatch' );

		if ( 'off' !== $oswald || 'off' !== $open_sans ) {
			$font_families = array();

			if ( 'off' !== $oswald ) {
				$font_families[] = 'Oswald:400';
			}

			if ( 'off' !== $open_sans ) {
				$font_families[] = 'Open Sans:300,400,400i,700,700i,800';
			}

			if ( !empty( $font_families ) )
				$query_args = array(
					'family' => urlencode( implode( '|', $font_families ) ),
					//'subset' => urlencode( 'latin,latin-ext' ),
					'subset' => urlencode( 'latin' ),
				);

			$query_args = apply_filters( 'hoot_google_fonts_query_args', $query_args, $font_families );

		}

	endif;

	if ( !empty( $query_args ) && !empty( $query_args['family'] ) )
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Modify the font (websafe) list
 * Font list should always have the form:
 * {css style} => {font name}
 *
 * @since 2.0
 * @access public
 * @return array
 */
function hoot_theme_fonts_list( $fonts ) {
	// Add open sans (google font) to the available font list
	// Even though the list isn't currently used in customizer options,
	// this is still needed so that sanitization functions recognize the font.
	$fonts['"Open Sans", sans-serif'] = 'Open Sans';
	$fonts['"Oswald", sans-serif'] = 'Oswald';
	return $fonts;
}
add_filter( 'hoot_fonts_list', 'hoot_theme_fonts_list' );