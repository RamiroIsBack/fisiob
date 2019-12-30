<?php
/**
 * The template for displaying featured content
 *
 * @package WordPress
 * @subpackage Queue
 * @since Queue 1.0
 */
?>

<div id="featured-content" class="featured-content promotedarticles">
	<?php
		/**
		 * Fires before the Queue featured content.
		 *
		 * @since Queue 1.0
		 */
		do_action( 'queue_featured_posts_before' );

		$featured_posts = queue_get_featured_posts();
		$count = 1;
		$column1 = '';
		$column2 = '';
		$column3 = '';
		foreach ( (array) $featured_posts as $order => $post ) :
			$max_posts = Featured_Content::$max_posts - 0;		// from inc/featured-content.php
			if ($count > $max_posts) {break;}		// maximum post count
			setup_postdata( $post );

			if ($count == 1) {
				$column1 = queue_return_template_part( 'content', 'featured-post' );
			}
			else if ($count <= 3) {
				$column2 .= queue_return_template_part( 'content', 'featured-post' );
			}
			else if ($count <= 6) {
				$column3 .= queue_return_template_part( 'content', 'featured-post' );
			}

			$count++;
		endforeach;

		// instead of having a third column with one block, put it the last block in column 2.
		if ($count == 5) {
			$column2 .= $column3;
			$column3 = '';
		}

		echo "
			<div class=\"column1\">
				$column1
			</div>
		";

		if ($column2 != '') {
			echo "
				<div class=\"column2\">
					$column2
				</div>
			";
		}

		if ($column3 != '') {
			echo "
				<div class=\"column3\">
					$column3
				</div>
			";
		}

		/**
		 * Fires after the Queue featured content.
		 *
		 * @since Queue 1.0
		 */
		do_action( 'queue_featured_posts_after' );

		wp_reset_postdata();
	?>
			<hr>
</div><!-- #featured-content .featured-content -->
