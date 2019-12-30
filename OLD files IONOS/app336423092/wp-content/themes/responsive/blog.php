<?php
/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
Template Name: Blog (full posts) (Deprecated)
 *
 * @file           blog.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/blog.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header();

?>
<div id="content-outer">
<div id="content-blog" class="<?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">

	<?php
	get_template_part( 'loop-header', get_post_type() );
	?>

	<?php
	if ( get_query_var( 'paged' ) ) {
		$responsive_paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$responsive_paged = get_query_var( 'page' );
	} else {
		$responsive_paged = 1;
	}
	$responsive_blog_query = new WP_Query(
		array(
			'post_type' => 'post',
			'paged'     => $responsive_paged,
		)
	);

	if ( $responsive_blog_query->have_posts() ) :

		while ( $responsive_blog_query->have_posts() ) :
			$responsive_blog_query->the_post();
			?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta', get_post_type() ); ?>

				<div class="post-entry">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" <?php responsive_schema_markup( 'url' ); ?>>
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- end of .post-entry -->

				<?php get_template_part( 'post-data', get_post_type() ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php
		endwhile;

		if ( $responsive_blog_query->max_num_pages > 1 ) :
			?>
			<div class="navigation">
				<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ), $responsive_blog_query->max_num_pages ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ), $responsive_blog_query->max_num_pages ); ?></div>
			</div><!-- end of .navigation -->
			<?php
		endif;

		else :

			get_template_part( 'loop-no-posts' );

	endif;
		wp_reset_postdata();
		?>

</div><!-- end of #content-blog -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
