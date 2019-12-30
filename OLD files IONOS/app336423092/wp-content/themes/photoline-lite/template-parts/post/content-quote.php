<?php
/**
 * The template for Quote post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
<?php
	$content = get_the_content();
	$content = apply_filters('the_content', $content);

	$repl = array('<p>', '</p>', '<br />');
	$torepl   = array('<blockquote>', '</blockquote>', '');

	$cite = get_the_title();

	$content = str_replace( $repl, $torepl, $content );

	echo '<cite>' . $cite . ':</cite>';
?>
		<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'photoline-medium' ); ?>

		<div style="margin-bottom: 10px; padding-top: 20px; color: #FFF; background: <?php echo get_theme_mod( 'photoline_link_color', '#2d2d2d' ); ?><?php if  ( $thumbnail ) { ?> url(<?php echo $thumbnail[0]; ?>) no-repeat; background-position: 50%; background-size: cover<?php } ?>;">
			<?php echo $content; ?>
		</div>

	</div><!-- .entry-content -->

<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>
</article><!-- #post-## -->
