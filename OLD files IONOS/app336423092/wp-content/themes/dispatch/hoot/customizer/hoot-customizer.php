<?php
/**
 * Hoot Customizer framework is an extended version of the
 * Customizer Library v1.3.0, Copyright 2010 - 2014, WP Theming http://wptheming.com
 * and is licensed under GPLv2
 *
 * This file is loaded at 'after_setup_theme' hook with 5 priority.
 *
 * @package hoot
 * @subpackage hoot-customizer
 * @since hoot 2.0.0
 */

/** Include Hoot Customizer files **/
require_once trailingslashit( HOOTCUSTOMIZER_DIR ) . 'functions.php';
require_once trailingslashit( HOOTCUSTOMIZER_DIR ) . 'interface.php';
require_once trailingslashit( HOOTCUSTOMIZER_DIR ) . 'sanitization.php';
require_once trailingslashit( HOOTCUSTOMIZER_DIR ) . 'style-builder.php';

/** Include custom controls **/
foreach ( glob( trailingslashit( HOOTCUSTOMIZER_DIR ) . 'control-*.php' ) as $file_path ) {
	include_once( $file_path );
}

/**
 * Class wrapper with useful methods for interacting with the hoot customizer.
 *
 * @since 2.0.0
 */
final class Hoot_Customizer {

	/**
	 * The one instance of Hoot_Customizer.
	 *
	 * @since 2.0.0
	 * @access private
	 * @var Hoot_Customizer The one instance for the singleton.
	 */
	private static $instance;

	/**
	 * The array for storing $infobuttons.
	 *
	 * @since 2.0.0
	 * @access public
	 * @var array Holds the infobuttons array.
	 */
	public $infobuttons = array();

	/**
	 * The array for storing $options.
	 *
	 * @since 2.0.0
	 * @access public
	 * @var array Holds the options array.
	 */
	public $options = array();

	/**
	 * Protected constructor to prevent creating a new instance of the
	 * Singleton from outside of this class.
	 *
	 * @since 2.0.0
	 * @access protected
	 */
	protected function __construct() {

		/* Initialize Options Array */
		$this->options = array(
			'settings' => array(),
			'sections' => array(),
			'panels' => array(),
			);

	}

	/**
	 * Add customizer info buttons to infobuttons Array
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function add_infobuttons( $infobuttons = array() ) {
		$add_buttons = apply_filters( 'hoot_customizer_add_infobuttons' , $infobuttons );
		if ( is_array( $infobuttons ) && !empty( $infobuttons ) ) {
			$this->infobuttons = array_merge( $this->infobuttons, $add_buttons );
		}
	}

	/**
	 * Remove customizer info buttons from infobuttons Array
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function remove_infobuttons( $key ) {
		if ( is_array( $key ) ) {
			foreach ( $key as $singlekey ) {
				if ( isset( $this->infobuttons[$singlekey] ) )
					unset( $this->infobuttons[$singlekey] );
			}
		} elseif ( isset( $this->infobuttons[$key] ) ) {
			unset( $this->infobuttons[$key] );
		}
	}

	/**
	 * Get infobuttons Array
	 *
	 * @since 2.0.0
	 * @access public
	 * @return array
	 */
	public function get_infobuttons() {
		return $this->infobuttons;
	}

	/**
	 * Add customizer option to Options Array
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function add_options( $options = array() ) {
		foreach ( array( 'settings', 'sections', 'panels' ) as $key ) {
			if ( isset( $options[ $key ] ) && is_array( $options[ $key ] ) && !empty( $options[ $key ] ) ) {
				$add_options = $options[ $key ];
				$add_options = apply_filters( "hoot_customizer_add_{$key}" , $add_options );
				if ( is_array( $add_options ) && !empty( $add_options ) )
					$this->options[ $key ] = array_merge( $this->options[ $key ], $add_options );
			}
		}
	}

	/**
	 * Remove customizer settings from Options Array Settings
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function remove_settings( $key ) {
		if ( is_array( $key ) ) {
			foreach ( $key as $singlekey ) {
				if ( isset( $this->options['settings'][$singlekey] ) )
					unset( $this->options['settings'][$singlekey] );
			}
		} elseif ( isset( $this->options['settings'][$key] ) ) {
			unset( $this->options['settings'][$key] );
		}
	}

	/**
	 * Edit customizer settings from Options Array Settings
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function edit_settings( $new_options ) {
		if ( is_array( $new_options ) ) {
			$new_options = apply_filters( 'hoot_customizer_add_settings' , $new_options );
			if ( is_array( $new_options ) ) {
				foreach ( $new_options as $key => $value ) {
					if ( isset( $this->options['settings'][$key] ) )
						// 'array_replace_recursive' overwrites numeric keys as well. Hence take necessary
						// steps in sub-arrays without keys (example betterbackground['options'])
						// Possible solution:
						// betterbackground['options']=array('color','','','','','');
						$this->options['settings'][$key] = array_merge( $this->options['settings'][$key], $value );
				}
			}
		}
	}

	/**
	 * Edit customizer sections from Options Array Sections
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function edit_sections( $new_options ) {
		if ( is_array( $new_options ) ) {
			$new_options = apply_filters( 'hoot_customizer_add_sections' , $new_options );
			if ( is_array( $new_options ) ) {
				foreach ( $new_options as $key => $value ) {
					if ( isset( $this->options['sections'][$key] ) )
						// 'array_replace_recursive' overwrites numeric keys as well. Hence take necessary
						// steps if merge data contains sub-arrays without keys (example betterbackground['options'])
						// Possible solution:
						// betterbackground['options']=array('color','','','','','');
						$this->options['sections'][$key] = array_merge( $this->options['sections'][$key], $value );
				}
			}
		}
	}

	/**
	 * Edit customizer panels from Options Array Panels
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function edit_panels( $new_options ) {
		if ( is_array( $new_options ) ) {
			$new_options = apply_filters( 'hoot_customizer_add_panels' , $new_options );
			if ( is_array( $new_options ) ) {
				foreach ( $new_options as $key => $value ) {
					if ( isset( $this->options['panels'][$key] ) )
						// 'array_replace_recursive' overwrites numeric keys as well. Hence take necessary
						// steps in sub-arrays without keys (example betterbackground['options'])
						// Possible solution:
						// betterbackground['options']=array('color','','','','','');
						$this->options['panels'][$key] = array_merge( $this->options['panels'][$key], $value );
				}
			}
		}
	}

	/**
	 * Get Options Array
	 *
	 * @since 2.0.0
	 * @access public
	 * @param string $return Select which option array to return, or to return whole array
	 * @return array
	 */
	public function get_options( $return = '' ) {
		switch( $return ) {
			case 'settings':
				if ( !empty( $this->options['settings'] ) )
					return $this->options['settings'];
				else
					return array();
				break;
			case 'sections':
				if ( !empty( $this->options['sections'] ) )
					return $this->options['sections'];
				else
					return array();
				break;
			case 'panels':
				if ( !empty( $this->options['panels'] ) )
					return $this->options['panels'];
				else
					return array();
				break;
		}
		return $this->options;
	}

	/**
	 * Instantiate or return the one Hoot_Customizer instance.
	 *
	 * @since 2.0.0
	 * @access public
	 * @return Hoot_Customizer
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

}

/** Allow to include functions and files **/
do_action( 'hoot_customizer_loaded' );