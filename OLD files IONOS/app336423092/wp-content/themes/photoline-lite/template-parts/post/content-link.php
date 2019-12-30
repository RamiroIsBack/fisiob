<?php
/**
 * The template for Link post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content"<?php photoline_bgimage_postformats(); ?>>
<?php
	$textlink = get_the_title();
	$content = get_the_content();

	$content = apply_filters('the_content', $content);

	$repl = array( '<p>', '</p>', '<br />', 'http://' );
	$torepl   = array( '', '">' . $textlink . '</a>', '', '' );

	$content = '<div class="metka genericon genericon-' . get_post_format() . '" style="color:#FFF;"></div><a style="color:#FFF;text-	decoration:none;" href="http://' . str_replace( $repl, $torepl, $content );

	echo $content;
?>
	</div>

<?php get_template_part( 'template-parts/post/footer', 'meta' ); ?>

</article><!-- #post-## -->
