<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<div class="smallhead">
</div>
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
 <div class="col-md-12  col-sm-12 ">
        <ol class="breadcrumb ">
          <?php alum_breadcrumbs(); ?>
        </ol>
      </div>
</div>
				</div>
			</div>

<!--Start Content Grid-->
<div class="mainblogwrapper">
    <div class="container">
        <div class="row">
            <div class="mainblogcontent">
             
                <div class="col-md-9">
             
             <div class="article-page">   <?php
                /* Queue the first post, that way we know
                 * what date we're dealing with (if that is the case).
                 *
                 * We reset this later so we can run the loop
                 * properly with a call to rewind_posts().
                 */
                if (have_posts())
                    the_post();
                ?>
                <h1>
                    <?php if (is_day()) : ?>
                        <?php printf(__('Daily Archives: %s', 'alum'), get_the_date()); ?>
                    <?php elseif (is_month()) : ?>
                        <?php printf(__('Monthly Archives: %s', 'alum'), get_the_date('F Y')); ?>
                    <?php elseif (is_year()) : ?>
                        <?php printf(__('Yearly Archives: %s', 'alum'), get_the_date('Y')); ?>
                    <?php else : ?>
                      <?php _e( 'Blog Archives', 'alum' ); ?>  
                    <?php endif; ?>
                </h1></div>
                <?php
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();
                /* Run the loop for the archives page to output the posts.
                 * If you want to overload this in a child theme then include a file
                 * called loop-archives.php and that will be used instead.
                 */
                 
                ?>
                
                
                 <?php get_template_part('loop', 'archive'); ?>
            <div class="clearfix"></div>
                               
      <div class="pagecount">
       <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(__( 'Next Post <i class="fa fa-long-arrow-right"></i>', 'alum' )); ?>
                        </span> <span class="nav-next">
<?php previous_posts_link(__( '<i class="fa fa-long-arrow-left"></i> Previous Post', 'alum' )); ?>
                        </span> </nav>
      </div>
           <div class="clearfix"></div>
                </div>
                <div class="col-md-3">
    <?php get_sidebar(); ?>
</div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
