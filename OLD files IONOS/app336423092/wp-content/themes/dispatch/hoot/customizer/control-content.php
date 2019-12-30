<?php
/**
 * Customize for general content, extend the WP customizer
 *
 * @package hoot
 * @subpackage hoot-customizer
 * @since hoot 2.0.0
 */

/**
 * General Content Control Class extends the WP customizer
 *
 * @since 2.0.0
 */
// Only load in customizer (not in frontend)
if ( class_exists( 'WP_Customize_Control' ) ) :
class Hoot_Customize_Content_Control extends WP_Customize_Control {

	/**
	 * @since 2.0.0
	 * @access public
	 * @var string
	 */
	public $type = 'content';

	/**
	 * Define variable to whitelist content parameter
	 *
	 * @since 2.0.0
	 * @access public
	 * @var string
	 */
	public $content = '';

	/**
	 * Render the control's content.
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since 2.0.0
	 * @return void
	 */
	public function render_content() {

		switch ( $this->type ) {

			case 'content' :

				if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;

				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description ; ?></span>
				<?php endif;

				if ( ! empty( $this->content ) ) : ?>
					<span class="hoot-customize-control-content-text"><?php echo $this->content ; ?></span>
				<?php endif;

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
function hoot_customizer_content_control_interface ( $wp_customize, $id, $setting ) {
	if ( isset( $setting['type'] ) ) :
		if ( $setting['type'] == 'content' ) {
			$wp_customize->add_control(
				new Hoot_Customize_Content_Control( $wp_customize, $id, $setting )
			);
		}
	endif;
}
add_action( 'hoot_customizer_control_interface', 'hoot_customizer_content_control_interface', 10, 3 );
endif;