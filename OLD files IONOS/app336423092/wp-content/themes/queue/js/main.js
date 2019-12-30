var $j = jQuery;
$j(function() {
	adjustsidebarmargin();
});

function adjustsidebarmargin() {
	var titleheight = $j("article.reading .entry-title").height() + 100;
	$j("#secondary").css('margin-top', titleheight + "px");
}