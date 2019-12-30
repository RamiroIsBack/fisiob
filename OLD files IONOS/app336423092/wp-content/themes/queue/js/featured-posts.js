var $j = jQuery;
$j(function() {
	$j(window).resize(function() {
		fillcontainer();
	});

	$j(".clickableblock img").load(function() {
		fillcontainer();
	});
});

function fillcontainer() {
	$j(".clickableblock img").each(function() {
		if (imageiswiderthancontainer($j(this))) {
			$j(this).css({'width': 'auto', 'height': '100%'});
		}
		else {
			$j(this).css({'width': '100%', 'height': 'auto'});
		}
	});
}

function imageiswiderthancontainer(img) {
	var container = $j(img).parent();
	var imgratio = $j(img).width() / $j(img).height();
	var containerratio = $j(container).width() / $j(container).height();

	if (imgratio > containerratio) {
		return true;
	}
	else {
		return false;
	}
}