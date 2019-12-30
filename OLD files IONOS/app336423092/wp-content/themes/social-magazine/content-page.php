<?php
/*
* template used for Single and Page	
*/
?>

<h1 id="post-<?php the_ID(); ?>" <?php post_class(); ?> title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
	
<div class="blog-block single-page">	
	<?php if ( has_post_thumbnail() ) {
		 the_post_thumbnail(); } ?>
		 
		 <?php the_content();
			 
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'social-magazine' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'social-magazine' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		 
		 if ( is_attachment() ) { ?>
		 
				<div class="alignleft galleryimg"><?php previous_image_link( false, __('&#60; Previous Image', 'social-magazine') ); ?></div>
				<div class="alignright galleryimg"><?php next_image_link( false, __('Next Image &#62;', 'social-magazine') ); ?></div>
				
			<?php }

		get_template_part( 'post', 'meta'); ?>

    <?php comments_template(); ?>
</div><!-- /blog-block -->