<?php

function mk_sidenav_social_links(){
	
	if ( get_theme_mod( 'mk_sl_twitter' ) ){
	echo '<a href="'. esc_url( get_theme_mod( 'mk_sl_twitter' ) ).'" class="pixons-twitter-1"></a>';
	}

	if ( get_theme_mod( 'mk_sl_facebook') ){
	echo '<a href="'.esc_url( get_theme_mod( 'mk_sl_facebook') ).'" class="pixons-facebook-1"></a>';
	}

	if ( get_theme_mod( 'mk_sl_pinterest' ) ){
	echo '<a href="'.esc_url( get_theme_mod( 'mk_sl_pinterest' ) ).'" class="pixons-pinterest"></a>';
	}

	if ( get_theme_mod( 'mk_sl_instagram') ){
	echo '<a href="'.esc_url( get_theme_mod( 'mk_sl_instagram') ).'" class="pixons-instagram"></a>';
	}
	if ( get_theme_mod( 'mk_sl_gplus') ){
	echo '<a href="'.esc_url( get_theme_mod( 'mk_sl_gplus' ) ).'" class="pixons-google_plus"></a>';
	}

	if ( get_theme_mod( 'mk_sl_dribble') ){
	echo '<a href="'.esc_url( get_theme_mod( 'mk_sl_dribble' ) ).'" class="pixons-dribbble"></a>';
	}
}

// Reduce nav classes, leaving only'current-menu-item'

function mk_nav_class_filter( $var ) {
return is_array($var) ? array_intersect($var, array('current-menu-item','nav nav-second-level','dropdown-menu','active')) : '';
}
add_filter('nav_menu_css_class','mk_nav_class_filter', 100, 1);
// Add page slug as nav IDs
function mk_nav_id_filter( $id, $item )
{
return 'link-'.mk_cleanname($item->title);
}
add_filter( 'nav_menu_item_id','mk_nav_id_filter', 10, 2 );

function mk_cleanname($v) {
$v = preg_replace('/[^a-zA-Z0-9s]/', '', $v);
$v = str_replace(' ', '-', $v);
$v = strtolower($v);
return $v;
}


add_action( 'after_setup_theme', 'mk_bootstrap_setup' );

if ( ! function_exists( 'mk_bootstrap_setup' ) ):

	function mk_bootstrap_setup(){
/*
		add_action( 'init', 'register_menu' );
			
		function register_menu(){
			register_nav_menu( 'top-bar', 'Bootstrap Top Menu' ); 
		}
*/
		class mk_Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

			
			function start_lvl( &$output, $depth = 0, $args = array() ) {

				$indent = str_repeat( "\t", $depth );
				$output	   .= "\n$indent<ul class=\"nav nav-second-level\">\n";
				
			}

			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$li_attributes = '';
				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = ($args->has_children) ? 'dropdown' : '';
				$classes[] = ($item->subtitle) ? 'dropdown yamm-fullwidth' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'menu-item-' . $item->ID;


				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
                
				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				$attributes .= ($args->has_children) 	    ? '' : '';
				$attributes .= ($item->subtitle) 	    ? '' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				if($item->description && preg_match("/glyphicon-/i",$item->description)){
				$item_output .= '<span class="LNT-menu-icons glyphicon '.$item->description.'"></span>';
				}
				$arrow ='';
				
				if($args->has_children){
				$arrow .= ' <span class="fa arrow"></span>';
				}
				
			
				
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after .$arrow;
				$item_output .= ($args->has_children || $item->subtitle ) ? '</a>' : '</a>';
				
				$item_output .= $args->after;
               
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);
				//$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
				
				if ( !$element )
					return;
				
				$id_field = $this->db_fields['id'];

				//display this element
				if ( is_array( $args[0] ) ) 
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) ) 
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);

				$id = $element->$id_field;

				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

					foreach( $children_elements[ $id ] as $child ){

						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}

				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}

				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);
				
			}
			
		}

	}

endif; // bootstrap setup


/*
		Main Navigation Function
*/

if (function_exists('childtheme_override_mk_navigation_sidebar')){  
	
	function  mk_navigation_sidebar() {
	
			childtheme_override_mk_navigation_sidebar();
			
			}
			
		} else {
		
		function  mk_navigation_sidebar(){

		global $data;
		
		$theme_home ='https://level9themes.com/';
		
	?>
<!-- ./ Nav -->	
<nav>
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only"><?php __('Toggle navigation','mk');?></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="mk-mobile-branding" href="<?php echo esc_url( home_url() )  ;?>"><?php bloginfo('name');?></a>
</div><!-- /.navbar-header -->
</nav>
<!-- ./ Nav -->
<!-- ./ side nav footer -->
<div class="sidebar-footer text-center">
<div class="sb-social">
<?php if(function_exists('mk_sidenav_social_links'))mk_sidenav_social_links(); ?>
</div>
    <p>&copy;&nbsp;<?php date( 'Y' )?><a href="<?php echo esc_url( home_url() ) ;?>"><?php bloginfo('name');?></a> &bull; <?php printf( __( 'Theme: %1$s by %2$s', 'mk' ), 'Mk', '<a href="'.$theme_home.'">Level9themes</a>' ); ?></p>
</div>
<!-- ./ side nav footer -->

<div class="navbar-default sidebar" role="navigation">
<div class="block__scrollable">
<div class="sidebar-nav navbar-collapse">
<?php do_action('sidenav_before_branding');?>
<div class="mk-header-branding text-center">
<a href="<?php echo esc_url( home_url() ) ; ?>">
<?php if (get_theme_mod( 'mk_site_logo')) :?>
<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url( get_theme_mod( 'mk_site_logo') );?>" />
<?php else: ?>
<?php bloginfo('name'); ?>
<?php endif; ?>
</a>
<div class="site-desc top20"><?php echo get_bloginfo('description');?></div>
</div>
<?php do_action('sidenav_before_menu');?>
<ul class="nav text-center" id="side-menu">
<?php
if (has_nav_menu('primary')) :

$args = array(
'theme_location' => 'primary',
'depth'		 => 2,
'container'	 => '',
'container_id'	 => '',
'menu_class'	 => 'menu',
'items_wrap' => '%3$s',
'walker'	 => new mk_Bootstrap_Walker_Nav_Menu()
);
wp_nav_menu($args);
else:
if(current_user_can('manage_options')) :
echo'<li><a href="'.get_admin_url().'nav-menus.php">'.__('Set up Your Menu','mk').'</a></li>';
endif;
endif;
?>
</ul>
<?php do_action('sidenav_after_menu');?>
<div class="sb-social lnt-mobile-view text-center">
<?php if(function_exists('mk_sidenav_social_links'))mk_sidenav_social_links(); ?>
</div>

<div class="side-nav-widgets">

<?php if(get_theme_mod( 'mk_show_header_search',true) == true):?>	
<div class="sidenav-search text-center">
<span id="search-btn"><a title="Search this site" href="#header-outer"><i class="fa fa-search"></i></a></span>	
</div>
<?php endif;?>
<div class="clearfix"></div>
<?php get_sidebar('sidenav');?>
</div>

</div>
<!-- /.sidebar-collapse -->
</div>
</div>
		<?php
		}
}





