<section class="header">
	<?php
		$header_image_src = One_And_One_Assistant_Branding::get_logo( 'variant1' );
		$header_image_alt = One_And_One_Assistant_Branding::get_brand_name();
	?>
	<?php if ( $header_image_src ): ?>
		<img src="<?php echo $header_image_src; ?>" alt="<?php echo $header_image_alt; ?>" class="logo">
	<?php endif; ?>
</section>