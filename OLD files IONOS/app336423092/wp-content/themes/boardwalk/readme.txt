=== Boardwalk ===

Contributors: automattic
Tags: light, gray, green, white, one-column, responsive-layout, custom-menu, featured-images, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready, holiday, photoblogging

Requires at least: 3.8
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A minimalistic theme with horizontal scrolling.

== Description ==

Boardwalk is a flexible, versatile, and responsive theme designed to show off your content in an unconventional — yet elegant and creative — way.

* Responsive layout.
* Jetpack.me compatibility for Infinite Scroll, Responsive Videos, Site Logo.
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Where can I add widgets? =

Boardwalk includes one optional widget area located behind the menu icon (three horizontal lines) in the header.

= Where is my custom menu? =

Boardwalk's primary menu is tucked behind the menu icon (three horizontal lines) in the header. Click the open menu icon to see it.

= Does Boardwalk have social links? =

You can add links to a multitude of social services in the footer by following these steps:

1. Create a new Custom Menu, and assign it to the Social Links Menu location
2. Add links to each of your social services using the Links panel
3. Icons for your social links will automatically appear in the footer

== Quick Specs (all measurements in pixels) ==

1. The main column width is 624.
2. Featured Images are 2000 wide by 1500 high.

== Changelog ==

= 8 June 2017 =
* Update how theme checks for presence of a post title, so it works with older versions of PHP.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 2 February 2017 =
* remove from CSS in wp-content/themes/pub
* Add forgotten context and gettext function around comma separators for translators.

= 30 January 2017 =
* Replace get_the_tag_list() with the_tags() for a more straightforward approach that prevents potential fatal errors.

= 16 January 2017 =
* Add a class to posts without a title to fix margin-bottom on entry-meta.

= 22 November 2016 =
* Update Featured Image with 2 options for page and post

= 21 November 2016 =
* avoid PHP notice by instantiating a variable before using it.

= 18 November 2016 =
* Add support for Content Options: Featured Image

= 9 September 2016 =
* Add support for Content Options - Post Details Author

= 9 August 2016 =
* Update Headstart URL to a smaller file.

= 21 July 2016 =
* Target link instead of span for the entry-meta
* Fix title margin when date is being hidden by Content Options
* Add support for Content Options

= 22 June 2016 =
* Remove extra style to the site description when custom fonts are active.

= 16 June 2016 =
* Add a class of .widgets-hidden to the body tag when the sidebar is active; allows the widgets to be targeted by Direct Manipulation.

= 14 June 2016 =
* Ensure site content is visible when printing and not hidden under the featured image.
* Attempt to fix height of entry thumbnail when printing.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 18 April 2016 =
* Apply Video Post Format correct style when adding a VideoPress shortcode

= 10 March 2016 =
* Force a page to appear after 5 sconds document is ready to avoid whitescreen of death with hanging JS.

= 4 February 2016 =
* Adding author-bio tag, to keep things in sync with Theme Showcase.

= 20 January 2016 =
* Remove custom PollDaddy styles

= 28 September 2015 =
* Update screenshot

= 22 September 2015 =
* Update wording in Customizer.

= 3 August 2015 =
* Make sure CSS transform has a backward compatibilty for IE9.

= 31 July 2015 =
* Remove .`screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 9 July 2015 =
* Remvoe styles for screen-reader-text hover and active
* Remove css to hide the pin it button and remove screen-reader-text hover and active.
* Boardwalk/Cubic: Add a class of "pace-done" to body when Sharedaddy official sharing buttons are being displayed. By adding this class we manually skip the pace loader and directly display the page.

= 10 June 2015 =
* Boardwalk, Cubic: Adding slideshow gallery images to list of exceptions, so that images won't be wrapped in extra span, breaking the slideshow; Fixes 3191;

= 13 May 2015 =
* Ensure audio player does not overflow the container;

= 12 May 2015 =
* Fix undefined variable error in get image function; we're using $post_id, but called variable was $id. Fixes #3084, props to @kraftbj for the patch

= 6 May 2015 =
* Fix .pace-progress position -- was wrong since the latest update

= 9 April 2015 =
* Add really simple editor style to make sure images fit in the editor screen.

= 8 April 2015 =
* Add a max-width to site-branding and  site-title to make sure it doesn't overflow.
* Make sure pages are also targeted when checking for a featured image.

= 7 April 2015 =
* Remove the widont filter because of the limited space for post/page title in the design.

= 29 March 2015 =
* Update pace.js version and try to fix Pinterest button position.

= 12 March 2015 =
* Better theme option title
* Add Featured Image fallback and theme option to opt-out

= 24 February 2015 =
* Add custom class to post_class() of 'has-post-thumbnail' when it's a password protected post with a featured image.
* Trigger a screen resize when opening the sidebar to make sure that the gallery widget is being displayed

= 15 February 2015 =
* Make sure the logged-out-follow email field is always visible. Ignoring the color annotation and the color contrast.

= 10 February 2015 =
* Fix input/select overflow by adding a max-width

= 30 January 2015 =
* Remove border-bottom from links in the carousel
* Make sure it's only targeting .sd-like when styling the sharedaddy's like

= 16 January 2015 =
* Using an if statement in the customizer script insead of a toggleClass to make sure that child themes (like Cubic) aren't triggering the toggleClass on 1st load.

= 15 January 2015 =
* Add new screenshot and update readme with image credit
* Make sure tables don't overflow in Entry Content.
* Make sure tables don' t overflow
* Reset letter-spacing
* Make sure we don' t add entry-media to entry-content
* Style native core video when it's in a video post format
* Remove border-bottom from core native videos
* Fix VideoPress resizing/margin
* Remove border from linked images
* Remove border-bottom from audio shortcode
* Add style to .caption-big when inside a table
* Don't resize images if they are in a table
* Fix font-weight of related post title
* Fix magin bottom of the facebook widget shortcode
* Fix image min-height issue : target the correct class
* Fix font-size of the entry-content on aside and status post format
* Fix cpation margin-bottom when it's using the big-image class

= 12 January 2015 =
* Add missing comma in the clearings

= 9 January 2015 =
* Fix .entry-footer padding-bottom when not empty

= 8 January 2015 =
* Fix required theme check:
* Add missing rules
* Add class if entry-footer is empty to display it differently
* Remove Byline if hidden
* Remove Entry Footer if empty
* Remove commented php
* Add new theme option to remove the fixed header when scrolling down
* Add a new theme option to keep title with content on single posts and pages
* Update licensing and credits
* Add readme file
* Tweak sidebar-toggle focus status
* Boardwalk Reset the Sidebar Toggle height when resizing the screen to make sure the Site Header height is the right height
* Increase site-logo height and fix .sidebar-toggle height when resizing
* Resize .sidebar-toggle depending on .site-header height

= 7 January 2015 =
* Add an extra css class
* Fix .site-info paddings
* Add a margin-bottom to .image-big
* Ignore recipe images in the big_image() function
* Replace IS handle "+" to a ">"
* Fix password protected pages submit button margin issue
* Add style for jetpack's recipes
* Make sure the image_big() function is ignoring portfolio images
* Have focus state less intense when post has a featured image
* Add title handling for WordPress 4.1+ with backward compatibility
* Stop using boardwalk-full for featured images on single and page template and introduce a new image size
* Remove esc_html() around gettext strings in content*.php templates -- It was bloody useless!
* Introduce 4.1 archive template tags from _s
* New theme option description

= 31 December 2014 =
* Slightly move the first child element of the social navigation to make sure it doesn't display the border on mobile
* Fix taxonomy description
* Add style for pingback
* Fix thumbnail image width on mobile devices

= 30 December 2014 =
* Add pace.js back
* Remove temporary changes
* Temporary reduce site-info font size
* Temporary disable Pace

= 29 December 2014 =
* Reduce author heading font size to match sharedaddy headings
* Fix format chat paragraphs
* Adjust RTL stylesheet:
* Add RTL support
* Fix colour issue between hentry and pagination
* Update tags
* Update screenshot
* Remove margin-bottom from .jetpack-video-wrapper when using Video Post Format

= 25 December 2014 =
* Add style for no comments

= 24 December 2014 =
* Add missing input
* Add style for when a comment is awaiting moderation
* Add input placeholder custom color
* Customise colours of the wpcom's comment form
* Move the Page Links before Sharedaddy
* Tweak outline colors
* Exclude LaTeX images from the image_big() function

= 23 December 2014 =
* Add a -1px margin bottom to the sidebar-toggle to make sure it fits perfectly within the site-header
* Improve accessibility:
* Multiple changes:
* Add a scrollLeft position so when we close the sidebar on the archive, blog or search view, we come back to where the user was
* Tweak site logo and site title

= 22 December 2014 =
* Infinity Scroll only with a click and change the genericon to a "+"
* Fix share-count wrong line-height
* Apply different styles depending on the featured image ratio
* Use min-height instead of height for the featured image to avoid weird resizing
* Remove the device orientation function and simplify the handle of the featured image
* Improve site logo
* Allow escape key to close the sidebar.
* Simplify functions and accessibility
* Add aria-expanded status toggle when .sidebar-toggle is being clicked
* Leave the next-link paddings
* Make sure the paging navigation padding isn't displayed when IS is active
* Clean JS
* Disable Pace to restart on every AJAX request
* Fix wrong margin issue on archive and search pages
* Load color function only when needed
* Move Mousewheel function outside of main script file to only load script when needed and target the body AND the html to make sure it works in Firefox
* Remove content-link and social-nav custom colors

= 19 December 2014 =
* Fix related posts minimal style
* Couple of tweaks for a better color anno

= 18 December 2014 =
* Update and clean font-sizes for a better font annotations
* Fix playlist fonts
* Add style for top rated widget
* Add style for Goodreads and Tag cloud widgets
* Fix ratings line-height
* Add style for Gravatar and Milestone widgets
* Add style for the Flickr widget
* Add style for wpcom lists widgets
* Add style for about.me, akismet and authors widgets
* Add style for the Reblogger
* Add style for PollDaddy
* Take care of the related posts
* Make sure the featured image is full screen on single and page

= 17 December 2014 =
* Prettify comment-form avatar
* Fix comment-form when replying to someone
* Improve Jetpack comments style
* Fix margin on pages when it has an entry-footer
* Boardwalk, update credits.
* Make sure to remove all image attributes to fit perfectly in entry-header + tweak .sd-title font-size
* Import wpcom stylesheet from Sequential -- Will need a lot of tweaks but it gives a base
* Add wpcom.php file and split the registration of Google fonts in 2 so the monspace font can't be dequeue when using Custom Font
* Multiple changes related to Infinite Scroll:

= 16 December 2014 =
* Improve Infinite Scroll functions
* Optimise featured-image min-height function
* Add min-height to featured-image  depending on entry-header height when single or page view
* Update sharedaddy styles and reoarganise/clean stylesheet
* Multiple changes:

= 15 December 2014 =
* Add style for the page links
* Fix page-title font-size and tweak hr color
* Reduce entry-title font-size when phone size
* New hr style and fix not-found pages
* Fix big image js function and css
* Hide .updated
* Add mobile styles for galleries
* New byline output
* Multiple changes:
* New responsive styles for search and archive results -- Fix pagination position
* Increase .site-main margin-top with JS if it's an archive page or a search result page

= 14 December 2014 =
* Add responsive styles to the single entry
* Clean and reorganise stylesheet + Tweak Social Navigation
* Detect the orientation of the device.

= 10 December 2014 =
* Completly remove .infinite-loader
* Add style for responsive paging navigation
* Avoid using Jetpack's RVP to move videos when using the Video Post Format
* New responsive styles

= 9 December 2014 =
* Multiple changes:
* Initial commit of the .org theme

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* jQuery Mousewheel: script by the jQuery Foundation (http://jquery.org/), licensed under [MIT](http://opensource.org/licenses/mit-license.html)
* Pace: script by HubSpot (http://www.hubspot.com/), licensed under [MIT](http://opensource.org/licenses/mit-license.html)
* Images: images by Unsplash (http://unsplash.com/), licensed under [CC0](http://creativecommons.org/choose/zero/)