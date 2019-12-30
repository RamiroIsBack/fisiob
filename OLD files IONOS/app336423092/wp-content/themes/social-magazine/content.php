<?php
/*
* default template used for the loop	
*/
?>

<div class="post blog-block">
		<h2 id="post-<?php the_ID(); ?>" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			     
	<?php get_template_part( 'post', 'date' );
			     
	if ( has_post_thumbnail() ) { the_post_thumbnail(); }
					 
	get_template_part( 'post','meta' );
			     
	the_content(__('Read more of this article &raquo;', 'social-magazine')); ?>
		<p class="posted-in">
			<small>
			<?php if (has_category()) { ?><?php esc_attr_e('Posted in ', 'social-magazine' ); ?><?php the_category(', ') ?><?php } ?>
			<?php the_tags(__('Tagged with: ', 'social-magazine')); ?>
			</small>
		</p>
</div><!-- /blog-block -->