<?php
/**
 * The template for Audio post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content"<?php photoline_bgimage_postformats(); ?>>
			<a href="<?php the_permalink(); ?>">
				<i class="fa fa-volume-up"></i>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</a>
		</div><!-- .entry-content -->

</article><!-- #post-## -->
