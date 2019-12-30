<?php
/**
 * @package Photoline Lite
 */
?>

<header class="page-header wrap">

<?php
	if ( is_page() ) {
		photoline_breadcrumb();
	}

	if ( is_single() && !is_attachment() ) { ?>

	<nav id="single-nav">
		<?php previous_post_link('<div id="single-nav-right">%link</div>', '<i class="fa fa-chevron-left"></i>', false); ?>
		<?php next_post_link('<div id="single-nav-left">%link</div>', '<i class="fa fa-chevron-right"></i>', false); ?>
	</nav><!-- /single-nav -->

<?php
	photoline_breadcrumb();

	}

	if ( is_archive() || is_home() && !is_front_page() ) { ?>

		<h1 class="page-title">

		<?php
			if ( is_category() ) :
				single_cat_title();

			elseif ( is_tag() ) :
				_e( 'Tag: ', 'photoline-lite' );
				single_tag_title();

			elseif ( is_author() ) :
				the_post();
				printf( __( 'Author: %s', 'photoline-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
				rewind_posts();

			elseif ( is_day() ) :
				printf( __( 'Day: %s', 'photoline-lite' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Month: %s', 'photoline-lite' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Year: %s', 'photoline-lite' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'photoline-lite' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'photoline-lite');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'photoline-lite' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'photoline-lite' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'photoline-lite' );

			elseif ( is_home() && !is_front_page() ) :
				_e( 'Blog', 'photoline-lite' );

			else :
				_e( 'Archives', 'photoline-lite' );

			endif;
		?>

		</h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();

				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
		?>
<?php
	} ?>

<?php
	if ( is_attachment() ) {
		the_title( '<h1 style="display:inline-block;">', '</h1>' ); ?>

	<nav id="single-nav">
		<div id="single-nav-right"><?php previous_image_link('%link', '<i class="fa fa-chevron-left"></i>', false); ?></div>
		<div id="single-nav-left"><?php next_image_link('%link', '<i class="fa fa-chevron-right"></i>', false); ?></div>
	</nav><!-- /single-nav -->
<?php
	}

	if ( is_search() ) { ?>
		<h1 class="page-title">
		<?php printf( __( 'Search Results for: %s', 'photoline-lite' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
<?php
	}

	if ( is_404() ) { ?>
		<h1 class="page-title">Error 404: Not Found</h1>
<?php
	} ?>

</header>