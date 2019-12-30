<?php
/**
 * Display Home Hero section
 * 
 * @package Photoline Lite
 */
?>

<section id="home-hero">
<?php
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'photoline-medium' );
?>
<div class="entry-content" style="background:<?php echo esc_attr( get_theme_mod( 'photoline_main_color', '#2d2d2d' ) ); ?><?php if  ( $thumbnail ) { ?> url(<?php echo $thumbnail[0]; ?>) no-repeat; background-position: 50%; background-size: cover<?php } ?>;">

	<div class="hero">		
		<h1><?php the_title(); ?></h1>
		<?php the_excerpt(); ?>
	</div>

</div><!-- .entry-content -->
</section>