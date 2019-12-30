<?php
/*
* Template part for no content results
*/
?>

<?php if ( is_search() ) : ?>

	<h2 class="center"><?php _e("No Articles Found For:", 'social-magazine' ); ?> <?php echo get_search_query(); ?></h2>
	<p class="center"><?php _e("There were no articles found for: ", 'social-magazine'); ?> <?php get_search_query(); ?></p>

<?php else : ?>

<h2 class="center"><?php _e("Results Not Found", 'social-magazine' ); ?></h2>
<p class="center"><?php _e("Your query returned no results.", 'social-magazine' ); ?></p>
	
<?php endif; ?>