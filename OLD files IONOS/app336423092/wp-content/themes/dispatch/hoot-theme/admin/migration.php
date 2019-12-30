<?php
/**
 * Class for migrating theme options ( from earlier Hoot version ) to
 * theme mods (customizer settings in Hoot 2.0.0)
 * File loaded via after_setup_theme hook @priority 10
 *
 * @package hoot
 * @subpackage framework
 * @since hoot 2.0.0
 */

if ( defined( 'HOOT_MIGRATION' ) && HOOT_MIGRATION !== true )
	return;

/**
 * Migration class
 * Hoot 1.x.x to Hoot 2.0.0
 *
 * @since 2.0.0
 * @access public
 */
final class Hoot_Migration {

	/**
	 * The one instance of Hoot_Migration.
	 *
	 * @since 2.0.0
	 * @access private
	 * @var Hoot_Migration The one instance for the singleton.
	 */
	private static $instance;

	/**
	 * Hook into actions and filters
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function __construct() {
		if ( is_admin() && current_user_can( 'edit_theme_options' ) ) {

			/* init migration */
			add_action( 'init', array( $this, 'init' ) );

		}
	}

	/**
	 * Init migration
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function init() {

		$migrated = get_option( THEME_SLUG . '-migrated' );
		if ( !$migrated ) {
			$migrate = get_option( THEME_SLUG . '-migrate' );
			$optionsname = ( function_exists( 'hootoptions_option_name' ) ) ? hootoptions_option_name() : THEME_SLUG . '-options';
			$optionsvalue = get_option( $optionsname );
			if ( $optionsvalue ) {
				$this->migrate( $optionsvalue );
				if ( $migrate )
					update_option( THEME_SLUG . '-migrated', 'complete' );
				else
					update_option( THEME_SLUG . '-migrate', 'pass' );
				$migrated = 'complete';
			} else {
				update_option( THEME_SLUG . '-migrated', 'not-required' );
				update_option( THEME_SLUG . '-migrate', 'pass' );
				$migrated = 'not-required';
			}
		}

		if ( $migrated == 'complete' ) {
			$dismissed = get_option( THEME_SLUG . '-migration-notice-dismissed' );
			if ( !$dismissed ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
				add_action( 'admin_head', array( $this, 'inline_css' ) );
				add_action( 'admin_notices', array( $this, 'notice' ) );
			}
		}

	}

	/**
	 * Add message
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function notice() {
		$migration_doc = apply_filters( 'hoot_theme_migration_doc_url', 'https://wphoot.com/support/hoot-2-0-migration/' );
		?>
		<div class="notice notice-warning hoot-migration-notice is-dismissible" >
			<p><?php printf( __( 'Thank you for updating the theme. This version uses the new Hoot 2.0 framework.<br />You will find substantial changes in the new theme. %sClick here%s for support regarding migration to the new version.', 'dispatch' ), '<a href="'.$migration_doc.'">', '</a>' ); ?></p><p><a href="#" class="notice-dismiss button hoot-notice-dismiss"><?php _e( 'Dismiss', 'dispatch' ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * add css
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function inline_css() {
		echo '<style>.hoot-notice-dismiss{position:relative;top:0;right:0}.hoot-notice-dismiss:before{display:none;}</style>';
	}

	/**
	 * enqueue migration notice scripts
	 *
	 * @since 2.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'hoot_notice_update', trailingslashit( HOOT_THEMEURI ) . 'admin/js/notice-update.js', array( 'jquery' ), HOOT_VERSION, true );
		wp_localize_script( 'hoot_notice_update', 'hootdata', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		));
	}

	/**
	 * Migrate values
	 *
	 * @since 2.0.0
	 * @param array $values
	 * @access public
	 * @return void
	 */
	public function migrate( $optionsvalue ) {

		foreach ( $optionsvalue as $key => $value ) {
			$newkey = $key;
			$newvalue = '';

			/** Calculate mod values for option values **/
			switch( $key ) {

				case 'favicon':
				case 'topbar_hide_search': case 'topbar_icons':
					$newkey = $newvalue = '';
					break;

				// Group - HTML Slider
				case 'wt_html_slider':
					$newvalue = array();
					$count = 1;
					if ( is_array( $value ) ) {
						foreach ( $value as $slide ) {
							if ( is_array( $slide ) ) {
								foreach ( $slide as $slideatt => $slideattval ) {
									$newvalue[ "wt_html_slide_{$count}-{$slideatt}" ] = $slideattval;
								}
							}
							$count++;
						}
					}
					break;

				// Group - Image Slider
				case 'wt_img_slider':
					$newvalue = array();
					$count = 1;
					if ( is_array( $value ) ) {
						foreach ( $value as $slide ) {
							if ( is_array( $slide ) ) {
								foreach ( $slide as $slideatt => $slideattval ) {
									$newvalue[ "wt_img_slide_{$count}-{$slideatt}" ] = $slideattval;
								}
							}
							$count++;
						}
					}
					break;

				// Nav Dropdown Font Options - Color to Typography
				case 'font_nav_dropdown':
					$newvalue['font_nav_dropdown-color'] = $value;
					break;

				// Sortlist (and others) - Widgetized Template Sections
				case 'widgetized_template_area_d_width':
				case 'widgetized_highlight_template_area':
					$newkey = $newvalue = '';
					break;
				case 'widgetized_template_sections':
					$newkey = $newvalue = '';
					break;

				// Checkboxes
				case 'disable_lightbox':
				case 'disable_sticky_header':
				case 'disable_goto_top':
				case 'post_featured_image':
				case 'post_prev_next_links':
				case 'custom_js_inheader':
					$newvalue = ( empty( $value ) ) ? 0 : 1;
					break;

				// Multicheckboxes
				case 'archive_post_meta':
				case 'post_meta': case 'page_meta':
					if ( is_array( $value ) ) {
						foreach ( $value as $bgkey => $bgval ) {
							if ( !empty( $bgval ) )
								$newvalue .= $bgkey.',';
						}
					}
					$newvalue = trim( $newvalue, "," );
					break;

				// Background
				case 'background':
				case 'box_background':
				case 'subfooter_background':
				case 'footer_background':
					$newvalue = $this->migrate_background( $key, $value );
					break;

				// Font
				case 'font_body':
				case 'font_h1': case 'font_h2': case 'font_h3': case 'font_h4': case 'font_h5': case 'font_h6':
				case 'font_logo': case 'font_tagline':
				case 'font_nav_menu':
				case 'font_sidebar_heading': case 'font_sidebar':
				case 'font_footer_heading': case 'font_footer':
					$newvalue = array();
					if ( is_array( $value ) ) {
						foreach ( $value as $bgkey => $bgval ) {
							if ( !empty( $bgval ) )
								$newvalue[ $key . '-' . $bgkey ] = $bgval;
						}
					}
					break;

				// Rest options
				default:
					$newvalue = $value;

			}

			/** Allow modifications / additions **/
			$newkey = apply_filters( 'hoot_migration_newoptionkey', $newkey, $key, $value );
			$newvalue = apply_filters( 'hoot_migration_newoptionvalue', $newvalue, $key, $value );

			/** Set mods **/
			if ( !empty( $newkey ) ) {
				if ( is_string( $newkey ) && !is_array( $newvalue ) ) {
					set_theme_mod( $newkey, $newvalue );
				} elseif ( is_array( $newvalue ) ) {
					foreach ( $newvalue as $newvaluekey => $newvalueval ) {
						if ( is_string( $newvaluekey ) && is_string( $newvalueval ) ) {
							set_theme_mod( $newvaluekey, $newvalueval );
						}
					}
				}
			}

		}

		// Set Extra Options
		set_theme_mod( 'load_minified', 1 );

	}

	/**
	 * Calculate background
	 *
	 * @since 2.0.0
	 * @param string $key
	 * @param array $value
	 * @access public
	 * @return void
	 */
	public function migrate_background( $key, $value ) {

		$newvalue = array();
		if ( is_array( $value ) ) {
			foreach ( $value as $bgkey => $bgval ) {
				if ( $bgkey == 'pattern' && $bgval ){ // bgval is not 0
					if ( file_exists( trailingslashit(THEME_DIR) . 'hoot/images/patterns/' . $bgval ) ) {
						$bgval = 'hoot/images/patterns/' . $bgval;
					} else {
						// premium bg filenames were modified (to start from 1)
						$bgfile = intval( $bgval ) - 8;
						$bgext = substr( $bgval, -4 );
						if ( file_exists( trailingslashit(THEME_DIR) . 'premium/hoot/images/patterns/' . $bgfile . $bgext ) ) {
							$bgval = 'premium/hoot/images/patterns/' . $bgfile . $bgext;
						} else {
							$bgval = 0;
						}
					}
				}
				$newvalue[ $key . '-' . $bgkey ] = $bgval;
			}
		}
		return $newvalue;

	}

	/**
	 * Instantiate or return the one Hoot_Migration instance.
	 *
	 * @since 2.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

}

/* Ajax call for migration notice */
add_action( 'wp_ajax_nopriv_hoot_dismiss_migration_notice', 'hoot_dismiss_migration_notice' );
add_action( 'wp_ajax_hoot_dismiss_migration_notice', 'hoot_dismiss_migration_notice' );
function hoot_dismiss_migration_notice() {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) { 
		update_option( THEME_SLUG . '-migration-notice-dismissed', '1' );
	}
}

/* Initialize class */
global $hoot_migration;
$hoot_migration = Hoot_Migration::get_instance();

/* Hook into this action to add options */
do_action( 'hoot_migration_loaded', $hoot_migration );