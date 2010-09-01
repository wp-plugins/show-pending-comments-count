<?php
/**
 * @package Show_Pending_Comments_Count
 * @author Scott Reilly
 * @version 1.1
 */
/*
Plugin Name: Show Pending Comments Count
Version: 1.1
Plugin URI: http://coffee2code.com/wp-plugins/show-pending-comments-count/
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Display the pending comments count next to the approved comments count in the admin listing of posts.

Compatible with WordPress 2.6+, 2.7+, 2.8+, 2.9+, 3.0+.

=>> Read the accompanying readme.txt file for instructions and documentation.
=>> Also, visit the plugin's homepage for additional information and updates.
=>> Or visit: http://wordpress.org/extend/plugins/show-pending-comments-count/

*/

/*
Copyright (c) 2009-2010 by Scott Reilly (aka coffee2code)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy,
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

if ( is_admin() && !class_exists( 'c2c_ShowPendingCommentsCount' ) ) :

class c2c_ShowPendingCommentsCount {
	var $comment_column_width = '5em';	// WP default is 4em, which is not sufficient to display 3 digit comments + 2 digit pending
	var $separator = ' &bull; ';

	/**
	 * Class constructor: initializes class variables and adds actions and filters.
	 */
	function c2c_ShowPendingCommentsCount() {
		global $pagenow;
		if ( in_array( $pagenow, array( 'edit.php', 'edit-comments.php', 'edit-pages.php' ) ) ) {
			add_action( 'admin_head', array( &$this, 'add_css' ) );
			add_action( 'admin_print_footer_scripts', array( &$this, 'add_js' ) );
		}
	}

	/**
	 * Outputs CSS within style tags
	 */
	function add_css() {
		echo <<<CSS
		<style type="text/css">
		.fixed .column-comments { width: {$this->comment_column_width}; !important }
		</style>

CSS;
	}

	/**
	 * Outputs JavaScript within script tags
	 *
	 */
	function add_js() {
		echo <<<JS
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".column-comments .post-com-count, .column-response .post-com-count").each(function() {
				pending = $(this).attr('title').split(' ')[0];
				if (pending != '0') {
					$(this).find('span').append("{$this->separator}" + pending);
				}
			});
		});
		</script>

JS;
	}
} // end c2c_ShowPendingCommentsCount

$GLOBALS['c2c_show_pending_comments_count'] = new c2c_ShowPendingCommentsCount();

endif; // end if !class_exists()

?>