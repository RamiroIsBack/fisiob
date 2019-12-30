jQuery(document).ready(function($) {

	 // Enable flexslider
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: false,
		pauseOnHover: true
    	});

	 // Enable FitVids.js
	$("#content").fitVids();


	// Toggle Comment Form
	$(".comment-reply-title").on("click", function(){

		if ($(".comment-form").is(":hidden")) {
			$(this).toggleClass('active');
			$(".comment-form").slideDown("slow");
			$(".comment-form #comment").focus();
		}
	});

	// Toggle Search Form on Footer
	$(".search-footer").on("click", function(){

		if ($("#search-footer-bar").is(":hidden")) {
			$(this).toggleClass('active');
			$("#search-footer-bar").slideDown("slow");
			$("#search-footer-bar .search-field").focus();
		}
	});


	 // Prettyphoto - for desktops only
	if ($(window).width() > 767) {
		
		// PrettyPhoto Without gallery
			$("a[rel^='lightbox']").prettyPhoto({
				show_title: false,
				social_tools: false,
				slideshow: false,
				autoplay_slideshow: false,
				wmode: 'opaque'
			});
		
		// PrettyPhoto With Gallery
			$("a[rel^='LightboxGallery']").prettyPhoto({
				show_title: false,
				social_tools: false,
				autoplay_slideshow: false,
				overlay_gallery: true,
				wmode: 'opaque'
				
			});
		
	} // END if Prettyphoto - for desktops only


});

/* For Scroll to top button */
   jQuery("#scroll-up").hide();
	if (jQuery(window).width() > 1024) {
   		jQuery( function($) {
   		   $(window).scroll( function() {
   		      if ($(this).scrollTop() > 1000) {
   		         $('#scroll-up').fadeIn();
   		      } else {
   		         $('#scroll-up').fadeOut();
   		      }
   		   });
   		   $('a#scroll-up').click( function() {
   		      $('body,html').animate({
   		         scrollTop: 0
   		      }, 800);
   		      return false;
   		   });
  		 });
	}