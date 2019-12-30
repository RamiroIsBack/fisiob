<?php
/**
 * The template for Image post format
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'photoline-aside' );
	if  ( $thumbnail ) { $thumbnail = $thumbnail[0]; } else { $thumbnail = photoline_catch_image(); }
?> 
<div class="entry-content" style="background:<?php echo get_theme_mod( 'photoline_link_color', '#2d2d2d' ); ?><?php if  ( $thumbnail ) { ?> url(<?php echo $thumbnail; ?>) no-repeat; background-position: 50%; background-size: cover<?php } ?>;">

<a href="<?php the_permalink(); ?>">
<div class="inner-format">
			<i class="fa fa-camera"></i>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</div>
</a>
		</div><!-- .entry-content -->


</article><!-- #post-## -->

