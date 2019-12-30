<?php
/**
 * The template for Aside post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>

</article><!-- #post-## -->
