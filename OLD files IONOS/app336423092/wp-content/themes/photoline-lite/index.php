<?php
/**
 * The main template file.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Photoline Lite
 */
get_header(); ?>

<?php if ( is_active_sidebar( 'blog-intro' ) ) { ?>
	<section id="blog-intro">
		<?php dynamic_sidebar( 'blog-intro' ); ?>
	</section>
<?php } ?>

<?php get_template_part( 'template-parts/blog-wrap', 'start' ); ?>

<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/entry/content', get_post_format() );
		endwhile;

	else :
		get_template_part( 'no-results', 'index' );

	endif;
?>

<?php get_template_part( 'template-parts/blog-wrap', 'end' ); ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { get_sidebar(); } ?>
<?php get_footer(); ?>