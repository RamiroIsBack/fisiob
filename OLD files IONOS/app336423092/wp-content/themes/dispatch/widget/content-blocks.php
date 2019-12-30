<?php
// Return if no boxes to show
if ( empty( $boxes ) || !is_array( $boxes ) )
	return;

// Get border classes
$top_class = hoot_widget_border_class( $border, 0, 'topborder-');
$bottom_class = hoot_widget_border_class( $border, 1, 'bottomborder-');

// Get custom style attribute
$mt = ( !isset( $customcss['mt'] ) ) ? '' : $customcss['mt'];
$mb = ( !isset( $customcss['mb'] ) ) ? '' : $customcss['mb'];
$custommargin = hoot_widget_margin_style( $mt, $mb );

// Get total columns and set column counter
$columns = ( intval( $columns ) >= 1 && intval( $columns ) <= 5 ) ? intval( $columns ) : 3;
$column = $counter = 1;

// Set clearfix to avoid error if there are no boxes
$clearfix = 1;

// Get an array of page ids for custom WP Query
$page_ids = array();
foreach ( $boxes as $key => $box ) {
	$box['page'] = ( isset( $box['page'] ) ) ? intval( $box['page'] ) : '';
	if ( !empty( $box['page'] ) )
		$page_ids[] = $box['page'];
}
if ( empty( $page_ids ) )
	return; // If $page_ids is empty, custom query below will return all posts

// Style-3 exceptions: doesnt work great with icons of 'None' style, or with images. So revert to Style-2 for this scenario.
if ( $style == 'style3' && ( $image || $icon_style == 'none' ) ) $style = 'style2';

// Create a custom WP Query
$query_args = array( 'post_type' => 'page', 'post__in' => $page_ids, 'posts_per_page' => -1, 'orderby' => 'post__in' );
$query_args = apply_filters( 'hoot_content_blocks_query', $query_args, $instance, $before_title, $title, $after_title );
$content_blocks_query = new WP_Query( $query_args );

// Temporarily remove read more links from excerpts
hoot_remove_readmore_link();
$excerptlength = intval( $excerptlength );

// Template modification Hook
do_action( 'hoot_content_blocks_wrap', 'pages', $content_blocks_query, $page_ids );
?>

<div class="content-blocks-widget-wrap content-blocks-pages <?php echo sanitize_html_class( $top_class ); ?>">
	<div class="content-blocks-widget-box <?php echo sanitize_html_class( $bottom_class ); ?>">
		<div class="content-blocks-widget <?php echo sanitize_html_class( 'content-blocks-widget-' . $style ); ?>" <?php echo $custommargin; ?>>

			<?php
			/* Display Title */
			if ( $title )
				echo wp_kses_post( apply_filters( 'hoot_widget_title', $before_title . $title . $after_title, 'content-blocks', $title, $before_title, $after_title ) );

			// Template modification Hook
			do_action( 'hoot_content_blocks_start', 'pages', $content_blocks_query, $page_ids );
			?>

			<div class="flush-columns">
				<?php
				foreach ( $boxes as $key => $box ) :
					if ( !empty( $box['page'] ) ) :

						global $post;
						$has_image = $has_icon = false;
						$altPage = ( function_exists('pll_get_post') ) ? pll_get_post($box['page']) : $box['page'];
						$box['excerpt'] = ( empty( $box['excerpt'] ) ) ? 'content' :
										  ( ( $box['excerpt'] === 1 ) ? 'excerpt' : $box['excerpt'] ); // Backward Compatible

						foreach( $content_blocks_query->posts as $post ) :
							if ( $box['page'] == $post->ID || $altPage == $post->ID ) :

								setup_postdata( $post );
								if ( $image && has_post_thumbnail() )
									$has_image = true;
								if ( !$image && !empty( $box['icon'] ) )
									$has_icon = true;

								if ( $excerpt === 'excerpt' && empty( $box['url'] ) ) {
									$linktag = '<a href="' . esc_url( get_permalink() ) . '" ' . hoot_get_attr( 'content-block-link', 'permalink' ) . '>';
									$linktagend = '</a>';
								} elseif ( !empty( $box['url'] ) ) {
									$linktag = '<a href="' . esc_url( $box['url'] ) . ' " ' . hoot_get_attr( 'content-block-link', 'custom' ) . '>';
									$linktagend = '</a>';
								} else {
									$linktag = $linktagend = '';
								}

								// Start Block Display
								if ( $column == 1 ) echo '<div class="content-block-row">';
								?>

								<div class="content-block-column <?php echo "hcolumn-1-{$columns} content-block-{$counter}"; $counter++; ?> <?php echo sanitize_html_class( 'content-block-' . $style ); ?>">
									<?php $block_class = ( !$has_image && !$has_icon ) ? 'no-highlight' : ( ( $style == 'style2' ) ? 'contrast-typo' : '' ); ?>
									<div class="content-block <?php echo $block_class; ?>">

										<?php
										if ( $has_image ) : ?>
											<div class="content-block-visual content-block-image">
												<?php
												echo $linktag;
													if ( $style == 'style4' ) {
														switch ( $columns ) {
															case 1: $image_col_width = 2; break;
															case 2: $image_col_width = 4; break;
															default: $image_col_width = 5;
														}
													} else {
														$image_col_width = $columns;
													}
													$img_size = apply_filters( 'hoot_content_block_img', 'column-1-' . $image_col_width, $columns, $style );
													hoot_post_thumbnail( 'content-block-img', $img_size );
												echo $linktagend;
												?>
											</div><?php

										elseif ( $has_icon ):
											$contrast_class = ( 'none' == $icon_style ) ? '' : ' contrast-typo ';
											?><div class="content-block-visual content-block-icon <?php echo 'icon-style-' . esc_attr( $icon_style ); echo $contrast_class; ?>">
												<?php echo $linktag; ?>
													<i class="<?php echo hoot_sanitize_fa( $box['icon'] ); ?>"></i>
												<?php echo $linktagend; ?>
											</div><?php
										endif; ?>

										<div class="content-block-content<?php
											if ( $has_image ) echo ' content-block-content-hasimage';
											elseif ( $has_icon ) echo ' content-block-content-hasicon';
											else echo ' no-visual';
											?>">
											<h4><?php 
												echo $linktag;
													the_title();
												echo $linktagend;
											?></h4>
											<div class="content-block-text"><?php
												if ( $excerpt === 'content' ) {
													the_content();
												} elseif ( $excerpt === 'excerpt' ) {
													if( !empty( $excerptlength ) )
														echo hoot_get_excerpt( $excerptlength );
													else
														the_excerpt();
												}
												if ( $linktag ) {
													$linktext = ( !empty( $box['link'] ) ) ? $box['link'] : hoot_get_mod('read_more');
													$linktext = ( empty( $linktext ) ) ? sprintf( __( 'Read More %s', 'dispatch' ), '&rarr;' ) : $linktext;
													echo '<p class="more-link">' . $linktag . $linktext . $linktagend . '</p>';
												}
											?></div>
										</div>

									</div>
								</div><?php

								if ( $column == $columns ) {
									echo '</div>';
									$column = $clearfix = 1;
								} else {
									$clearfix = false;
									$column++;
								}

								break;
							endif;
						endforeach;

						wp_reset_postdata();

					endif;
				endforeach;

				if ( !$clearfix ) echo '</div>';
				?>
			</div>

			<?php
			// Template modification Hook
			do_action( 'hoot_content_blocks_end', 'pages', $content_blocks_query, $page_ids );
			?>

		</div>
	</div>
</div>

<?php
// Reinstate read more links to excerpts
hoot_reinstate_readmore_link();