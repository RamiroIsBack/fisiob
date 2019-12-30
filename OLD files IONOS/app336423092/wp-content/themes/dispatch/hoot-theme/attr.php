<?php
/**
 * HTML attribute filters.
 * Most of these functions filter the generic values from the framework found in hoot/functions/attr.php
 * Attributes for non-generic structural elements (mostly theme specific) can be loaded in this file.
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/* Modify Original Filters from Framework */
add_filter( 'hoot_attr_menu',    'hoot_theme_attr_menu', 10, 2 );
add_filter( 'hoot_attr_content', 'hoot_theme_attr_content' );
add_filter( 'hoot_attr_sidebar', 'hoot_theme_attr_sidebar', 10, 2 );

/* New Theme Filters */
add_filter( 'hoot_attr_page_wrapper', 'hoot_theme_attr_page_wrapper' );
add_filter( 'hoot_attr_topbar', 'hoot_theme_attr_topbar' );
add_filter( 'hoot_attr_header_aside', 'hoot_theme_attr_header_aside' );
add_filter( 'hoot_attr_main', 'hoot_theme_attr_main' );
add_filter( 'hoot_attr_page_template_content', 'hoot_theme_page_template_content', 10, 2 );

/* Misc Filters */
add_filter( 'hoot_attr_social_icons_icon', 'hoot_theme_attr_social_icons_icon', 10, 2 );
add_filter( 'hoot_attr_page_wrapper', 'hoot_theme_attr_page_wrapper_plugins' );

/**
 * Nav menu attributes.
 *
 * @since 1.0.0
 * @access public
 * @param array $attr
 * @param string $context
 * @return array
 */
function hoot_theme_attr_menu( $attr ) {
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];
	$mobile_menu = hoot_get_mod( 'mobile_menu' );
	$attr['class'] .= " mobilemenu-{$mobile_menu}";
	$mobile_submenu_click = hoot_get_mod( 'mobile_submenu_click' );
	$attr['class'] .= ( $mobile_submenu_click ) ? ' mobilesubmenu-click' : ' mobilesubmenu-open';

	return $attr;
}

/**
 * Modify Main content container of the page attributes.
 *
 * @since 1.0
 * @access public
 * @param array $attr
 * @return array
 */
function hoot_theme_attr_content( $attr ) {
	$layout_class = hoot_main_layout_class( 'content' );
	if ( !empty( $layout_class ) ) {
		if ( isset( $attr['class'] ) )
			$attr['class'] .= ' ' . $layout_class;
		else
			$attr['class'] = $layout_class;
	}

	return $attr;
}

/**
 * Modify Sidebar attributes.
 *
 * @since 1.0
 * @access public
 * @param array $attr
 * @param string $context
 * @return array
 */
function hoot_theme_attr_sidebar( $attr, $context ) {
	if ( !empty( $context ) && $context == 'primary' ) {
		$layout_class = hoot_main_layout_class( 'primary-sidebar' );
		if ( !empty( $layout_class ) ) {
			if ( isset( $attr['class'] ) )
				$attr['class'] .= ' ' . $layout_class;
			else
				$attr['class'] = $layout_class;
		}
	}

	return $attr;
}

/**
 * Page wrapper attributes.
 *
 * @since 1.0
 * @access public
 * @param array $attr
 * @return array
 */
function hoot_theme_attr_page_wrapper( $attr ) {
	$attr['id'] = 'page-wrapper';
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	// Set site layout class
	$site_layout = hoot_get_mod( 'site_layout' );
	$attr['class'] .= ( $site_layout == 'boxed' ) ? ' hgrid site-boxed' : ' site-stretch';
	$attr['class'] .= ' page-wrapper';

	// Set sidebar layout class
	global $hoot_theme;
	if ( empty( $hoot_theme->currentlayout ) )
		hoot_main_layout('');
	if ( !empty( $hoot_theme->currentlayout['layout'] ) ) :
		$attr['class'] .= ' sitewrap-'. $hoot_theme->currentlayout['layout'];
		switch( $hoot_theme->currentlayout['layout'] ) {
			case 'none' :
			case 'full' :
			case 'full-width' :
				$attr['class'] .= ' sidebars0';
				break;
			case 'narrow-right' :
			case 'wide-right' :
			case 'narrow-left' :
			case 'wide-left' :
				$attr['class'] .= ' sidebarsN sidebars1';
				break;
			case 'narrow-left-left' :
			case 'narrow-left-right' :
			case 'narrow-right-left' :
			case 'narrow-right-right' :
				$attr['class'] .= ' sidebarsN sidebars2';
				break;
		}
	endif;

	return $attr;
}

/**
 * Topbar attributes.
 *
 * @since 3.0.3
 * @access public
 * @param array $attr
 * @return array
 */
function hoot_theme_attr_topbar( $attr ) {
	$attr['id'] = 'topbar';
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	// Set site layout class
	$attr['class'] .= ' topbar';

	return $attr;
}

/**
 * Header Aside attributes.
 *
 * @since 3.0.3
 * @access public
 * @param array $attr
 * @return array
 */
function hoot_theme_attr_header_aside( $attr ) {
	$attr['id'] = 'header-aside';
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	// Set site layout class
	$attr['class'] .= ' header-aside table-cell-mid';

	return $attr;
}

/**
 * Main attributes.
 *
 * @since 3.0.3
 * @access public
 * @param array $attr
 * @return array
 */
function hoot_theme_attr_main( $attr ) {
	$attr['id'] = 'main';
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	// Set site layout class
	$attr['class'] .= ' main';

	return $attr;
}

/**
 * Main content container of the page attributes when a page template is being displayed
 *
 * @since 1.0
 * @access public
 * @param array $attr
 * @param string $context
 * @return array
 */
function hoot_theme_page_template_content( $attr, $context ) {

	if ( is_page_template() && $context == 'none' ) {
		$attr['id']       = 'content';
		$attr['class']    = 'content no-sidebar layout-none';
		$attr['role']     = 'main';
		$attr['itemprop'] = 'mainContentOfPage';
		$template_slug = basename( get_page_template(), '.php' );
		$attr['class'] .= ' ' . sanitize_html_class( 'content-' . $template_slug );
	} elseif ( function_exists( 'hoot_attr_content' ) ) {
		// Get page attributes for main content container of a non-template regular page
		$attr = apply_filters( 'hoot_attr_content', $attr, $context );
	}

	return $attr;
}

/**
 * Social Icons Widget - Icons
 *
 * @since 2.0
 * @access public
 * @param array $attr
 * @param string $context
 * @return array
 */
function hoot_theme_attr_social_icons_icon( $attr, $context ) {
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	$attr['class'] .= ' social-icons-icon';
	if ( $context != 'fa-envelope' )
		$attr['target'] = '_blank';

	return $attr;
}

/**
 * Page wrapper attributes for external plugins
 *
 * @since 3.0
 * @access public
 * @param array $attr
 * @return array
 */
function hoot_theme_attr_page_wrapper_plugins( $attr ) {
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	$classes = apply_filters( 'hoot_theme_attr_page_wrapper_plugins', array( 'hoot-cf7-style', 'hoot-mapp-style', 'hoot-jetpack-style' ) );
	$classes = array_map( 'sanitize_html_class', $classes );
	foreach ( $classes as $class ) {
		$attr['class'] .= ' ' . $class;
	}

	return $attr;
}