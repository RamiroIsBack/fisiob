<?php
/**
 * The template used for Home page
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

<!-- END Before Content Widgets Area -->

<?php get_template_part( 'template-parts/section', 'home-content' ); ?>
<!-- END Home Page Content -->

<?php if ( is_active_sidebar( 'home-below' ) ) { ?>
	<section id="after-home-widget">

	<div class="grid<?php $sidebars_widgets = wp_get_sidebars_widgets(); echo count($sidebars_widgets['home-below']); ?> clearfix">
		<?php dynamic_sidebar( 'home-below' ); ?>
	</div>

	</section>
<?php } ?>