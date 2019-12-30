<?php
/**
 * Customize for betterbackground, extend the WP customizer
 *
 * @package hoot
 * @subpackage hoot-customizer
 * @since hoot 2.0.0
 */

/**
 * Betterbackground Control Class extends the WP customizer
 *
 * @since 2.0.0
 */
// Only load in customizer (not in frontend)
if ( class_exists( 'WP_Customize_Control' ) ) :
class Hoot_Customize_Betterbackground_Control extends WP_Customize_Control {

	/**
	 * @since 2.0.0
	 * @access public
	 * @var string
	 */
	public $type = 'betterbackground';

	/**
	 * Define variable to whitelist sublabel parameter
	 *
	 * @since 2.1.0
	 * @access public
	 * @var string
	 */
	public $sublabel = '';

	/**
	 * Define variable to whitelist background parameter
	 *
	 * @since 2.0.0
	 * @access public
	 * @var string
	 */
	public $background = '';

	/**
	 * Define variable to whitelist options parameter
	 *
	 * @since 2.0.0
	 * @access public
	 * @var string
	 */
	public $options = '';

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 * Add extra class names
	 *
	 * @since 2.0.0
	 */
	protected function render() {
		$id    = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
		$class = 'customize-control customize-control-' . $this->type . ' hoot-customize-control-' . $this->type . $this->background;

		?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
		</li><?php
	}

	/**
	 * Render the control's content.
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since 2.0.0
	 * @return void
	 */
	public function render_content() {

		switch ( $this->type ) {

			case 'betterbackground' :

				switch ( $this->background ) {

					case 'button' :
						if (
							empty( $this->options ) ||
							( is_array( $this->options ) && in_array( 'image', $this->options ) && in_array( 'pattern', $this->options ) )
							):
							$value = $this->value();
							$value = ( empty( $value ) ) ? 'predefined' : $value;
							?>
							<div class="hoot-betterbackground-buttons">
								<span class="button hoot-betterbackground-button hoot-betterbackground-button-predefined <?php if ( 'predefined' == $this->value() ) echo 'selected'; else echo 'deactive'; ?>" data-value="predefined"><?php echo __( 'Pattern', 'dispatch' ); ?></span><span class="button hoot-betterbackground-button hoot-betterbackground-button-custom <?php if ( 'custom' == $this->value() ) echo 'selected'; else echo 'deactive'; ?>" data-value="custom"><?php echo __( 'Custom Image', 'dispatch' ); ?></span>
							</div>
							<input class="hoot-customizer-control-betterbackground" value="<?php echo esc_attr( $this->value() ) ?>" <?php $this->link(); ?> type="hidden"/>
						<?php
						endif;
					break;

					case 'start' :
						if ( ! empty( $this->label ) ) : ?>
							<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<?php endif;

						if ( ! empty( $this->description ) ) : ?>
							<span class="description customize-control-description"><?php echo $this->description ; ?></span>
						<?php endif;

						if ( ! empty( $this->sublabel ) ) : ?>
							<span class="description customize-control-sublabel"><?php echo $this->sublabel ; ?></span>
						<?php endif;
					break;

					case 'end' :
					break;

				}

				break;

		}

	}

}
endif;

/**
 * Hook into control display interface
 *
 * @since 2.0.0
 * @param object $wp_customize
 * @param string $id
 * @param array $setting
 * @return void
 */
// Only load in customizer (not in frontend)
if ( class_exists( 'WP_Customize_Control' ) ) :
function hoot_customizer_betterbackground_control_interface ( $wp_customize, $id, $setting ) {
	if ( isset( $setting['type'] ) ) :
		if ( $setting['type'] == 'betterbackground' ) {
			$wp_customize->add_control(
				new Hoot_Customize_Betterbackground_Control( $wp_customize, $id, $setting )
			);
		}
	endif;
}
add_action( 'hoot_customizer_control_interface', 'hoot_customizer_betterbackground_control_interface', 10, 3 );
endif;

/**
 * Modify the settings array and prepare betterbackground settings for Customizer Library Interface functions
 *
 * @since 2.0.0
 * @param array $value
 * @param string $key
 * @param array $setting
 * @param int $count
 * @return void
 */
function hoot_customizer_prepare_betterbackground_settings( $value, $key, $setting, $count ) {

	if ( $setting['type'] == 'betterbackground' ) {

		$setting = wp_parse_args( $setting, array(
			'label'       => '',
			'section'     => '',
			'priority'    => '',
			'choices'     => hoot_enum_background_pattern(),
			'default'     => array(),
			'description' => '',
			'options'     => array( 'image', 'color', 'repeat', 'position', 'attachment', 'pattern' ),
			) );
		$setting['default'] = wp_parse_args( $setting['default'], array(
			'type'       => 'predefined',
			'color'      => '',
			'image'      => '',
			'repeat'     => 'repeat',
			'position'   => 'top center',
			'attachment' => 'scroll',
			'pattern'    => '0',
			) );

		if ( is_array( $setting['options'] ) && !empty( $setting['options'] ) ):
			$color = in_array( 'color', $setting['options'] );
			$image = in_array( 'image', $setting['options'] );
			$repeat = in_array( 'repeat', $setting['options'] );
			$position = in_array( 'position', $setting['options'] );
			$attachment = in_array( 'attachment', $setting['options'] );
			$pattern = ( in_array( 'pattern', $setting['options'] ) && !empty( $setting['choices'] ) );

			if ( $color || $image || $pattern ):

				// Betterbackground Start
				$value[ "betterbackground-{$count}" ] = array(
					'label'       => $setting['label'],
					'section'     => $setting['section'],
					'type'        => 'betterbackground',
					'priority'    => $setting['priority'],
					'description' => $setting['description'],
					'background'  => 'start',
				);

				// Background Color :: (priority & section same as betterbackground)
				if ( $color ) :

					$value[ "{$key}-color" ] = array(
						'section'     => $setting['section'],
						'type'        => 'color',
						'priority'    => $setting['priority'],
						'default'     => $setting['default']['color'],
					);

				endif;

				// Background Type Button
				if ( $image && $pattern ) :

					$value[ "{$key}-type" ] = array(
						'section'     => $setting['section'],
						'type'        => 'betterbackground',
						'priority'    => $setting['priority'],
						'default'     => $setting['default']['type'],
						'background'  => 'button',
					);

				endif;

				// Background Image :: (priority & section same as betterbackground)
				if ( $image ) :

					$value[ "{$key}-image" ] = array(
						'section'     => $setting['section'],
						'type'        => 'image',
						'priority'    => $setting['priority'],
						'default'     => $setting['default']['image'],
					);

					if ( $repeat ) {
						$value[ "{$key}-repeat" ] = array(
							'section'     => $setting['section'],
							'type'        => 'select',
							'priority'    => $setting['priority'],
							'choices'     => hoot_enum_background_repeat(),
							'default'     => $setting['default']['repeat'],
						);
					}

					if ( $position ) {
						$value[ "{$key}-position" ] = array(
							'section'     => $setting['section'],
							'type'        => 'select',
							'priority'    => $setting['priority'],
							'choices'     => hoot_enum_background_position(),
							'default'     => $setting['default']['position'],
						);
					}

					if ( $attachment ) {
						$value[ "{$key}-attachment" ] = array(
							'section'     => $setting['section'],
							'type'        => 'select',
							'priority'    => $setting['priority'],
							'choices'     => hoot_enum_background_attachment(),
							'default'     => $setting['default']['attachment'],
						);
					}

				endif;

				// Background Patterns :: (priority & section same as betterbackground)
				if ( $pattern ) :

					// Group Start
					$value[ "group-{$count}-p" ] = array(
						'section'     => $setting['section'],
						'type'        => 'group',
						'priority'    => $setting['priority'],
						'button'      => '<span class="hoot-betterbackground-button-pattern"></span>' . __( 'Select Pattern', 'dispatch' ),
						'group'       => 'start',
					);

					// Pattern Images
					$value[ "{$key}-pattern" ] = array(
						'section'     => $setting['section'],
						'type'        => 'radioimage',
						'priority'    => $setting['priority'],
						'choices'     => $setting['choices'],
						'default'     => $setting['default']['pattern'],
					);

					// Group End
					$value[ "group-{$count}-p-end" ] = array(
						'section'     => $setting['section'],
						'type'        => 'group',
						'priority'    => $setting['priority'],
						'group'       => 'end',
					);

				endif;

				// Betterbackground End
				$value[ "betterbackground-{$count}-end" ] = array(
					'section'     => $setting['section'],
					'type'        => 'betterbackground',
					'priority'    => $setting['priority'],
					'background'  => 'end',
				);

			endif;
		endif;

	}

	return $value;

}
add_filter( 'hoot_customizer_prepare_settings', 'hoot_customizer_prepare_betterbackground_settings', 10, 4 );

/**
 * Add sanitization function
 *
 * @since 2.0.0
 * @param string $name
 * @param string $type
 * @param array $setting
 * @return string
 */
function hoot_customizer_betterbackground_sanitization_function( $name, $type, $setting ) {
	if ( $type == 'betterbackground' && isset( $setting['background'] ) && $setting['background'] == 'button' )
		$name = 'hoot_customizer_sanitize_betterbackground';
	return $name;
}
add_filter( 'hoot_customizer_sanitization_function', 'hoot_customizer_betterbackground_sanitization_function', 5, 3 );

/**
 * Sanitize betterbackground value to allow only allowed types.
 *
 * @since 2.0.0
 * @param string $value The unsanitized string.
 * @return string The sanitized value.
 */
function hoot_customizer_sanitize_betterbackground( $value ) {
	if ( in_array( $value, array( 'predefined', 'custom' ) ) )
		return $value;
	else
		return 'predefined';
}