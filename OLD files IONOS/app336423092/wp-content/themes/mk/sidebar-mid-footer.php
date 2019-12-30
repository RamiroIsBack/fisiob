<?php
/**
 * The sidebar containing them middle footer widgets
 *
 * @package Mk
 */

if ( ! is_active_sidebar( 'mk-mid-footer' ) ) {
	return;
}
?>

<div id="mk-mid-footer" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'mk-mid-footer' ); ?>
</div><!-- #mk-mid-footer -->
