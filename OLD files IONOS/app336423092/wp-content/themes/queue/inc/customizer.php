<?php
/**
 * Queue Theme Customizer
 *
 * @package queue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function queue_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'queue' );

	// Add the featured content section in case it's not already there.
	$wp_customize->add_section( 'featured_content', array(
		'title'       => __( 'Featured Content', 'queue' ),
		'description' => sprintf( __( 'Use a <a href="%1$s">tag</a> to feature your posts. If no posts match the tag, <a href="%2$s">sticky posts</a> will be displayed instead.', 'queue' ),
			esc_url( add_query_arg( 'tag', _x( 'featured', 'featured content default tag slug', 'queue' ), admin_url( 'edit.php' ) ) ),
			admin_url( 'edit.php?show_sticky=1' )
		),
		'priority'    => 130,
	) );

	$wp_customize->add_setting(
		'queue_accent_color',
		array(
			'default'     => '#ff3300',
			'sanitize_callback' => 'queue_sanitize_accent_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color',
			array(
				'label'      => __( 'Accent Color', 'queue' ),
				'section'    => 'colors',
				'settings'   => 'queue_accent_color'
			)
		)
	);

	// Add the Mini About section in case it's not already there.
	$wp_customize->add_section( 'mini_about', array(
		'title'       => __( 'Mini About', 'queue' ),
		'description' => sprintf( __( 'Provide a brief description of your site to appear in the footer of the home page.', 'queue' ),
			esc_url( add_query_arg( 'tag', _x( 'featured', 'featured content default tag slug', 'queue' ), admin_url( 'edit.php' ) ) ),
			admin_url( 'edit.php?show_sticky=1' )
		),
		'priority'    => 131,
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'mini_about_active', array(
		'default'           => '0',
		'sanitize_callback' => 'queue_sanitize_mini_about_active',
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'mini_about_text', array(
		'default'           => '',
		'sanitize_callback' => 'queue_sanitize_mini_about_text',
	) );

	$wp_customize->add_control( 'mini_about_text', array(
		'label'   => __( 'About ' . get_bloginfo('name'), 'queue' ),
		'section' => 'mini_about',
		'type'    => 'textarea'
	) );

	$wp_customize->add_control( 'mini_about_active', array(
		'label'   => __( 'Show?', 'queue' ),
		'section' => 'mini_about',
		'type'    => 'checkbox'
	) );
}
add_action( 'customize_register', 'queue_customize_register' );

function queue_sanitize_mini_about_active( $active ) {
	if ( ! in_array( $active, array( 0, 1 ) ) ) {
		$active = 'grid';
	}

	return $active;
}

function queue_sanitize_mini_about_text( $mini_about_text ) {
	return sanitize_text_field( $mini_about_text );
}

function queue_sanitize_accent_color( $accent_color ) {
	return sanitize_hex_color( $accent_color );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function queue_customize_preview_js() {
	wp_enqueue_script( 'queue_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'queue_customize_preview_js' );