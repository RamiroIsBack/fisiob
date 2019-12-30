<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           page.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>
  
<div class="wrap">
	<div class="container">
		<div class="col-md-8 blog">
			
			<?php if ( have_posts() ) :
			
				while ( have_posts() ) : the_post(); 
				
				get_template_part( 'content', 'page');
				
				endwhile;
					
				else :
			
				get_template_part( 'content', 'none');
			
				endif; ?>
					
			</div><!-- /col-md-8 blog -->
		<?php get_sidebar(); ?>
		</div><!-- /container -->
<?php get_footer(); ?>