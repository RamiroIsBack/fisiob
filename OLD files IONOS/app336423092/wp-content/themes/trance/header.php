<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package trance
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="top-nav" class="container">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'trance' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'trance' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php if (get_theme_mod("trance-logo")) { ?>
			<div id = "logo">
				<a href="<?php echo esc_url(home_url('/')); ?>"><img src ="<?php echo esc_url(get_theme_mod('trance-logo')); ?>"></a>
				</div>
			<?php } 
			else { ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php } ?>
		</div><!-- .site-branding -->
		<div id="header-image"></div>
	</header><!-- #masthead -->
	<div id="search-wrapper" class="container">
	<div class="search-icon">
				<img src="<?php echo esc_url( get_template_directory_uri() . "/images/search.png" ); ?>">
			</div>
		<div id="social-icons" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
			<?php if (get_theme_mod('social')) {
				get_template_part('social');
			}
			
			?>
		</div>
		<div id="search-bar" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="searchform">
				<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
							<div><input type="text" size="18" value="" name="s" id="s" />
							<button type="submit" class="search-submit"><?php _e('Search','trance'); ?></button>
							</div>
					</form>
				</div>
		</div>
	</div>
	
	<?php if ( is_home() && get_theme_mod('trance-slide_enable') ) { ?>
	<div id="slider-wrapper">
		<ul class="bxslider">
			<?php 
			for($i = 1; $i <= 3; $i++) { 
				$s = 'trance-slide_' . $i;
				$d = 'trance-desc-' . $i;
				$u = 'trance-url-' . $i;
			?>	
				<li><div class="slide"><a href="<?php echo esc_url( get_theme_mod($u) ); ?>"><img src="<?php echo esc_url( get_theme_mod($s) ); ?>"></a><div class="slide_caption"><a href="<?php echo esc_url( get_theme_mod($u) ); ?>"><p><?php echo esc_html(get_theme_mod($d), 'trance' ); ?> </p></a></div></div>
				 </li>
			<?php } ?>
		</ul>
	</div>
	<?php } ?>
	
	<?php if (is_home() && get_theme_mod('trance-mp-show') != true): ?>
	
	<h2 id="mp-title" class="container">
 		<?php _e('Most Popular','trance'); ?>
 	</h2>

	<div id="most-popular">
	
		<?php get_template_part('most','popular'); ?>
	</div>
	
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'trance-content-toggle', false ) == false ) { ?>
	<div id="content" class="site-content container">
	<?php 
	} 
	else 
	{ ?>
		<div id="content" class="site-content container">
	<?php } ?>
