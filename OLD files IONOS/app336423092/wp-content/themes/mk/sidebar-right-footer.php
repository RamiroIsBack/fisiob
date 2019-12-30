<?php
/**
 * The sidebar containing them right footer widgets
 *
 * @package Mk
 */

if ( ! is_active_sidebar( 'mk-right-footer' ) ) {
	return;
}
?>

<div id="mk-right-footer" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'mk-right-footer' ); ?>
</div><!-- #secondary -->
