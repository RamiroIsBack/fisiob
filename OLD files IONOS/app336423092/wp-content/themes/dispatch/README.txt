=== Dispatch ===
Contributors: wphoot
Tags: one-column, two-columns, left-sidebar, right-sidebar, custom-background, custom-colors, custom-menu, custom-logo, featured-images, footer-widgets, full-width-template, microformats, sticky-post, theme-options, threaded-comments, translation-ready, blog, e-commerce, news
Requires at least: 4.0
Tested up to: 5.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Dispatch is a responsive WordPress theme with a bold modern design.

== Description ==

Dispatch is a responsive WordPress theme with a bold modern design. For more information about Dispatch please go to https://wphoot.com/themes/dispatch/ Theme support is available at https://wphoot.com/support/ You can also check out the theme instructions at https://wphoot.com/support/dispatch/ and demo at https://demo.wphoot.com/dispatch/ for a closer look.

== Frequently Asked Questions ==

= How to install Dispatch =

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in 'Dispatch' in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.

= How to get theme support =

You can look at the theme instructions at https://wphoot.com/support/dispatch/ To get support beyond the scope of documentation provided, please open a support ticket via https://wphoot.com/support/

== Changelog ==

= 4.8.5 =
* # Hoot Framework 2.1.20 #
* Add gravatar to loop meta for authors

= 4.8.4 =
* # Hoot Framework 2.1.20 #
* Internal Version. Not Released

= 4.8.3 =
* # Hoot Framework 2.1.20 #
* Update ul.wp-block-gallery css for WP 5.3 compatibility
* Added HTML5 Supports Argument for Script and Style Tags for WP 5.3
* Added semibold option for typography settings
* CSS fix for sortitem checkbox input in customizer
* CSS fix for woocommerce message button on small screen (ticket#4621)
* Upgrade logo-with-icon from Table to Flexbox

= 4.8.2 =
* # Hoot Framework 2.1.20 #
* Internal Version. Not Released

= 4.8.1 =
* # Hoot Framework 2.1.20 #
* Accessibility Improvements: Skip to Content link fixed
* Accessibility Improvements: Keyboard Navigation improved (link and form field outlines, improved button focus visual)
* Removed min-width for grid (mobile view)
* Fix iframe and embed margins in wp embed blocks
* Fix label max-width for contact forms to display properly on mobile

= 4.8.0 =
* # Hoot Framework 2.1.20 #
* Remove shim for the_custom_logo
* Fix: Inline menu display css fix with mega menu plugin
* Apply filter on arguments array for the_posts_pagination
* Add help link to One Click Demo documentation
* Replace support for HootKit with OCDI plugin
* Updated customizer interface to use trt-customize-pro

= 4.7.8 =
* # Hoot Framework 2.1.20 #
* Removed One Click Demo for compatibility with TRT guidelines
* Removed admin_list_item_count limit
* CSS fix: last menu item dropdown
* Added missing argument for 'the_title' filter to prevent error with certain plugins
* Sanitize output of paginate_links before echoing
* Remove shim for the_custom_logo

= 4.7.7 =
* Internal Version. Not Released

= 4.7.6 =
* # Hoot Framework 2.1.20 #
* Added sortable capability to widgets group type

= 4.7.5 =
* # Hoot Framework 2.1.20 #
* Added support for 'inherit' value in css sanitization for dynamic css build
* Bug fix for 'box-shadow' property in css sanitization for dynamic css build
* Bug fix by unsetting selective refresh from passing into $settings array in customizer interface builder

= 4.7.4 =
* # Hoot Framework 2.1.20 #
* Added the new 'wp_body_open' function
* Improved dynamic css for ajax login form

= 4.7.3 =
* # Hoot Framework 2.1.20 #
* Added Tribe 'The Events Calendar' plugin support - template fixes
* Improved logic for hoot_get_mod function

= 4.7.2 =
* # Hoot Framework 2.1.19 #
* Add css support for Gutenberg gallery block
* Sanitize debug data for logged in admin users

= 4.7.1 =
* Internal Version. Not Released

= 4.7.0 =
* # Hoot Framework 2.1.19 #
* Fix <!--default--> content for postfooter in new theme installations
* Removed older IE css support
* Fixed Color class name
* Removed minified script/style from admin
* Add support for selective refresh in customizer settings
* Added HootKit support
* One click demo import support added (via HootKit plugin)
* Updated welcome page to help users with OCDI
* Added TGMPA library to recommend HootKit

= 4.6.6 =
* # Hoot Framework 2.1.18 #
* Improved 404 handeling using default wordpress template
* 404 template update
* Fix: Jetpack lazy load exception for slider images
* Update schema links from http:// to https://
* Add helper messages to sidebars
* Remove document title filters (not needed for new wp versions)
* Remove archive description filter (not needed for new wp versions)
* Update Wordpress to WordPress for display in enum sets
* Sortlist - add otpion for default open (custom module)

= 4.6.3 =
* # Hoot Framework 2.1.17 #
* Improved headings for better SEO
* Added 'loop_meta_displayed' flag
* Escaped custom site_info (post footer content)
* Fixed google font url syntax
* Fixed review url
* Added open state to customize sortlist, added radio/radioimage option to sortlist items
* Removed $global variable for base directory path (error on some servers)
* Added limit constraint to group type in widgets
* Set default grid to max choice available for calculating image size
* Improved enum font size function
* Updated get_temrs (taxonomy) args for latest WP version in widgets admin

= 4.6.2 =
* # Hoot Framework 2.1.16 #
* Minor js bug fix to work with Page Builder plugin

= 4.6.1 =
* # Hoot Framework 2.1.16 #
* Use SCRIPT_DEBUG to define HYBRIDEXTEND_DEBUG
* Remove empty div containers if no slider to show (widgetized template)
* Add filters for titles in included widgets
* Add Privacy Policy page (if defined) to default Post Footer text - GDPR compliance
* Add 'hoot_searchresults_hide_pages' filter instead of global variable
* Add hook to filter google font query

= 4.6.0 =
* # Hoot Framework 2.1.16 #
* Fixed CSS class for Widgetized Template Page Content (when set to static Page)
* Content Block Page widget - excerpt length option
* Improved implementation of Widget Margin option
* Remove Edit link from Meta information in non archive and non singular context
* Register sidebars even when not displayed (added a note message to inform users)
* Fixed: Widget color options display hexa input field
* Fixed: Widget color option in customizer screen not responsive when widget added for first time
* 'startwrap' option (css class) for customizer group types
* Load minified assets (admin) in customizer screen if available
* Improved customizer css (admin) styles
* Improved Framework constants

= 4.5.4 =
* # Hoot Framework 2.1.15 #
* Removed redundant update_browser notification
* Pass type argument for lite_slider filter hook
* Allow style builder to store dynamic css as variable (for external stylesheet plugin)
* Add hooks to modify query hooks for content block widgets

= 4.5.3 =
* # Hoot Framework 2.1.15 #
* Added backward compatibility for font icons for plugins using older version (missing font names)

= 4.5.1 =
* # Hoot Framework 2.1.15 #
* Updated Font Awesome Version for Enqueue

= 4.5.0 =
* # Hoot Framework 2.1.15 #
* Updated Font Awesome Library 5.0.10
* CSS fix for Comment Respond Form checkboxes
* Updated woocommerce template (archive-product) to v3.4.0
* Removed redundant Customizer Premium upsell code
* Jetpack Infinite Scroll fix

= 4.4.5 =
* # Hoot Framework 2.1.14 #
* Add 'current' status to individual slides during render
* Hide empty entry-byline block when nothing to show
* Allow social profile enum to skip skype and email when not needed
* Fix link and link hover color css for footer

= 4.4.4 =
* # Hoot Framework 2.1.14 #
* Fixed menu hover z-index css
* Remove override mod value filter from hoot_get_mod function

= 4.4.2 =
* # Hoot Framework 2.1.14 #
* Minor fix for Customizer screen

= 4.4.1 =
* # Hoot Framework 2.1.14 #
* Prefixed filter names in various files
* Fix: font awesome version number for enqueue
* Fix: Customizer CSS for latest WP version

= 4.3.6 =
* # Hoot Framework 2.1.14 #
* Content Block widgets - Add option for no content/excerpt
* Loop meta - Add context for attributes (update attributes accordingly)
* Dynamic Icon alignment for Custom Logo Lines

= 4.3.5 =
* # Hoot Framework 2.1.14 #
* Apply 'the_excerpt' filter to hybridextend_get_excerpt
* Widgets - Fix standard value bug for collapse, group and checkbox

= 4.3.4 =
* # Hoot Framework 2.1.13 #
* Add arguments to action hooks in content block widgets
* Fix: Conditional tag for meta info on static page set as frontpage
* Fix: Hide background button for Slider modules in Customizer
* Pass widget values to global variable (including widget id)
* Fix: z-order for flygroup and flyicon windows in Customizer

= 4.3.3 =
* # Hoot Framework 2.1.13 #
* Load dynamic styles (theme/woocommerce) before child theme stylesheet
* Fix: Wiget Module Accent background
* Added extra parameters to image size filter for content block (pages/posts) widgets
* Slider module background option
* Added support for vk.com social site

= 4.3.1 =
* # Hoot Framework 2.1.13 #
* Hide meta info display container when nothing to show

= 4.3.0 =
* # Hoot Framework 2.1.13 #
* Content Blocks Post widget: Add offset and custom excerpt length options
* Widgets css options: Display Widget ID
* Use div instead of h1 for site logo on non front pages

= 4.2.3 =
* # Hoot Framework 2.1.12 #
* CSS: Added Elementor plugin compatibility
* CSS: Prefix grid and column classes

= 4.2.2 =
* # Hoot Framework 2.1.11 #
* Remove 'array_replace_recursive' from edit functions (customizer class) for PHP<5.3 compatibility
* Add 'get_search_query' to search form
* Updated hook names to use hoot prefix
* Multiple data sanitization
* Add 'Content Block (Posts)' widget
* Add custom css option to hoot widgets
* Add minified files for all admin js/css
* Remove global $post mod (for pricetable plugin - wpalchemy)

= 4.2.1 =
* # Hoot Framework 2.1.10 #
* Fix: Dont enqueue google font style if no google font selected
* Fix: Use relative path to find upload attachment id from url - fix when images have same name in different folders
* Fix: Wordpress admin bar position for logged in users on mobile
* Fix: Missing strings from .pot file (added functions like esc_html__ etc)

= 4.2.0 =
* # Hoot Framework 2.1.9 #
* Dont enqueue google font style if no google font selected
* Read More and Excerpt length do not affect admin style
* Post pagination appears in archive view
* Fixed namespace for 'frontpage_slider' filter
* Updated Font Awesome library

= 4.1.12 =
* # Hoot Framework 2.1.8 #
* Add support for new woocommerce product display slider (and zoom)
* Bug Fix: Slider images code for older PHP versions (intval inside empty function)

= 4.1.11 =
* # Hoot Framework 2.1.8 #
* Bug Fix: Display slider images (find upload attachment id) when image domain is different (example: cdn)

= 4.1.10 =
* # Hoot Framework 2.1.8 #
* Bug Fix: Content block bug fix from previous version

= 4.1.9 =
* # Hoot Framework 2.1.8 #
* Sliders - Use attachment id to display images (alt tags shown)
* Content Block - Change query structure to make it polylang compatible

= 4.1.8 =
* # Hoot Framework 2.1.7 #
* Woocommerce Fix: Clear floats for related and upsell
* Archive pages - Link images to post

= 4.1.7 =
* # Hoot Framework 2.1.7 #
* Add actions to content box widgets
* Woocommerce shop page css fix for first product
* Display Logo action gets logo variable argument

= 4.1.5 =
* # Hoot Framework 2.1.7 #
* Fix minified stylesheet for '>'
* Added span class to loop title suffix

= 4.1.4 =
* # Hoot Framework 2.1.7 #
* Typography customizer control - css fix for firefox
* Multiple Fixes

= 4.1.3 =
* # Hoot Framework 2.1.7 #
* Custom images added at priority 0 instead of 5 ('init' hook) to work with 'Simple Image Sizes' plugin (hooked to 'init' at priority 1 and 2)
* Mobile Menu - Option for dropdown and left slide menu

= 4.1.2 =
* # Hoot Framework 2.1.7 #
* Added version number to woocommerce templates (needed for WC compatibility)
* Removed woocommerce_boxcontent compatibility

= 4.1.1 =
* # Hoot Framework 2.1.7 #

= 4.1.0 =
* # Hoot Framework 2.1.7 #
* Wordpress 4.7 compatible
* Updated framework and customizer skin
* Bugfix: use cache after post reset (after wp_query)
* Added upsell page

= 3.0.4 =
* # Hoot Framework 2.1.3 #
* Bug Fix: Woocommerce products shortcode display css (columns) was being overridden by theme css
* Bug Fix: Woocommerce shop column fixed

= 3.0.3 =
* # Hoot Framework 2.1.3 #
* Several bug fixes and CSS fixes
* [Hoot] Updated Customizer Upload/Image CSS for WPv4.6
* Added CSS classes, hooks
* Moved several class/id attributes to hoot_attr function for child theme compatibility
* WooCommerce options bugfix when no value selected by user

= 3.0.2 =
* # Hoot Framework 2.1.1 #
* Added text logo size select option
* Bug Fix: Fixed priorities of customizer options

= 3.0.1 =
* # Hoot Framework 2.1.1 #
* Removed deprecated functions and hooks

= 3.0 =
* # Hoot Framework 2.1.0 #
* Added various action and filter hooks
* Added multipurpose custom-blogposts template to display blog posts
* Added hoot_attr to several hard coded classes (to allow modification using child themes)
* Added 'Blog Posts' module to Widgetized Template
* Added Jetpack infinite scroll css
* [Hoot] Added Smallselect, Image Upload and Color option type to widgets
* [Hoot] Improved hoot_locate_* functions
* [Hoot] Load main script.js after custom user scripts (loaded at default priority 10)
* [Hoot] Register and enqueue scripts using hoot_get_scripts()
* [Hoot] Automatically load child themes's main script.js if present (similar to style.css)
* [Hoot] Improved Customizer CSS
* [Hoot] Improved Customizer Sortlist custom option type
* [Hoot] Added a unique 'identifier' option to Group custom option type for Customizer
* [Hoot] Added 'sublabel' to most custom option types for Customizer

= 2.2.8 =
* # Hoot Framework 2.0.2 #
* Added several filters and action hooks
* Added several classes
* Fix: Load rtl style if current locale is RTL

= 2.2.6 =
* # Hoot Framework 2.0.2 #
* Fix: Skype social profile link behavior
* Slider image attributes can be customized using hoot_get_attr()

= 2.2.4 =
* # Hoot Framework 2.0.2 #
* Woocommerce Template Tweaks

= 2.2.3 =
* # Hoot Framework 2.0.2 #
* Support for WordPress Logo Option
* 'loop_pretitle_singular' filter
* Social Icons Widget context

= 2.2.2 =
* # Hoot Framework 2.0.2 #
* Jetpack infinite scroll support
* Localize theme script function hooked to action separately (allows child themes to replace it easily)
* Apply full width classes to Widgetized Template
* Hide title area on static frontpage (not using Widgetized Template)
* Add filter for slider content/settings

= 2.2.1 =
* # Hoot Framework 2.0.2 #
* Fix: Woocommerce sidebar hook name
* Added: Filters for default search input text and placeholder
* Added: Several classes and ids, Improved attributes for widgets and plugin support
* Added: Hooks to modify image and html slider content

= 2.2 =
* # Hoot Framework 2.0.2 #
* Added: Before main and after main action hooks
* Fix: Woocommerce loop meta hide function encapsulated
* Fix: Migration was not happening in certain cases
* Fix: Customizer textarea sanitization

= 2.1 =
* # Hoot Framework 2.0.1 #
* Fix Template Name Constant value

= 2.0.2 =
* # Hoot Framework 2.0.0 #
* Fixed content background option ID

= 2.0.1 =
* # Hoot Framework 2.0.0 #
* Revert content background option to betterbackground

= 2.0 =
* # Hoot Framework 2.0.0 #
* Fix woocommerce-sidebar class added only on woocommerce pages
* Theme Options replaced with customizer
* Multiple new actions and filters
* Multiple bug fixes and updates

= 1.5 =
* # Hoot Framework 1.1.10 #
* Woocommerce compatibility
* Bug Fix - Registered image sizes array (crop/nocrop) was not sorted in increasing width size
* lightSlider Bugfix - Images slide when only one slide available
* lightSlider Bugfix - Remove numbers from pager (shows up in google search results)
* Bug Fix - CSS Sanitiaztion for colors and backgrounds
* Add current year tag for copyright text in post footer
* Add filter for image size used in content and hoot_post_thumbnail()

= 1.4 =
* # Hoot Framework 1.1.9 #
* Removed deprecated constructor method for WP_Widget in extended class
* HTML Slider - Firefox bug (images dont follow max-width inside inline-block)
* HTML Slider - Improved mobile view for captions/description
* Image Slider - Improved mobile view for captions/description
* Reduce to a single text domain

= 1.3 =
* # Hoot Framework 1.1.81 #
* Always show 'Read More' link for excerpt (when excerpt smaller than length)
* Enable 'Excerpts' for pages (to be used in Content Block widget)
* Improved structured data (microformat)
* Bug Fix: Language folder path
* Add filters to hoot_meta_info_blocks
* Content Block Widget improvements (custom link overrides default Read More link of excerpts)
* Separate meta info display options for Posts and Pages

= 1.2.1 =
* # Hoot Framework 1.1.71 #

= 1.2 =
* # Hoot Framework 1.1.71 #
* lightSlider Bugfix - Auto play bug when images exist in browser cache (jquery load event)
* lightSlider Added Responsive Option

= 1.1.5 =
* # Hoot Framework 1.1.71 #
* Added Widget sanitization functions

= 1.1.4 =
* # Hoot Framework 1.1.71 #
* Added support for Jetpack Gallery and Carousel
* Reset Query before page content on Widgetized Template

= 1.1.3 =
* # Hoot Framework 1.1.71 #
* Add individual slide classes to lightslider slides
* Improved Default Site Credits in post footer
* Minor CSS updates
* Add Parent Theme Version constant
* Add theme support for Post Thumbnail for all post types

= 1.1 =
* # Hoot Framework 1.1.61 #
* Content Block Widget - Improve image display for style4
* Removed do_shortcode filter for WordPress Text Widget
* CTA widget uses Page for content
* Improved sanitization for dynamic CSS rules
* Improved Nested Lists
* Several minor bug fixes
* Escape slide caption, content and title in slider (html/image)
* Support .screen-reader-text class instead of .assistive-text
* Modified footer credit link

= 1.0 =
* # Hoot Framework 1.1.5 #
* Add slide link to image slider
* Allow Child Themes to use similar theme Slug to preserve Theme Options settings
* Do shortcode to WordPress Text Widget
* Content Block Widget - Add URL field
* Custom Menu CSS for Topbar
* Add Caption field for Image Slider
* Social Links open in a new tab
* Search Results bug fix when showing Pages in results
* Content Block Widget - Add option to use excerpts instead of full content
* Updated Light Slider plugin to latest version
* Added widget support for SiteOrigin Page Builder plugin

= 0.90 =
* # Hoot Framework 1.1.3 #
* Initial release.

== Upgrade Notice ==

= 4.7.0 =
* This is the officially supported stable release version. Please update to this version before opening a support ticket.

== Resources ==

= This Theme has code derived/modified from the following resources all of which, like WordPress, are distributed under the terms of the GNU GPL =

* Underscores WordPress Theme, Copyright 2012 Automattic http://underscores.me/
* Hybrid Core Framework v3.0.0, Copyright 2008 - 2015, Justin Tadlock  http://themehybrid.com/
* Hybrid Base WordPress Theme v1.0.0, Copyright 2013 - 2015, Justin Tadlock  http://themehybrid.com/
* Customizer Library v1.3.0, Copyright 2010 WP Theming http://wptheming.com
* HootKit WordPress Plugin, Copyright 2018 wpHoot https://wordpress.org/plugins/hootkit/

= This theme bundles the following third-party resources =

* FitVids http://fitvidsjs.com/ Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com : WTFPL license http://sam.zoy.org/wtfpl/
* Modernizr http://modernizr.com/ Copyright 2009—2014 : MIT License
* lightSlider http://sachinchoolur.github.io/lightslider/ Copyright sachi77n@gmail.com : MIT License
* Superfish https://github.com/joeldbirch/superfish/ Copyright Joel Birch : MIT License
* Font Awesome http://fontawesome.io/ Copyright (c) 2015, Dave Gandy : SIL OFL 1.1 (Font) MIT License (Code)
* TRT Customizer Pro https://github.com/justintadlock/trt-customizer-pro Copyright 2016 Justin Tadlock : GNU GPL Version 2
* TGM-Plugin-Activation https://github.com/TGMPA/TGM-Plugin-Activation Copyright (c) 2016 TGM : GNU GPL Version 2

= This theme screenshot contains the following images =

* Image: 129H http://www.gratisography.com/pictures/129_1.jpg http://www.gratisography.com/ : CC0
* Image: 122H http://www.gratisography.com/pictures/122_1.jpg http://www.gratisography.com/ : CC0
* Image: 152H http://www.gratisography.com/pictures/152_1.jpg http://www.gratisography.com/ : CC0
* Image: Alone Clouds Hills http://www.pexels.com/photo/1909/ : CC0

= Bundled Images: The theme bundles patterns =

* Background Patterns, Copyright 2015, wpHoot : CC0

= Bundled Images: The theme bundles composite images in /include/admin/images using the following resources =

* Misc UI Grpahics, Copyright 2015, wpHoot : CC0
* Image: Pencil https://pixabay.com/photo-2782840/ : CC0
* Image: Color Wheel https://pixabay.com/photo-455365/ : CC0
* Image: Milk Splash https://pixabay.com/photo-2064088/ : CC0
* Image: Raspberry https://pixabay.com/photo-2023404/ : CC0
* Image: Beverage https://pixabay.com/photo-3157395/ : CC0
* Image: Season https://pixabay.com/photo-1985856/ : CC0
* Image: Avatar https://pixabay.com/photo-2155431/ : CC0
* Image: Avatar https://pixabay.com/photo-2191931/ : CC0
* Image: People https://pixabay.com/photo-3245739/ : CC0