<?php
/**
 * About/Welcome page
 *
 * @package hoot
 * @subpackage framework
 * @since hoot 2.1.6
 */

/** Determine whether to load about subpage **/
if ( ! apply_filters( 'hoot_load_about_subpage', true ) )
	return;

/* Add the admin setup function to the 'admin_menu' hook. */
add_action( 'admin_menu', 'hoot_appearance_subpage' );

/**
 * Sets up the Appearance Subpage
 *
 * @since 4.1
 * @access public
 * @return void
 */
function hoot_appearance_subpage() {

	add_theme_page(
		__( 'Dispatch', 'dispatch' ), // Page Title
		__( 'About Theme Options', 'dispatch' ), // Menu Title
		'edit_theme_options', // capability
		'dispatch-welcome', // menu-slug
		'hoot_theme_appearance_subpage' // function name
		);

	add_action( 'admin_enqueue_scripts', 'hoot_admin_enqueue_upsell_styles' );

}

/**
 * Add a welcome notice if not already dismissed
 *
 * @since 4.7
 * @access public
 * @return void
 */
function hoot_theme_welcome_notice(){
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'dispatch-welcome' )
		return;
	if ( ! get_option( 'dispatch-dismiss-welcome' ) ) {
		add_action( 'admin_notices', 'hoot_theme_add_welcome_notice' );
	}
}
add_action( 'admin_head', 'hoot_theme_welcome_notice' );

/**
 * Display admin notice
 *
 * @since 4.7
 * @access public
 * @return void
 */
function hoot_theme_add_welcome_notice() {
	?>
	<div id="hoot-welcome-msg" class="notice notice-success is-dismissible">
		<p><?php
			/* Translators: 1 is the link start markup, 2 is link markup end */
			printf( esc_html__( 'Thank you for choosing Dispatch! To get started and fully take advantage of our theme, please make sure you visit the welcome page for the %1$sQuick Start Guide%2$s.', 'dispatch' ), '<a href="' . esc_url( admin_url( 'themes.php?page=dispatch-welcome&tab=qstart' ) ) . '">', '</a>' );
			?></p>
		<p><?php
			/* Translators: 1 is the link start markup, 2 is link markup end */
			printf( esc_html__( '%1$sGet started with Dispatch%2$s', 'dispatch' ), '<a class="button-secondary" href="' . esc_url( admin_url( 'themes.php?page=dispatch-welcome&tab=qstart' ) ) . '">', '</a>' );
			?></p>
	</div>
	<?php
}

/**
 * Ajax callback to set dismissable notice
 *
 * @since 4.7
 * @access public
 * @return void
 */
function hoot_theme_dismiss_welcome_notice() {
	check_ajax_referer( 'dismiss-hoottheme-welcome', 'nonce' );
	update_option( 'dispatch-dismiss-welcome', 1 );
	wp_die();
}
add_action( 'wp_ajax_hoot_theme_dismiss_welcome_notice', 'hoot_theme_dismiss_welcome_notice' );

/**
 * Enqueue CSS
 *
 * @since 4.1
 * @access public
 * @return void
 */
function hoot_admin_enqueue_upsell_styles( $hook ) {
	if ( $hook == 'appearance_page_dispatch-welcome' )
		wp_enqueue_style( 'hoot-admin-about', trailingslashit( HOOT_THEMEURI ) . 'admin/css/about.css', array(),  HOOT_VERSION );
	wp_enqueue_script( 'hoot-admin-about', trailingslashit( HOOT_THEMEURI ) . 'admin/js/about.js', array( 'jquery' ),  HOOT_VERSION, true );
	wp_localize_script( 'hoot-admin-about', 'hoot_dismissible_notice', array(
							'ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
							'ajax_action' => 'hoot_theme_dismiss_welcome_notice',
							'nonce' => wp_create_nonce( 'dismiss-hoottheme-welcome' ),
						) );
}

/**
 * Display the Appearance Subpage
 *
 * @since 4.1
 * @access public
 * @return void
 */
function hoot_theme_appearance_subpage() {
	$activetab = 'upsell';
	if ( !empty( $_GET['tab'] ) )
		$activetab = ( $_GET['tab'] == 'import' ) ? 'import' : ( ( $_GET['tab'] == 'qstart' ) ? 'qstart' : $activetab );
	?>
	<div class="wrap">

		<h1 class="hoot-about-title"><?php
			/* Translators: 1 is the theme name, 2 is the theme version */
			printf( esc_html__( 'About %1$s %2$s', 'dispatch' ), THEME_NAME, THEME_VERSION );
			?></h1>

		<div id="hoot-about-sub" class="hoot-about-sub">
			<div class="hoot-about-ss"><img src="<?php echo esc_url( trailingslashit( THEME_URI ) . 'screenshot.jpg' )  ?>"></div>
			<div class="hoot-about-text">
				<p class="hoot-about-intro"><?php esc_html_e( 'Dispatch is a strong bold theme with a modern design and lots of open space. Perfect for those who want to stand out and make an impression! Its SEO friendly framework is super fast. Supports popular plugins like WooCommerce, Contact Form 7, Mappress, Newsletter etc.', 'dispatch' ) ?></p>
				<p class="hoot-about-textlinks">
					<a class="button button-primary" href="https://wphoot.com/themes/dispatch/" target="_blank"><span class="dashicons dashicons-dashboard"></span> <?php esc_html_e( 'View Premium', 'dispatch' ) ?></a>
					<a class="button" href="https://demo.wphoot.com/dispatch/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span> <?php esc_html_e( 'View Demo', 'dispatch' ) ?></a>
					<a class="button" href="https://wphoot.com/support/dispatch/" target="_blank"><span class="dashicons dashicons-editor-aligncenter"></span> <?php esc_html_e( 'Documentation', 'dispatch' ) ?></a>
					<a class="button" href="https://wphoot.com/support/" target="_blank"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get Support', 'dispatch' ) ?></a>
					<a class="button" href="https://wordpress.org/support/theme/dispatch/reviews/?filter=5#new-post" target="_blank"><span class="dashicons dashicons-thumbs-up"></span> <?php esc_html_e( 'Rate Us', 'dispatch' ) ?></a>
				</p>
				<?php do_action( 'hoot_theme_after_about_textlinks', 'dispatch' ); ?>
				<?php /*
				<div class="hoot-about-notice2">
					<h3><?php esc_html_e( '1 Click Demo Installation', 'dispatch' ) ?></h3>
					<p><?php
						/* Translators: The %s are placeholders for HTML, so the order can't be changed. *//*
						printf( esc_html__( 'Use the OCDI plugin to install demo content with a single click to make your site look exactly like the %1$sDemo Site%2$s.%3$sNew users often find it easier to edit existing content rather than starting from scratch.', 'dispatch' ), '<a href="https://demo.wphoot.com/dispatch/" target="_blank">', '</a>', '<br />' );
					?></p>
					<p class="hoot-about-textlinks">
						<a class="button" href="https://wphoot.com/support/dispatch/#docs-section-demo-content-free" target="_blank"><span class="dashicons dashicons-art"></span> <?php esc_html_e( 'Install Demo Content', 'dispatch' ) ?></a>
					</p>
				</div>
				*/ ?>
			</div>
			<div class="clear"></div>
		</div><!-- .hoot-about-sub -->

		<div class="hoot-abouttabs">

			<h2 id="nav-tabs" class="nav-tab-wrapper">
				<span class="nav-tab nav-upsell <?php if ( $activetab == 'upsell' ) echo 'nav-tab-active'; ?>" data-tabid="upsell"><?php esc_html_e( 'Premium Options', 'dispatch' ) ?></span>
				<?php do_action( 'hoot_theme_after_nav_tab_upsell', 'dispatch', $activetab ); ?>
				<span class="nav-tab nav-qstart <?php if ( $activetab == 'qstart' ) echo 'nav-tab-active'; ?>" data-tabid="qstart"><?php esc_html_e( 'Quick Start Guide', 'dispatch' ) ?></span>
			</h2>

			<div id="hoot-upsell" class="hoot-upsell hoot-tab <?php if ( $activetab == 'upsell' ) echo 'hoot-tab-active'; ?>">
				<h2 class="centered allcaps"><?php
					/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
					printf( esc_html__( 'Upgrade to %1$sDispatch %2$sPremium%3$s%4$s', 'dispatch' ), '<span>', '<strong>', '</strong>', '</span>' );
					?></h2>
				<p class="hoot-tab-intro centered"><?php
					/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
					printf( esc_html__( 'If you have enjoyed using Dispatch, you are going to love %1$sDispatch Premium%2$s.%3$sIt is a robust upgrade to Dispatch that gives you many useful features.', 'dispatch' ), '<strong>', '</strong>', '<br />' );
					?></p>
				<p class="hoot-tab-cta centered">
					<a class="button button-secondary secondary-cta" href="https://demo.wphoot.com/dispatch/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span> <?php esc_html_e( 'View Demo Site', 'dispatch' ) ?></a>
					<a class="button button-primary primary-cta" href="https://wphoot.com/themes/dispatch/" target="_blank"><span class="dashicons dashicons-dashboard"></span> <?php esc_html_e( 'Buy Dispatch Premium', 'dispatch' ) ?></a>
				</p>
				<div class="hoot-tab-sub"><div class="hoot-tab-subinner">
					<?php hoot_theme_tabsections( 'features' ); ?>
					<div class="tabsection hoot-tab-cta centered">
						<a class="button button-secondary secondary-cta" href="https://demo.wphoot.com/dispatch/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span> <?php esc_html_e( 'View Demo Site', 'dispatch' ) ?></a>
						<a class="button button-primary primary-cta" href="https://wphoot.com/themes/dispatch/" target="_blank"><span class="dashicons dashicons-dashboard"></span> <?php esc_html_e( 'Buy Dispatch Premium', 'dispatch' ) ?></a>
					</div>
				</div></div><!-- .hoot-tab-sub -->
			</div><!-- #hoot-upsell -->

			<?php do_action( 'hoot_theme_after_hoot_upsell', 'dispatch', $activetab ); ?>

			<div id="hoot-qstart" class="hoot-qstart hoot-tab <?php if ( $activetab == 'qstart' ) echo 'hoot-tab-active'; ?>">
				<h2 class="centered allcaps"><span class="dashicons dashicons-clock"></span> <?php esc_html_e( 'Quick Start Guide', 'dispatch' ); ?></h2>
				<p class="hoot-tab-intro centered"><?php
					/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
					printf( esc_html__( 'Follow these steps to quickly start developing your site.%1$sTo read the full documentation, or to get support from one of our support ninjas, click the buttons below.', 'dispatch' ), '<br />' );
					?></p>
				<p class="hoot-tab-cta centered">
					<a class="button button-primary primary-cta" href="https://wphoot.com/support/dispatch/" target="_blank"><span class="dashicons dashicons-editor-aligncenter"></span> <?php esc_html_e( 'View Full Documentation', 'dispatch' ) ?></a>
					<a class="button button-secondary secondary-cta" href="https://wphoot.com/support/" target="_blank"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get Support', 'dispatch' ) ?></a>
				</p>
				<div class="hoot-tab-sub hoot-qstart-sub"><div class="hoot-tab-subinner">
					<?php hoot_theme_tabsections( 'quickstart' ); ?>
					<div class="tabsection hoot-tab-cta centered">
						<a class="button button-primary primary-cta" href="https://wphoot.com/support/dispatch/" target="_blank"><span class="dashicons dashicons-editor-aligncenter"></span> <?php esc_html_e( 'View Full Documentation', 'dispatch' ) ?></a>
						<a class="button button-secondary secondary-cta" href="https://wphoot.com/support/" target="_blank"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get Support', 'dispatch' ) ?></a>
					</div>
				</div></div><!-- .hoot-tab-sub -->
			</div><!-- #hoot-qstart -->


		</div><!-- .hoot-abouttabs -->
		<a class="hoot-abouttheme-top" href="#hoot-about-sub"><span class="dashicons dashicons-arrow-up-alt"></span></a>
	</div><!-- .wrap -->
	<?php
}

/**
 * About Page displat Tab's content sections
 *
 * @since 4.7
 * @access public
 * @return mixed
 */
function hoot_theme_tabsections( $string ) {
	if ( in_array( $string, array( 'features', 'importsteps', 'quickstart' ) ) ) :
		$features = hoot_theme_upstrings( $string );
		if ( !empty( $features ) && is_array( $features ) ) :
			foreach ( $features as $key => $feature ) :
				$style = empty( $feature['style'] ) ? 'std' : $feature['style'];
				?>
				<div class="tabsection <?php
					if ( $style == 'hero-top' || $style == 'hero-bottom' ) echo "tabsection-hero tabsection-{$style}";
					elseif ( $style == 'side' ) echo 'tabsection-sideinfo';
					elseif ( $style == 'aside' ) echo 'tabsection-asideinfo';
					else echo "tabsection-std";
					?>">

					<?php if ( $style == 'hero-top' || $style == 'hero-bottom' ) :
						if ( $style == 'hero-top' ) : ?>
							<h4 class="heading"><?php echo $feature['name']; ?></h4>
							<?php if ( !empty( $feature['desc'] ) ) echo '<div class="tabsection-hero-text">' . $feature['desc'] . '</div>'; ?>
						<?php endif; ?>
						<?php if ( !empty( $feature['img'] ) ) : ?>
							<div class="tabsection-hero-img">
								<img src="<?php echo esc_url( $feature['img'] ); ?>" />
							</div>
						<?php endif; ?>
						<?php if ( $style == 'hero-bottom' ) : ?>
							<h4 class="heading"><?php echo $feature['name']; ?></h4>
							<?php if ( !empty( $feature['desc'] ) ) echo '<div class="tabsection-hero-text">' . $feature['desc'] . '</div>'; ?>
						<?php endif; ?>

					<?php elseif ( $style == 'side' ) : ?>
						<div class="tabsection-side-wrap">
							<div class="tabsection-side-img">
								<img src="<?php echo esc_url( $feature['img'] ); ?>" />
							</div>
							<div class="tabsection-side-textblock">
								<?php if ( !empty( $feature['name'] ) ) : ?>
									<h4 class="heading"><?php echo $feature['name']; ?></h4>
								<?php endif; ?>
								<?php if ( !empty( $feature['desc'] ) ) echo '<div class="tabsection-side-text">' . $feature['desc'] . '</div>'; ?>
							</div>
							<div class="clear"></div>
						</div>

					<?php elseif ( $style == 'aside' ) : ?>
						<?php if ( !empty( $feature['blocks'] ) ) : ?>
							<div class="tabsection-aside-wrap">
							<?php foreach ( $feature['blocks'] as $key => $block ) {
								echo '<div class="tabsection-aside-block tabsection-aside-'.($key+1).'">';
									if ( !empty( $block['img'] ) ) : ?>
										<div class="tabsection-aside-img">
											<img src="<?php echo esc_url( $block['img'] ); ?>" />
										</div>
									<?php endif;
									if ( !empty( $block['name'] ) ) : ?>
										<h4 class="heading"><?php echo $block['name']; ?></h4>
									<?php endif;
									if ( !empty( $block['desc'] ) ) echo '<div class="tabsection-aside-text">' . $block['desc'] . '</div>';
								echo '</div>';
							} ?>
							<div class="clear"></div>
							</div>
						<?php endif; ?>

					<?php else : ?>
						<?php if ( $style != 'img-bottom' && !empty( $feature['img'] ) ) : ?>
							<div class="tabsection-std-img attop">
								<img src="<?php echo esc_url( $feature['img'] ); ?>" />
							</div>
						<?php endif; ?>
						<div class="tabsection-std-textblock <?php if ( $style == 'img-bottom' ) echo 'attop'; else echo 'atbottom'; ?>">
							<?php if ( !empty( $feature['name'] ) ) : ?>
								<div class="tabsection-std-heading"><h4 class="heading"><?php echo $feature['name']; ?></h4></div>
							<?php endif; ?>
							<?php if ( !empty( $feature['desc'] ) ) echo '<div class="tabsection-std-text">' . $feature['desc'] . '</div>'; ?>
							<div class="clear"></div>
						</div>
						<?php if ( $style == 'img-bottom' && !empty( $feature['img'] ) ) : ?>
							<div class="tabsection-std-img atbottom">
								<img src="<?php echo esc_url( $feature['img'] ); ?>" />
							</div>
						<?php endif; ?>
					<?php endif; ?>

				</div><!-- .tabsection -->
				<?php
			endforeach;
		endif;
	endif;
}

/**
 * About Page Strings
 *
 * @since 4.7
 * @access public
 * @return mixed
 */
function hoot_theme_upstrings( $string ) {

	$features = $importsteps = $quickstart = array();
	$imagepath =  esc_url( trailingslashit( HOOT_THEMEURI ) . 'admin/images/' );
	$ocdilink = ( class_exists( 'HootKit' ) ) ? admin_url( 'themes.php?page=hootkit-content-install' ) : '';
	$tgmplink = ( class_exists( 'HootKit' ) ) ? '' : admin_url( 'themes.php?page=tgmpa-install-plugins' );

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Complete %1$sStyle %2$sCustomization%3$s', 'dispatch' ), '<br />', '<strong>', '</strong>' ),
		'desc' => esc_html__( 'Different looks and styles. Choose from an extensive range of customization features in Dispatch Premium to setup your own unique front page. Give youe site the personality it deserves.', 'dispatch' ),
		// 'img' => $imagepath . 'premium-style.jpg',
		// 'style' => 'hero-bottom',
		'style' => 'hero-top',
		);

	$features[] = array(
		'name' => esc_html__( 'Custom Colors &amp; Backgrounds for Sections', 'dispatch' ),
		'desc' => esc_html__( 'Dispatch Premium lets you select custom colors and backgrounds for different sections of your site like header, footer, logo background, menu dropdown, content area, page title area etc.', 'dispatch' ),
		'img' => $imagepath . 'premium-colors.jpg',
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Fonts and %1$sTypography Control%2$s', 'dispatch' ), '<span>', '</span>' ),
		'desc' => esc_html__( 'Assign different typography (fonts, text size, font color) to menu, topbar, logo, content headings, sidebar, footer etc.', 'dispatch' ),
		'img' => $imagepath . 'premium-typography.jpg',
		);

	$features[] = array(
		'name' => esc_html__( '600+ Google Fonts', 'dispatch' ),
		'desc' => esc_html__( "With the integrated Google Fonts library, you can find the fonts that match your site's personality, and there's over 600 options to choose from.", 'dispatch' ),
		'img' => $imagepath . 'premium-googlefonts.jpg',
		);

	$features[] = array(
		'name' => esc_html__( 'Unlimites Sliders, Unlimites Slides', 'dispatch' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'Dispatch Premium allows you to create unlimited sliders with as many slides as you need.%1$s%2$sAdd as Shortcodes%3$sYou can use these sliders on your Homepage widgetized template, or add them anywhere using shortcodes - like in your Posts, Sidebars or Footer.', 'dispatch' ), '<hr>', '<h4>', '</h4>' ),
		'img' => $imagepath . 'premium-sliders.jpg',
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Shortcodes with %1$sEasy Generator%2$s', 'dispatch' ), '<span>', '</span>' ),
		/* Translators: The %s is placeholders for line break divider. */
		'desc' => sprintf( esc_html__( 'Enjoy the flexibility of using shortcodes throughout your site with Dispatch premium. These shortcodes were specially designed for this theme and are very well integrated into the code to reduce loading times, thereby maximizing performance!%1$sUse shortcodes to insert buttons, sliders, tabs, toggles, columns, breaks, icons, lists, and a lot more design and layout modules.%1$sThe intuitive Shortcode Generator has been built right into the Edit screen, so you dont have to hunt for shortcode syntax.', 'dispatch' ), '<hr>' ),
		'img' => $imagepath . 'premium-shortcodes.jpg',
		);

	$features[] = array(
		'name' => esc_html__( 'Image Carousels', 'dispatch' ),
		'desc' => esc_html__( 'Add carousel widgets to your post, in your sidebar, on your frontpage or in your footer. A simple drag and drop interface allows you to easily create and manage carousels.', 'dispatch' ),
		'img' => $imagepath . 'premium-carousels.jpg',
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Floating %1$s%2$s\'Sticky\' Header%3$s &amp; %2$s\'Goto Top\'%3$s button (optional)', 'dispatch' ), '<br>', '<span>', '</span>' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'The floating header follows the user down your page as they scroll, which means they never have to scroll back up to access your navigation menu, improving user experience.%1$sOr, use the \'Goto Top\' button appears on the screen when users scroll down your page, giving them a quick way to go back to the top of the page.', 'dispatch' ), '<hr>' ),
		'img' => $imagepath . 'premium-header-top.jpg',
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Additional Blog Layouts (including pinterest %1$stype mosaic)%2$s', 'dispatch' ), '<span>', '</span>' ),
		'desc' => esc_html__( 'Dispatch Premium gives you the option to display your post archives in different layouts including a mosaic type layout similar to pinterest.', 'dispatch' ),
		'img' => $imagepath . 'premium-blogstyles.jpg',
		);

	$features[] = array(
		'name' => esc_html__( 'Custom Widgets', 'dispatch' ),
		'desc' => esc_html__( 'Custom widgets crafted and designed specifically for Dispatch Premium Theme to give you the flexibility of adding stylized content.', 'dispatch' ),
		'img' => $imagepath . 'premium-widgets.jpg',
		);

	$features[] = array(
		'name' => esc_html__( 'Menu Icons', 'dispatch' ),
		'desc' => esc_html__( 'Select from over 900 icons for your main navigation menu links.', 'dispatch' ),
		'img' => $imagepath . 'premium-menuicons.jpg',
		);

	$features[] = array(
		'name' => esc_html__( 'Premium Background Patterns (CC0)', 'dispatch' ),
		'desc' => esc_html__( 'Dispatch Premium comes with many additional premium background patterns. You can always upload your own background image/pattern to match your site design.', 'dispatch' ),
		// 'img' => $imagepath . 'premium-backgrounds.jpg',
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Automatic Image Lightbox and %1$sWordPress Gallery%2$s', 'dispatch' ), '<span>', '</span>' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'Automatically open image links on your site with the integrates lightbox in Dispatch Premium.%1$sAutomatically convert standard WordPress galleries to beautiful lightbox gallery slider.', 'dispatch' ), '<hr>' ),
		'img' => $imagepath . 'premium-lightbox.jpg',
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Developers %1$slove {LESS}', 'dispatch' ), '<br />' ),
		'desc' => esc_html__( 'CSS is passe! Developers love the modularity and ease of using LESS, which is why Dispatch Premium comes with properly organized LESS files for the main stylesheet.', 'dispatch' ),
		'img' => $imagepath . 'premium-lesscss.jpg',
		);

	$features[] = array(
		'name' => esc_html__( 'Easy Import/Export', 'dispatch' ),
		'desc' => esc_html__( 'Moving to a new host? Or applying a new child theme? Easily import/export your customizer settings with just a few clicks - right from the backend.', 'dispatch' ),
		// 'img' => $imagepath . 'premium-import-export.jpg',
		);

	$features[] = array(
		'style' => 'aside',
		'blocks' => array(
			array(
				/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
				'name' => sprintf( esc_html__( 'Custom Javascript &amp; %1$sGoogle Analytics%2$s', 'dispatch' ), '<span>', '</span>' ),
				'desc' => esc_html__( 'Easily insert any javascript snippet to your header without modifying the code files. This helps in adding scripts for Google Analytics, Adsense or any other custom code.', 'dispatch' ),
				// 'img' => $imagepath . 'premium-customjs.jpg',
				),
			array(
				/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
				'name' => sprintf( esc_html__( 'Continued %1$sLifetime Updates', 'dispatch' ), '<br />' ),
				'desc' => esc_html__( 'You will help support the continued development of Dispatch - ensuring it works with future versions of WordPress for years to come.', 'dispatch' ),
				// 'img' => $imagepath . 'premium-updates.jpg',
				),
			),
		);

	$features[] = array(
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'name' => sprintf( esc_html__( 'Premium %1$sPriority Support', 'dispatch' ), '<br />' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'Need help setting up Dispatch? Upgrading to Dispatch Premium gives you prioritized support. We have a growing support team ready to help you with your questions.%1$sNeed small modifications? If you are not a developer yourself, you can count on our support staff to help you with CSS snippets to get the look you are after. Best of all, your changes will persist across updates.', 'dispatch' ), '<hr>' ),
		'img' => $imagepath . 'premium-support.jpg',
		// 'style' => 'side',
		);

	if ( class_exists( 'HootKit' ) ) {
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		$idesc = sprintf( esc_html__( '%1$sInstall the HootKit plugin to activate the One Click Demo Install.%2$s%3$sInstalled%4$s', 'dispatch' ), '<span class="strikeout">', '</span>', '<hr><h4 class="okgreen"><span class="dashicons dashicons-yes"></span>', '</h4>' );
	} else {
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		$idesc = sprintf( esc_html__( 'Install the HootKit plugin to activate the One Click Demo Install.%1$sInstall HootKit plugin%2$s', 'dispatch' ), '<hr><a class="button button-primary" href="' . esc_url( $tgmplink ) . '">', '</a>' );
	}
	$importsteps[] = array(
		'name' => esc_html__( 'Step 1', 'dispatch' ),
		'desc' => $idesc,
		'style' => 'hero-top',
		);

	$ilink = ( $ocdilink ) ? '<a href="' . esc_url( $ocdilink ) . '">' : '<strong>';
	$ilinkend = ( $ocdilink ) ? '</a>' : '</strong>';
	$importsteps[] = array(
		'name' => esc_html__( 'Step 2', 'dispatch' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'Go to the %1$sInstall Theme Content%2$s page under the %3$sAppearance Menu%4$s', 'dispatch' ), $ilink, $ilinkend, '<strong>', '</strong>' ),
		'style' => 'hero-top',
		);

	$importsteps[] = array(
		'name' => esc_html__( 'Step 3', 'dispatch' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'Click the %1$sInstall Demo Content%2$s button and wait for the installation process to finish', 'dispatch' ), '<strong>', '</strong>' ),
		'img' => $imagepath . 'import-clickbutton.png',
		'style' => 'hero-top',
		);

	$settinglink = admin_url( 'options-reading.php' );
	$addpagelink = admin_url( 'post-new.php?post_type=page' );
	$quickstart[] = array(
		'name' => esc_html__( 'Setup Frontpage and Blog Page', 'dispatch' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( 'Users often want to create a landing Homepage/Frontpage to welcome their visitors, while a separate \'Blog\' page to list all their blog posts. To do this, follow these steps:%9$s%1$s
			%3$sIn your wp-admin area, click %11$sPages > Add New%12$s%4$s
			%3$sGive page a Title %7$s(lets call it "My Home Page")%8$s%4$s
			%3$sIn the %5$sPage Attributes%6$s option box, click the %5$sTemplate%6$s dropdown option and select %5$sWidgetized Template%6$s%4$s
			%3$sClick on %5$sPublish%6$s for this page.%4$s
			%3$sIn your wp-admin area, click %11$sPages > Add New%12$s%4$s
			%3$sGive page a Title %7$s(lets call it "My Blog")%8$s and %5$sPublish%6$s%4$s
			%3$sIn your wp-admin area, go to %10$sSettings > Reading%12$s%4$s
			%3$sSelect the %5$sStatic Page%6$s option.%4$s
			%3$sSelect the pages you created in Step 2 and 6 above.%4$s
			%3$s%5$sSave%6$s the Changes.%4$s
			%2$s', 'dispatch' ), '<ol>', '</ol>', '<li>', '</li>', '<strong>', '</strong>', '<em>', '</em>', '<br />',
										'<a href="' . esc_url( $settinglink ) . '">',
										'<a href="' . esc_url( $addpagelink ) . '">',
										'</a>'
				),
		'img' => $imagepath . 'qstart-staticpage.png',
		'style' => 'img-bottom',
		);

	$menulink = admin_url( 'nav-menus.php' );
	$quickstart[] = array(
		'name' => esc_html__( 'Setup Main Navigation Menu', 'dispatch' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( '%1$s
			%3$sIn your wp-admin, go to %10$sAppearance > Menus%12$s%4$s
			%3$sClick on %5$screate a new menu%6$s link. %9$s%7$s(If you already have an existing menu, jump to Step 6)%8$s%4$s
			%3$sGive your menu a name and click %5$sCreate Menu%6$s%4$s
			%3$sNow add pages, categories, custom links etc to this menu.%4$s
			%3$sClick %5$sSave Menu%6$s%4$s
			%3$sClick %11$sManage Locations%12$s tab at the top%4$s
			%3$sSelect the menu you just created in the dropdown options.%4$s
			%3$sClick %5$sSave Changes%6$s%4$s
			%2$s%7$sTip: You can add "My Home Page" and "My Blog" pages created in above section to your menu.%8$s
			', 'dispatch' ), '<ol>', '</ol>', '<li>', '</li>', '<strong>', '</strong>', '<em>', '</em>', '<br />',
										'<a href="' . esc_url( $menulink ) . '">',
										'<a href="' . esc_url( $menulink ) . '?action=locations">',
										'</a>'
				),
		);

	$widgetslink = admin_url( 'widgets.php' );
	$customizelink = admin_url( 'customize.php' );
	$quickstart[] = array(
		'name' => esc_html__( 'Add Content to Frontpage', 'dispatch' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( '%1$s
			%3$sFollow the steps above to first create a %5$sHome Page%6$s using the %5$sWidgetized Template%6$s%4$s
			%3$sIn your wp-admin, go to %10$sAppearance > Widgets%12$s%4$s
			%3$sAdd Widgets to the %5$sWidgetized Template Areas%6$s%4$s
			%3$sYou can further manage Widgetized Template modules in your wp-admin by going to %11$sAppearance > Customizer%12$s and click %5$sWidgetized Template Modules%6$s section.%4$s
			%2$s
			%9$s%9$s
			%13$sAdd a full width slider%14$s
			You can display a full width slider on your frontpage by going to %11$sAppearance > Customizer > Widgetized Template Slider%12$s section and selecting the %5$sfull width%6$s option.
			', 'dispatch' ), '<ol>', '</ol>', '<li>', '</li>', '<strong>', '</strong>', '<em>', '</em>', '<hr>',
										'<a href="' . esc_url( $widgetslink ) . '">',
										'<a href="' . esc_url( $customizelink ) . '">',
										'</a>', '<h4>', '</h4>'
				),
		'img' => $imagepath . 'qstart-fpmodule.png',
		'style' => 'img-bottom',
		);

	$quickstart[] = array(
		/* Translators: 1 is a line break */
		'name' => sprintf( esc_html__( '[Optional]%1$sInstall Demo Content', 'dispatch' ), '<br />' ),
		/* Translators: The %s are placeholders for HTML, so the order can't be changed. */
		'desc' => sprintf( esc_html__( '%14$sIt is recommended to install demo content only on a fresh new site%15$s
			Installing demo content is the easiest way to setup your theme and make it look like the %10$sDemo Site%13$s.%9$s
			%7$sYour existing content (posts, pages, categories, images etc) will NOT be deleted or modified. However new content (posts, images, menus etc.) will be imported and added to your site.%8$s
			%1$s
			%3$sDownload the Demo files from the %11$sSupport Documentation%13$s%4$s
			%3$sInstall the %11$sOne Click Demo Import%13$s plugin.%4$s
			%3$sIn your wp-admin, go to %5$sAppearance &gt; Import Demo Data%6$s%4$s
			%3$sUpload the files from Step 1 and click the %5$sImport%6$s button.%4$s
			%2$s', 'dispatch' ), '<ol>', '</ol>', '<li>', '</li>', '<strong>', '</strong>', '<em>', '</em>', '<hr>',
										'<a href="https://demo.wphoot.com/dispatch/" target="_blank">',
										'<a href="https://wphoot.com/support/dispatch/#docs-section-demo-content-free" target="_blank">',
										'<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">',
										'</a>', '<h4>', '</h4>'
				),
		);


	return ( !empty( $$string ) ) ? $$string : '';


}