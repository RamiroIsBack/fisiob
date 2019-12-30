<?php
/**
 * The template for Video post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

			<?php if ( has_excerpt() ) : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>	

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php the_content(); ?>

		</div><!-- .entry-content -->

<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>

</article><!-- #post-## -->
