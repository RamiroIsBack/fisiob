<?php
/**
 * The template for displaying Category default template.
 * @package Photoline Lite
 */

get_header(); ?>
			
<?php get_template_part( 'template-parts/blog-wrap', 'start' ); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/entry/content', get_post_format() ); ?>

	<?php endwhile; ?>

<?php else : ?>
		<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif;  // have_posts() ?>

<?php get_template_part( 'template-parts/blog-wrap', 'end' ); ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { get_sidebar(); } ?>
<?php get_footer(); ?>
