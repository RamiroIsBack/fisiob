<?php
/**
 * The template for displaying all single posts.
 *
 * @package Mk
 */

get_header(); 

mk_custom_header_feature();

?>

<?php do_action('mk_single_before');?>

<div class="content" id="content">
	<main id="main" class="site-main" role="main">
		<div class="row">

			<div class="col-sm-offset-1 col-sm-10 col-md-10 mk-sigle-post top60">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php
			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			if(!get_post_format()) {

			get_template_part('formats/content', 'standard');

			} else {

			get_template_part('formats/content', get_post_format());

			}
					?>
			<?php mk_the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
			</div>	
		</div>
	</main>			
</div>	

<?php do_action('mk_single_after');?>
	
<?php get_footer(); ?>
