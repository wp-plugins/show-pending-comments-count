=== Show Pending Comments Count ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: pending comments, comments, admin, edit posts, coffee2code
Requires at least: 2.6
Tested up to: 3.3
Stable tag: 1.2.2
Version: 1.2.2

Display the pending comments count next to the approved comments count in the admin listing of posts.


== Description ==

Display the pending comments count next to the approved comments count in the admin listing of posts.

By default, in the admin listing of posts, each post has its count of approved comments displayed with a word bubble background.  If you hover over a comment count, the tooltip hover text indicates the number of pending comments.  This plugin utilizes JavaScript to change the post listings so that the pending comments count is displayed next to the approved comments count inside the same word bubble (though with a separator).

The pending comments count will appear next to post comment counts in:

* The "Edit Posts" listing of posts
* The "Edit Pages" listing of pages
* The "Edit Comments" listing of comments

This plugin will only function for users in the admin who have JavaScript enabled.

Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/show-pending-comments-count/) | [Plugin Directory Page](http://wordpress.org/extend/plugins/show-pending-comments-count/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Unzip `show-pending-comments-count.zip` inside the `/wp-content/plugins/` directory for your site (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress


== Screenshots ==

1. A screenshot of the 'Edit Posts' admin page with the plugin active, showing a post without pending comments and one with pending comments.


== Filters ==

The plugin is further customizable via two filters. Typically, these customizations would be put into your active theme's functions.php file, or used by another plugin.

= c2c_show_pending_comments_count_column_width =

The 'c2c_show_pending_comments_count_column_width' filter allows you to customize the column width used for the comment column when pending comments are also being displayed.  The WP default is "4em", which is not sufficient to display a possible 3 digits for approved comments in addition to a possible 2 digits in pending comments.  The default defined by the plugin is "5em" which should handle most cases sufficiently.  Use the filter if you want to change the width.

Arguments:

* $comment_column_width (string): The width of the comment column. Default is "5em". Express as a width measurement recognized by CSS.

Example:

`<?php add_filter( 'c2c_show_pending_comments_count_column_width', 'my_c2c_show_pending_comments_count_column_width' );
// Make it even wider
function my_c2c_show_pending_comments_count_column_width( $comment_column_width ) {
	return '6em';
} ?>`

= c2c_show_pending_comments_count_separator =

The 'c2c_show_pending_comments_count_separator' filter allows you to specify the character used as the separator between the count of approved comments and the count of pending comments. By default this is ' &bull; ' (a bullet, with space on either side).

Arguments:

* $separator (string): The character or string to be used as the separator.  By default this is ' &bull; ' (note space of either side).

`<?php add_filter( 'c2c_show_pending_comments_count_separator', 'my_c2c_show_pending_comments_count_separator' );
// Make it even wider
function my_c2c_show_pending_comments_count_separator( $separator ) {
	return ' | ';
} ?>`


== Changelog ==

= 1.2.2 =
* Add version() to return plugin version
* Note compatibility through WP 3.3+
* Add link to plugin directory page to readme.txt
* Update copyright date (2012)

= 1.2.1 =
* Note compatibility through WP 3.2+
* Minor code formatting changes (spacing)
* Fix plugin homepage and author links in description in readme.txt

= 1.2 =
* Add filter 'c2c_show_pending_comments_count_column_width' to allow customization of the column width used for the comment column
* Add filter 'c2c_show_pending_comments_count_separator' to allow customization of the character used as the separator between comments and pending comments
* Switch from object instantiation to direct class invocation
* Explicitly declare all functions public static and class variables private static
* Add Filters section to readme.txt
* Note compatibility through WP 3.1+
* Update copyright date (2011)

= 1.1 =
* Don't even define class if not in the admin
* Rename class from 'ShowPendingCommentsCount' to 'c2c_ShowPendingCommentsCount'
* Output JS via 'admin_print_footer_scripts' hook rather than 'admin_footer'
* Assign object instance to global variable, $c2c_show_pending_comments_count, to allow for external manipulation
* Instantiate object within primary if(!class_exists()) check (at end)
* Note compatibility with WP 3.0+
* Minor code reformatting (spacing)
* Remove documentation and instructions from top of plugin file (all of that and more are contained in readme.txt)
* Add Upgrade Notice section to readme.txt
* Remove trailing whitespace

= 1.0.1 =
* Add PHPDoc documentation
* Note compatibility with WP 2.9+
* Update copyright date

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.2.2 =
Trivial update: noted compatibility through WP 3.3+

= 1.2.1 =
Trivial update: noted compatibility through WP 3.2+

= 1.2 =
Minor update: added filters 'c2c_show_pending_comments_count_column_width', and 'c2c_show_pending_comments_count_separator'; implementation changes; noted compatibility with WP 3.1+ and updated copyright date.

= 1.1 =
Minor update. Miscellaneous tweaks; renamed class; noted compatibility with WP 3.0+.