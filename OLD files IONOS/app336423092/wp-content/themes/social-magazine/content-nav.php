<?php
/*
* used in Header for navigation
*/

 if ( has_nav_menu( 'header' ) ) {
            $args = array(
                'menu'              => 'header',
                'theme_location'    => 'header',
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'social-magazine-navbar-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_page_menu',
                'walker'            => new wp_bootstrap_navwalker()
            );
            wp_nav_menu( $args );
            
           } else {
	           
		    wp_nav_menu( array(
	            'menu' 				=> 'header',
	            'theme_location'    => 'header',
	            'container' 		=> 'div',
	            'container_class'   => 'collapse navbar-collapse',
	            'menu_class' 		=> 'nav navbar-nav',
	            'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
	            //Process nav menu using our custom nav walker
	            'walker' 			=> new wp_bootstrap_navwalker() )
	            );
	            } 