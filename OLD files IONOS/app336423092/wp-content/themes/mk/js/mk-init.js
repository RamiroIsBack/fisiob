jQuery(function() {

   jQuery('#side-menu').metisMenu();

});


jQuery(document).ready(function(){
			/*
				Header search
			*/

			jQuery("#search-btn, #lnt-close-search-bar").click(function (e) {
            e.preventDefault();
            jQuery('#level-nine-search-container').fadeToggle();
			});
		
			jQuery('#level-nine-search-container input[type="text"]').on('blur', function() {
				 jQuery('#level-nine-search-container').fadeToggle();
			});		
			
			/*
				Post Image hover animation
			*/
			
            jQuery("div.mk-blog-item").mouseenter(function(){
                jQuery(this).addClass("hover");
            })
            .mouseleave(function(){
               jQuery(this).removeClass("hover");
            });
			
		
    });
	
	
	(function($){
			$(window).load(function(){
				
				$(".block__scrollable").mCustomScrollbar({
					theme:"minimal-dark"
				});
				
			});
		})(jQuery);