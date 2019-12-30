<?php
/**
 * The template for Status post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
	<?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<i class="fa fa-flag"></i>
				<p><?php echo mb_substr( strip_tags( get_the_content() ), 0, 20 ); ?></p>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
