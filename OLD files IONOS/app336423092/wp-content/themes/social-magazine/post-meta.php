<?php
/*
* post meta data used for all posts
*/
?>

<?php if ( is_front_page() ) : ?>

<div class="authorship">
	<small>
		<?php esc_attr_e('by', 'social-magazine' ); ?> <?php the_author(); ?>  
		<div class="comment-number">
			<?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', '', 'social-magazine'); ?>
		</div><!--/comment-number -->
		<div class="edit-post alignright">
		<?php edit_post_link( __( 'Edit Post', 'social-magazine' ) ); ?>
		</div><!-- /edit-post -->
	</small>
</div><!-- /authorship -->

<?php elseif ( is_page() ) : ?>

<div class="authorship">
	<small><?php the_time('F jS, Y') ?>
		<?php esc_attr_e('by', 'social-magazine' ); ?> <?php the_author(); ?> 
	<div class="edit-post alignright">
		<?php edit_post_link( __( 'Edit Post', 'social-magazine' ) ); ?>
	</div><!-- /edit-post -->
	</small>
</div><!-- /authorship -->

<?php elseif ( is_single() ) : ?>

<div class="authorship">
	<small><?php the_time('F jS, Y') ?>
		<?php esc_attr_e('by', 'social-magazine' ); ?> <?php the_author_posts_link(); ?> 
	<div class="edit-post alignright">
		<?php edit_post_link( __( 'Edit Post', 'social-magazine' ) ); ?>
	</div><!-- /edit-post -->
	</small>
</div><!-- /authorship -->

<?php elseif ( is_category() ) : ?>

<div class="authorship">
	<small><?php the_time('F jS, Y') ?>
		<?php esc_attr_e('by', 'social-magazine' ); ?> <?php the_author(); ?> 
	<div class="edit-post alignright">
		<?php edit_post_link( __( 'Edit Post', 'social-magazine' ) ); ?>
	</div><!-- /edit-post -->
	</small>
</div><!-- /authorship -->

<?php elseif ( is_author() ) : ?>

	<h2><?php the_author(); ?> </h2>

<?php elseif ( is_tag() ) : ?>

<div class="authorship">
	<small><?php the_time('F jS, Y') ?>
		<?php esc_attr_e('by', 'social-magazine' ); ?> <?php the_author(); ?> 
	<div class="edit-post alignright">
		<?php edit_post_link( __( 'Edit Post', 'social-magazine' ) ); ?>
	</div><!-- /edit-post -->
	</small>
</div><!-- /authorship -->

<?php elseif ( is_search() ) : ?>

<div class="authorship">
	<small><?php the_time('F jS, Y') ?>
		<?php esc_attr_e('by', 'social-magazine' ); ?> <?php the_author(); ?> 
	<div class="edit-post alignright">
		<?php edit_post_link( __( 'Edit Post', 'social-magazine' ) ); ?>
	</div><!-- /edit-post -->
	</small>
</div><!-- /authorship -->


<?php elseif ( is_404() ) : ?>

<?php esc_attr_e('This is error 404', 'social-magazine' ); ?>

<?php endif; ?>