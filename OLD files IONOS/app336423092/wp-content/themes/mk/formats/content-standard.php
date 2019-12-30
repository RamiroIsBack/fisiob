<?php

/**
 * @package mk
 */
 
 global $post_count;
 
 $stack = array(1,4,5,8,9,12);
 
?>

<?php if(!is_single()) :?>
<div id="post-<?php the_ID(); ?>" <?php post_class("mk-blog-item post-$post_count");?>>
<div class="mk-blog-item-inner">
	<article class="mk-blog-post">
		<?php
		$image = mk_get_the_Image(array('format'=>'array','size'=>'full'));
		if($image['src']):
		$image = mk_image_resize($image['src'],650,650, true, true, true);
		endif;
		?>
	<img class="ft__image" src="<?php echo esc_url($image);?>" alt="" />
		<?php if(in_array($post_count,$stack)):?>
		<div class="img">
		<div class="overlay">
			<div class="expand">
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<?php printf(
			'<a href="%1$s" class="post-link-btn" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),'Continue Reading','mk'
			);
			?>
			<div>
			</div>
			</div>
		</div>												
	</div>
	<?php else: ?>
	<div class="img">
	<div class="overlay">
	</div>
	</div>
	<div class="mk-post-meta-2">
	<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<?php the_excerpt();?>
	</div>
	<?php endif;?>
	</article>
</div>
</div>	

<?php else : ?>

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

<?php endif; ?>