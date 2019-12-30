/**
 * Custom jQuery scripts
 */

		jQuery(document).ready(function(){
		  jQuery('.bxslider').bxSlider({
		  	adaptiveHeight: true
		  });
		});
		
		jQuery(document).ready(function(){
		  jQuery('.post-slider').bxSlider({
		    minSlides: 2,
		    maxSlides: 3,
		    slideWidth: 350,
		    slideMargin: 30,
		    moveSlides: 3,
		    infiniteLoop: false,
		    pager: false
		  });
		});
		
		jQuery(function(){
			jQuery('.nav-menu').slicknav({
			});
		});
		
		if ( js_param.head_hover == true ) {
			jQuery(document).ready(function() {
				jQuery(".site-header").mousemove(function(e) {
					var offset = jQuery(this).offset();
					var W = e.pageX - offset.left;
					var H = e.pageY - offset.top;	
					jQuery('#header-image').animate({top: -H/20, left: -W/20}, {duration: 50, queue: false, easing: 'linear'});
				});
			});
		}
		
		if ( js_param.social	===	'' ) {
			jQuery(document).ready(function() {
					jQuery('#search-bar').show();
					jQuery('#social-icons').hide();
					jQuery( '.search-icon' ).css('pointer-events','none');
				});
		} else {
			jQuery(document).ready(function() {
				jQuery('#search-bar').hide();
				jQuery('#social-icons').show();
				var h = jQuery('#search-wrapper').height();
				jQuery('.search-icon').click( function() {
					jQuery('#search-bar').slideToggle();
					jQuery('#social-icons').slideToggle();
				});
			});
		}