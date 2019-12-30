<?php
/*
* used in search results
*/
?>

<div class="post blog-block">
<div class="search-results">
	<h2 id="post-<?php the_ID(); ?>" <?php $classes = array('align-left','social-magazine-one-post-link',); post_class( $classes ); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            
	<?php get_template_part( 'post', 'date'); ?>
			     
	<?php get_template_part( 'post', 'meta'); ?>
			     
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	<?php the_content(__('Read more of this article &raquo;', 'social-magazine')); ?>
</div><!-- /search-results -->
</div><!-- /blog-block -->