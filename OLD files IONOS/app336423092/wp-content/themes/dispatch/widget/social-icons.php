<?php
// Return if no icons to show
if ( empty( $icons ) || !is_array( $icons ) )
	return;
?>

<div class="social-icons-widget <?php echo 'social-icons-' . esc_attr( $size ); ?>"><?php

	if ( $title )
		echo $before_title . $title . $after_title;

	foreach( $icons as $key => $icon ) :
		if ( !empty( $icon['url'] ) && !empty( $icon['icon'] ) ) :

			$icon_class = sanitize_html_class( $icon['icon'] ) . '-block';

			if ( $icon['icon'] == 'fa-skype' ) :
				echo '<div class="social-icons-icon fa-skype-block">'
					. '<i class="' . hoot_sanitize_fa( $icon['icon'] ) . '"></i>'
					. hoot_get_skype_button_code ( $icon['url'] )
					. '</div>';
			else :

				if ( $icon['icon'] == 'fa-envelope' ) {
					$url = str_replace( array( 'http://', 'https://'), '', esc_url( $icon['url'] ) );
					$url = 'mailto:' . $url;
				} else {
					$url = esc_url( $icon['url'] );
				}
				$context = $icon['icon'];

				?><a href="<?php echo $url; ?>" <?php hoot_attr( 'social-icons-icon', $context, $icon_class ); ?>>
					<i class="<?php echo hoot_sanitize_fa( $icon['icon'] ); ?>"></i>
				</a><?php

			endif;

		endif;
	endforeach; ?>
</div>