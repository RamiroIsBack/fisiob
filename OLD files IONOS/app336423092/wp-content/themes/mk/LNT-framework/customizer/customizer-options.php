<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_mk_options() {

	// Theme defaults
	$primary_color = '#5bc08c';
	$secondary_color = '#666';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors & Typography', 'mk' ),
		'priority' => '40'
	);
	
	$font_choices = customizer_library_get_font_choices();

	$options['mk_main_font'] = array(
		'id' => 'mk_main_font',
		'label'   => __( 'Primary Font', 'mk' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);

	$options['mk_headers_font'] = array(
		'id' => 'mk_headers_font',
		'label'   => __( 'Header Font', 'mk' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);
	
	
	$options['mk_body_text_color'] = array(
		'id' => 'mk_body_text_color',
		'label'   => __( 'Body Text Color', 'mk' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#666666',
	);
	
	$options['mk_a_color'] = array(
		'id' => 'mk_a_color',
		'label'   => __( 'Links Color', 'mk' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#337ab7',
	);
	
	$options['mk_a_hover_color'] = array(
		'id' => 'mk_a_hover_color',
		'label'   => __( 'Links Hover and Focus Color', 'mk' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#23527c',
	);
	
	
	$section = 'general';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Settings', 'mk' ),
		'priority' => '25'
	);

	$options['sidenavtop_items_align'] = array(
		'id' => 'sidenavtop_items_align',
		'label'   => __( 'Sidenav Text Alignment', 'mk' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
		'center' => 'Center',
		'left' => 'Left',
		'right' => 'Right'
		),
		'default' => 'center'
	);
	
	$options['mk_site_logo'] = array(
		'id' => 'mk_site_logo',
		'label'   => __( 'Logo', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);
	
	$options['mk_site_favicon'] = array(
		'id' => 'mk_site_favicon',
		'label'   => __( 'Favicon', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);
	
	

	$ly = array(
		'classic' => 'Classic',
		'grid' => 'Grid',
		'alternative' => 'Alternative'
	);

	$options['mk_blog_layout'] = array(
		'id' => 'mk_blog_layout',
		'label'   => __( 'Blog Index Layout', 'mk' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ly,
		'default' => 'classic'
	);
	
	$options['mk_show_header_search'] = array(
		'id' => 'mk_show_header_search',
		'label'   => __( 'Header Search', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);
	
	$options['mk_show_custom_header_image'] = array(
		'id' => 'mk_show_custom_header_image',
		'label'   => __( 'Custom Header Image Section', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);
	
	
	// Social Links 
	$slider = 'slider';

	$panels[] = array(
		'id' => $slider,
		'title' => __( 'Homepage Slider', 'mk' ),
		'priority' => '30'
	);

	$section = 'slider-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Homepage Slider', 'mk' ),
		'priority' => '10',
		'panel' => $slider
	);
	
	$clrs = array(
	'btn-default' => 'Default',
	'btn-primary' => 'Primary',
	'btn-success' => 'Success',
	'btn-info' => 'Info',
	'btn-warning' => 'Warning',
	'btn-danger' => 'Danger',
	);
	
	$sl_content = array(
	'custom_slides' => 'Custom Slides',
	'latest_posts' => 'Latest Posts',
	);

	$options['mk_slider_button'] = array(
		'id' => 'mk_slider_button',
		'label'   => __( 'Slider Button Style', 'mk' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $clrs,
		'default' => 'btn-info'
	);
	
	/* option group */
	$options['mk_slide_mask_color'] = array(
	'id' => 'mk_slide_mask_color',
	'label'   => __( 'Slides Mask Color', 'mk' ),
	'section' => $section,
	'type'    => 'color',
	'default' => '#000000' // hex
	);
	
	$options['mk_slide_mask_opacity'] = array(
	'id' => 'mk_slide_mask_opacity',
	'label'   => __( 'Slide Mask Opacity', 'mk' ),
	'section' => $section,
	'type'    => 'range',
	'input_attrs' => array(
        'min'   => 0,
        'max'   => 10,
        'step'  => 1,
        'style' => 'color: #0a0',
	)
	);
	
	$options['mk_slide_speed'] = array(
	'id' => 'mk_slide_speed',
	'label'   => __( 'Slider Speed', 'mk' ),
	'section' => $section,
	'type'    => 'range',
	'input_attrs' => array(
        'min'   => 5000,
        'max'   => 12000,
        'step'  => 500,
        'style' => 'color: #0a0',
	)
	);
	
	
	$options['mk_show_default_slider'] = array(
		'id' => 'mk_show_default_slider',
		'label'   => __( 'Show Default Homepage Slider ', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);
	
	$options['mk_show_default_slider_on_home'] = array(
		'id' => 'mk_show_default_slider_on_home',
		'label'   => __( 'Show default homepage slider on page set as the blog page ', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);
	
	$options['mk_slider_content'] = array(
		'id' => 'mk_slider_content',
		'label'   => __( 'Slider content source.', 'mk' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $sl_content,
		'default' => 'custom_slides'
	);
	
	$options['mk_slide_1_show_slide_info'] = array(
		'id' => 'mk_slide_1_show_slide_info',
		'label'   => __( 'Slide #1 enable slide captions and button', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	
	$options['mk_slide_1_image'] = array(
		'id' => 'mk_slide_1_image',
		'label'   => __( 'Slide1 Image', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		 'default' => get_template_directory_uri() . '/images/slides/slide1.jpg',
	);
	
	$options['mk_slide1_caption'] = array(
		'id' => 'mk_slide1_caption',
		'label'   => __( 'Slide1 Main Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'We are MK Theme', 'mk'),
	);
	$options['mk_slide1_subcaption'] = array(
		'id' => 'mk_slide1_subcaption',
		'label'   => __( 'Slide1 Sub Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'We make beautiful things happen', 'mk'),
	);
	$options['mk_slide1_url'] = array(
		'id' => 'mk_slide1_url',
		'label'   => __( 'Slide1 Btn URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_slide_1_button_'] = array(
		'id' => 'mk_slide_1_button_',
		'label'   => __( 'Slide #1 Button Enable', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide1_btntext'] = array(
		'id' => 'mk_slide1_btntext',
		'label'   => __( 'Slide1 Btn Text', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Learn More', 'mk'),
	);
	
	/* option group */
	$options['mk_slide_2_show_slide_info'] = array(
		'id' => 'mk_slide_2_show_slide_info',
		'label'   => __( 'Slide #2 enable slide captions and button', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	
	$options['mk_slide_2_image'] = array(
		'id' => 'mk_slide_2_image',
		'label'   => __( 'Slide2 Image', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		 'default' => get_template_directory_uri() . '/images/slides/slide2.jpg',
	);
	$options['mk_slide2_caption'] = array(
		'id' => 'mk_slide2_caption',
		'label'   => __( 'Slide2 Main Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Stylish free Wordpress Theme', 'mk'),
	);
	$options['mk_slide2_subcaption'] = array(
		'id' => 'mk_slide2_subcaption',
		'label'   => __( 'Slide2 Sub Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Optimized for mobile devices, clean w3C validated markup', 'mk'),
	);
	$options['mk_slide2_url'] = array(
		'id' => 'mk_slide2_url',
		'label'   => __( 'Slide2 Btn URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_slide_2_button_'] = array(
		'id' => 'mk_slide_2_button_',
		'label'   => __( 'Slide #2 Button Enable', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide2_btntext'] = array(
		'id' => 'mk_slide2_btntext',
		'label'   => __( 'Slide2 Btn Text', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Learn More', 'mk'),
	);
	/* option group */
	$options['mk_slide_3_show_slide_info'] = array(
		'id' => 'mk_slide_3_show_slide_info',
		'label'   => __( 'Slide #3 enable slide captions and button', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide_3_image'] = array(
		'id' => 'mk_slide_3_image',
		'label'   => __( 'Slide3 Image', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		 'default' => get_template_directory_uri() . '/images/slides/slide3.jpg',
	);
	$options['mk_slide3_caption'] = array(
		'id' => 'mk_slide3_caption',
		'label'   => __( 'Slide3 Main Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Get more with MK <br/>proffessional Version', 'mk'),
	);
	$options['mk_slide3_subcaption'] = array(
		'id' => 'mk_slide3_subcaption',
		'label'   => __( 'Slide3 Sub Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Premium sliders, page composer, unlimited layouts...', 'mk'),
	);
	$options['mk_slide3_url'] = array(
		'id' => 'mk_slide3_url',
		'label'   => __( 'Slide3 Btn URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_slide_3_button_'] = array(
		'id' => 'mk_slide_3_button_',
		'label'   => __( 'Slide #3 Button Enable', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide3_btntext'] = array(
		'id' => 'mk_slide3_btntext',
		'label'   => __( 'Slide3 Btn Text', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Learn More', 'mk'),
	);
	/* option group */
	$options['mk_slide_4_show_slide_info'] = array(
		'id' => 'mk_slide_4_show_slide_info',
		'label'   => __( 'Slide #4 enable slide captions and button', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide_4_image'] = array(
		'id' => 'mk_slide_4_image',
		'label'   => __( 'Slide4 Image', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		 'default' => '',
	);
	$options['mk_slide4_caption'] = array(
		'id' => 'mk_slide4_caption',
		'label'   => __( 'Slide4 Main Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	$options['mk_slide4_subcaption'] = array(
		'id' => 'mk_slide4_subcaption',
		'label'   => __( 'Slide4 Sub Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	$options['mk_slide4_url'] = array(
		'id' => 'mk_slide4_url',
		'label'   => __( 'Slide4 Btn URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_slide_4_button_'] = array(
		'id' => 'mk_slide_4_button_',
		'label'   => __( 'Slide #4 Button Enable', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide4_btntext'] = array(
		'id' => 'mk_slide4_btntext',
		'label'   => __( 'Slide4 Btn Text', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Learn More', 'mk'),
	);
	/* option group */
	$options['mk_slide_5_show_slide_info'] = array(
		'id' => 'mk_slide_5_show_slide_info',
		'label'   => __( 'Slide #1 enable slide captions and button', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide_5_image'] = array(
		'id' => 'mk_slide_5_image',
		'label'   => __( 'Slide5 Image', 'mk' ),
		'section' => $section,
		'type'    => 'upload',
		 'default' => '',
	);
	$options['mk_slide5_caption'] = array(
		'id' => 'mk_slide5_caption',
		'label'   => __( 'Slide5 Main Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	$options['mk_slide5_subcaption'] = array(
		'id' => 'mk_slide5_subcaption',
		'label'   => __( 'Slide5 Sub Caption', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	$options['mk_slide5_url'] = array(
		'id' => 'mk_slide5_url',
		'label'   => __( 'Slide5 Btn URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_slide_5_button_'] = array(
		'id' => 'mk_slide_5_button_',
		'label'   => __( 'Slide #5 Button Enable', 'mk' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['mk_slide5_btntext'] = array(
		'id' => 'mk_slide5_btntext',
		'label'   => __( 'Slide5 Btn Text', 'mk' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __( 'Learn More', 'mk'),
	);
	/* option group */
	
	// Social Links 
	$panel = 'panel';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Social Links', 'mk' ),
		'priority' => '30'
	);

	$section = 'panel-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Social Links', 'mk' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['mk_sl_facebook'] = array(
		'id' => 'mk_sl_facebook',
		'label'   => __( 'Facebook URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_sl_twitter'] = array(
		'id' => 'mk_sl_twitter',
		'label'   => __( 'Twitter URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['mk_sl_gplus'] = array(
		'id' => 'mk_sl_gplus',
		'label'   => __( 'Google Plus URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_sl_pinterest'] = array(
		'id' => 'mk_sl_pinterest',
		'label'   => __( 'Pinterest URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_sl_instagram'] = array(
		'id' => 'mk_sl_instagram',
		'label'   => __( 'Instagram URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['mk_sl_dribble'] = array(
		'id' => 'mk_sl_dribble',
		'label'   => __( 'Dribble URL', 'mk' ),
		'section' => $section,
		'type'    => 'url',
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_mk_options' );
