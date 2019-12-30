<?php
/**
 * Custom Widget Call-To-Action
 * @package Photoline Lite
 */
add_action('widgets_init', create_function('', 'register_widget("Photoline_Action_Widget");'));

function sample_load_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function sample_load_color_picker_style() {
	wp_enqueue_style('farbtastic');	
}
add_action('admin_print_scripts-widgets.php', 'sample_load_color_picker_script');
add_action('admin_print_styles-widgets.php', 'sample_load_color_picker_style');

class Photoline_Action_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'photoline_action_widget',
			'Photoline ' . __( 'Call-To-Action', 'photoline-lite' ),
			array(
				'classname' => 'photoline_action_widget', 
				'description' => __( 'Call to Action section', 'photoline-lite' ),
				'width' => 250,
				'height' => 350
			)
		);
 	}

 	function form( $instance ) {
 		$photoline_defaults[ 'text_main' ] = '';
 		$photoline_defaults[ 'button_text' ] = '';
 		$photoline_defaults[ 'button_url' ] = '';
		$photoline_defaults[ 'background' ] = 'transparent';
 		$instance = wp_parse_args( (array) $instance, $photoline_defaults );
		$text_main = esc_textarea( $instance[ 'text_main' ] );
		$button_text = esc_attr( $instance[ 'button_text' ] );
		$button_url = esc_url( $instance[ 'button_url' ] );
		$background = esc_attr($instance['background']);
		?>
	
		<script type="text/javascript">
			//<![CDATA[
				jQuery(document).ready(function()
				{
					// colorpicker field
					jQuery('.cw-color-picker').each(function(){
						var $this = jQuery(this),
							id = $this.attr('rel');

						$this.farbtastic('#' + id);
					});
				});
			//]]>   
		  </script>	

		<p>The purpose of this widget creation section a colored background with a call to action and button.</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('text_main'); ?>"><?php _e( 'Main Text:','photoline-lite' ); ?></label>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('text_main'); ?>" name="<?php echo $this->get_field_name('text_main'); ?>"><?php echo $text_main; ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e( 'Button Text:', 'photoline-lite' ); ?></label>
		<input id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('button_url'); ?>"><?php _e( 'Button Link:', 'photoline-lite' ); ?></label>
		<input id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo $button_url; ?>" />
		</p>

	<p>
	  <label for="<?php echo $this->get_field_id('background'); ?>"><?php _e( 'Background Color:', 'photoline-lite' ); ?></label> 
	  <input class="widefat" id="<?php echo $this->get_field_id('background'); ?>" name="<?php echo $this->get_field_name('background'); ?>" type="text" value="<?php if($background) { echo $background; } else { echo '#fff'; } ?>" />
		<div class="cw-color-picker" rel="<?php echo $this->get_field_id('background'); ?>"></div>
	</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		if ( current_user_can('unfiltered_html') )
			$instance['text_main'] =  $new_instance['text_main'];
		else
			$instance['text_main'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text_main']) ) ); // wp_filter_post_kses() expects slashed

		$instance[ 'button_text' ] = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ] = esc_url_raw( $new_instance[ 'button_url' ] );

		$instance['background'] = strip_tags($new_instance['background']);

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$text_main = empty( $instance['text_main'] ) ? '' : $instance['text_main'];
 		$button_text = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : ''; 		
 		$button_url = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '#';
		$background = $instance['background'] ? $instance['background'] : '';
		echo $before_widget;
		?>
						<?php 
						if( !empty( $text_main ) ) {
						?>
				<div class="call-to-action" style="background-color: <?php echo $background; ?>;">
					<div class="call-to-action-text">
							<h3><?php echo esc_html( $text_main ); ?></h3>				
					</div><!-- .call-to-action-text -->
					<?php 
					if( !empty( $button_url ) ) {
					?>			
						<div class="call-to-action-button">
		<a href="<?php echo esc_url( $button_url ); ?>" class="btn red"><?php echo esc_html( $button_text ); ?></a>
						</div><!-- .call-to-action-button -->
					<?php
					}
					?>
				<div class="clearfix"></div>
				</div><!-- .call-to-action -->
						<?php
						}
						?>
		<?php 
		echo $after_widget;
 	}
 }