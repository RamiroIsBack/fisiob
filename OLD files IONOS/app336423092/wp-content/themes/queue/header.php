<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package queue
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body 
<?php 
	if (is_home()) {
		$forcehome = 'home';
	}
	else {
		$forcehome = '';
	}

	body_class($forcehome);
 ?>>
<div id="page" class="hfeed site">
	<nav class="globalnav" role="navigation">
		<div class="container">
			<div class="slidingtray">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><em><?php bloginfo( 'name' ); ?></em></a></h1>
				<?php
					wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) );
					wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'secondarymenu' ) );
				?>
			</div>
		</div>
	</nav>

	<div id="content" class="site-content container">