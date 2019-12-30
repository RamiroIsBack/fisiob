<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package queue
 */

get_header();

	if ( is_home() && !is_paged() ) {
		echo '<h1 class="logo">' . get_bloginfo('name') . '</h1>';
		if ( get_bloginfo('description') ) {
			echo '<h2 class="tagline">' . get_bloginfo('description') . '</h2>';
		}
	}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php
	if ( is_front_page() && queue_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */?>
			<section class="articlesnippets container fullwidth">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'post-preview', get_post_format() );
					?>

				<?php endwhile; ?>
				<?php queue_paging_nav(); ?>
			</section>


		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
