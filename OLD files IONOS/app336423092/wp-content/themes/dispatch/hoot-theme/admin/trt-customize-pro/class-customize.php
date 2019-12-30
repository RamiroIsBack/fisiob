<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @credit() Justin Tadlock https://github.com/justintadlock/trt-customizer-pro
 *
 * @since  1.0
 * @access public
 */
final class Hoot_Premium_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( HOOT_THEMEDIR ) . 'admin/trt-customize-pro/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Hoot_Premium_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Hoot_Premium_Customize_Section_Pro(
				$manager,
				'hoot_premium',
				apply_filters( 'hoot_theme_customize_section_pro', array(
					'title'    => esc_html__( 'Dispatch Premium', 'dispatch' ),
					'priority' => 1,
					'pro_text' => esc_html__( 'Premium', 'dispatch' ),
					'pro_url'  => esc_url( admin_url('themes.php?page=dispatch-welcome') ),
					'demo'     => 'https://demo.wphoot.com/dispatch/',
					'docs'     => 'https://wphoot.com/support/',
					'rating'   => 'https://wordpress.org/support/theme/dispatch/reviews/?filter=5#new-post',
				) )
			)
		);
	}

}

// Doing this customizer thang!
Hoot_Premium_Customize::get_instance();
