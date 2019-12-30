<?php

// Do not allow direct access!
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Class One_And_One_Assistant_Branding
 * Loads and parse the main configuration and handle the different settings
 */
class One_And_One_Assistant_Branding {

	/**
	 * @var One_And_One_Assistant_Branding
	 */
	private static $instance;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string[]
	 */
	private $logos = array();

	/**
	 * @var string[]
	 */
	private $visuals = array();

	/**
	 * @var string[]
	 */
	private $colors = array();

	/**
	 * Dynamic branded backgrounds
	 * @var string[]
	 */
	public static $backgrounds = array(
		'weave-light' => 'variant3',
		'weave-medium' => 'variant3'
	);

	/**
	 * One_And_One_Assistant_Branding constructor
	 */
	private function __construct() {

		// Retrieve all brand params for the config
		$brand_params = One_And_One_Assistant_Config::section( 'branding' );

		// Store brand name
		$this->name = isset( $brand_params[ 'name' ] ) ? $brand_params[ 'name' ] : '';

		// Store color set and logo variants
		foreach ( $brand_params as $key => $value ) {

			if ( strpos( $key, 'color_' ) !== false ) {
				$this->colors[ str_replace( 'color_', '', $key ) ] = $value;
			}
			if ( strpos( $key, 'logo_' ) !== false ) {
				$this->logos[ str_replace( 'logo_', '', $key ) ] = $value;
			}
			if ( strpos( $key, 'visual_' ) !== false ) {
				$this->visuals[ $key ] = $value;
			}
		}
	}

	/**
	 * Retrieve the Singleton object
	 *
	 * @return One_And_One_Assistant_Branding
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Destructor (for testing purpose)
	 */
	public static function reset_instance() {
		self::$instance = null;
	}

	/**
	 * Returns the brand
	 *
	 * @return string
	 */
	public static function get_brand_name() {
		return self::get_instance()->get_name();
	}

	/**
	 * @param  string $variant
	 * @return string
	 */
	public static function get_logo( $variant = null ) {
		$logos = self::get_instance()->get_logos();
		$id = $variant ? $variant : 'default';
		$market = One_And_One_Assistant::get_market();

		if ( is_array( $logos ) ) {
			if ( array_key_exists( $id . '_' . $market, $logos ) ) {
				return $logos[ $id . '_' . $market ];
			} elseif ( array_key_exists( $id, $logos ) ) {
				return $logos[ $id ];
			}
		}

		return null;
	}

	/**
	 * @param  int $id
	 * @return string
	 */
	public static function get_visual( $id ) {
		$visuals = self::get_instance()->get_visuals();

		if ( is_array( $visuals ) && array_key_exists( 'visual_' . $id, $visuals ) ) {
			return $visuals[ 'visual_' . $id ];
		}
		return null;
	}

	/**
	 * @param  string $variant
	 * @return string
	 */
	public static function get_color( $variant = null ) {
		$colors = self::get_instance()->get_colors();
		$id = $variant ? $variant : 'default';

		if ( is_array( $colors ) && array_key_exists( $id, $colors ) ) {
			return $colors[ $id ];
		}
		return null;
	}

	/**
	 * Returns the CSS snippet defining all elements with brand colors
	 * (a CSS template is used with placeholders and default values)
	 *
	 * @return string
	 */
	public static function get_color_styles() {
		$inline_styles = '';

		$backgrounds = array();
		$colors = self::get_instance()->get_colors();

		$styles_template = One_And_One_Assistant::get_plugin_dir_path() . 'css/templates/branding.css';
		$images_templates = One_And_One_Assistant::get_plugin_dir_path() . 'images/templates/';

		// Generate SVGs backgrounds
		foreach ( self::$backgrounds as $image_name => $color_id ) {
			$image_file = $images_templates . $image_name . '.svg';

			if ( is_file( $image_file ) && is_readable( $image_file ) ) {
				$svg = file_get_contents( $image_file );

				if ( is_array( $colors ) && array_key_exists( $color_id, $colors ) ) {
					$svg = str_replace( 'fill:none', 'fill:' . $colors[ $color_id ], $svg );
				}
				$backgrounds[ $image_name ] = 'data:image/svg+xml;base64,' . base64_encode( $svg );
			}
		}

		// Parse CSS template sheet
		if ( is_file( $styles_template ) && is_readable( $styles_template ) ) {
			$inline_styles = file_get_contents( $styles_template );
		}

		// Render inline styles
		if ( $inline_styles ) {

			// Render simple styles
			if ( is_array( $colors ) ) {
				foreach ( $colors as $color_id => $color_value ) {
					$inline_styles = str_replace( '"{' . $color_id . '}"', $color_value, $inline_styles );
				}
			}

			// Render SVG background styles
			foreach ( $backgrounds as $image_name => $svg ) {
				$inline_styles = str_replace( '"{' . $image_name . '}"', $svg, $inline_styles );
			}
		}

		return $inline_styles;
	}

	/**
	 * @return string[]
	 */
	public function get_colors() {
		return $this->colors;
	}

	/**
	 * @return string[]
	 */
	public function get_logos() {
		return $this->logos;
	}

	/**
	 * @return string[]
	 */
	public function get_visuals() {
		return $this->visuals;
	}

	/**
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}
}