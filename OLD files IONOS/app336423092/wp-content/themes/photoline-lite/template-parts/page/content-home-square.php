<?php
/**
 * The template used for Home page
 * @package Photoline Lite
 */
?>


<section id="squarePosts">
 <!-- SquarePost-->
<div id="squareTiles" class="clearfix">

    <?php
        global $post;

        $numberposts = esc_attr( get_theme_mod( 'number_homeposts', '6' ) );

        $args = array(
            'post_status'    => 'publish',
			'post__not_in'   => get_option( 'sticky_posts' ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'post_format',
					'terms'    => array( 'post-format-image' ),
					'field'    => 'slug',
					'operator' => 'IN',
				),
			),
            'numberposts' => $numberposts
        );
        $home_posts = get_posts($args);
    ?>
<?php if( $home_posts ) { ?>

<?php
	foreach( $home_posts as $post ) : setup_postdata( $post );
?>

	<div class="box">
		<?php get_template_part( 'template-parts/layout', 'tiles' ); ?>
	</div>

        <?php
	endforeach;
	wp_reset_postdata();
	?>

<?php } // home_posts ?>

</div><!-- #squareTiles -->
</section>

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

<?php get_template_part( 'template-parts/section', 'home-page' ); ?>

<?php if ( is_active_sidebar( 'home-below' ) ) { ?>
	<section id="after-home-widget">

	<div class="grid<?php $sidebars_widgets = wp_get_sidebars_widgets(); echo count($sidebars_widgets['home-below']); ?> clearfix">
		<?php dynamic_sidebar( 'home-below' ); ?>
	</div>

	</section>
<?php } ?>