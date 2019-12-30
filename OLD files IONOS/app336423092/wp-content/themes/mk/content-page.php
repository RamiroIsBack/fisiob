<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Mk
 */
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if(!get_theme_mod( 'mk_show_custom_header_image',true) == true):?>
	<header class="entry-header top20">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php endif;?>
	
	<div class="entry-content top40">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'mk' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
