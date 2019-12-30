<nav id="navigation" class="nav-primary" <?php omega_attr( 'menu' ); ?>>	
	<?php 
	do_action( 'omega_before_primary_menu' ); 
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => '',
		'menu_class'     => 'menu omega-nav-menu menu-primary',
		'fallback_cb'	 => 'omega_default_menu'
		)); 
	do_action( 'omega_after_primary_menu' );
	?>
</nav><!-- .nav-primary -->