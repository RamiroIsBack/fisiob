<?php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header top20">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>		
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php echo lnt_themes_media_grabber(array(type=>'video')); ?>
	<div class="top20">			
	<?php the_excerpt(); ?>
	</div>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<div class="row">
			<div class="col-sm-9 col-md-9">
			<?php mk_entry_footer(); ?>
			</div>
			<div class="col-sm-3 col-md-3">
			<span class="pull-right">
			 <?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( '<i class="fa fa-comments"></i> 0', 'mk' ), __( '<i class="fa fa-comments"></i> 1', 'mk' ), __( '<i class="fa fa-comments"></i> %', 'mk' ) );
			echo '</span>';
			}
			 ?>
			</span>
			</div>
		</div>
	</footer><!-- .entry-footer -->	
</article>			