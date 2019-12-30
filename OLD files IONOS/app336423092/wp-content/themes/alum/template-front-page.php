<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
get_header(); ?>

 <?php  	
	  
	
		$list_featureboxes = array(
			'one' 		=> 'active',
			'two'			=> '',
			 
		);
?>

 <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <?php foreach($list_featureboxes as $key => $value){ ?>
            <div class="item <?php echo($value); ?>">
                <!-- Set the first background image using inline CSS below. -->
                
                
                 
						
						 
							
						
                <div class="fill" style="background-image:url('<?php if(get_theme_mod('alum_header_slider-'.$key.'-file-upload')): echo esc_url( get_theme_mod( 'alum_header_slider-'.$key.'-file-upload' ) ); else: echo get_template_directory_uri(); echo '/img/bg122.jpg'; endif;?> ');">
                 <div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        <div class="col-md-5">
                        	 <div class="alsd">  <h2> <?php if(get_theme_mod('alum_header_slider_'.$key.'_url')): echo esc_html( get_theme_mod( 'alum_header_slider_'.$key.'_url' ) ); else: echo __('Alum', 'alum');  endif;?></h2> <p><?php if(get_theme_mod('alum_featured_textbox_header_slider_'.$key)): echo esc_html( get_theme_mod( 'alum_featured_textbox_header_slider_'.$key ) ); else: echo __('Lorem ipsum dolor sit amet, consectetur adipis elit. Suspendisse venenatis mi et risus fringilla, sit amet posuere rhoncus.', 'alum');  endif;?>	</p> </div>
                      
                       </div>
                        </div>
                        </div>
                </div>
                </div>
             </div>
            
        
            
            
            
             <?php } ?>
            
            
            
       
            
            
            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
     
       <?php  	
	  
	
		$list_featureboxes2 = array(
			'one' 		=> __('Icon 1', 'alum'),
			'two'		=> __( 'Icon 2', 'alum' ),
		'three'		=> __( 'Icon 3', 'alum' ),
			 
		);
?> 
       
         
        
        <div class="section services">
        <div class="container">
                        <div class="row"> 
                        <div class="headline"><h2><?php if(get_theme_mod('alum_maiN_heading')): echo esc_attr( get_theme_mod( 'alum_maiN_heading' ) ); else: echo __('Our Services', 'alum');  endif;?></h2></div>
                          
                          <?php foreach($list_featureboxes2 as $key => $value){ ?>
                          
                            <div class="col-xs-12 col-sm-4">
                                <div class="service">
                                    <span class="sicon">
                                    <i class="fa <?php if(get_theme_mod('alum_header_servicesicon_'.$key.'_url')): echo esc_html( get_theme_mod( 'alum_header_servicesicon_'.$key.'_url' ) ); else: echo "fa-android";  endif;?>"></i>
                                    </span>
                                    <div class="sdetails">
                                        <h4><?php if(get_theme_mod('alum_header_services_'.$key.'_url')): echo esc_html( get_theme_mod( 'alum_header_services_'.$key.'_url' ) ); else: echo __('Mobile Ready', 'alum');  endif;?></h4>
                                        <p><?php if(get_theme_mod('alum_featured_textbox_header_services_'.$key)): echo esc_html( get_theme_mod( 'alum_featured_textbox_header_services_'.$key ) ); else: echo __('Pellentesque sed iaculis urna, faucibus gravida tortor. Sed imperdiet vitae tellus non finibus. Sed in nunc laoreet, rutrum risus.', 'alum');  endif;?></p>
                                    </div>
                                </div>
                            </div>
                            
                             <?php } ?>
                           
                             
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                    </div></div>
        
       
        
        
        
      
        
        
    
  
     
        
        
   
        
        
        
        
                
        
        
        
        

 
 
<?php get_footer(); ?>
