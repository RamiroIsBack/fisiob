<?php
/**
 * @package Photoline Lite
 */
?>

	<footer class="entry-meta<?php if ( !is_active_sidebar( 'sidebar-1' ) ) { ?> no-sidebar<?php } ?>">

		<div class="posted">
			<?php photoline_posted_on(); ?>
		</div>
		<div class="extrameta">
			<?php photoline_posted_extra(); ?>
		</div>

		<?php edit_post_link( __( 'Edit', 'photoline-lite' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->