<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package queue
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
			if (is_home() && get_theme_mod( 'mini_about_active' )) {
				$miniabout = get_theme_mod( 'mini_about_text' );
				$sitename = get_bloginfo('name');
				echo "
					<section class='aboutsnippet'>
						<h2>" . __( 'About', 'queue') . " <em>$sitename</em></h2>
						<p>$miniabout</p>
					</section>
				";
			}
		?>
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'queue' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'queue' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'queue' ), 'Queue', '<a href="http://www.raphaelwenger.com/">Raphael Wenger</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
