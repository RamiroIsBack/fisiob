<?php

/**
 * echoes the opening html in mk index. 
 *
 */
 
if (function_exists('childtheme_override_mk_index_open'))  {
	
	function mk_index_open() {
			childtheme_override_mk_index_open();
		}
	} else {	
	
function mk_index_open(){
	
	global $data;
	
	$layout = get_theme_mod( 'mk_blog_layout','classic');
	
	$return	='';
	
	if($layout == 'grid'){
	$return	.='<div class="row">'."\n";
	$return	.='<div class="col-sm-12 col-md-12">'."\n";
	$return	.='<div class="mk-blog-items-wrap">'."\n";
	}elseif($layout == 'alternative'){
	$return	.='<div class="row row-no-gutter">'."\n";
	$return	.='<div class="col-sm-12 col-md-12">'."\n";
	$return	.='<div class="mk-blog-archives-alternative clearfix">'."\n";	
	}else{
	$return	.='<div class="row top40">'."\n";
	$return	.='<div class="col-sm-offset-1 col-sm-10 col-md-10 mk-archives">'."\n";	
	$return	.='<div id="content" class="content">'."\n";
	}
	
	echo apply_filters( 'filter_mk_index_open', $return );

	}
	}
	
/**
 * echoes the closing html in mk index. 
 *
 */	
 
 if (function_exists('childtheme_override_mk_index_close'))  {
	
	function mk_index_close() {
			childtheme_override_mk_index_close();
		}
	} else {	
	
function mk_index_close(){
	
	$return	='';
	$return	.='</div>'."\n";
	$return	.='</div>'."\n";
	$return	.='</div>'."\n";
	
	echo apply_filters( 'filter_mk_index_close', $return );

	}
	}
	
/**
 * Custom Page Pagination
 *
 */	
 
 if (function_exists('childtheme_override_mk_page_navi'))  {
	
	function mk_page_navi() {
			childtheme_override_mk_page_navi();
		}
	} else {	
	
	function mk_page_navi(){
	
	global $data, $post ,$wp_query;
	
	$layout = strtolower(get_theme_mod( 'mk_blog_layout','classic'));
	
	$out ='';
	$out .='<div class="clearfix"></div>'."\n";
	$out .='<div class="pagination-wrapper '.$layout.'-pagination text-center">'."\n";
	
	if (function_exists('wp_pagenavi')):
	
	$out .= wp_pagenavi()."\n";
	
	else: 
	$out .='<div class="pagination-wrap">'."\n";
	$out .= mk_pagenavi($wp_query)."\n";									
	$out .='</div>'."\n";
	endif; 
	$out .='</div>'."\n";
	
	echo $out;
	
	}
	}