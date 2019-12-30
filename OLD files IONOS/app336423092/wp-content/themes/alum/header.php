<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

 

 
 
   <?php wp_head(); ?> 
   
</head>
<body <?php body_class(); ?> id="pageBody">


 



  <!-- Navigation -->
    <nav class="navbar header navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php _e( 'Toggle navigation', 'alum' ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
               <?php if(get_theme_mod('alum_logo')): ?> 
			   <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo '<img src="'.esc_url( get_theme_mod( 'alum_logo' ) ).'">'; ?> </a>
			   <?php  else:  ?>  
			      <a class="navbar-brand" id="divSiteTitle" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo bloginfo('name');?> </a> <br> <a href="" class="desnav" id="divTagLine"> <?php echo bloginfo('description'); ?></a> 
               
                <?php endif; ?> 
                    
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
               
               <?php 
			$defaults = array(
					'theme_location'  => 'primary',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="nav" class="nav navbar-nav navbar-right">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
					);
			wp_nav_menu($defaults); ?>
               
              
               
               
                 
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

