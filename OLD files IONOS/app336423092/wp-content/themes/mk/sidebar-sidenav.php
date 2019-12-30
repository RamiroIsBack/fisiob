<?php
/**
 * The sidebar containing fixed sidebar widgets
 *
 * @package Mk
 */

if ( ! is_active_sidebar( 'mk-sidenav' ) ) {
	return;
}
?>

<div id="mk-sidenav" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'mk-sidenav' ); ?>
</div><!-- #mk-mid-footer -->
