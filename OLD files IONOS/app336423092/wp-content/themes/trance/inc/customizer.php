<?php
/**
 * trance Theme Customizer
 *
 * @package trance
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trance_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_section( 'static_front_page' );
	
	$wp_customize->add_section(
	'trance-layout',
	array(
    	'title'			=> __('Layout Settings','trance'),
    	'description'	=> __('Manage the Layout Settings of your site.','trance'),
    	'priority'		=> 2,
    	)
	);
	
	$wp_customize-> add_setting(
    'trance-f-img',
    array(
    	'sanitize_callback'	=> 'trance_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-f-img',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Show Featured Image in the Post.','trance'),
    	'section'	=> 'trance-layout',
    	'priority'	=> 1,
    	)
    );
    
    $wp_customize-> add_setting(
		'trance-sidebar',
		array(
			'default'	=> 'right',
			'sanitize_callback'	=> 'trance_sanitize_select'
		)
    );
    
    $wp_customize-> add_control(
	    'trance-sidebar',
	    array(
		    'type'	=> 'select',
		    'label'	=> __('Select the Sidebar orientation for the site','trance'),
		    'section'	=> 'trance-layout',
		    'priority'	=> 2,
		    'choices'	=> array(
			    	'left'	=> 'Left',
			    	'right'	=> 'Right',
		    ),
	    )
    );
    
    $wp_customize-> add_setting(
	    'trance-head-hover',
	    array(
		    'default'			=> true,
		    'sanitize_callback'	=> 'trance_sanitize_checkbox'
	    )
    );
    
    $wp_customize-> add_control(
	    'trance-head-hover',
	    array(
	    	'type'		=> 'checkbox',
	    	'label'		=> __('Enable Hover effect for Header Image','trance'),
	    	'section'	=> 'trance-layout',
	    	'priority'	=> 3,
    	)
	);
	
	$wp_customize-> add_setting(
	    'trance-content-toggle',
	    array(
		    'default'			=> false,
		    'sanitize_callback'	=> 'trance_sanitize_checkbox'
	    )
    );
    
    $wp_customize-> add_control(
	    'trance-content-toggle',
	    array(
	    	'type'		=> 'checkbox',
	    	'label'		=> __('Make Home Page Content Full Width','trance'),
	    	'section'	=> 'trance-layout',
	    	'priority'	=> 4,
    	)
	);
	
	$wp_customize->add_section(
	'trance-social',
	array(
    	'title'			=> __('Social Settings','trance'),
    	'description'	=> __('Manage the Social Icon Settings of your site.','trance'),
    	'priority'		=> 2,
    	)
	);
	
	$wp_customize-> add_setting(
    'social',
    array(
    	'sanitize_callback'	=> 'trance_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
	    'social',
	    array(
	    	'type'		=> 'checkbox',
	    	'label'		=> __('Enable Social Icons','trance'),
	    	'section'	=> 'trance-social',
	    	'priority'	=> 1,
	    	)
	    );
	    
	    $wp_customize->add_setting(
	    'social-select',
	    array(
	        'default' => 'default',
	        'sanitize_callback'	=> 'trance_sanitize_select_2',
	    )
	);
	 
	$wp_customize->add_control(
	    'social-select',
	    array(
	        'type' => 'select',
	        'label' => __('Select the icons to be displayed','trance'),
	        'section' => 'trance-social',
	        'priority'	=> 2,
	        'choices' => array(
	            'default'		=> 'Default',
	            'boxicons'		=> 'Boxicons',
	        ),
	    )
	);

   
    $wp_customize-> add_setting(
    'trance-facebook',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-facebook',
    array(
    	'label'		=> __('Facebook URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-twitter',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-twitter',
    array(
    	'label'		=> __('Twitter URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-gplus',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-gplus',
    array(
    	'label'		=> __('Google+ URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-instagram',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-instagram',
    array(
    	'label'		=> __('Instagram URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-flickr',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-flickr',
    array(
    	'label'		=> __('Flickr URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-pinterest',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-pinterest',
    array(
    	'label'		=> __('Pinterest URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-youtube',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-youtube',
    array(
    	'label'		=> __('YouTube URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-rss',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-rss',
    array(
    	'label'		=> __('RSS URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-linkedin',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-linkedin',
    array(
    	'label'		=> __('LinkedIn URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-stumbleupon',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-stumbleupon',
    array(
    	'label'		=> __('StumbleUpon URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-mail',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-mail',
    array(
    	'label'		=> __('Contact Page URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-soundcloud',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-soundcloud',
    array(
    	'label'		=> __('SoundCloud URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-vimeo',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-vimeo',
    array(
    	'label'		=> __('Vimeo URL','trance'),
    	'section'	=>	'trance-social',
    	'type'		=>	'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-logo',
    	array(
    		'default'			=> '',
    		'sanitize_callback'	=> 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
	new WP_Customize_Image_Control(
        $wp_customize,
        'trance-logo',
        array(
            'label' => __('OR Logo Upload', 'trance'),
            'section' => 'title_tagline',
            'settings' => 'trance-logo'
            )
        )
    );
    
    $wp_customize-> add_setting(
    'trance-favicon',
    	array(
    		'default'			=> '',
    		'sanitize_callback'	=> 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
	new WP_Customize_Image_Control(
        $wp_customize,
        'trance-favicon',
        array(
            'label' => __('Upload a Favicon', 'trance'),
            'description'	=> __( 'Supported formats are .ico, .jpg, .png but .ico is preferred','trance' ),
            'section' => 'title_tagline',
            'settings' => 'trance-favicon'
            )
        )
    );
    
    $wp_customize-> add_panel(
    'trance-slider', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Slider Settings', 'trance'),
    'description'    => '',
    ));
    
    $wp_customize-> add_section(
    'trance-slides',
    array(
    	'title'			=> __('Enable Slider','trance'),
    	'priority'		=> 3,
    	'panel'			=> 'trance-slider',
    	)
    );
    
    $wp_customize-> add_setting(
    'trance-slide_enable',
    array(
    	'sanitize_callback'	=> 'trance_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-slide_enable',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Slider','trance'),
    	'section'	=> 'trance-slides',
    	'priority'	=> 1,
    	)
    );
    
    $wp_customize-> add_section(
    'trance-slide-1', array(
    	'title'		=> __('Slide 1', 'trance'),
    	'panel'		=> 'trance-slider',
    	)
    );
    
    $wp_customize->add_setting( 
    'trance-slide_1', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'trance-slide_1',
	        array(
	            'label' => __('Slide Upload','trance'),
	            'section' => 'trance-slide-1',
	            'settings' => 'trance-slide_1',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'trance-desc-1', array(
			'sanitize_callback'	=> 'trance_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'trance-desc-1', array(
		'label'		=> __('Description','trance'),
		'section'	=> 'trance-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'trance-url-1', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'trance-url-1', array(
		'label'		=> __('URL','trance'),
		'section'	=> 'trance-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'trance-slide-2', array(
    	'title'		=> __('Slide 2', 'trance'),
    	'panel'		=> 'trance-slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'trance-slide_2', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'trance-slide_2',
	        array(
	            'label' => __('Slide Upload','trance'),
	            'section' => 'trance-slide-2',
	            'settings' => 'trance-slide_2',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'trance-desc-2', array(
			'sanitize_callback'	=> 'trance_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'trance-desc-2', array(
		'label'		=> __('Description','trance'),
		'section'	=> 'trance-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'trance-url-2', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'trance-url-2', array(
		'label'		=> __('URL','trance'),
		'section'	=> 'trance-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'trance-slide-3', array(
    	'title'		=> __('Slide 3', 'trance'),
    	'panel'		=> 'trance-slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'trance-slide_3', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'trance-slide_3',
	        array(
	            'label' => __('Slide Upload','trance'),
	            'section' => 'trance-slide-3',
	            'settings' => 'trance-slide_3',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'trance-desc-3', array(
			'sanitize_callback'	=> 'trance_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'trance-desc-3', array(
		'label'		=> __('Description','trance'),
		'section'	=> 'trance-slide-3',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'trance-url-3', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'trance-url-3', array(
		'label'		=> __('URL','trance'),
		'section'	=> 'trance-slide-3',
		'type'		=> 'text',
		)
	);
    
    $wp_customize->add_section(
    'trance-mp',
    array(
    	'title'			=> __('Most Popular','trance'),
    	'description'	=> __('Settings for the \'Most Popular\' section of the theme', 'trance'),
    	'priority'		=> 2,
    	)
    );
    
    $wp_customize->add_setting(
    'trance-mp-show',
    array(
    	'default'	=> true,
    	'sanitize_callback'	=> 'trance_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'trance-mp-show',
    array(
    	'label'		=> __('Hide Most Popular Section','trance'),
    	'section'	=>	'trance-mp',
    	'type'		=>	'checkbox',
    	)
    );
    
    $wp_customize->add_setting(
    'trance-mpbg',
    array(
    	'default'	=> esc_url( get_template_directory_uri() . '/images/mp-pattern.png' ),
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
    );
    
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'trance-mpbg',
        array(
            'label' 	=> __('The Background Image','trance'),
            'section' 	=> 'trance-mp',
            'settings' 	=> 'trance-mpbg',
        )
    )
);

	$wp_customize->add_setting(
	    'trance-title',
	    array(
	        'default' => '#6f1f1f',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'transport'	=> 'postMessage'
	    )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'trance-title',
	        array(
	            'label' => __('Title Color','trance'),
	            'section' => 'colors',
	            'settings' => 'trance-title',
	            'priority'	=> 2,
	        )
	    )
	);
	
	$wp_customize->add_setting(
	    'trance-desc',
	    array(
	        'default' => '#ffffff',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'transport'	=> 'postMessage'
	    )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'trance-desc',
	        array(
	            'label' => __('Description Color','trance'),
	            'section' => 'colors',
	            'settings' => 'trance-desc',
	            'priority'	=> 3,
	        )
	    )
	);
	
	$wp_customize->add_section(
		'trance-pro',
		array(
			'title'	=> __('Get Trance Plus', 'trance'),
			'description'	=> __('<i style="font-size: 13px;">Thankyou all for showing an amazing response to Trance WordPress theme. Really appreciate it. <br><br>For those who wish to take their site to the next level, I present to you <a href="https://www.inkhive.com/product/trance-plus"><b style="color: #3d88bc">Trance Plus</b></a></i>','trance'),
			'priority'	=> 1
		)
	);
	
	class MyCustom_Customize_Control extends WP_Customize_Control { 
		
		public $type	=	'trance-plus';
		   
	    public function render_content() {
	        ?>
	        <label>
				<a href="https://www.inkhive.com/product/trance-plus" target="_blank"><img src="<?php echo get_template_directory_uri(). '/images/trance-plus.png'; ?>"></a>
				<p>
					The upgrade for trance is now available with some awesome features for your site. Featured Areas, Sliders, Layouts and much more features to beautify your site. <br><br>Also, more features to be added with regular updates.<br><br> Did I mention personal dedicated support for the theme? Dedicated support will be provided with the theme. <br><br> You can get <b>Trance Plus</b> <a href="https://www.inkhive.com/product/trance-plus">here</a>
				</p>
			</label>				
	        <?php
	    }
	}
    
    $wp_customize->add_setting(
	'pro_hide',
	array(
		'sanitize_callback'	=> 'esc_html',
		)
	);
 
	$wp_customize-> add_control( new MyCustom_Customize_Control( $wp_customize,
    'pro_hide',
    array(
    	'type'		=> 'trance-plus',
    	'label'		=> __('Hide s section forever.','trance'),
    	'section'	=> 'trance-pro',
    	'priority'	=> 1,
    	)
    ));
	
	 function trance_sanitize_text( $t ) {
    return wp_kses_post( force_balance_tags( $t ) );
    }
    
    if ( $wp_customize->is_preview() && ! is_admin() ) {
    add_action( 'wp_footer', 'trance_customize_preview',21);
}

	function trance_sanitize_checkbox( $i ) {
	    if ( $i == 1 ) {
	        return 1;
	    } 
	    else {
	        return '';
	    }
	 }
	 
	 function trance_sanitize_select_2( $input ) {
	    $valid = array(
	            'default'		=> 'Default',
	            'boxicons'		=> 'Boxicons'
	        );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	 
	function trance_sanitize_select( $input ) {
	    $valid = array(
	        'left' => 'Left',
	        'right' => 'Right',
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}
add_action( 'customize_register', 'trance_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function trance_customize_preview_js() {
	wp_enqueue_script( 'trance_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'trance_customize_preview_js' );
