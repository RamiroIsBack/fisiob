<?php
/**
 * @package queue
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('reading')); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php queue_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php edit_post_link( __( 'Edit', 'queue' ), '<span class="edit-link">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'queue' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php queue_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
