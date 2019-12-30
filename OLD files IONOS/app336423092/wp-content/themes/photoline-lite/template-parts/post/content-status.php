<?php
/**
 * The template for Status post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content" style="margin-bottom:20px;">
		<div class="status">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 48 ); ?></a>
		</div><!--.status-->
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<p><?php echo mb_substr( strip_tags( get_the_content() ), 0, 140 ); ?></p>
	</div><!-- .entry-content -->


<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>

</article><!-- #post-## -->
