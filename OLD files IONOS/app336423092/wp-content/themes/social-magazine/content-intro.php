<?php
/*
* used on the Home Template
*/
?>
	<h1><?php bloginfo('name'); ?></h1>
	
	<?php $p_one_check = get_theme_mod( 'main_paragraph_setting' );
    if( $p_one_check != '' ) { 
	
	echo '<p class="text-center">';
	echo esc_html( get_theme_mod( 'main_paragraph_setting', 'Add an intro paragraph') );
	echo '</p>';
	}
	
	$p_two_check = get_theme_mod( 'main_paragraph_setting' );
    if( $p_two_check != '' ) {
	
	echo '<p class="text-center">';
	echo esc_html( get_theme_mod( 'second_paragraph_setting', 'Add a second paragraph') );
	echo '</p>';
	}
	
	$button_check = get_theme_mod( 'button_url_setting' );
    if( $button_check != '' ) {
	
	echo '<a class="btn btn-lg btn-primary featured-button" role="button" href="';
	echo esc_html( get_theme_mod( 'button_url_setting', '' ) );
	echo '" target="_blank">';
	echo esc_html( get_theme_mod('button_text_setting', '') );
	echo '</a>';
	}