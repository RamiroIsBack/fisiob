<?php
// Do not allow direct access!
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class One_And_One_Theme_Manager {

	public static $popup_index = 0;

	public function get_theme_manager( $site_type ) {

		add_thickbox();

		$themes = wp_prepare_themes_for_js();
		$themes = One_And_One_Sitetype_Filter::get_filtered_themes( $themes, $site_type );

		?>

		<form id="oneandone-install-form" action="<?php echo esc_url( add_query_arg( array( 'setup_action' => 'activate' ) ) ); ?>" method="post">
			<!-- Add nonce-->
			<?php wp_nonce_field( 'activate' ) ?>

			<input type="hidden" name="site_type" value="<?php esc_attr_e( $site_type ); ?>" />

			<div class="wrap">

				<?php
				include( One_And_One_Wizard::get_views_dir_path().'setup-wizard-header.php' );
				One_And_One_Wizard_Header::render( 2, $site_type ); ?>

				<h3 class="clear"><?php esc_html_e( 'setup_assistant_design_title', '1and1-wordpress-wizard' ) ?></h3>

				<p><?php esc_html_e( 'setup_assistant_design_description', '1and1-wordpress-wizard' ) ?></p>
				<br />

				<div>
					<div class="oneandone-theme-browser">

						<?php

						foreach ( $themes as $theme ) {
							if ( ! $theme['id'] ) {
								continue;
							}

							$this->create_theme_item( $theme );
						}

						?>

						<?php $this->install_other(); ?>

						<br class="clear">
					</div>


					<br class="clear">
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=1and1-wordpress-wizard' ) ); ?>"><?php esc_html_e( 'Back to the beginning', '1and1-wordpress-wizard' ); ?></a>
				</div>
			</div>
		</form>

		<div id="oneandone-setup-install" style="display:none;">
			<div class="oneandone-theme-info-box oneandone-loading">
				<h2>
					<span><?php esc_html_e( 'setup_assistant_progress_title', '1and1-wordpress-wizard' ); ?></span>
					<span class="spinner is-active"></span>
				</h2>
				<p><?php _e( 'setup_assistant_progress_desc', '1and1-wordpress-wizard' ); ?></p>
			</div>
		</div>

		<?php
	}

	public function create_theme_item( $theme ) {
		self::$popup_index ++;

		// Only first theme can be active set all other to false if cached version is used
		if ( array_key_exists('active', $theme) && $theme['active'] == true && self::$popup_index == 1 ) {
			$theme_id = '';
			$theme_submit_label = esc_attr__( 'Keep Current Theme', '1and1-wordpress-wizard' );
		} else {
			$theme['active'] = false;
			$theme_id = $theme[ 'id' ];
			$theme_submit_label = esc_attr__( 'Select', '1and1-wordpress-wizard' );
		}

		?>

		<div class="oneandone-selectable-item <?php echo $theme['active'] == true ? 'active' : '' ?> ">

			<div class="oneandone-theme-screenshot"
				 onclick="showBox( <?php echo htmlspecialchars( json_encode( self::$popup_index ) ); ?>, false, 900, 500 )">
				<img src="<?php echo $theme['screenshot'][0]; ?>" alt="">
			</div>
            
            <span class="oneandone-theme-more-details"
				  onclick="showBox( <?php echo htmlspecialchars( json_encode( self::$popup_index ) ); ?>, false, 900, 500 )">
                      <?php _e( 'More information', '1and1-wordpress-wizard' ) ?>
            </span>

			<h3 class="oneandone-theme-name">
				<?php echo $theme['name']; ?>
			</h3>

			<div class="oneandone-theme-actions" style="-ms-filter:'alpha(Opacity=1)';opacity:1">
				<a href="#" class="button button-primary" onclick="startInstall( '<?php echo $theme_id; ?>' )">
					<?php echo $theme_submit_label ?>
				</a>
			</div>
			</div>

			<div id="<?php echo self::$popup_index; ?>" style="display:none">
				<div class="oneandone-theme-info-box">

					<div class="oneandone-info-box-theme-screenshot">
						<?php if ( isset( $theme['screenshot'][0] ) && $theme['screenshot'][0] ) { ?>
							<div class="screenshot">
								<img src="<?php echo esc_url( $theme['screenshot'][0] ); ?>" alt="Screenshot" /></div>
						<?php } else { ?>
							<div class="screenshot blank"></div>
						<?php } ?>
					</div>

					<div class="oneandone-theme-info">

						<h3 class="oneandone-theme-name"><?php echo esc_html( $theme['name'] ); ?>
							<span class="oneandone-theme-version"><?php printf( esc_html( 'Version: %s', '1and1-wordpress-wizard' ), $theme['version'] ); ?></span>
						</h3>

						<h4 class="oneandone-theme-author"><?php printf( __( 'By %s', '1and1-wordpress-wizard' ), esc_html( $theme['author'] ) ); ?></h4>

						<p class="oneandone-theme-description"><?php
							if ( $theme['description'] ) {
								echo $theme['description'];
							}
							?>
						</p>

					</div>
				</div>

				<a href="#" style="position: absolute; bottom: 15px; right: 17px;" class="button button-primary" onclick="startInstall( '<?php echo $theme_id ?>' )">
					<?php echo $theme_submit_label ?>
				</a>
		</div>

		<?php
	}

	private function install_other() {
		?>

		<div class="theme-browser oneandone-selectable-item">
			<div class="themes oneandone-theme-screenshot">
				<div class="theme add-new-theme">
					<div class="add-new-theme-border" onclick="showOtherBox('other-themes', '')">
						<div class="theme-screenshot"><span></span></div>
						<h2 class="theme-name"><?php _e( 'theme_install_other_button_install_other', '1and1-wordpress-wizard' ); ?></h2>
					</div>
				</div>
			</div>
		</div>

		<div id="other-themes" style="display:none">
			<div class="oneandone-theme-info-box">
				<h2 class="oneandone-theme-name">
					<?php _e( 'theme_install_other_modal_title', '1and1-wordpress-wizard' ); ?>
				</h2>
				<p class="oneandone-theme-description">
					<?php _e( 'theme_install_other_modal_title_desc', '1and1-wordpress-wizard' ); ?>
				</p>
				<a href="<?php echo admin_url(); ?>theme-install.php" style="position: absolute; bottom: 15px; left: 25px;" class="button button-primary">
					<?php _e( 'theme_install_other_modal_confirm', '1and1-wordpress-wizard' ); ?>
				</a>
				<a href="#" onclick="self.parent.tb_remove();" style="position: absolute; bottom: 15px; right: 25px;" class="button button-success">
					<?php _e( 'theme_install_other_modal_cancel', '1and1-wordpress-wizard' ); ?>
				</a>
			</div>
		</div>

		<?php
	}
}
