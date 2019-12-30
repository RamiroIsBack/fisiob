<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           category.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>
  
<div class="wrap">
	<div class="container">
		<div class="col-md-8 blog">

		<h1><?php _e("Category:", 'social-magazine' ); ?> <?php single_cat_title(); ?></h1>

		<?php 
		// Check if there are any posts to display
		if ( have_posts() ) : ?>

		<?php
		
		// The Loop
		while ( have_posts() ) : the_post();
		
		get_template_part( 'content');
		
		endwhile; ?>
		
				<div class="navigation">
					<div class="alignleft">
						<?php previous_posts_link( __( '&#8592; Previous Article', 'social-magazine' ) ); ?>
					</div><!-- /alignleft -->
					<div class="alignright">
						<?php next_posts_link( __( 'Next Articles &#187;', 'social-magazine' ) ); ?>
					</div><!-- /alignright -->
				</div><!-- /navigation -->
		
		<?php else :
					
		get_template_part( 'content', 'none');
					
		endif; ?>
	</div><!-- /col-md-8 blog -->
<?php get_sidebar(); ?>
</div><!-- /container -->
<?php get_footer(); ?>