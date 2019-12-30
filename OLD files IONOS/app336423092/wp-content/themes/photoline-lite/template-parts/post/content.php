<?php
/**
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

			<?php if ( has_excerpt() ) : ?>
		<?php the_excerpt(); ?>
			<?php endif; ?>	

			<?php if ( has_post_thumbnail() && !has_post_format() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail('photoline-medium'); ?>
		</div>
			<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'photoline-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>

</article><!-- #post-## -->
