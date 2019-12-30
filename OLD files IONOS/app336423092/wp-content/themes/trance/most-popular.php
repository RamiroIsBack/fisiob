<?php
/**
 *
 *	The Most-Popular section of the theme.
 *
 **/
 ?>
	 <div class="post-slider">
	 
	 	<?php
	 	
	 	$popularpost = new WP_Query( 
		 array( 
			 	'posts_per_page' => 6, 
			 	'meta_key' => 'post_views_count', 
			 	'orderby' => 'meta_value_num', 
			 	'order' => 'DESC'  
			 ) 
		 );

	 	if ($popularpost->have_posts()):
	 		while ( $popularpost->have_posts() ) : $popularpost->the_post();
	?>

 	<div class="mp-article">
	 	<div class="featured-image">
	 		<a href="<?php the_permalink(); ?>">
		 		<?php if (has_post_thumbnail()) : ?>
		
		 		<?php the_post_thumbnail('trance-most-popular'); ?>
		 		
		 		<?php else: ?>
		 			<img src="<?php echo esc_url( get_template_directory_uri()."/images/dthumb.jpg" );?>">
		 			<?php endif;?> 
	 		</a>
	 	</div>
	 	

<div class="mp-post-title">
	 	<?php 
				if (strlen(get_the_title()) >= 30) { ?>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>" rel="bookmark">
			<?php echo esc_attr(substr(get_the_title(), 0, 29))."...";
			}
					
				else { ?>
				<h1 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark">
			<?php	the_title();	
				}	
					 ?>
		</a></h1>
	
	 	</div>
	 </div>
	
	<?php
	endwhile;
	else: ?>
	<div class="mp_empty">
		<?php
	 		_e('Oops, there are no posts. Browse Some posts to fill this area.','trance'); 
	 	?>
	</div>
	<?php
 	endif;
 ?>
</div>
 		



