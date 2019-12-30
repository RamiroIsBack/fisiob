<?php
/**
 * Home page content section 2 for Home
 * 
 * @package Photoline Lite
 */
?>

<?php if ( '' != get_the_content() ) : ?>
<section id="home-content">
	<div class="entry-content">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_content(); ?>

		<?php edit_post_link( __( 'Edit', 'photoline-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
	</div><!-- .entry-content -->
</section>
<?php endif; ?>