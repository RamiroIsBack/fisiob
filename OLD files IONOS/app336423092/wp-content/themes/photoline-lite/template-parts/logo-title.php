<?php
/**
 * @package Photoline Lite
 */
?>

<?php
	$header_text_color = get_header_textcolor();
	$logo = get_theme_mod( 'logo_upload' );
?>

<div id="logo">

<?php if ( !is_front_page() ) : ?>

<?php
	if ( !empty($logo) ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color:<?php echo '#'.$header_text_color; ?>">
		<img src="<?php echo esc_url( get_theme_mod( 'logo_upload' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php if( false === get_theme_mod( 'photoline_frame_logo' ) ) { ?>class="roundframe"<?php } ?> />
		</a>
<?php
	endif; ?>
		<?php if ( 'blank' != get_theme_mod( 'header_textcolor' ) ) { ?>
	<div class="title-group">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color:<?php echo '#'.$header_text_color; ?>">
		<?php bloginfo( 'name' ); ?>
		</a></h1>
		<h2 class="site-description" style="color:<?php echo '#'.$header_text_color; ?>"><?php bloginfo( 'description' ); ?></h2>
	</div>
		<?php } ?>

<?php else : ?>

<?php
	if ( !empty( $logo ) ) : ?>
		<img src="<?php echo esc_url( get_theme_mod( 'logo_upload' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php if( false === get_theme_mod( 'photoline_frame_logo' ) ) { ?>class="roundframe"<?php } ?> />
<?php
	endif; ?>
		<?php if ( 'blank' != get_theme_mod( 'header_textcolor' ) ) { ?>
	<div class="title-group">
		<h1 class="site-title" style="color:<?php echo '#'.$header_text_color; ?>"><?php bloginfo( 'name' ); ?></h1>
		<h2 class="site-description" style="color:<?php echo '#'.$header_text_color; ?>"><?php bloginfo( 'description' ); ?></h2>
	</div>
		<?php } ?>
<?php endif;
// fronpage ?>

</div><!--#logo-->