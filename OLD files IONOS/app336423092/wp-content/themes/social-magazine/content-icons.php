<?php
/*
* used on the Sidebar Template
*/

 $twitter_check = get_theme_mod( 'twitter_setting' );
    if( $twitter_check != '' ) { 
	    echo '<div class="social-magazine-links twitter"><a href="';
	    echo esc_url( get_theme_mod( 'twitter_setting', 'www.twitter.com') );
	    echo '" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></div>';

}

$facebook_check = get_theme_mod( 'facebook_setting' );
    if( $facebook_check != '' ) { 
	    echo '<div class="social-magazine-links facebook"><a href="';
	    echo esc_url( get_theme_mod('facebook_setting', 'www.facebook.com') );
	    echo '" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></div>';

}

$youtube_check = get_theme_mod( 'youtube_setting' );
    if( $youtube_check != '' ) { 
	    echo '<div class="social-magazine-links youtube"><a href="';
	    echo esc_url( get_theme_mod('youtube_setting', 'www.youtube.com') );
	    echo '" target="_blank"><i class="fa fa-youtube fa-2x"></i></a></div>';

}

$pinterest_check = get_theme_mod( 'pinterest_setting' );
    if( $pinterest_check != '' ) { 
	    echo '<div class="social-magazine-links pinterest"><a href="';
	    echo esc_url( get_theme_mod('pinterest_setting', 'www.pinterest.com') );
	    echo '" target="_blank"><i class="fa fa-pinterest fa-2x"></i></a></div>';

}

$linkedin_check = get_theme_mod( 'linkedin_setting' );
    if( $linkedin_check != '' ) { 
	    echo '<div class="social-magazine-links linkedin"><a href="';
	    echo esc_url( get_theme_mod('linkedin_setting', 'ww.linkedin.com') );
	    echo '" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></div>';

}

$rss_check = get_theme_mod( 'rss_setting' );
    if( $rss_check != '' ) { 
	    echo '<div class="social-magazine-links rss"><a href="';
	    echo esc_url( get_theme_mod('rss_setting', '') );
	    echo '" target="_blank"><i class="fa fa-rss fa-2x"></i></a></div>';

}