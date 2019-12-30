<?php
/**
 * Pagination functions
 * @package Photoline Lite
 */

if ( ! function_exists( 'photoline_paging_nav' ) ) :
	function photoline_paging_nav() {
		// Pagination.
		the_posts_pagination( array(
					'show_all'     => False,
					'end_size'     => 1,
					'mid_size'     => 5,
					'prev_next'    => True,
					'prev_text'    => esc_html__( 'Previous', 'photoline-lite' ),
					'next_text'    => esc_html__( 'Next', 'photoline-lite' ),
					'add_args'     => False,
					'add_fragment' => '',
					'screen_reader_text' => esc_html__( 'Posts navigation', 'photoline-lite' ),
					'type' => 'list',
		) );
	}
endif;