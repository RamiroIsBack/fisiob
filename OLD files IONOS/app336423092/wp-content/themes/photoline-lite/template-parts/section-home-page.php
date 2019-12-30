<?php
/**
 * Home page content section for Home
 * 
 * @package Photoline Lite
 */
?>

<?php if ( '' != get_the_content() ) : ?>
<section id="home-page">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">

			<?php the_content(); ?>

		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</section>
<?php endif; ?>