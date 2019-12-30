<?php
/**
 * The template for Aside post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div>
			<i class="fa fa-asterisk"></i>
			<p><?php photoline_excerpt( 95 ); ?></p>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
