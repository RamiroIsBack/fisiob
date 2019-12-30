<?php
/**
 * Theme Customizer
 *
 * @package Photoline Lite
 */

function photoline_register_theme_customizer( $wp_customize ) {

$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->add_setting(
        'photoline_main_color',
        array(
            'default'     => '#404040',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_secondary_color',
        array(
            'default'     => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'photoline_headerbg_color',
        array(
            'default'     => '#FFFFFF',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_link_color',
        array(
            'default'     => '#2b2b2b',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_hover_color',
        array(
            'default'     => '#000',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'photoline_hover_menu',
        array(
            'default'     => '#F2F2F2',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'photoline_menu_color',
        array(
            'default'     => '#FFFFFF',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_menu_current',
        array(
            'default'     => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_menu_link',
        array(
            'default'     => '#2d2d2d',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'menu_link_hover',
        array(
            'default'     => '#CCCCCC',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'photoline_border_bold',
        array(
            'default'     => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'photoline_border_thin',
        array(
            'default'     => '#DDDDDD',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'photoline_addit_color',
        array(
            'default'     => '#AAAAAA',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_footer_color',
        array(
            'default'     => '#333',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'photoline_footerbg_color',
        array(
            'default'     => '#FFF',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );

     // COLOR CONTROL

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_color',
            array(
                'label'      => __( 'Main Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 8,
                'settings'   => 'photoline_main_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label'      => __( 'Secondary Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 9,
                'settings'   => 'photoline_secondary_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'headerbg_color',
            array(
                'label'      => __( 'Header BG Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 10,
                'settings'   => 'photoline_headerbg_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 11,
                'settings'   => 'photoline_link_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hover_color',
            array(
                'label'      => __( 'Hover Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 20,
                'settings'   => 'photoline_hover_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hover_menu',
            array(
                'label'      => __( 'Hover Menu', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 20,
                'settings'   => 'photoline_hover_menu'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color',
            array(
                'label'      => __( 'Menu Bar Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 30,
                'settings'   => 'photoline_menu_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_current',
            array(
                'label'      => __( 'Menu Bar Current', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 40,
                'settings'   => 'photoline_menu_current'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_link',
            array(
                'label'      => __( 'Menu Link', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 42,
                'settings'   => 'photoline_menu_link'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover',
            array(
                'label'      => __( 'Menu Link Hover', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 43,
                'settings'   => 'menu_link_hover'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'border_bold',
            array(
                'label'      => __( 'Border Bold', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 44,
                'settings'   => 'photoline_border_bold'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'border_thin',
            array(
                'label'      => __( 'Border Thin', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 45,
                'settings'   => 'photoline_border_thin'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'addit_color',
            array(
                'label'      => __( 'Additional Color', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 50,
                'settings'   => 'photoline_addit_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label'      => __( 'Footer Text', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 200,
                'settings'   => 'photoline_footer_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footerbg_color',
            array(
                'label'      => __( 'Footer BG', 'photoline-lite' ),
                'section'    => 'colors',
	'priority'  => 201,
                'settings'   => 'photoline_footerbg_color'
            )
        )
    );

	/*-----------------------------------------------------------
	 * Logo section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'photoline_logo_options',
		array(
			'title'     => __( 'Logo Image', 'photoline-lite' ),
			'description'  => __( 'For the option of a round frame best suited a image square size is 400px and more.', 'photoline-lite' ),
			'priority'  => 50
		)
	);
	/* Logo Round Frame */
	$wp_customize->add_setting( 
		'photoline_frame_logo',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_frame_logo',
		array(
			'section'   => 'photoline_logo_options',
			'label'     => __( 'No Frame logo', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	/* Logo Image Upload */
	$wp_customize->add_setting(
		'logo_upload',
		array(
		'sanitize_callback' => 'esc_url_raw'
		)
	);
	// Logo Image CONTROL
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_upload', array(
		'label' => __( 'Logo Image', 'photoline-lite' ),
		'section' =>  'photoline_logo_options',
		'settings' => 'logo_upload'
	) ) );

	/*-----------------------------------------------------------
	 * Home Tagline section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'photoline_home_tagline',
		array(
			'title'     => __( 'Home Tagline', 'photoline-lite' ),
			'description'  => esc_html__( 'Headlines area for the Homepage. Tagline Text field to type text (can use the html tags, for sample: <h1>Headline</h1>) or paste shortcode. Clear this field to not show Home Tagline.', 'photoline-lite' ),
			'priority'  => 300
		)
	);
		$wp_customize->add_setting(
			'home_tagline',
			array(
				'default' => '',
				'sanitize_callback' => 'photoline_sanitize_textarea',
				'transport'   => 'postMessage'
			)
		);
    		$wp_customize->add_setting(
        			'home_tagline_bgcolor',
        				array(
        					'default'     => '#FFFFFF',
					'sanitize_callback' => 'sanitize_hex_color',
				                'transport'   => 'postMessage'
				)
		);
		$wp_customize->add_setting(
			'home_tagline_bgimg',
				array(
					'default'     => '',
					'sanitize_callback' => 'esc_url_raw'
				)
		);
		$wp_customize->add_setting( 
			'frontpage_header',
				array(
					'sanitize_callback' => 'photoline_sanitize_checkbox',
				)
		);
		// Home TagLine CONTROL
		$wp_customize->add_control(
			'home_tagline',
				array(
					'section'  => 'photoline_home_tagline',
					'label'    => __( 'Tagline Text', 'photoline-lite' ),
					'type'     => 'textarea'
				)
		);


    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'home_tagline_bgcolor',
            array(
                'label'      => __( 'Background Color', 'photoline-lite' ),
                'section'    => 'photoline_home_tagline',
                'settings'   => 'home_tagline_bgcolor'
            )
        )
    );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_tagline_bgimg', array(
		'label' => __( 'Background Image', 'photoline-lite' ),
		'section' =>  'photoline_home_tagline',
		'settings' => 'home_tagline_bgimg'
	) ) );
		$wp_customize->add_control(
			'frontpage_header',
				array(
					'section'   => 'photoline_home_tagline',
					'label'     => __( 'Show header of front page', 'photoline-lite' ),
					'description'  => __( 'Show header of front page instead Home of Tagline.', 'photoline-lite' ),
					'type'      => 'checkbox'
				)
		);

	/*-----------------------------------------------------------
	 * Blog Settings
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'photoline_blog_set',
		array(
			'title'     => __( 'Blog Settings', 'photoline-lite' ),
			'priority'  => 590
		)
	);
	$wp_customize->add_setting(
		'readmore_text',
		array(
			'default'            => 'read more',
			'sanitize_callback'  => 'photoline_sanitize_txt',
			'transport'          => 'refresh'
		)
	);
	// Copyright CONTROL
	$wp_customize->add_control(
		'readmore_text',
		array(
			'section'  => 'photoline_blog_set',
			'label'    => __( 'Read More Text', 'photoline-lite' ),
			'type'     => 'text'
		)
	);

	/*-----------------------------------------------------------
	 * Copyright section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'photoline_custom_copyright',
		array(
			'title'     => __( 'Footer Copyright', 'photoline-lite' ),
			'priority'  => 600
		)
	);
	$wp_customize->add_setting(
		'copyright_txt',
		array(
			'default'            => 'All rights reserved',
			'sanitize_callback'  => 'photoline_sanitize_txt',
			'transport'          => 'postMessage'
		)
	);
	// Copyright CONTROL
	$wp_customize->add_control(
		'copyright_txt',
		array(
			'section'  => 'photoline_custom_copyright',
			'label'    => __( 'Copyright', 'photoline-lite' ),
			'type'     => 'text'
		)
	);
	/*-----------------------------------------------------------*
	 * Display Options section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'photoline_display_options',
		array(
			'title'     => __( 'Display Options', 'photoline-lite' ),
			'priority'  => 700
		)
	);
	$wp_customize->add_setting( 
		'photoline_header_social',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_header_social',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'Show social menu in the header', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'photoline_transparent_menu',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_transparent_menu',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'Transparent menu bar', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'photoline_border_menu',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_border_menu',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'No border menu bar', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting(
		'opacity_herobox',
		array(
			'default'            => 9,
			'sanitize_callback'  => 'absint',
		)
	);
	$wp_customize->add_control(
		'opacity_herobox',
		array(
			'section'  => 'photoline_display_options',
			'label'    => __( 'Opacity hero box', 'photoline-lite' ),
			'description'  => __( 'The percent opacity box of the homepage title in the header.', 'photoline-lite' ),
			'type' => 'select',
			'choices' => array(
				'9' => '90',
				'5' => '50',
				'2' => '20',
				'0' => '0',
			)
		)
	);
	$wp_customize->add_setting( 
		'photoline_page_header',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_page_header',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'Hide page header', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'photoline_submenu_pages',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_submenu_pages',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'Hide Submenu pages', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'numbered_pagination',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'numbered_pagination',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'Numbered navigation', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'photoline_lightbox_img',
		array(
			'sanitize_callback' => 'photoline_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'photoline_lightbox_img',
		array(
			'section'   => 'photoline_display_options',
			'label'     => __( 'Disable lightbox image', 'photoline-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting(
		'number_homeposts',
		array(
			'default'            => '6',
			'sanitize_callback'  => 'absint',
		)
	);
	$wp_customize->add_control(
		'number_homeposts',
		array(
			'section'  => 'photoline_display_options',
			'label'    => __( 'Number of posts image format', 'photoline-lite' ),
			'description'  => __( 'Only works for the Home page with the assigned template Home Mosaic Tiles / Home Square Tiles.', 'photoline-lite' ),
			'type' => 'select',
			'choices' => array(
				'4' => '4',
				'6' => '6',
				'10' => '10',
				'12' => '12',
			)
		)
	);


}
add_action( 'customize_register', 'photoline_register_theme_customizer' );

	/*-----------------------------------------------------------*
	 * Sanitize
	 *-----------------------------------------------------------*/
function photoline_sanitize_textarea( $input ) {
	return wp_kses_post(force_balance_tags($input));
}
function photoline_sanitize_txt( $input ) {
	return strip_tags( stripslashes( $input ) );
}
function photoline_sanitize_checkbox( $value ) {
        if ( 'on' != $value )
            $value = false;

        return $value;
}

	/*-----------------------------------------------------------*
	 * Styles print
	 *-----------------------------------------------------------*/
function photoline_customizer_css() {
    ?>
    <style type="text/css">
body { color: <?php echo get_theme_mod( 'photoline_main_color', '#404040' ); ?>; }
.entry-header p { color: <?php echo get_theme_mod( 'photoline_secondary_color', '#333333' ); ?>; }
.blog-widget .textwidget p:after, .no-sidebar .format-standard h1.page-title:after { background-color: <?php echo get_theme_mod( 'photoline_secondary_color', '#333333' ); ?>; }
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] { background: <?php echo get_theme_mod( 'photoline_link_color', '#000' ); ?>; }
button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover { background: <?php echo get_theme_mod( 'photoline_hover_color', '#000' ); ?>; }
        .site-content a, #home-tagline h1, cite { color: <?php echo get_theme_mod( 'photoline_link_color', '#000' ); ?>; }
        #content a:hover, .site-content a:hover, .site-footer a:hover { color: <?php echo get_theme_mod( 'photoline_hover_color', '#000' ); ?>; }

<?php if( false === get_theme_mod( 'photoline_transparent_menu' ) ) { ?>
        .main-navigation { background: <?php echo get_theme_mod( 'photoline_menu_color', '#FFF' ); ?>; }
<?php } ?>

<?php if( get_theme_mod( 'opacity_herobox' ) != 9 ) { ?>
        .hero { background: rgba(255, 255, 255, 0.<?php echo get_theme_mod( 'opacity_herobox', '9' ); ?>); }
<?php } ?>

<?php if( true === get_theme_mod( 'photoline_transparent_menu' ) ) { ?>
        .main-navigation { background: transparent; }
<?php } ?>

<?php if( true === get_theme_mod( 'photoline_border_menu' ) ) { ?>
        .main-navigation {   border: none; }
<?php } ?>

.main-navigation li a { color: <?php echo get_theme_mod( 'photoline_menu_link', '#2d2d2d' ); ?>; }
.main-navigation li a:hover  { color: <?php echo get_theme_mod( 'menu_link_hover', '#CCC' ); ?>; }
.main-navigation, .footer-border { border-top-color: <?php echo get_theme_mod( 'photoline_border_bold', '#333' ); ?>; }
.page-header, .single .entry-content, #colophon.wrap { border-color: <?php echo get_theme_mod( 'photoline_border_thin', '#DDD' ); ?>; }

<?php if( true === get_theme_mod( 'photoline_page_header' ) ) { ?>
        header.page-header {   display: none; }
<?php } ?>

h1.page-title { color: <?php //echo get_theme_mod( 'photoline_menu_color', '#2d2d2d' ); ?>; }
.site-content .entry-meta, .comment-metadata, .comments-area .reply:before, label { color: <?php echo get_theme_mod( 'photoline_addit_color', '#aaaaaa' ); ?>; }
.site-footer, .site-footer a { color: <?php echo get_theme_mod( 'photoline_footer_color', '#333' ); ?>; }
.site-footer { background: <?php echo get_theme_mod( 'photoline_footerbg_color', '#FFF' ); ?>; }
	.nav-menu li:hover,
	.nav-menu li.sfHover,
	.nav-menuu a:focus,
	.nav-menu a:hover, 
	.nav-menu a:active,
.main-navigation li ul li a:hover  { background: <?php echo get_theme_mod( 'photoline_hover_menu', '#F2F2F2' ); ?>; }
	.nav-menu .current_page_item a,
	.nav-menu .current-post-ancestor a,
	.nav-menu .current-menu-item a { background: <?php echo get_theme_mod( 'photoline_menu_current', '#000' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'photoline_customizer_css' );

	/*-----------------------------------------------------------*
	 * Live Preview Script
	 *-----------------------------------------------------------*/
function photoline_customizer_live_preview() {
    wp_enqueue_script(
        'photoline-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0706201523',
        true
    );
}
add_action( 'customize_preview_init', 'photoline_customizer_live_preview' );