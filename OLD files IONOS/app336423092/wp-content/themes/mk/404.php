<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package level9themes
 */

get_header(); ?>
<div class="_page-404 top60">
	<div id="content" class="content">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10 col-md-10">
				<div class="row">
					<div class="col-sm-7 col-md-7 text-center top60 notfound">
						<div class="not-found-image">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/404.png" />
						</div>	
					</div>
					<div class="col-sm-5 col-md-5">
						<article>
							<div id="primary" class="content-area">
								<main id="main" class="site-main" role="main">
									<section class="error-404 not-found">
										<header class="page-header">
											<h1 class="page-title"><?php _e( 'Nothing here!', 'mk' ); ?></h1>
										</header>
										<div class="page-content">
											<p><?php _e( 'We are sorry, it looks like nothing was found at this location. Please check entered address you may', 'mk' ); ?></p>
											<a class="btn btn-lg btn-success top40 no-bd" href="<?php echo home_url();?>"><?php _e( 'Go to our homepage or', 'mk' ); ?></a>
										</div>	
											<hr/>
										<div class="not-found">
										<p class="top30"><?php _e( 'Try searching our site?', 'mk' ); ?></p>
										<?php get_search_form(); ?>
										</div>
									</section>
								</main>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>