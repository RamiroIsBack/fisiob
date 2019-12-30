<?php
defined('ABSPATH') or die("please don't runs scripts");
/*
* @file           footer.php
* @package        Social Magazine
* @author         ThemesMatic
* @copyright      2015 ThemesMatic
*/
?>

<?php if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) { ?>
<div class="container">
	<div class="col-md-12 footer-block">
		<div class="col-md-4">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- /widget-area -->
		<?php endif; ?>
		</div><!-- /col-md-4 -->
		
		<div class="col-md-4">
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div><!-- /widget-area -->
		<?php endif; ?>
		</div><!-- /col-md-4 -->
		
		<div class="col-md-4">
		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div><!-- /widget-area -->
		<?php endif; ?>
		</div><!-- /col-md-4 -->
	</div><!-- /col-md-12 footer-block -->
</div><!-- /fluid-container -->
<?php }  ?>

	<footer class="container">
		<div class="col-xs-12 col-md-4"> 
		<p class="footer-copy">
			<?php esc_attr_e('&copy;', 'social-magazine' ); ?> <?php bloginfo('name'); ?> <?php echo date( 'Y' ); ?>
		</p>
		</div><!-- /col-md-4 -->
		<div class="col-xs-12 col-md-4 bottom-title text-center">
		<p><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></p>
		<p><small><?php bloginfo('description'); ?></small></p>
		</div><!--/ col-md-4 bottom-title -->
		<div class="col-xs-12 col-md-4 footer-attr">
			<p class="footer-tml"><?php echo social_magazine_footer(); ?></p>
		</div><!-- footer-attr -->
	</footer><!-- /footer container -->
</div><!-- /wrap -->

<?php wp_footer(); ?>
</body>
</html>