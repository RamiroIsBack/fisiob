/**
 * Theme Customizer
 */

( function( api ) {

	// Extends our custom "hoot-premium" section. ( trt-customizer-pro - custom section )
	api.sectionConstructor['hoot-premium'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


jQuery(document).ready(function($) {
	"use strict";

});
