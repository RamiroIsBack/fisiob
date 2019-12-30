<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           index.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="col-md-8 blog">
			
			<?php if (have_posts()) :
			while (have_posts()) : the_post();
					
			get_template_part( 'content', get_post_format() );
			
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