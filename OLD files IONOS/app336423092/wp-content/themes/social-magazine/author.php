<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           author.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
get_header(); ?>

<div class="wrap">
	<div class="container">
			<div class="col-md-8 blog">

			    <h1><?php _e( 'About', 'social-magazine' ); ?> <?php the_author_meta( 'nickname' ); ?></h1>
			    <dl>
			        <dt><?php _e( 'Website', 'social-magazine' ); ?></dt>
			        <dd><a href="<?php the_author_meta( 'user_url' ); ?>"><?php the_author_meta( 'user_url' ); ?></a></dd>
			        <dt><?php _e( 'Profile' , 'social-magazine'); ?></dt>
			        <dd><?php the_author_meta( 'description' ); ?></dd>
			    </dl>
			
			    <h2><?php _e( 'Posts authored by', 'social-magazine'); ?> <?php the_author_meta( 'nickname' ); ?>:</h2>
				<div class="blog-block">
			    <ul>
				<!-- The Loop -->
			
			    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			        <li>
			        	<?php the_time('M d, Y'); ?>
			            <a class="archives-list-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			            <?php the_title(); ?></a>
			            <small><?php _e( 'in', 'social-magazine'); ?> <?php the_category(__(' & ', 'social-magazine'));?></small>
			        </li>
			
			    <?php endwhile; else: ?>
			        <p><?php _e('No posts by this author.', 'social-magazine' ); ?></p>
			
			    <?php endif; ?>
			</div><!--/ blog-block -->
			<!-- End Loop -->

</div><!-- /col-md-8 blog -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>