<?php
/*
* Search form used in Sidebar Template
*/
?>

<form method="get" class="searchform" action="<?php echo esc_url ( trailingslashit( home_url() ) ); ?>">
	<fieldset>
	<div class="input-group">
      <input type="text" name="s" id="search" onclick="this.value='';" value="<?php the_search_query(); ?>" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" alt="<?php esc_attr_e( 'Search', 'social-magazine'); ?>" type="text"><?php _e( 'Go', 'social-magazine'); ?></button>
      </span>
	</div><!-- /input-group -->
</fieldset>
</form>