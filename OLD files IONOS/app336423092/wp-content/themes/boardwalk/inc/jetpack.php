<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Boardwalk
 */

function boardwalk_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container' => 'main',
		'footer'    => false,
		'wrapper'   => false,
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Logo upload.
	add_image_size( 'boardwalk-logo', 444, 96 );
	add_theme_support( 'site-logo', array( 'size' => 'boardwalk-logo' ) );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'boardwalk-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', 'boardwalk_jetpack_setup' );

/**
 * Return early if Site Logo is not available.
 */
function boardwalk_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
 * Overwritte default gallery widget content width.
 */
function boardwalk_gallery_widget_content_width( $width ) {
	return 624;
}
add_filter( 'gallery_widget_content_width', 'boardwalk_gallery_widget_content_width');
