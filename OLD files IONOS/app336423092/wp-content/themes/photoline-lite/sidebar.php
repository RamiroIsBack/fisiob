<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Photoline Lite
 */
?>
	<div id="secondary" class="widget-area" role="complementary">

		<?php do_action( 'before_sidebar' ); // see functions.php ?>

<?php if ( is_page() && is_active_sidebar( 'sidebar-2' ) ) { ?>

<?php
	if ( has_nav_menu( 'primary' ) && false === get_theme_mod( 'photoline_submenu_pages' ) ) {
		do_action( 'display_submenu_sidebar' );	
	}
?>
		<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
			<!-- silence is gold -->
		<?php endif; // end sidebar widget area ?>

<?php }else{ // is_page() ?>

		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			<!-- silence is gold -->
		<?php endif; // end sidebar widget area ?>
<?php } ?>
	</div><!-- #secondary -->
