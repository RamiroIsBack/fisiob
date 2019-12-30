<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Queue
 * @since Queue 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<a href="<?php esc_url( the_permalink() ) ?>" rel="bookmark" class="clickableblock">
					<div class="summary">
						<?php the_title( '<h1 class="entry-title">','</h1>' ); ?>
						<?php if ( ! has_excerpt() ) {
							echo '';
						} else { 
							the_excerpt();
						} ?>
					</div>
	<?php
		// Output the featured image.
		the_post_thumbnail();
	?>
				</a>
</article><!-- #post-## -->