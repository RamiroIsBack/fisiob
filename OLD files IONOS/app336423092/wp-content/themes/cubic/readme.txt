=== Cubic ===

Contributors: automattic
Tags: light, blue, gray, white, one-column, responsive-layout, custom-menu, featured-images, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready, holiday, photoblogging

Requires at least: 3.8
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A minimalistic square theme.

== Description ==

Cubic is a single-column, grid-based theme with large featured images, perfect for photoblogging.

* Responsive layout.
* Jetpack.me compatibility for Infinite Scroll, Responsive Videos, Site Logo.
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Where can I add widgets? =

Cubic includes one optional widget area located behind the menu icon (three horizontal lines) in the header.

= Where is my custom menu? =

Cubic's primary menu is tucked behind the menu icon (three horizontal lines) in the header. Click the open menu icon to see it.

= Does Cubic have social links? =

You can add links to a multitude of social services in the footer by following these steps:

1. Create a new Custom Menu, and assign it to the Social Links Menu location
2. Add links to each of your social services using the Links panel
3. Icons for your social links will automatically appear in the footer

== Quick Specs (all measurements in pixels) ==

1. The main column width is 624.
2. Featured Images are 2000 wide by 1500 high.

== Changelog ==

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 27 April 2017 =
* Set default Infinite Scroll post per page to 9 instead of 7 to stick with square grid

= 22 March 2017 =
* add Custom Colors annotations directly to the theme

= 2 March 2017 =
* Update headerstart images to make sure they're all large enough.

= 2 January 2017 =
* Add `grid-layout` tag to style.css.

= 3 November 2016 =
* Add Headstart translations.

= 8 August 2016 =
* Update attachment URLs to smaller images.

= 21 July 2016 =
* Remove enqueue script function unneeded, we can simply call the parent function and it will load the right stylesheet

= 22 June 2016 =
* Remove extra style to the site description when custom fonts are active.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 18 April 2016 =
* Apply Video Post Format correct style when adding a VideoPress shortcode.

= 10 March 2016 =
* Force a page to appear after 5 sconds document is ready to avoid whitescreen of death with hanging JS.

= 20 January 2016 =
* Remove custom PollDaddy styles

= 27 November 2015 =
* Define more standard CSS properties for the Featured Image. `initial` is too clever for Internet Explorer.

= 28 September 2015 =
* Update screenshot

= 20 August 2015 =
* Add text domain and/or remove domain path.

= 15 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 9 July 2015 =
* Boardwalk/Cubic: Add a class of "pace-done" to body when Sharedaddy official sharing buttons are being displayed. By adding this class we manually skip the pace loader and directly display the page.

= 10 June 2015 =
* Adding slideshow gallery images to list of exceptions, so that images won't be wrapped in extra span, breaking the slideshow; Fixes 3191;

= 7 April 2015 =
* Update screenshot to 1200x900

= 14 March 2015 =
* Make sure Page Header doesn't use the fixed position from Boardwalk
* Fix Page Header position when Site Header is sticky
* Add support for Infinite Scroll (type: scroll)

= 12 March 2015 =
* Remove Featured Image fallback -- It's part of Boardwalk now

= 10 March 2015 =
* fix variable name in conditional
* Reinstating [24585] with a minor edit
* revert r24585. Breaking for posts without any images.
* add featured image fallback to index view

= 8 March 2015 =
* Update license uri

= 24 February 2015 =
* Trigger a screen resize when opening the sidebar to make sure that the gallery widget is being displayed.
* Fix page-header issue on archive/search page when unfixed header theme option is ticked

= 15 January 2015 =
* Add new screenshot and update readme with image credit
* Make sure tables don't overflow in Entry Content.
* Make sure tables don't overflow
* Make sure we don't add entry-media to entry-content
* Style native core video when it's in a video post format
* Fix VideoPress resizing/margin
* Make sure thumbnails aren't squashed when they are too small
* Remove border from linked images
* Don't resize images if they are in a table
* Fix image min-height issue: target the correct class
* Fix line-height for the title in index/archive view

= 14 January 2015 =
* Add RTL stylesheet
* Update readme's dscription
* Add language file
* Add readme file (description will need changes)
* Introduce new breakpoint to display 3 squares on a same row -- previous breakpoint was making squares too small and not really readable
* Fix typo

= 13 January 2015 =
* Add screenshot
* Update description
* Rename theme (was previously Square)

== Credits ==

* Images: images by Unsplash (http://unsplash.com/), licensed under [CC0](http://creativecommons.org/choose/zero/)