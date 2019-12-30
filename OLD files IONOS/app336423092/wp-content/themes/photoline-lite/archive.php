<?php
/**
 * The template for displaying Archive pages.
 * @package Photoline Lite
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>

<?php get_template_part( 'template-parts/blog-wrap', 'start' ); ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/entry/content', get_post_format() );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

<?php get_template_part( 'template-parts/blog-wrap', 'end' ); ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { get_sidebar(); } ?>
<?php get_footer(); ?>
