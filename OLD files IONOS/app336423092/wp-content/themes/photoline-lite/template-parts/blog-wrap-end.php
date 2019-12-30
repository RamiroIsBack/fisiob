<?php
/**
 * @package Photoline Lite
 */
?>

			</div><!--.grid -->
		</main><!-- #main -->

<div class="clearfix"></div>

<?php
	if( true === get_theme_mod( 'numbered_pagination' ) ) {
		photoline_paging_nav();
	}

	if( false === get_theme_mod( 'numbered_pagination' ) ) {
        		photoline_content_nav( 'nav-below' );
	}
?>

</div><!-- #primary -->