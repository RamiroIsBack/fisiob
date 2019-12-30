<?php

/*
* Template Name: Page Wide
*/

?>

<?php get_header(); ?>


<div class="row">

	<div class="lnt-full-width-wrapper">

		<?php do_action('page_full_width_before');?>
		
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="entry-content">

		<?php the_content(); ?>
		
		<?php
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'mk' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->

		<?php endwhile; // end of the loop. ?>

		<?php do_action('page_full_width_after');?>

	</div>
</div>

<?php get_footer(); ?>