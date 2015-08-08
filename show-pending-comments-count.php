<?php
/**
 * Plugin Name: Show Pending Comments Count
 * Version:     1.3
 * Plugin URI:  http://coffee2code.com/wp-plugins/show-pending-comments-count/
 * Author:      Scott Reilly
 * Author URI:  http://coffee2code.com/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Description: Display the pending comments count next to the approved comments count in the admin listing of posts.
 *
 * Compatible with WordPress 2.6 through 4.2+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/plugins/show-pending-comments-count/
 *
 * @package Show_Pending_Comments_Count
 * @author  Scott Reilly
 * @version 1.3
 */

/*
	Copyright (c) 2009-2015 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die();

if ( is_admin() && ! class_exists( 'c2c_ShowPendingCommentsCount' ) ) :

class c2c_ShowPendingCommentsCount {

	/**
	 * Width for comment column.
	 *
	 * WP default is 4em, which is not sufficient to display 3 digit comments plus
	 * a 2 digit pending count.
	 *
	 * Customizable elsewhere via 'c2c_show_pending_comments_count_separator' filter.
	 *
	 * @var string
	 */
	private static $comment_column_width = '5em';

	/**
	 * String to use as separator between comment count ad pending comment count.
	 *
	 * Customizable elsewhere via 'c2c_show_pending_comments_count_column_width' filter.
	 *
	 * @var string
	 */
	private static $separator = ' &bull; ';

	/**
	 * Returns version of the plugin.
	 *
	 * @since 1.2.2
	 */
	public static function version() {
		return '1.3';
	}

	/**
	 * Class constructor: initializes class variables and adds actions and filters.
	 */
	public static function init() {
		global $pagenow;

		// Deprecated as of WP 4.3, so don't do anything.
		if ( version_compare( $GLOBALS['wp_version'], '4.2.99', '>' ) ) {
			return;
		}

		if ( in_array( $pagenow, array( 'edit.php', 'edit-comments.php', 'edit-pages.php' ) ) ) {
			add_action( 'admin_head',                 array( __CLASS__, 'add_css' ) );
			add_action( 'admin_print_footer_scripts', array( __CLASS__, 'add_js'  ) );
		}
	}

	/**
	 * Outputs CSS within style tags.
	 */
	public static function add_css() {
		$width = apply_filters( 'c2c_show_pending_comments_count_column_width', self::$comment_column_width );

		echo <<<PHTML
		<style type="text/css">
		.fixed .column-comments { width: {$width} !important; }
		</style>

PHTML;
	}

	/**
	 * Outputs JavaScript within script tags.
	 */
	public static function add_js() {
		$separator = apply_filters( 'c2c_show_pending_comments_count_separator', self::$separator );
		echo <<<JS
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".column-comments .post-com-count:first-of-type, .column-response .post-com-count:first-of-type").each(function() {
				title = $(this).attr('title');
				// If no title attribute was defined, then it's either WP 4.3 or modified
				// in some incompatible way for this plugin.
				if ( title === undefined ) {
					return;
				}
				pending = title.split(' ')[0];
				if (pending != '0') {
					$(this).find('span').append("{$separator}" + pending);
				}
			});
		});
		</script>

JS;
	}
} // end c2c_ShowPendingCommentsCount

c2c_ShowPendingCommentsCount::init();

endif; // end if !class_exists()
