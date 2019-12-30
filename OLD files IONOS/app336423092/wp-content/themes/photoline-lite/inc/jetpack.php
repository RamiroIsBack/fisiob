<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Photoline Lite
 */

/**
 * Add theme support for infinity scroll
 */
function photoline_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', array(
				'container' => 'masonry', // infinite
				'render'	=> 'photoline_infinite_scroll_render',
				'posts_per_page' => true,
				'footer'	=> false,
				'type'	=> 'click'
			) );
}
add_action( 'after_setup_theme', 'photoline_infinite_scroll_init' );

/**
 * Set the code to be rendered on for calling posts for infinity scroll
 */
function photoline_infinite_scroll_render() {
		the_post();
		get_template_part( 'content', get_post_format() );

}

/**
 * Remove sharedaddy
 */
function photoline_sidebar_sharedaddy() {
	remove_filter( 'the_content', 'sharing_display', 19 );
}
add_action( 'dynamic_sidebar', 'photoline_sidebar_sharedaddy' );

function photoline_excerpt_sharedaddy() {
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'loop_start', 'photoline_excerpt_sharedaddy' );