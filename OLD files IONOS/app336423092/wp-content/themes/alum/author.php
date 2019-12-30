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
                    <!-- *** Post loop starts *** -->
                   <div class="article-page">
                <?php
                 
                if (have_posts())
                    the_post();
                ?>
                <h1><?php printf(__('Author Archives: %s', 'alum'), "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); ?></h1>
                <?php
                // If a user has filled out their description, show a bio on their entries.
                if (get_the_author_meta('description')) :
                    ?>
                    <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('alum_author_bio_avatar_size', 60)); ?>
                    <h2><?php printf(__('About %s', 'alum') . get_the_author()); ?></h2>
                    <?php the_author_meta('description'); ?>
                <?php endif; ?>
                </div>
                <?php
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();
                /* Run the loop for the author archive page to output the authors posts
                 * If you want to overload this in a child theme then include a file
                 * called loop-author.php and that will be used instead.
                 */
                 
                ?>
             <?php get_template_part('loop', 'author'); ?> 
                
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
