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

	$content = '<h1 class="entry-title"><a style="color:#FFF;text-decoration:none;" href="http://' . str_replace( $repl, $torepl, $content );

	echo $content . '</h1><i class="fa fa-link"></i>';
?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
