<?php
	global $post_count;
?>
<?php
$unique = 'gallery-'.rand(1,2400000);

?>
<?php if(!is_single()) : ?>

<div id="post-<?php the_ID(); ?>" <?php post_class("mk-blog-item post-$post_count");?>>
	<div class="mk-blog-item-inner">
		<article class="mk-blog-post">
			<?php if ( get_post_gallery() ) : ?>
			<?php
			$gallery = get_post_gallery( get_the_ID(), false );
			 ?>
			 <div class="gallery-slideshow">
	         <div class="gallery-image-slider cycle-slideshow" data-cycle-swipe="true" data-cycle-swipe-fx="fadeout" data-cycle-fx="tileBlind" data-cycle-next="#next-<?php echo $unique;?>" data-cycle-prev="#prev-<?php echo $unique;?>" data-cycle-speed = "800" data-cycle-timeout="8000" data-cycle-pause-on-hover = "true">
			 <?php
			 foreach( $gallery['src'] as $src ) {  ?> 
			 <?php $image = mk_image_resize($src,650,650, true, true, true);?>
			<img src="<?php echo esc_url($image); ?>" class="mk-post-galleries" alt="Gallery image" /> 
			 <?php
			 } //foreach 
			 ?>
			 </div>
			 <div class="_latest_posts_pagination">
						<span id="prev-<?php echo $unique;?>" class="_latprev">&larr;</span><span id="next-<?php echo $unique;?>" class="_latnext">&rarr;</span>
						</div> 
			 </div>
			 
			<?php endif; /* get_post_gallery*/ ?>
			<div class="img">
				<div class="overlay">
					<div class="expand">
					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					<?php printf(
					'<a href="%1$s" class="post-link-btn" rel="bookmark">%2$s</a>',
					esc_url( get_permalink() ),'Continue Reading','mk'
					);
					?>
					</div>
				</div>												
			</div>
		</article>
	</div>
</div>	

<?php else : /* If is_single */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php do_action('mk_single_article_before_content');?>
	
	<div class="entry-content">
	
		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article>

<?php endif; /* If is_single end */?>