<?php
// Template modification Hook
do_action( 'hoot_template_before_footer' );

// Get Footer Columns
$columns = hoot_get_footer_columns();
$alphas = range('a', 'e');
$structure = hoot_footer_structure();
$footercols = array();
$footerdisplay = false;
for ( $i=0; $i < $columns; $i++ ) {
	$footercols[ 'footer-' . $alphas[ $i ] ] = $structure[ $i ];
	if ( is_active_sidebar( 'footer-' . $alphas[ $i ] ) )
		$footerdisplay = true;
}

// Return if nothing to show
if ( !$footerdisplay )
	return;
?>

<footer <?php hoot_attr( 'footer', '', 'footer hgrid-stretch contrast-typo' ); ?>>
	<div class="hgrid">
		<?php foreach ( $footercols as $key => $span ) { ?>
			<div class="<?php echo 'hgrid-span-' . $span ; ?> footer-column">
				<?php dynamic_sidebar( $key ); ?>
			</div>
		<?php } ?>
	</div>
</footer><!-- #footer -->

<?php
// Template modification Hook
do_action( 'hoot_template_after_footer' );