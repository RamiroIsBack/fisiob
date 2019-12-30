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
 * @package Mk
 */
 
 global $post_count, $wp_query;

 $post_count = '0';
	
	
get_header(); ?>

<?php do_action('mk_index_before');?>

	<?php mk_index_open(); ?>
	
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					
					<?php $post_count++; ?>
					
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							?> 
							
							<?php if(!get_post_format()) : ?>
							
								<?php if(get_theme_mod( 'mk_blog_layout')  == 'grid'):?>
							
									<?php get_template_part('formats/content', 'standard'); ?>
							
								<?php elseif(get_theme_mod( 'mk_blog_layout')  == 'alternative'): ?>
								
								<?php get_template_part('formats/entry-alternative'); ?>
								
								<?php else: ?>
							
									<?php get_template_part('formats/entry', 'standard');?>
							
								<?php endif; ?>
							
							<?php else : ?>
							
								<?php if(get_theme_mod( 'mk_blog_layout')  == 'grid'): ?>
							
									<?php get_template_part('formats/content', get_post_format()); ?>
									
								<?php elseif(get_theme_mod( 'mk_blog_layout')  == 'alternative'): ?>
								
								<?php get_template_part('formats/entry-alternative'); ?>
								
								<?php else: ?>
							
									<?php get_template_part('formats/entry', get_post_format());?>
							
								<?php endif;?>
							
							<?php endif; ?>
						
					<?php endwhile; ?>
					
					<div class="clearfix"></div>
					
					<div class="custom-pagination-wrapper clearfix">
					<?php mk_custom_pagination("",$paged); ?>
					</div>
					
				<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>
				
			<?php mk_index_close(); ?>
			
			<?php do_action('mk_index_after');?>
			
<?php get_footer(); ?>
