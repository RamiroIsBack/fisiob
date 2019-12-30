<?php One_And_One_Assistant_View::load_template( 'card/header-default' ); ?>

<div class="card-content">
	<div class="card-content-inner">
		<h2><?php esc_html_e( 'setup_assistant_design_title', 'uialfred-assistant' ); ?></h2>
		<p><?php _e( 'setup_assistant_design_description', 'uialfred-assistant' ); ?></p>
	</div>

	<div class="diys-toolbar">
		<div class="diys-active-category">
			<a href="#" class="diys-sidebar-menu-btn open">
				<?php esc_html_e( 'setup_assistant_design_menu_open', 'uialfred-assistant' ) ?>
			</a>
			<span class="diys-sidebar-label">
				<?php esc_html_e( 'Website Type', 'uialfred-assistant' ) ?>:
				<strong class="current-site-type"></strong>
			</span>
		</div>
	</div>

	<div class="themes-browser">
		<div class="diys-sidebar-wrapper">
			<div class="diys-sidebar">
				<div class="diys-sidebar-background">
					<div class="diys-sidebar-background-disc"></div>
				</div>
				<div class="diys-sidebar-tabs">
					<ul>
						<?php if ( ! empty( $site_types ) ): ?>

							<?php foreach ( $site_types as $site_type_id => $site_type ): ?>
								<li class="site-type<?php echo ( ! empty( $current_site_type ) && ( $current_site_type == $site_type_id ) ) ? ' current' : ''; ?>">
									<a id="site-type-<?php echo $site_type_id ?>" href="#">
										<?php _ex( $site_type[ 'headline' ], 'website-types', 'uialfred-assistant' ); ?>
									</a>
								</li>
							<?php endforeach; ?>

						<?php endif; ?>
					</ul>
				</div>
			</div>
			<a href="#" class="diys-sidebar-menu-btn close">
				<?php esc_html_e( 'setup_assistant_design_menu_close', 'uialfred-assistant' ) ?>
			</a>
		</div>

		<div class="theme-selector">
			<?php if ( ! empty( $site_types ) ): ?>

				<?php foreach ( $site_types as $site_type_id => $site_type ): ?>
					<div id="themes-<?php echo $site_type_id ?>" class="theme-list">
						<div class="theme-list-inner">
							<div class="progress"><?php _e( 'Loading&#8230;' ); ?></div>
						</div>
					</div>
				<?php endforeach; ?>

			<?php endif; ?>
		</div>
	</div>
</div>

<?php
One_And_One_Assistant_View::load_template( 'card/footer', array(
	'card_actions' => array(
		'left'  => array(),
		'right' => array(
			'skip-design' => array(
				'label' => esc_html__( 'Close', 'uialfred-assistant' ),
				'class' => 'button',
				'href'  => esc_url( ! One_And_One_Assistant::is_url_query_fragment_in_url_string( wp_get_referer(), 'reauth' ) ? wp_get_referer() ?: admin_url() : admin_url( 'index.php?alfred-assistant-cancel=1' ) )
			)
		)
	)
) );
?>
