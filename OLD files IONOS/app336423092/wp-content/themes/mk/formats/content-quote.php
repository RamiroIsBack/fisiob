<?php
	global $post_count;
?>
<?php if(!is_single()) : ?>

<div id="post-<?php the_ID(); ?>" <?php post_class("mk-quote-post-format mk-blog-item post-$post_count");?>>
	<div class="mk-blog-item-inner">
		<article class="mk-blog-post">
			<blockquote>
			<?php the_excerpt();?>
			</blockquote>	
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
<?php else: ?>


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