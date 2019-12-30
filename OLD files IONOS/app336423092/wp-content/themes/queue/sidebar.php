<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package queue
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area four columns sidebar offset-by-one" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
