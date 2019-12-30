<?php
if ( ! is_active_sidebar( 'sub-footer' ) )
	return;
?>
<div id="sub-footer" class="hgrid-stretch inline-nav">
	<div class="hgrid">
		<div class="hgrid-span-12">
			<?php dynamic_sidebar( 'sub-footer' ); ?>
		</div>
	</div>
</div>