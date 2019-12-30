<?php
/**
 * Photoline back compat functionality
 * @package Photoline Lite
 */

/**
 * Switches to the default theme.
 */
function photoline_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'photoline_upgrade_notice' );
}
add_action( 'after_switch_theme', 'photoline_switch_theme' );

/**
 * Add message for unsuccessful theme switch
 */
function photoline_upgrade_notice() {
	$message = sprintf( __( 'Photoline requires at least WordPress version 4.3. You are running version %s. Please upgrade and try again.', 'photoline-lite' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.3
 */
function photoline_customize() {
	wp_die( sprintf( __( 'Photoline requires at least WordPress version 4.3. You are running version %s. Please upgrade and try again.', 'photoline-lite' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'photoline_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.3
 */
function photoline_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Photoline requires at least WordPress version 4.3. You are running version %s. Please upgrade and try again.', 'photoline-lite' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'photoline_preview' );
