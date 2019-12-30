<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           home.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="col-md-8 blog">
			
		<?php if( !is_paged() ) {
			
			get_template_part( 'content', 'intro');
			
		} ?>
		
		<div class="row">

			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			    <div class="post blog-block">
					<h2 id="post-<?php the_ID(); ?>" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							     
						<?php get_template_part( 'post', 'date' ); ?>
							     
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( array(300, 300) ); } ?>
									 
						<?php get_template_part( 'post','meta' ); ?>
							     
						<?php the_excerpt(); ?>
							<p class="posted-in">
								<small>
								<?php if (has_category()) { ?><?php esc_attr_e('Posted in ', 'social-magazine' ); ?><?php the_category(', ') ?><?php } ?>
								<?php the_tags(__('Tagged with: ','social-magazine')); ?>
								</small>
							</p>
				</div><!-- /blog-block -->
			     
			<?php endwhile; ?>
			
			</div>
			
				<div class="alignleft"><?php previous_posts_link( __( '&#8592; Previous Article', 'social-magazine' ) ); ?></div>
				<div class="alignright"><?php next_posts_link( __( 'Next Articles &#187;', 'social-magazine' ) ); ?></div>
	
		<?php
			  
			endif; ?>
			
</div><!-- /col-md-8 blog -->
<?php get_sidebar(); ?>
</div><!-- /container -->
<?php get_footer(); ?>