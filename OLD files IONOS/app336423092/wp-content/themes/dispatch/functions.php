<?php
/**
 *                  _   _             _   
 *  __      ___ __ | | | | ___   ___ | |_ 
 *  \ \ /\ / / '_ \| |_| |/ _ \ / _ \| __|
 *   \ V  V /| |_) |  _  | (_) | (_) | |_ 
 *    \_/\_/ | .__/|_| |_|\___/ \___/ \__|
 *           |_|                          
 * ------------------------------------------
 * ---- WP THEME BUILT ON HOOT FRAMEWORK ----
 * ------------------------------------------
 *
 * :: Theme's main functions file :::::::::::::::::::::::::::::::::::::::::::::
 * :: Initialize and setup the theme framework, helper functions and objects ::
 *
 * To modify this theme, its a good idea to create a child theme. This way you can easily update
 * the main theme without loosing your changes. To know more about how to create child themes 
 * @see http://codex.wordpress.org/Theme_Development
 * @see http://codex.wordpress.org/Child_Themes
 *
 * Hooks, Actions and Filters are used throughout this theme. You should be able to do most of your
 * customizations without touching the main code. For more information on hooks, actions, and filters
 * @see http://codex.wordpress.org/Plugin_API
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/**
 * Uncomment the line below to load unminified CSS and JS, and add other developer data to code.
 * - You can set this to true (default) for loading unminified files (useful for development/debugging)
 * - Or set it to false for loading minified files (for production i.e. live site)
 * 
 * NOTE: If you uncomment this line, HOOT_DEBUG value will override any option for minifying files (if
 * available) set via the theme options (customizer) in WordPress Admin
 */
// define( 'HOOT_DEBUG', true );
if ( !defined( 'HOOT_DEBUG' ) && defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG )
	define( 'HOOT_DEBUG', true );

/* Get the template directory and make sure it has a trailing slash. */
$hoot_base_dir = trailingslashit( get_template_directory() );

/* Load the Core framework */
require_once( $hoot_base_dir . 'hoot/hoot.php' );

/* Load the Theme files */
require_once( $hoot_base_dir . 'hoot-theme/hoot-theme.php' );

/* Framework and Theme files loaded */
do_action( 'hoot_loaded' );

/* Launch the Core framework. */
$hoot = new Hoot();

/* Core Framework Setup complete */
do_action( 'hoot_after_setup' );

/* Launch the Theme */
$hoot_theme = new Hoot_Theme();

/* Hoot Theme Setup complete */
do_action( 'hoot_theme_after_setup' );