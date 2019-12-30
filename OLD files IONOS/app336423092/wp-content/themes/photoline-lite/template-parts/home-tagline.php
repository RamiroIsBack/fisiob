<?php
/**
 * Display Home Tagline section
 * 
 * @package Photoline Lite
 */
?>

<?php
	$taglinebg = get_theme_mod( 'home_tagline_bgimg' );
	$placement = get_theme_mod( 'home_tagline' );
?>

<section id="tagline">

<div id="home-tagline" style="background: <?php echo esc_attr( get_theme_mod( 'home_tagline_bgcolor', '#FFF' ) ); ?><?php if ( !empty( $taglinebg ) ) { ?> url(<?php echo esc_url( get_theme_mod( 'home_tagline_bgimg' ) ); ?>); background-position: 50%; background-size:cover<?php } ?>;">

<?php if ( !empty($placement) ) : ?>

	<div class="tagline-txt">
		<?php echo do_shortcode( wp_kses_post( get_theme_mod( 'home_tagline' ) ) ); ?>
	</div>

<?php endif; ?>

</div><!--#home-tagline-->

</section>