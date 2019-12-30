<?php
/**
 * @package Photoline Lite
 */
?>

<?php
$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'photoline-aside' );
if  ( $thumbnail ) { $thumbnail = $thumbnail[0]; } else { $thumbnail = photoline_catch_image(); }
?>

<div class="innerBox" <?php if  ( $thumbnail ) { ?>style="background: url(<?php echo $thumbnail; ?>) no-repeat; background-position: 50%; background-size: cover;"<?php } ?>>

<div class="titleBox">
	<article id="post-<?php the_ID(); ?>">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<h3>
			<?php
				if ( get_the_title() ) {
					the_title();
				} else {
					esc_html_e( 'No Title', 'photoline-lite');
				} ?>
			</h3>
		</a>
	</article><!-- #post-## -->
</div>

</div><!-- .innerBox -->