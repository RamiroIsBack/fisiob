<div class="sidebar">
        <?php if (!dynamic_sidebar('content-sidebar')) : ?>
            <?php get_search_form(); ?>
            <br/>
            <h3>
                <?php  _e( 'Archives', 'alum' ); ?>
            </h3>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
            <h3>
              <?php  _e( 'Categories', 'alum' ); ?>   
            </h3>
            <ul>
                <?php wp_list_categories('title_li'); ?>
            </ul>
        <?php endif; // end primary widget area  ?>
     
    </div>
 
