=== Show Pending Comments Count ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: pending comments, comments, admin, edit posts, coffee2code
Requires at least: 2.6
Tested up to: 3.0.1
Stable tag: 1.1
Version: 1.1

Display the pending comments count next to the approved comments count in the admin listing of posts.


== Description ==

Display the pending comments count next to the approved comments count in the admin listing of posts.

By default, in the admin listing of posts, each post has its count of approved comments displayed with a word bubble background.  If you hover over a comment count, the tooltip hover text indicates the number of pending comments.  This plugin utilizes JavaScript to change the post listings so that the pending comments count is displayed next to the approved comments count inside the same word bubble (though with a separator).

The pending comments count will appear next to post comment counts in:

* The "Edit Posts" listing of posts
* The "Edit Pages" listing of pages
* The "Edit Comments" listing of comments

This plugin will only function for users in the admin who have JavaScript enabled.


== Installation ==

1. Unzip `show-pending-comments-count.zip` inside the `/wp-content/plugins/` directory for your site (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress


== Screenshots ==

1. A screenshot of the 'Edit Posts' admin page with the plugin active, showing a post without pending comments and one with pending comments.


== Changelog ==

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

= 1.1 =
Minor update. Miscellaneous tweaks; renamed class; noted compatibility with WP 3.0+.