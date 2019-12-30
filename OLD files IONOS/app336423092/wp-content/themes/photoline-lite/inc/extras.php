<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Photoline Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function photoline_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'photoline_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function photoline_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'photoline_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function photoline_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'photoline_enhanced_image_navigation', 10, 2 );

/**
 * Custom excerpts based on wp_trim_words
 */
function photoline_excerpt( $length = 75, $readmore = true ) {
	global $post;

	if ( has_excerpt( $post->ID ) ) {
		$output = '<div class="photoline-excerpt">' . $post->post_excerpt . ' ...</div>';
	}
	else {
		// More link text
		$readmore_text = get_theme_mod( 'readmore_text', esc_html__( 'read more', 'photoline-lite' ) );

		// More Link
		$readmore_link = '<br><a class="read-more" href="'. get_permalink( $post->ID ) .'" title="'. $readmore_text .'">'. $readmore_text .'</a>';

		if ( strpos( $post->post_content, '<!--more-->' ) ) {
			$output = get_the_content( '' );

			// Add More Link to excerpt if enabled
			if ( $readmore == true ) {
				$output .= apply_filters( 'photoline_read_more', $readmore_link ); // see function below
			}
		}
		else {
			// Custom excerpt
			$output = wp_trim_words( strip_shortcodes( get_the_content( $post->ID ) ), $length );

			// Add More Link to excerpt if enabled
			if ( $readmore == true ) {
				$output .= apply_filters( 'photoline_read_more', $readmore_link );
			}

		}

	}
	echo apply_filters( 'photoline_excerpt', $output );

}

/**
 * Remove default more link
 */
function photoline_read_more( $link ) {
	return null;
}
add_filter( 'the_content_more_link', 'photoline_read_more' );