 <!-- Footer -->
        <footer id="footer">
        <div id="footer-main">
          <div class="container">
            <div class="row">
            <?php if (!dynamic_sidebar('footer-sidebar')) : ?>
              <div class="col-md-3 col-sm-6 ft-box">
                <h2 class="title">
                
                <?php  
							echo __('Arinio', 'alum'); 
					 ?>
                 
               </h2>
               
               
               
                <p><?php   echo __('Nulla euismod malesuada lectus, non condimentum tellus commodo eu. Curabitur eget sapien arcu. Vivamus ut facilisis lectus. Curabitur velit neque.', 'alum');   ?></p>
                 
              </div>
              <div class="col-md-3 col-sm-6 ft-box">
                <h2 class="title"><?php   echo __('Contact', 'alum');   ?></h2>
                <div class="iboxes">
                  <div class="ibox">
                    <div class="icon icon-wrap">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="content"><?php   echo __('4567 Street name,
                      <br>
                      012 12 City name, Country', 'alum');   ?> 
                    </div>
                  </div>
                   
                   
                   
                </div>
              </div>
              <div class="col-md-3 col-sm-6 ft-box social-box">
                <h2 class="title"><?php   echo __('Recent Post', 'alum');   ?> </h2>
                <div class="iboxes">
                  
                  
                 
                  
                  
                  
                  
                  
                   
                   <ul class="sparrow">
         <?php
						$args = array(
							'numberposts' => 5,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post',
							'post_status' => 'draft, publish, future, pending, private',
						);
						$recent_posts = wp_get_recent_posts($args);
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
						}
						?>
        </ul>
                     

                
                  
                </div>
              </div>   
              <div class="col-md-3 col-sm-6 ft-box">
                <h2 class="title"><?php    echo __('Sample Content', 'alum'); ?></h2>
                <p><?php   echo __('Pellentesque at tristique urna, ac finibus quam. Aenean nibh nunc, gravida at venenatis vel, cursus ut arcu. Maecenas maximus enim et ex mattis elementum. Sed a eros congue, scelerisque lorem nec, hendrerit.', 'alum');   ?> </p>
                
              </div>
              
               <?php endif; // end primary widget area  ?>
              
            </div>
          </div>
        </div>
        <div id="footer-copyright">
          <div class="container">
            <div class="row">
            
            
            <div class="col-md-6 avfoo">
             <p><?php if(get_theme_mod('copyright_text')): echo esc_attr( get_theme_mod( 'copyright_text' ) ); else: echo __('Copyright &#169; 2015 All Rights Reserved.', 'alum');  endif;?> </p>
                <p>
<?php _e('Powered by','alum'); ?> <a href="<?php echo esc_url( 'http://wordpress.org' ); ?>" rel="nofollow"><?php _e('WordPress','alum'); ?></a>. <?php _e('Theme by','alum'); ?> <a href="<?php echo esc_url( 'http://arinio.com' ); ?>" rel="nofollow"><?php _e('Arinio','alum'); ?></a>
                  </p>
            </div>
            
            
            
            
              <div class="col-md-6">
                
                <nav class="navbar navbar-default" role="navigation">
									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
											<span class="sr-only"><?php _e( 'Toggle navigation', 'alum' ); ?></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>   
									<div class="navbar-collapse collapse" id="navbar-collapse-2" style="height: 1px;">
										
                                        <?php if ( has_nav_menu( 'secondary' ) ) : ?>
 
		<?php wp_nav_menu( array( 'theme_location' => 'secondary','menu_class' => 'nav navbar-nav nkkl navbar-right','depth'=>-1 ) ); ?>
	 
	<?php endif; ?>
                                            
									</div>
								</nav>
                
                
              </div>
            </div>
          </div>
        </div>
      </footer>
<!--end / footer-->

 


 

<!--++++++++++++++ Footer Section End +++++++++++++++++++++++++-->
 

<?php wp_footer(); ?>
</body></html>