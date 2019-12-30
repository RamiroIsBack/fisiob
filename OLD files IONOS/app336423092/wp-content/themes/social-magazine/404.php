<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           404.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="col-md-8 blog">
			<div class="blog-block">
				<div class="error">
				<h1><?php _e('404', 'social-magazine'); ?></h1>
					<h2 class="sub-error"><?php _e('That page hasnt been created yet.', 'social-magazine'); ?></h2>
					<p><?php _e('It appears that page doesnt exist. Try some of these latest posts or a search.', 'social-magazine'); ?></p>
					<h3><?php _e('Recent Posts', 'social-magazine'); ?></h3>
						<ul>
						<?php
							$args = array( 'numberposts' => '10' );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a> </li> ';
							}
						?>
						</ul>
				</div><!-- /error -->
			</div><!-- /blog-block -->
		</div><!-- /col-md-8 blog -->
		<?php get_sidebar(); ?>
	</div><!-- /container -->
<?php get_footer(); ?>