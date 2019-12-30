<?php
/**
 * Alum Theme Customizer
 *
 * @package Alum
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 function alum_textarea_register($wp_customize){
	class alum_Customize_alum_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        
      
        <h1><?php _e( 'Get Alum PRO Theme!  Just $19', 'alum' ); ?></h1>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Upgrade to Alum PRO Theme', 'alum' ); ?>" href="<?php echo esc_url( 'http://arinio.com/alum-responsive-multipurpose-wordpress-theme/' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Alum PRO Theme', 'alum' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'View More our themes', 'alum' ); ?>" href="<?php echo esc_url( 'http://arinio.com/' ); ?>" target="_blank">
			<?php _e( 'View More our themes', 'alum' ); ?>
			</a>
			 
			<a href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>" title="<?php esc_attr_e( 'Free Support', 'alum' ); ?>" target="_blank">
			<?php _e( 'Free Support', 'alum' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://arinio.com/alum-responsive-multipurpose-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'alum' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'alum' ); ?>
			</a>
           
		</div>
		<?php
		}
	}
 
}



add_action('customize_register', 'alum_textarea_register');
 
 
 
function alum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	 
	 
	 
	 
	 $wp_customize->add_section('alum_upgrade', array(
		'title'					=> __('Alum Support', 'alum'),
		'description'			=> __('You are using the Alum, Free Version of Alum Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and Life time theme support and much more. ','alum'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'alum_theme_settings[alum_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new alum_Customize_alum_upgrade(
		$wp_customize,
		'alum_upgrade',
			array(
				'label'					=> __('Alum Upgrade','alum'),
				'section'				=> 'alum_upgrade',
				'settings'				=> 'alum_theme_settings[alum_upgrade]',
			)
		)
	);
	
}
add_action( 'customize_register', 'alum_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since alum 1.0
 */
function alum_customize_preview_js() {
	wp_enqueue_script( 'alum_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), rand(),  true );
}
add_action( 'customize_preview_init', 'alum_customize_preview_js' );
 
 
 
/**
 * Implement the Custom Logo feature
 */
function alum_theme_customizer( $wp_customize ) {
   
   $wp_customize->add_section( 'alum_logo_section' , array(
    'title'       => __( 'Basic Setting', 'alum' ),
    'description' => __( 'This Is a Basic Setting Section For Frontpage', 'alum' ),
) );
   $wp_customize->add_setting( 'alum_logo', array(
        'sanitize_callback' => 'alum_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alum_logo', array(
    'label'    => __( 'Site Logo', 'alum' ),
    'section'  => 'alum_logo_section',
    'settings' => 'alum_logo',
	)));
	
	
	
	 $wp_customize->add_setting( 'alum_logo2', array(
        'sanitize_callback' => 'alum_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alum_logo2', array(
    'label'    => __( 'Favicon', 'alum' ),
    'section'  => 'alum_logo_section',
    'settings' => 'alum_logo2',
	)));
	
	
	 
	$wp_customize->add_setting(
	    'alum_copyright_text', array(
		    'default' => __( 'Copyright', 'alum' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'alum_sanitize_text',
	    )
	);
	
	$wp_customize->add_control(
		'alum_copyright_text', array(
			'label'    => __( 'Copyright Text', 'alum' ),
			'section' => 'alum_logo_section',
			'type' => 'text',
		)
	);
	
		$wp_customize->add_setting(
	    'alum_custom_css', array(
		    'default' => __( '', 'alum' ),
			'capability' => 'edit_theme_options', 
		    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    )
	);
	
	$wp_customize->add_control(
		'alum_custom_css', array(
			'label'    => __( 'Custom CSS', 'alum' ),
			'section' => 'alum_logo_section',
			'type' => 'textarea',
		)
	);
	
	
}
add_action('customize_register', 'alum_theme_customizer');
 
 
 
/* 
 * USE TO divide a section in to smaller sections
 */
function alum_add_customizer_custom_controls( $wp_customize ) {
	//  Add Custom Subtitle
	//  =============================================================================
	class alum_sub_title extends WP_Customize_Control {
		public $type = 'sub-title';
		public function render_content() {
		?>
			<h2 class="alum-custom-sub-title"><?php echo esc_html( $this->label ); ?></h2>
		<?php
		}
	}
	//  Add Custom Description
	//  =============================================================================
	class alum_description extends WP_Customize_Control {
		public $type = 'description';
		public function render_content() {
		?>
			<p class="alum-custom-description"><?php echo esc_html( $this->label ); ?></p>
		<?php
		}
	}
	
	class alum_footer extends WP_Customize_Control {
		public $type = 'footer';
		public function render_content() {
		?>
			<hr />
		<?php
		}
	}
}
add_action( 'customize_register', 'alum_add_customizer_custom_controls' );




 








function alum_slider_text_boxes_options( $wp_customize ){
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Slider 1', 'alum' ),
		'two'		=> __( 'Slider 2', 'alum' ),
		 
	);
	$wp_customize->add_section( 'alum_customizer_slider_text_boxes', array(
		'title'    => __( 'Slider Setting', 'alum' ),
		'description'    => __( 'You can upload here images for slider', 'alum' ),
		
	));
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'alum_slider_' . $key . '_sub_title', array(
            'sanitize_callback' => 'alum_sanitize_text',
        ));
		$wp_customize->add_control( 
			new alum_sub_title( $wp_customize, 'alum_slider_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'alum_customizer_slider_text_boxes',
					'settings'  => 'alum_slider_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
		/* File Upload */
		$wp_customize->add_setting( 'alum_header_slider-'.$key.'-file-upload', array(
            'sanitize_callback' => 'alum_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'alum_header_slider-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'alum' ),
		            'section' => 'alum_customizer_slider_text_boxes',
		            'settings' => 'alum_header_slider-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);
		
		/* URL */
		$wp_customize->add_setting( 'alum_header_slider_'.$key.'_url', array(
		        'default' => __( 'Title', 'alum' ),
				'sanitize_callback' => 'alum_sanitize_text',
			) 
		);
		$wp_customize->add_control('alum_header_slider_'.$key.'_url', array(
				'label'    => __( 'Slider Title', 'alum' ),
				'section' => 'alum_customizer_slider_text_boxes',
				'settings' => 'alum_header_slider_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Featured Header Text */
		$wp_customize->add_setting('alum_featured_textbox_header_slider_'.$key, array(
		        'default' => __( 'Description', 'alum' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'alum_sanitize_text',
		    )
		);
		$wp_customize->add_control('alum_featured_textbox_header_slider_'.$key, array(
				'label' => __( 'Slider Description', 'alum' ),
				'section' => 'alum_customizer_slider_text_boxes',
				'settings' => 'alum_featured_textbox_header_slider_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'alum_slider_' . $key . '_footer', array(
            'sanitize_callback' => 'alum_sanitize_text',
        ));
		$wp_customize->add_control( 
			new alum_footer( $wp_customize, 'alum_slider_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'alum_customizer_slider_text_boxes',
			'settings'  => 'alum_slider_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
}
add_action( 'customize_register', 'alum_slider_text_boxes_options' );






function servicesText_customizer( $wp_customize ) {
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Icon 1', 'alum' ),
		'two'		=> __( 'Icon 2', 'alum' ),
		'three'		=> __( 'Icon 3', 'alum' ),
	);
	
	
    $wp_customize->add_section( 'alum_servicesText_section_contact', array(
	     'title'       => __( 'Services Setting', 'alum' ),
	     'description' => __( 'This is a Services settings section to change the servise section Details.', 'alum' ),
        )
    );
	
	
	
	
	
	
	
	
	
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'alum_services_' . $key . '_sub_title', array(
            'sanitize_callback' => 'alum_sanitize_text',
        ));
		$wp_customize->add_control( 
			new alum_sub_title( $wp_customize, 'alum_services_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'alum_servicesText_section_contact',
					'settings'  => 'alum_services_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
	 
		
		/* Class */
		$wp_customize->add_setting( 'alum_header_servicesicon_'.$key.'_url', array(
		        'default' => __( 'Font class Name', 'alum' ),
				'sanitize_callback' => 'alum_sanitize_text',
			) 
		);
		$wp_customize->add_control('alum_header_servicesicon_'.$key.'_url', array(
				'label'    => __( 'Class Name', 'alum' ),
				'section' => 'alum_servicesText_section_contact',
				'settings' => 'alum_header_servicesicon_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Title */
		$wp_customize->add_setting( 'alum_header_services_'.$key.'_url', array(
		        'default' => __( 'Title', 'alum' ),
				'sanitize_callback' => 'alum_sanitize_text',
			) 
		);
		$wp_customize->add_control('alum_header_services_'.$key.'_url', array(
				'label'    => __( 'Title', 'alum' ),
				'section' => 'alum_servicesText_section_contact',
				'settings' => 'alum_header_services_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
	
	
		/* Featured Header Text */
		$wp_customize->add_setting('alum_featured_textbox_header_services_'.$key, array(
		        'default' => __( 'Description', 'alum' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'alum_sanitize_text',
		    )
		);
		$wp_customize->add_control('alum_featured_textbox_header_services_'.$key, array(
				'label' => __( 'Services Description', 'alum' ),
				'section' => 'alum_servicesText_section_contact',
				'settings' => 'alum_featured_textbox_header_services_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'alum_services_' . $key . '_footer', array(
            'sanitize_callback' => 'alum_sanitize_text',
        ));
		$wp_customize->add_control( 
			new alum_footer( $wp_customize, 'alum_services_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'alum_servicesText_section_contact',
			'settings'  => 'alum_services_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
	
	
	
	
	
	
	
	
	
	
	
	$wp_customize->add_setting(
	    'alum_maiN_heading', array(
		    'default' => __( 'Heading', 'alum' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'alum_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'alum_maiN_heading', array(
			'label'    => __( 'Main Heading', 'alum' ),
			'section' => 'alum_servicesText_section_contact',
			'type' => 'text',
			'priority' => '19',
		)
	);
	
	
	
	 
	
	
	
	
	
	
	
	
	
}
add_action( 'customize_register', 'servicesText_customizer' );




 

















 






 
 
// SANITIZATION
// ==============================
// Sanitize Text
function alum_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Sanitize Textarea
function alum_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}
// Sanitize Checkbox
function alum_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
// Sanitize Numbers
function alum_sanitize_integer( $input ) {
	$value = (int) $input; // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}
function alum_sanitize_float( $input ) {
	return floatval( $input );
}
// Sanitize Uploads
function alum_sanitize_upload($input){
	return esc_url_raw($input);	
}
// Sanitize Colors
function alum_sanitize_hex($input){
	return maybe_hash_hex_color($input);
}



function customize_styles_alum_upgrade( $input ) { ?>
	   <style type="text/css">
		#customize-theme-controls #accordion-section-alum_upgrade .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-alum_upgrade .accordion-section-title {
			background-color: rgba(113, 176, 47, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-alum_upgrade .accordion-section-title:hover {
			background-color: rgba(113, 176, 47, 1);
		}
		#customize-theme-controls #accordion-section-alum_upgrade .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-alum_upgrade .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		h1 {
		line-height: 25px;
		}
	</style>
<?php }
 
add_action( 'customize_controls_print_styles', 'customize_styles_alum_upgrade');
 







/* Wait until all sections are created then re-order them */
function alum_reorder_sections_theme_customizer($wp_customize){
	
	$wp_customize->get_section('title_tagline')->priority = 2;
	$wp_customize->get_section('alum_logo_section')->priority = 3;
	$wp_customize->get_section('nav')->priority = 4;
	$wp_customize->get_section('header_image')->priority = 6;
	$wp_customize->get_section('colors')->priority = 7;
	 
	
	$wp_customize->get_section('static_front_page')->priority = 11;
	$wp_customize->get_section('alum_customizer_slider_text_boxes')->priority = 14;
	$wp_customize->get_section('alum_logo_section')->priority = 15;
$wp_customize->get_section('alum_servicesText_section_contact')->priority = 16;
 
}
add_action('customize_register', 'alum_reorder_sections_theme_customizer');















