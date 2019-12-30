<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           sidebar.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
?>

<div class="col-md-4 sidebar">
	
	<?php get_template_part( 'content', 'icons' ); ?>
	
	<div class="sidebar-block">	
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php if ( is_active_sidebar( 'social-magazine-primary-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'social-magazine-primary-sidebar' ); ?>
					<?php else : ?>
						<div class="widget-wrap widget-inside">
							<?php get_search_form(); ?>
						</div>
						
						<div class="social-magazine-theme-widget">
							<h3 class="widget-title"><?php _e( 'Recent Posts', 'social-magazine' ); ?></h3>
								<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
						</div>
						
						<div class="social-magazine-theme-widget">
							<h3 class="widget-title"><?php _e( 'Tag Cloud', 'social-magazine' ); ?></h3>
								<?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
						</div>
						
						<div class="social-magazine-theme-widget">
							<h3 class="widget-title"><?php _e( 'Pages', 'social-magazine' ); ?></h3>
								<ul><?php wp_list_pages( 'title_li=' ); ?></ul>
						</div>
						
						<div class="social-magazine-theme-widget">
							<h3 class="widget-title"><?php _e( 'Archives', 'social-magazine' ); ?></h3>
								<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
						</div>

			<?php endif; ?>
		</div><!-- #primary-sidebar -->
	</div><!-- /sidebar-block -->
</div><!-- sidebar -->