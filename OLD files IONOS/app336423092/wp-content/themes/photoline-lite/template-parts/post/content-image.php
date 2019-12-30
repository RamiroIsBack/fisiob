<?php
/**
 * The template for Image post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"	<?php photoline_post_header(); ?>>

		<div <?php if  ( has_post_thumbnail() ) { ?>class="hero"<?php } ?>>
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

			<?php
			if ( has_excerpt() ) :
				the_excerpt();
			endif; ?>	

		</div>

	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>
</article><!-- #post-## -->

