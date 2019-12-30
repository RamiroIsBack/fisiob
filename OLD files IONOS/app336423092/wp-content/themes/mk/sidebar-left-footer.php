<?php
/**
 * The sidebar containing them left footer widgets
 *
 * @package Mk
 */

if ( ! is_active_sidebar( 'mk-left-footer' ) ) {
	return;
}
?>

<div id="mk-left-footer" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'mk-left-footer' ); ?>
</div><!-- #mk-left-footer -->
