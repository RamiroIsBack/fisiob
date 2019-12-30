<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Market
 */
get_header(); ?>
 
				</div>
			</div>
<!--end / page-title-->


<div class="smallhead">
</div>
<div class="mainblogwrapper">
    <div class="container">
        <div class="row">
            <div class="mainblogcontent">
              
                <div class="col-md-9">
                    <!-- *** Post loop starts *** -->
       <?php 
	  $post_per_page = get_option('posts_per_page');
	  $args = array( 'posts_per_page'  => $post_per_page, 
		'orderby'      => 'post_date', 
		'order'        => 'DESC',
		'post_type'    => 'post',
		'paged' => $paged,
		'post_status'    => 'publish'	
      );
	$query = new WP_Query($args);
	?>
 
                    
                    
                    
 <?php get_template_part('loop', 'index'); ?>
                    <div class="clearfix"></div>

                     
      <div class="pagecount">
       <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(__( 'Next Post <i class="fa fa-long-arrow-right"></i>', 'alum' )); ?>
                        </span> <span class="nav-next">
<?php previous_posts_link(__( '<i class="fa fa-long-arrow-left"></i> Previous Post', 'alum' )); ?>
                        </span> </nav>
      </div>
                     
                    <div class="clearfix"></div>
                    <!-- ***Comment Template *** -->
                   <?php comments_template(); ?>
                     <div class="clearfix"></div>
                    <!-- ***Comment Template *** -->
                </div>
                <div class="col-md-3">
                    <!-- *** Sidebar Starts *** -->
                    <?php get_sidebar(); ?>
                    <!-- *** Sidebar Ends *** -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
