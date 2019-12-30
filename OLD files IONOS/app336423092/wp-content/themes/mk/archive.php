<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mk
 */

get_header(); 


mk_custom_header_feature();

?>

<?php do_action('mk_archive_before');?>

<div class="row">
	<div class="col-sm-offset-1 col-sm-10 col-md-10 mk-archives top40">	
		<div id="content" class="content">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
			
			<?php if(!get_theme_mod( 'mk_show_custom_header_image',true) == true):?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			<?php endif;?>
			
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							if(!get_post_format()) {
							
							get_template_part('formats/entry', 'standard');
							
							} else {
							
							get_template_part('formats/entry', get_post_format());
							
							}
						?>

				<?php endwhile; ?>

				<div class="clearfix"></div>
						<?php
						if (function_exists('wp_pagenavi')):?>
							
								<?php wp_pagenavi(); ?> 
								<?php else: ?>
						<div class="pagination-wrap">
							<?php echo mk_pagenavi($wp_query); ?>									
						</div>
						
					<?php endif; ?>
					
			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div>
		
		
	</div>
</div>

<?php do_action('mk_archive_after');?>

<?php get_footer(); ?>
