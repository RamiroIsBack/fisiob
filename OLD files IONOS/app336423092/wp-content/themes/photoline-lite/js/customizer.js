/**
 * Make Theme Customizer preview reload changes asynchronously for a better user experience.
 */

(function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} ); 
    wp.customize( 'photoline_main_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'color', to );
        } );
    });
    wp.customize( 'photoline_headerbg_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-branding' ).css( 'background', to );
        } );
    });
    wp.customize( 'photoline_menu_color', function( value ) {
        value.bind( function( to ) {
            $( '.main-navigation, .nav-menu ul' ).css( 'background', to );
        } );
    });
    wp.customize( 'photoline_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'button, html input[type="button"], input[type="reset"], input[type="submit"]' ).css( 'background', to );
        } );
    });
    wp.customize( 'photoline_footerbg_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-footer' ).css( 'background', to );
        } );
    });
    wp.customize( 'photoline_footer_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-footer, .site-footer a' ).css( 'color', to );
        } );
    });
wp.customize( 'photoline_menu_current', function( value ) {
        value.bind( function( to ) {
            $( '.nav-menu .current_page_item a, .nav-menu .current-menu-parent a, .nav-menu .current-post-parent a, .nav-menu .current-post-ancestor a, .nav-menu .current-menu-ancestor a, .nav-menu .current-menu-item a' ).css( 'background', to );
        } );
    });
    wp.customize( 'photoline_link_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-content a' ).css( 'color', to );
        } );
    });
    wp.customize( 'photoline_addit_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-content .entry-meta, .comment-metadata, label, .reply:before' ).css( 'color', to );
        } );
    });
    wp.customize('home_tagline',function( value ) {
        value.bind(function(to) {
            $('#home-tagline').html(to);
        });
    });	
    wp.customize( 'home_tagline_bgcolor', function( value ) {
        value.bind( function( to ) {
            $( '#home-tagline' ).css( 'background', to );
        } );
    });
    wp.customize('copyright_txt',function( value ) {
        value.bind(function(to) {
            $('#footer-copyright').html(to);
        });
    });
//end customizer live preview
})( jQuery );
