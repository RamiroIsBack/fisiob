<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package trance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Sorry Mate ! Nothing here.', 'trance' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Try searching for it.', 'trance' ); ?></p>

					<div class="searchform">
				<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
							<div><input type="text" size="18" value="" name="s" id="s" />
							<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
							</div>
					</form>
				</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
