<?php
/*
Template Name: Widgetized Template
*/

// Loads the header.php template.
get_header();

// Template structure
$wt_sidebar = apply_filters( 'widgetized_template_sidebar', 'none' );
$wt_content_context = ( $wt_sidebar == 'none' ) ? 'none' : '';
$wt_content_grid = ( $wt_sidebar == 'none' ) ? 'hgrid-stretch' : 'hgrid';

// Template modification Hook
do_action( 'hoot_template_before_content_grid', 'template-widgetized.php' );
?>

<div id="widgetized-template-wrap" class="<?php echo $wt_content_grid; ?> main-content-grid">

	<?php
	// Template modification Hook
	do_action( 'hoot_template_before_main', 'template-widgetized.php' );
	?>

	<main <?php hoot_attr( 'page-template-content', $wt_content_context ); ?>>

		<?php
		// Template modification Hook
		do_action( 'hoot_template_main_start', 'template-widgetized.php' );

		// Get Sections List
		$sections = hoot_sortlist( hoot_get_mod( 'widgetized_template_sections' ) );

		// Display Each Section according to ther sort order.
		if ( is_array( $sections ) && !empty( $sections ) ) :
			foreach ( $sections as $key => $section ) :
				if ( empty( $section[ 'sortitem_hide' ] ) ):

					$key = apply_filters( 'widgetized_template_sections_switch', $key );
					$highlight_class = ( !empty( $section[ 'highlight' ] ) ) ? 'area-highlight' : '';
					$section['columns'] = isset( $section['columns'] ) ? $section['columns'] : '100';
					$context = ( strpos( $key, 'area_' ) === 0 ) ? str_replace( 'area_', '', $key ) : '';
					$key = ( empty( $context ) ) ? $key : 'widgetarea';

					switch( $key ):

						// Display Widget Areas
						case 'widgetarea':
							$areakey = 'area_' . $context;
							$structure = hoot_col_width_to_span( $section['columns'] );
							$count = count( $structure );
							$displayarea = false;
							for ( $c = 1; $c <= $count ; $c++ ) {
								if ( is_active_sidebar( "widgetized-template-{$areakey}_{$c}" ) ) {
									$displayarea = true;
									break;
								}
							}
							if ( $displayarea ) : ?>
								<div id="widgetized-template-<?php echo sanitize_html_class( $areakey ); ?>" <?php hoot_attr( 'widgetized-template-area', $areakey, 'widgetized-template-widgetarea ' . $highlight_class ) ?>>
									<div class="hgrid">
										<?php
										for ( $c = 1; $c <= $count ; $c++ ) {
											$area_id = "widgetized-template-{$areakey}_{$c}";
											$structurekey = $c - 1;
											?>
											<div id="<?php echo sanitize_html_class( $area_id ); ?>" class="<?php echo $structure[$structurekey]; ?>">
												<?php
												if ( is_active_sidebar( $area_id ) )
													dynamic_sidebar( $area_id );
												?>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							<?php endif;
							break;

						// Display Page Content
						case 'content':
							wp_reset_query(); ?>

							<div id="widgetized-template-page-content" class="widgetized-template-area <?php echo $highlight_class; ?>">
								<div class="hgrid">
									<div class="entry-content hgrid-span-12">
										<?php the_content(); ?>
									</div>
								</div>
							</div>

							<?php break;

						// Display Blog Posts
						case 'blog':
							?>

							<div id="widgetized-template-blog" class="widgetized-template-area <?php echo $highlight_class; ?>">
								<div class="hgrid">
									<?php
									global $hoot_theme;
									/* Reset any previous custom-blogposts */
									$hoot_theme->blogposts = array();
									/* Set Values */
									$hoot_theme->blogposts['title'] = isset( $section['title'] ) ? $section['title'] : '';
									$hoot_theme->blogposts['pagination'] = true;
									/* Display Custom Posts Template */
									get_template_part( 'template-parts/custom-blogposts' );
									?>
								</div>
							</div>

							<?php break;

						// Display HTML Slider
						case 'slider_html': 
							$slider_width = hoot_get_mod( 'wt_html_slider_width' );
							$slider_grid = ( 'stretch' == $slider_width ) ? 'hgrid-stretch' : 'hgrid';

							ob_start();
							$widgetized_template_slider = apply_filters( 'widgetized_template_slider' , '', 'wt_cpt_slider_a' );

							if ( !empty( $widgetized_template_slider ) ) {
								echo $widgetized_template_slider;
							} else {
								global $hoot_theme;
								$slides = hoot_get_lite_slider( 'html' );

								if ( is_array( $slides ) && !empty( $slides ) ):

									/* Reset any previous slider */
									$hoot_theme->slider = array();
									$hoot_theme->sliderSettings = array( 'class' => 'wt-slider' );

									/* Create slider object */
									foreach ( $slides as $slide ) {
										if ( !empty( $slide['image'] ) || !empty( $slide['content'] ) || !empty( $slide['url'] ) ) {
											$hoot_theme->slider[] = $slide;
										}
									}

									/* Display Slider Template */
									get_template_part( 'template-parts/slider-html' );

								endif;
							}

							$slider_html = ob_get_clean();
							if ( !empty( $slider_html ) ) : ?>
							<div id="widgetized-template-html-slider" class="widgetized-template-area <?php echo $highlight_class; ?>">
								<div class="widgetized-template-slider <?php echo $slider_grid; ?>">
									<div class="hgrid-span-12"><?php echo $slider_html; ?></div>
								</div>
							</div>
							<?php
							endif;

							break;

						// Display Image Slider
						case 'slider_img': 
							$slider_width = hoot_get_mod( 'wt_img_slider_width' );
							$slider_grid = ( 'stretch' == $slider_width ) ? 'hgrid-stretch' : 'hgrid';

							ob_start();
							$widgetized_template_slider = apply_filters( 'widgetized_template_slider' , '', 'wt_cpt_slider_b' );

							if ( !empty( $widgetized_template_slider ) ) {
								echo $widgetized_template_slider;
							} else {
								global $hoot_theme;
								$slides = hoot_get_lite_slider( 'image' );

								if ( is_array( $slides ) && !empty( $slides ) ):

									/* Reset any previous slider */
									$hoot_theme->slider = array();
									$hoot_theme->sliderSettings = array( 'class' => 'wt-slider' );

									/* Create slider object */
									foreach ( $slides as $slide ) {
										if ( !empty( $slide['image'] ) ) {
											$hoot_theme->slider[] = $slide;
										}
									}

									/* Display Slider Template */
									get_template_part( 'template-parts/slider-image' );

								endif;
							}

							$slider_img = ob_get_clean();
							if ( !empty( $slider_img ) ) : ?>
								<div id="widgetized-template-img-slider" class="widgetized-template-area <?php echo $highlight_class; ?>">
									<div class="widgetized-template-slider <?php echo $slider_grid; ?>">
										<div class="hgrid-span-12"><?php echo $slider_img; ?></div>
									</div>
								</div>
							<?php
							endif;

							break;

						default:
							// Allow mods to display content
							do_action( 'widgetized_template_sections', $key, $sections, $highlight_class, $context );

					endswitch;

				endif;
			endforeach;
		endif;

		// Template modification Hook
		do_action( 'hoot_template_main_end', 'template-widgetized.php' );
		?>

	</main><!-- #content -->

	<?php
	// Template modification Hook
	do_action( 'hoot_template_after_main', 'template-widgetized.php' );
	?>

	<?php
	if ( $wt_sidebar !== 'none' ) {
		hoot_get_sidebar(); // Loads the sidebar.php template.
	}
	?>

</div><!-- .hgrid -->

<?php get_footer(); // Loads the footer.php template. ?>