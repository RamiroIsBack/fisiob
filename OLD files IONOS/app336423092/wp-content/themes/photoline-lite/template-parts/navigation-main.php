<?php
/**
 * @package Photoline Lite
 */
?>

<?php 
	if ( has_nav_menu('primary') ) { ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><span class="screen-reader-text"><?php _e( 'Menu', 'photoline-lite' ); ?></span></h1>
<?php
		wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_class' => 'nav-menu',
			'container'       => 'div',
			'container_class' => 'menu-main'
		) ); ?>

		</nav>
<?php
	} ?>