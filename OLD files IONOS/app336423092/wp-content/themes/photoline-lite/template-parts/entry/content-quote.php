<?php
/**
 * The template for Quote post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content"<?php photoline_bgimage_postformats(); ?>>
			<i class="fa fa-quote-left"></i>
			<h4><em><?php photoline_excerpt( 20 ); ?></em></h4>
			<?php the_title( '<h5>&ndash; ', ' &ndash;</h5>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
