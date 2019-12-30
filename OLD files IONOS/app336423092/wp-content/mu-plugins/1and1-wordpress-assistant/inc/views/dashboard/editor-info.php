<?php
    $article1_link = One_And_One_Assistant_Config::get( 'blog_gutenberg_help_{market}', 'links', 'blog_gutenberg_help_US' );
    $article2_link = One_And_One_Assistant_Config::get( 'blog_gutenberg_alternative_{market}', 'links', 'blog_alternative_help_US' );
?>

<div id="assistant-editor-info-panel" class="dashboard-column dashboard-column1 welcome-panel assistant-dashboard-panel">
    <a class="notice-dismiss" href="<?php echo esc_url( add_query_arg( array( 'close_editor_panel' => 1 ) ) ); ?>"><?php _e( 'Dismiss' ); ?></a>
    
	<div class="inside">
		<div class="dashboard-panel-title">
			<h2><?php _e( 'The new Editor is here!', 'uialfred-assistant' ); ?></h2>
            <p class="about-description"><?php _e( 'WordPress 5.0 is here and so is Gutenberg.', 'uialfred-assistant' ); ?></p>
            
            <figure class="gutenberg-editor-preview">
                <img src="https://s.w.org/images/core/gutenberg-screenshot.png?<?php echo date( 'Ymd' ); ?>"
                     alt="<?php esc_attr_e( 'Screenshot from the Gutenberg interface' ); ?>" />
            </figure>
            <ul class="assistant-editor-links">
                <?php if ( $article1_link ): ?>
                    <li>
                        <a href="<?php echo $article1_link; ?>" target="_blank">
                            <?php _e( 'Learn more about the Gutenberg editor', 'uialfred-assistant' ); ?>
                        </a>
                    </li>
                <?php endif; ?>
	            <?php if ( $article2_link ): ?>
                    <li>
                        <a href="<?php echo $article2_link; ?>" target="_blank">
                            <?php _e( 'How do we deal with it?', 'uialfred-assistant' ); ?>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <div style="clear:both;">
                <a class="button install-plugin" data-plugin="classic-editor" href="#">
                    <span class="setup"><?php _e( 'Switch back to the old Editor', 'uialfred-assistant' ); ?></span>
                    <span class="installed hidden"><?php _ex( 'Installed!', 'plugin' ); ?></span>
                    <span class="failed hidden"><?php _e( 'Installation Failed' ); ?></span>
                </a>
            </div>
		</div>
	</div>
</div>