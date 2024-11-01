<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Fired during plugin deactivation
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/includes
 * @author     iCanWP Team
 */
class WP_Post_ticker_Deactivator {

	/**
	 * Deactivation doesn't do anything for the user may reactivate the plugin. Uninstalling this plugin will result in deletion of the options and custom posts created.
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
	}
}