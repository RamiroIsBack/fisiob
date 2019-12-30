<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Mk
 */

get_header(); 

if(!is_front_page()){
mk_custom_header_feature();
}
?>

<?php do_action('mk_page_before');?>

<div class="row">
	<div class="col-sm-offset-1 col-sm-10 col-md-10">	
		<div id="content" class="content">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	 </div>
	</div>
</div>
<?php do_action('mk_page_after');?>

<?php get_footer(); ?>
