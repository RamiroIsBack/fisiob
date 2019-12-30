<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mk
 */
?>
	<!-- Footer Widgets-->
		<footer	id="site-footer">
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<?php get_sidebar('left-footer');?>
				</div>
				<div class="col-sm-4 col-md-4">
					<?php get_sidebar('mid-footer');?>
				</div>
				<div class="col-sm-4 col-md-4">
					<?php get_sidebar('right-footer'); ?>
				</div>				
			</div>
			</footer>
			<!-- Footer Widgets -->
			
	</div><!-- #mk-page-wrapper -->

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
