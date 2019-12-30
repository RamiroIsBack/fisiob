<?php
/**
 * The template used for displaying page content in home page
 * @package Photoline Lite
 */
?>

<?php
	if ( false === get_theme_mod( 'frontpage_header' ) ) {
		get_template_part( 'template-parts/home', 'tagline' );
	}else{
		get_template_part( 'template-parts/home', 'hero' );
} ?>

<?php if ( is_active_sidebar( 'home-top' ) ) { ?>
	<section id="prebefore-home-widget">

		<?php dynamic_sidebar( 'home-top' ); ?>

	</section>
<?php } ?>

<?php if ( is_active_sidebar( 'home-above' ) ) { ?>
	<section id="before-home-widget">

	<div class="grid<?php $sidebars_widgets = wp_get_sidebars_widgets(); echo count($sidebars_widgets['home-above']); ?> clearfix">
		<?php dynamic_sidebar( 'home-above' ); ?>
	</div>

	</section>
<?php } ?>

<?php get_template_part( 'template-parts/section-home', 'content' ); ?>

<section id="home-child-page">

	<?php
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 9,
			'no_found_rows'  => true,
		) );
	?>

<?php
	if ( $child_pages->have_posts() ) : ?>

<div class="grid2 clearfix">
	<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

		<div class="col">
			<?php get_template_part( 'template-parts/page/childpages', 'grid' ); ?>
		</div>

	<?php endwhile; ?>
</div>

<?php
	endif;
	wp_reset_postdata();
	?>

</section>

<?php if ( is_active_sidebar( 'home-below' ) ) { ?>
	<section id="after-home-widget">

	<div class="grid<?php $sidebars_widgets = wp_get_sidebars_widgets(); echo count($sidebars_widgets['home-below']); ?> clearfix">
		<?php dynamic_sidebar( 'home-below' ); ?>
	</div>

	</section>
<?php } ?>