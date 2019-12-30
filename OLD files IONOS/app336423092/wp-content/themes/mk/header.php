<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="mk-page-wrapper">
 *
 * @package Mk
 */
 
 global $data;
 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<div id="mk-main-wrapper">
	
	<?php do_action('mk_before_wrappers');?>
	
		<a class="skip-link screen-reader-text" href="#page-wrapper"><?php _e( 'Skip to content', 'mk' ); ?></a>

	<?php mk_navigation_sidebar(); ?>

	 <div id="mk-page-wrapper">
	
	<?php do_action('mk_page_wrapper_before');?>
	
	