<?php
/**
 * The Template for displaying single post.
 *
 * @package Photoline Lite
 */

get_header(); ?>

<div id="primary" class="content-area<?php if ( !is_active_sidebar( 'sidebar-1' ) ) { ?> no-sidebar<?php } ?>">
	<main id="main" class="site-main" role="main">
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/post/content', get_post_format() );
			do_action( 'photoline_after_post_content' );
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		endwhile; ?>

	</main><!-- #main -->
	<?php photoline_content_nav( 'nav-below' ); ?>
</div><!-- #primary -->

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { get_sidebar(); } ?>
<?php get_footer(); ?>