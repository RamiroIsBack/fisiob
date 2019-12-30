<?php
/*
* template used in Archives
*/
?>

<div class="post blog-block">
	<h2 id="post-<?php the_ID(); ?>" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			     
		<?php get_template_part( 'post', 'date' ); ?>
			     
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					 
		<?php get_template_part( 'post','meta' ); ?>
			     
		<?php the_excerpt(__('Read More', 'social-magazine' )); ?>
			
			<p class="posted-in">
				<small>
				<?php if (has_category()) { ?><?php esc_attr_e('Posted in ', 'social-magazine' ); ?><?php the_category(', ') ?><?php } ?>
				<?php the_tags(__('Tagged with: ', 'social-magazine')); ?>
				</small>		
			</p>
</div><!-- /blog-block -->