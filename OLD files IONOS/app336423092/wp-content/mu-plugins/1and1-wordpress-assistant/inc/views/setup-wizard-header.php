<?php
// Do not allow direct access!
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class One_And_One_Wizard_Header {

	/**
	 * Render the breadcrumb with each Assistant step
	 *
	 * @param int    $wizard_step
	 * @param string $site_type
	 * @param string $theme
	 */
	public static function render( $wizard_step = null, $site_type = '', $theme = '' ) {
		if ( $theme ) {
			$theme = wp_get_theme( $theme );
		} else {
			$theme = wp_get_theme();
		}

		if ( ! $site_type ) {
			$site_type = get_option( 'oneandone_assistant_sitetype' );
		}
		?>

		<h2><?php esc_html_e( 'setup_assistant_header', '1and1-wordpress-wizard' ) ?></h2>
		<div class="clear oneandone-setup-progress">
			<ul>
				<?php
					echo self::render_step(
						1,
						esc_html__( 'Website Type', '1and1-wordpress-wizard' ) . ( $site_type ? ': ' . One_And_One_Wizard::get_site_type_label( $site_type ) : '' ),
						$wizard_step,
						admin_url( 'admin.php?page=1and1-wordpress-wizard&setup_action=choose_site' )
					);
				?>
				<?php
					echo self::render_step(
						2,
						esc_html__( 'Appearance', '1and1-wordpress-wizard' ) . ( $theme ? ': ' . ucwords( $theme->name ) : '' ),
						$wizard_step,
						admin_url( 'admin.php?page=1and1-wordpress-wizard&setup_action=choose_appearance' ),
						true
					)
				?>
			</ul>
		</div>
		<?php
	}

	/**
	 * Render the given step
	 *
	 * @param int     $step
	 * @param string  $title
	 * @param int     $active_step
	 * @param string  $link
	 * @param boolean $last
	 * @return string
	 */
	public static function render_step( $step, $title, $active_step, $link = null, $last = false ) {
		$class = ( $step == $active_step ) ? ' class="active"' : '';

		$html  = '<span class="oneandone-progress-step-number">' . $step . '</span>';
		$html .= '<span class="oneandone-progress-step-title">' . $title . '</span>';

		if ( ! empty( $link ) && ( $step < $active_step ) ) {
			$html = sprintf( '<a href="' . $link . '">%s</a>', $html );
		}

		if ( ! $last ) {
			$html .= '<hr class="oneandone-horizontal-line" />';
		}

		return sprintf( '<li' . $class . '>%s</li>', $html );
	}
}
