<?php
/**
 * Content Blocks Widget
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/**
* Class Hoot_Content_Blocks_Widget
*/
class Hoot_Content_Blocks_Widget extends Hoot_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-content-blocks-widget';
		$settings['name'] = __( 'Hoot > Content Blocks (Pages)', 'dispatch' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Styled Content Blocks.', 'dispatch'),
			// 'classname'		=> 'hoot-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( "Title (optional)", 'dispatch' ),
				'id'		=> 'title',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Blocks Style', 'dispatch' ),
				'id'		=> 'style',
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-1.png',
					'style2'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-2.png',
					'style3'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-3.png',
					'style4'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-4.png',
				),
			),
			array(
				'name'		=> __( 'No. Of Columns', 'dispatch' ),
				'id'		=> 'columns',
				'type'		=> 'select',
				'std'		=> '4',
				'options'	=> array(
					'1'	=> __( '1', 'dispatch' ),
					'2'	=> __( '2', 'dispatch' ),
					'3'	=> __( '3', 'dispatch' ),
					'4'	=> __( '4', 'dispatch' ),
					'5'	=> __( '5', 'dispatch' ),
				),
			),
			array(
				'name'		=> __( 'Icon Style', 'dispatch' ),
				'desc'		=> __( "Not applicable if 'Featured Image' is seected below.", 'dispatch' ),
				'id'		=> 'icon_style',
				'type'		=> 'select',
				'std'		=> 'circle',
				'options'	=> array(
					'none'		=> __( 'None', 'dispatch' ),
					'circle'	=> __( 'Circle', 'dispatch' ),
					'square'	=> __( 'Square', 'dispatch' ),
				),
			),
			array(
				'name'		=> __( 'Border', 'dispatch' ),
				'desc'		=> __( 'Top and bottom borders.', 'dispatch' ),
				'id'		=> 'border',
				'type'		=> 'select',
				'std'		=> 'none none',
				'options'	=> array(
					'line line'	=> __( 'Top - Line || Bottom - Line', 'dispatch' ),
					'line shadow'	=> __( 'Top - Line || Bottom - StrongDash', 'dispatch' ),
					'line none'	=> __( 'Top - Line || Bottom - None', 'dispatch' ),
					'shadow line'	=> __( 'Top - StrongDash || Bottom - Line', 'dispatch' ),
					'shadow shadow'	=> __( 'Top - StrongDash || Bottom - StrongDash', 'dispatch' ),
					'shadow none'	=> __( 'Top - StrongDash || Bottom - None', 'dispatch' ),
					'none line'	=> __( 'Top - None || Bottom - Line', 'dispatch' ),
					'none shadow'	=> __( 'Top - None || Bottom - StrongDash', 'dispatch' ),
					'none none'	=> __( 'Top - None || Bottom - None', 'dispatch' ),
				),
			),
			array(
				'name'		=> __( "Use 'Featured Image' of page instead of icons.", 'dispatch' ),
				'id'		=> 'image',
				'type'		=> 'checkbox',
			),
			array(
				'name'		=> __( 'Content', 'dispatch' ),
				'id'		=> 'excerpt',
				'type'		=> 'select',
				'std'		=> 'excerpt',
				'options'	=> array(
					'excerpt'	=> __( 'Display Excerpt', 'dispatch' ),
					'content'	=> __( 'Display Full Content', 'dispatch' ),
					'none'		=> __( 'None', 'dispatch' ),
				),
			),
			array(
				'name'		=> __( 'Custom Excerpt Length', 'dispatch' ),
				'desc'		=> __( 'Select \'Display Excerpt\' in option above. Leave empty for default excerpt length.', 'dispatch' ),
				'id'		=> 'excerptlength',
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			array(
				'name'		=> __( 'Content Boxes', 'dispatch' ),
				'id'		=> 'boxes',
				'type'		=> 'group',
				'options'	=> array(
					'item_name'	=> __( 'Content Box', 'dispatch' ),
				),
				'fields'	=> array(
					array(
						'name'		=> __('Icon', 'dispatch'),
						'desc'		=> __( "Not applicable if 'Featured Image' is selected above.", 'dispatch' ),
						'id'		=> 'icon',
						'type'		=> 'icon'),
					array(
						'name'		=> __( 'Page', 'dispatch' ),
						'id'		=> 'page',
						'type'		=> 'select',
						'options'	=> Hoot_WP_Widget::get_wp_list('page'),
					),
					array(
						'name'		=> __('Link Text (optional)', 'dispatch'),
						'id'		=> 'link',
						'type'		=> 'text'),
					array(
						'name'		=> __('Link URL (optional)', 'dispatch'),
						'id'		=> 'url',
						'type'		=> 'text',
						'sanitize'	=> 'url'),
				),
			),
			array(
				'name'		=> __( 'Widget CSS', 'dispatch' ),
				'id'		=> 'customcss',
				'type'		=> 'collapse',
				'fields'	=> array(
					array(
						'name'		=> __( 'Custom CSS Class', 'dispatch' ),
						'desc'		=> __( 'Give this widget a custom css classname', 'dispatch' ),
						'id'		=> 'class',
						'type'		=> 'text',
					),
					array(
						'name'		=> __( 'Margin Top', 'dispatch' ),
						'desc'		=> __( '(in pixels) Leave empty to load default margins', 'dispatch' ),
						'id'		=> 'mt',
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3 ),
						'sanitize'	=> 'integer',
					),
					array(
						'name'		=> __( 'Margin Bottom', 'dispatch' ),
						'desc'		=> __( '(in pixels) Leave empty to load default margins', 'dispatch' ),
						'id'		=> 'mb',
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3 ),
						'sanitize'	=> 'integer',
					),
					array(
						'name'		=> __( 'Widget ID', 'dispatch' ),
						'id'		=> 'widgetid',
						'type'		=> '<span class="widgetid" data-baseid="' . $settings['id'] . '">' . __( 'Save this widget to view its ID', 'dispatch' ) . '</span>',
					),
				),
			),
		);

		$settings = apply_filters( 'hoot_content_blocks_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hoot_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function hoot_content_blocks_widget_register(){
	register_widget('Hoot_Content_Blocks_Widget');
}
add_action('widgets_init', 'hoot_content_blocks_widget_register');