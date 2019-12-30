<?php
/**
 * mk_add_current_blog_temp_to_body
 *
 * @return array
 * @author Level9themes
 **/

function mk_add_current_blog_temp_to_body($classes){
	
	$classes[] = 'blog-style-'.get_theme_mod('mk_blog_layout');
	
	return $classes;
}

add_filter( 'body_class', 'mk_add_current_blog_temp_to_body' );

/**
 * Custom pagination function
 *
 * @author Level9themes
 **/

function mk_custom_pagination($numpages = '', $pagerange = '', $paged='') 
{ if (empty($pagerange)) { $pagerange = 2; } 
/**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */ 
   global $paged; 
   if (empty($paged)) { 
   $paged = 1; } if ($numpages == '') {
	  global $wp_query;
	  $numpages = $wp_query->max_num_pages; 
	  if(!$numpages) { $numpages = 1; } }
	  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
   $pagination_args = array( 'base' => get_pagenum_link(1) . '%_%', 'format' => 'page/%#%', 'total' => $numpages, 'current' => $paged, 'show_all' => False, 'end_size' => 1, 'mid_size' => $pagerange, 'prev_next' => True, 'prev_text' => __('&laquo;','lnt_framework'), 'next_text' => __('&raquo;','lnt_framework'), 'type' => 'plain', 'add_args' => false, 'add_fragment' => '' );
   $paginate_links = paginate_links($pagination_args); if ($paginate_links) { 
   echo "<nav class='custom-pagination'>";
   echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> "; echo $paginate_links; echo "</nav>";
   } }
     

/**
 * number_array
 *
 * @return array
 * @author Level9themes
 **/	

function mk_number_array($from = 0, $to = 100, $steps = 1, $array = array(), $label = "")
		{
			for ($i = $from; $i <= $to; $i += $steps) {
			    $array[$i.$label] = $i;
			}
		
			return $array;
		}
		

/**
 * 
 * Custom Slider Template
 */
 
 if (function_exists('childtheme_override_mk_slider_template'))  {
	
	function mk_slider_template() {
			childtheme_override_mk_slider_template();
		}
	} else {	
 
	function mk_slider_template(){
	global $post,$wp_query;
	
	if(is_home() && get_theme_mod( 'mk_show_default_slider_on_home',false) == false){
		return;
	}
	
	$args = array(
	'posts_per_page' => 4,
	);
	
	if( get_theme_mod( 'mk_show_default_slider',true) && is_front_page() || is_home()):
	
	$out ='';
	$out .='<div class="the-content '.get_theme_mod('mk_slider_content','custom_slides').'_slider">'."\n";
    $out .='<div id="slides">'."\n";
    $out .='<ul class="slides-container">'."\n";
		
		if(get_theme_mod('mk_slider_content','custom_slides') == 'latest_posts' ):
			
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) :
			$count = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$count ++;
				$out .='<li class="mk-slide-'.$count.'">'."\n";
				$out .=	get_the_post_thumbnail();
				$out .='<article>'."\n";
				$out .='<div class="col-sm-offset-2 col-sm-8 col-md-8">'."\n";
				$out .='<h2 class="mainCaption"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h2>'."\n";
				$out .='<p class="subCaption">'.get_the_excerpt().'</p>'."\n";			
				$out .='<a href="'.get_the_permalink().'" class="btn btn-lg '.get_theme_mod('mk_slider_button','btn-success').'">'.esc_attr(get_theme_mod('mk_latest_posts_slider_readmore_text', 'Read More')).'</a>'."\n";		
				$out .='</div>'."\n";
				$out .='</article>'."\n";
				$out .='</li>'."\n";
			endwhile;
			endif;

			// Reset Post Data
			wp_reset_postdata();
			
			else:
			
				if(get_theme_mod( 'mk_slide_1_image', get_template_directory_uri() . '/images/slides/slide1.jpg') ):
				$out .='<li class="mk-slide-1">'."\n";
				$out .='<img src="'.esc_url( get_theme_mod( 'mk_slide_1_image',get_template_directory_uri() . '/images/slides/slide1.jpg' ) ).'" alt="">'."\n";
				
				if(get_theme_mod('mk_slide_1_show_slide_info', true) == true): 
				
				$out .='<article>'."\n";
				$out .='<div>'."\n";
				$out .='<h2 class="mainCaption">'.esc_attr(get_theme_mod('mk_slide1_caption', 'We are MK Theme')).'</h2>'."\n";
				$out .='<p class="subCaption">'.esc_attr(get_theme_mod('mk_slide1_subcaption', 'We make beautiful things happen!')).'</p>'."\n";
				if(get_theme_mod('mk_slide_1_button_', true) == true): 
				$out .='</div>'."\n";
				$out .='<a href="'.esc_url(get_theme_mod('mk_slide1_url', '#')).'" class="btn btn-lg '.get_theme_mod('mk_slider_button','btn-success').'">'.esc_attr(get_theme_mod('mk_slide1_btntext', 'Learn more')).'</a>'."\n";
				endif;
				$out .='</article>'."\n";
				
				endif;
				
				$out .='</li>'."\n";
				endif;
				
				if(get_theme_mod( 'mk_slide_2_image', get_template_directory_uri() . '/images/slides/slide2.jpg') ):
				 $out .='<li class="mk-slide-2">'."\n";
				 $out .='<img src="'.esc_url( get_theme_mod( 'mk_slide_2_image',get_template_directory_uri() . '/images/slides/slide2.jpg' ) ).'" alt="">'."\n";
				if(get_theme_mod('mk_slide_2_show_slide_info', true) == true): 
				$out .='<article>'."\n";
				$out .='<div>'."\n";
				$out .='<h2 class="mainCaption">'.esc_attr(get_theme_mod('mk_slide2_caption', 'Stylish free Wordpress Theme')).'</h2>'."\n";
				$out .='<p class="subCaption">'.esc_attr(get_theme_mod('mk_slide2_subcaption', 'Optimized for mobile devices, clean w3C validated markup')).'</p>'."\n";
				$out .='</div>'."\n";
				if(get_theme_mod('mk_slide_2_button_', true) == true): 
				$out .='<a href="'.esc_url(get_theme_mod('mk_slide2_url', '#')).'" class="btn btn-lg '.get_theme_mod('mk_slider_button','btn-success').'">'.esc_attr(get_theme_mod('mk_slide2_btntext', 'Learn more')).'</a>'."\n";
				endif;
				$out .='</article>'."\n";
				endif;
				$out .='</li>'."\n";
				 endif;
				 
				 if(get_theme_mod( 'mk_slide_3_image', get_template_directory_uri() . '/images/slides/slide3.jpg')):
				$out .='<li class="mk-slide-3">'."\n";
				$out .='<img src="'.esc_url( get_theme_mod( 'mk_slide_3_image',get_template_directory_uri() . '/images/slides/slide3.jpg' ) ).'" alt="">'."\n";
				if(get_theme_mod('mk_slide_3_show_slide_info', true) == true): 
				$out .='<article>'."\n";
				$out .='<div>'."\n";
				$out .='<h2 class="mainCaption">'.htmlspecialchars_decode(get_theme_mod('mk_slide3_caption', 'Get more with MK <br/>proffessional Version')).'</h2>'."\n";
				$out .='<p class="subCaption">'.esc_attr(get_theme_mod('mk_slide3_subcaption', 'Premium sliders, page composer, unlimited layouts...')).'</p>'."\n";
				$out .='</div>'."\n";
				if(get_theme_mod('mk_slide_3_button_', true) == true): 
				$out .='<a href="'.esc_url(get_theme_mod('mk_slide3_url', 'https://gum.co/vpAOC')).'" class="btn btn-lg '.get_theme_mod('mk_slider_button','btn-success').'">'.esc_attr(get_theme_mod('mk_slide3_btntext', 'Learn more')).'</a>'."\n";
				endif;
				$out .='</article>'."\n";
				endif;
				$out .='</li>'."\n";
				endif;
				
				 if(get_theme_mod( 'mk_slide_4_image')):
				$out .='<li class="mk-slide-4">'."\n";
				$out .='<img src="'.esc_url( get_theme_mod( 'mk_slide_4_image') ).'" alt="">'."\n";
				if(get_theme_mod('mk_slide_4_show_slide_info', true) == true): 
				$out .='<article>'."\n";
				$out .='<div>'."\n";
				$out .='<h2 class="mainCaption">'.htmlspecialchars_decode(get_theme_mod('mk_slide4_caption')).'</h2>'."\n";
				$out .='<p class="subCaption">'.esc_attr(get_theme_mod('mk_slide4_subcaption')).'</p>'."\n";
				$out .='</div>'."\n";
					if(get_theme_mod('mk_slide_4_button_', true) == true): 
				$out .='<a href="'.esc_url(get_theme_mod('mk_slide4_url', '#')).'" class="btn btn-lg '.get_theme_mod('mk_slider_button','btn-success').'">'.esc_attr(get_theme_mod('mk_slide4_btntext', 'Learn more')).'</a>'."\n";
				endif;
				$out .='</article>'."\n";
				endif;
				$out .='</li>'."\n";
				endif;
				
				 if(get_theme_mod( 'mk_slide_5_image')):
				$out .='<li class="mk-slide-5">'."\n";
				$out .='<img src="'.esc_url( get_theme_mod( 'mk_slide_5_image') ).'" alt="">'."\n";
				if(get_theme_mod('mk_slide_5_show_slide_info', true) == true): 
				$out .='<article>'."\n";
				$out .='<div>'."\n";
				$out .='<h2 class="mainCaption">'.htmlspecialchars_decode(get_theme_mod('mk_slide5_caption')).'</h2>'."\n";
				$out .='<p class="subCaption">'.esc_attr(get_theme_mod('mk_slide5_subcaption')).'</p>'."\n";
				$out .='</div>'."\n";
				if(get_theme_mod('mk_slide_5_button_', true) == true): 
				$out .='<a href="'.esc_url(get_theme_mod('mk_slide5_url', '#')).'" class="btn btn-lg '.get_theme_mod('mk_slider_button','btn-success').'">'.esc_attr(get_theme_mod('mk_slide5_btntext', 'Learn more')).'</a>'."\n";
				endif;
				$out .='</article>'."\n";
				endif;
				$out .='</li>'."\n";
				
				endif;
				endif;
	
	 $out .='</ul>'."\n";
	 
	 /*
	$out .='<nav class="slides-navigation">'."\n";
	$out .='<a href="#" class="next">Next</a>'."\n";
	$out .='<a href="#" class="prev">Previous</a>'."\n";
	$out .='</nav>'."\n";
	*/
	$out .='</div>'."\n";
	$out .='</div>'."\n";
	echo $out;
	
	endif;
	
	}
	
	}
	
	add_action('mk_page_wrapper_before','mk_slider_template');
	
	
	
	
	
	
/**
 * Theme post thumbnail.
 ** Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
 
function mk_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
	<?php the_post_thumbnail('mk-wide');?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
	<?php the_post_thumbnail('mk-wide');?>
	</a>

	<?php endif; // End is_singular()
}

/**
 * Implements custom header feature in our theme
 *
 */
 
 if (function_exists('childtheme_override_lnt_custom_header_feature'))  {
	
	function mk_custom_header_feature() {
			childtheme_override_lnt_custom_header_feature();
		}
	} else {	
 
function mk_custom_header_feature(){

global $post, $wp_query;

// Check to see if the header image has been removed
$header_image = get_header_image();

$img_width = get_custom_header()->width;
$img_height = get_custom_header()->height;
				
$out ='';

if(get_theme_mod( 'mk_show_custom_header_image',true) == true ) :

	$out .='<header class="mk-single-top text-center header-'.strtolower(get_theme_mod( 'mk_blog_layout','classic')).'">'."\n";
	$out .='<span class="mk-single-top-overlay-mask"></span>'."\n";
				
				
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					
			//$out .='<a href="'.esc_url( home_url( '/' ) ).'">'."\n";
			
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
						$thumb = get_post_thumbnail_id();
						$image = wp_get_attachment_url( $thumb,'full' ); 
						$out .='<img class="mk-header-image" src="'.$image.'" alt="'.esc_attr( get_bloginfo( 'name', 'display' )).'" />'."\n";
						
					else :
					
				$out .='<img class="mk-header-image" src="'.get_header_image().'" width="'.get_custom_header()->width.'" height="'.get_custom_header()->height.'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" />'."\n";	
				
				endif;
				
				if(is_home() || is_front_page()){
				$out .='<div class="custom-header-content">'."\n";	
				$out .='<h2>'.esc_attr( get_bloginfo( 'name', 'display' ) ).'</h2>'."\n";	
				$out .='<p>'.esc_attr( get_bloginfo( 'description', 'display' ) ).'</p>'."\n";
				$out .='</div>'."\n";
				}
				elseif (is_single()){
				$out .='<div class="custom-header-content">'."\n";	
				ob_start();
				the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' )."\n";
				mk_posted_on ()."\n";
				mk_entry_footer()."\n";
				$out .= ob_get_clean()."\n";
				$out .='</div>'."\n";		
				}
				elseif (is_archive()){
				$out .='<div class="custom-header-content">'."\n";
				ob_start();				
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				$out .= ob_get_clean()."\n";
				$out .='</div>'."\n";
				}
				elseif (is_page()){
				$out .='<div class="custom-header-content">'."\n";
				ob_start();						
				the_title( '<h1 class="entry-title">', '</h1>' ); 
				$out .= ob_get_clean()."\n";
				$out .='</div>'."\n";
				}
				elseif (is_search()){
				$out .='<div class="custom-header-content">'."\n";	
				$out .='<h1 class="page-title">'."\n";
				ob_start();	
				printf( __( 'Search Results for: %s', 'mk' ), '<span>' . get_search_query() . '</span>' );
				$out .= ob_get_clean()."\n";
				$out .='</h1>'."\n";
				$out .='</div>'."\n";
				}
				elseif (is_404()){
				$out .='<div class="custom-header-content">'."\n";	
				$out .='Page cannot be found';
				$out .='</div>'."\n";
				}
				else{
				$out .='<div class="custom-header-content">'."\n";
				ob_start();						
				the_title( '<h1 class="entry-title">', '</h1>' ); 
				$out .= ob_get_clean()."\n";		
				}
				
			//$out .='</a>'."\n";
		

	$out .='</header>'."\n";
	
	endif; // if show custom header images is true
	
	echo $out;
}

}

//add_action('mk_page_wrapper_before','mk_custom_header_feature');


/**
 * Implements custom favicon html into our header
 *
 */
 
if (function_exists('childtheme_override_mk_custom_favicon'))  {
	
	function mk_custom_favicon() {
			childtheme_override_mk_custom_favicon();
		}
	} else {	
 
function mk_custom_favicon(){

		$str ='';
		
         
		 if(get_theme_mod( 'mk_site_favicon') ):
		 
			$str .='<link rel="shortcut icon" href="'.esc_url( get_theme_mod( 'mk_site_favicon' ) ).'" />'."\n";
			
         endif;
		 
		echo $str ;
		
}
}


add_action('wp_head','mk_custom_favicon',1);

/**
 * hook custom header search inside mk page wrapper
 */
 
 if (function_exists('childtheme_override_lnt_custom_search'))  {
	
	function lnt_custom_search() {
			childtheme_override_lnt_custom_search();
		}
	} else {	
 
 
 function lnt_custom_search(){
 
	?>
	 
	<?php if ( get_theme_mod( 'mk_show_header_search',true) == true ):?>	
	<div id="header-outer">
		<div id="level-nine-search-container"> 
				<div class="row">	
					<div class="col-sm-12 col-md-12">
					<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>/">
						<label for="s" class="screen-reader-text"><?php _e('Search &hellip;','mk');?></label>
						<input type="search" class="search-field" placeholder="<?php _e('Search &hellip;','mk');?>" value="<?php echo trim(get_search_query());?>" id="s" name="s" title="<?php _e('Search &hellip;','mk');?>" />
					</form>		
				</div>			      
			</div>
			 <div id="lnt-close-search-bar"><a href="#">&#215;</a></div>
		</div>
	</div>
<div class="clearfix"></div>	
<?php endif; ;?>
		 
	<?php
 }
 }
 
 add_action('mk_before_wrappers','lnt_custom_search',1);
 
 function mk_add_support_for_ie8(){
 
	 /**
	 * HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
	 */
	 ?>
	<!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri();?>/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/respond.js"></script>
    <![endif]-->
 <?php
 }
 
 add_action('wp_head','mk_add_support_for_ie8',9);
 
 /**
 * Filter the_excerpt to show content in a more ideal way.
 *
 * The way content is shown depends on the priority of a situation:
 *
 * 1. the_content with "Read More" link if the "More" tag is used
 * 2. Manual excerpt with "Read More" link if excerpt is manually entered
 * 3. the_content in its entirety if less than 36 words (nicer than automatic excerpt)
 * 4. Automatic excerpt with "Read More" link if no better situation
 *
 */
 
function mk_excerpt( $excerpt ) {

	global $post;

	$show_excerpt = false;

	// "Read More" text
	/* translators: %s is post title (hidden, for screen readers) */
	$more_text = sprintf(
		__( 'Read More %s', 'mk' ),
		the_title( '<span class="screen-reader-text">&mdash; ', '</span>', false )
	);

	// 1. the_content with "Read More" link if the "More" tag is used, but not password-protected
	// This is first because it is as intentional as manual excerpt but manual excerpt could have other purpose (ie. meta description)
	if ( strpos( $post->post_content, '<!--more-->' ) && ! post_password_required() ) {
		the_content( $more_text );
	}

	// 2. Manual excerpt with "Read More" link if excerpt is manually provided
	elseif ( has_excerpt() ) {
		$show_excerpt = true;
	}

	// 3. the_content in its entirety if less than 200 words, but not password-protected (nicer than automatic excerpt)
	// A nice-looking fallback for when they do not use "more" or manual excerpt, or if only published a media embed
	elseif ( str_word_count( $post->post_content ) < 15 && ! post_password_required() ) {
		the_content();
	}

	// 4. Automatic excerpt if no better situation
	else {
		$show_excerpt = true;
	}

	// Show excerpt with "Read More"
	if ( $excerpt && $show_excerpt ) {

		?>
			<?php
			// Manual or automatic excerpt
			return $excerpt;
			?>
			<p>
				<?php
				// "Read More" linked
				printf(
					'<a href="%1$s" class="more-link" rel="bookmark">%2$s</a>',
					esc_url( get_permalink() ),
					$more_text
				);
				?>
			</p>
 
		<?php

	}

}
add_filter( 'the_excerpt', 'mk_excerpt' );
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 20;
}

/**
 ** Remove width and height attributes in post thumbnail html
 *
 */

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id,$post_thumbnail) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 4 );

