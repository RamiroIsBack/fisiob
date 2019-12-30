<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           header.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width"/><!-- for mobile -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head><!-- /head -->

<body <?php body_class(); ?>>
	
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#social-magazine-navbar-collapse">
                <span class="sr-only"><?php esc_attr_e('Toggle navigation', 'social-magazine' ); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

<?php if ( get_header_image() ) : ?>

	<a class="site-title" href="<?php echo site_url(); ?>"><img class="site-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" rel="home" /></a>
		
		<?php else : ?>
		
	<a id="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		
		<?php endif; ?>
		
		</div><!-- /navbar-header -->
		
<?php get_template_part('content', 'nav'); ?>

    </div><!-- /container -->
</nav><!-- /nav -->