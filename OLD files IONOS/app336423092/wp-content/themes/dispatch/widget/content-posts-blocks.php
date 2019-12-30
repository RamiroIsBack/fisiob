<?php
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

// Create a custom WP Query
$query_args = array();
$count = intval( $count );
$query_args['posts_per_page'] = ( empty( $count ) ) ? 4 : $count;
$offset = intval( $offset );
if ( $offset )
	$query_args['offset'] = $offset;
if ( $category )
	$query_args['category'] = $category;
$query_args = apply_filters( 'hoot_content_posts_blocks_query', $query_args, $instance, $before_title, $title, $after_title );
$content_blocks_query = get_posts( $query_args );

// Temporarily remove read more links from excerpts
hoot_remove_readmore_link();
$excerptlength = intval( $excerptlength );

// Template modification Hook
do_action( 'hoot_content_blocks_wrap', 'posts', $content_blocks_query, $query_args );
?>

<div class="content-blocks-widget-wrap content-blocks-posts <?php echo sanitize_html_class( $top_class ); ?>">
	<div class="content-blocks-widget-box <?php echo sanitize_html_class( $bottom_class ); ?>">
		<div class="content-blocks-widget <?php echo sanitize_html_class( 'content-blocks-widget-' . $style ); ?>" <?php echo $custommargin; ?>>

			<?php
			/* Display Title */
			if ( $title )
				echo wp_kses_post( apply_filters( 'hoot_widget_title', $before_title . $title . $after_title, 'content-posts-blocks', $title, $before_title, $after_title ) );

			// Template modification Hook
			do_action( 'hoot_content_blocks_start', 'posts', $content_blocks_query, $query_args );
			?>

			<div class="flush-columns">
				<?php
						global $post;
						$fullcontent = ( empty( $fullcontent ) ) ? 'excerpt' :
										( ( $fullcontent === 1 ) ? 'content' : $fullcontent ); // Backward Compatible

						foreach( $content_blocks_query as $post ) :

								setup_postdata( $post );
								if ( has_post_thumbnail() )
									$has_image = true;
								else
									$has_image = false;

								$linktag = '<a href="' . esc_url( get_permalink() ) . '" ' . hoot_get_attr( 'content-block-link', 'permalink' ) . '>';
								$linktagend = '</a>';

								// Start Block Display
								if ( $column == 1 ) echo '<div class="content-block-row">';
								?>

								<div class="content-block-column <?php echo "hcolumn-1-{$columns} content-block-{$counter}"; $counter++; ?> <?php echo sanitize_html_class( 'content-block-' . $style ); ?>">
									<?php $block_class = ( !$has_image ) ? 'no-highlight' : ( ( $style == 'style2' ) ? 'contrast-typo' : '' ); ?>
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
													$img_size = apply_filters( 'hoot_content_posts_block_img', 'column-1-' . $image_col_width, $columns, $style );
													hoot_post_thumbnail( 'content-block-img', $img_size );
												echo $linktagend;
												?>
											</div><?php
										endif; ?>

										<div class="content-block-content<?php
											if ( $has_image ) echo ' content-block-content-hasimage';
											else echo ' no-visual';
											?>">
											<h4><?php 
												echo $linktag;
													the_title();
												echo $linktagend;
											?></h4>
											<?php $metadisplay = array(); $metacontext = '';
											if ( !empty( $show_author ) ) $metadisplay[] = 'author';
											if ( !empty( $show_date ) ) $metadisplay[] = 'date';
											if ( !empty( $show_comments ) ) $metadisplay[] = 'comments';
											if ( !empty( $show_cats ) ) { $metadisplay[] = 'cats'; $metacontext .= 'cats,'; }
											if ( !empty( $show_tags ) ) { $metadisplay[] = 'tags'; $metacontext .= 'tags,'; }
											if ( hoot_meta_info_display( $metadisplay, $metacontext, true ) ) {
												hoot_meta_info_blocks( $metadisplay, $metacontext );
											} ?>
											<div class="content-block-text"><?php
												if ( $fullcontent === 'content' ) {
													the_content();
												} elseif( $fullcontent === 'excerpt' ) {
													if( !empty( $excerptlength ) )
														echo hoot_get_excerpt( $excerptlength );
													else
														the_excerpt();
												}
												if ( $fullcontent === 'excerpt' ) {
													$linktext = hoot_get_mod('read_more');
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

						endforeach;

						wp_reset_postdata();

				if ( !$clearfix ) echo '</div>';
				?>
			</div>

			<?php
			// Template modification Hook
			do_action( 'hoot_content_blocks_end', 'posts', $content_blocks_query, $query_args );
			?>

		</div>
	</div>
</div>

<?php
// Reinstate read more links to excerpts
hoot_reinstate_readmore_link();