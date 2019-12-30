<?php
/**
 * The Header Theme
 * @package Photoline Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="out-wrap"<?php photoline_header_bg(); ?>>
		<?php photoline_top_menu(); ?>
		<div id="wrap-header" class="wrap hfeed site">
			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding clearfix">
					<?php get_template_part( 'template-parts/logo', 'title' ); ?>
<?php
	if ( true == get_theme_mod( 'photoline_header_social' ) ) {
	photoline_social_links(); } ?>
				</div><!--site-branding-->
				<?php get_template_part( 'template-parts/navigation', 'main' ); ?>
			</header>
		</div><!-- #wrap-header -->
	</div><!-- .out-wrap -->

<?php
	if ( !is_front_page() ) {
	get_template_part( 'template-parts/header' ); } ?>

<div id="wrap-content" class="wrap clearfix">
	<div id="content" class="site-content">