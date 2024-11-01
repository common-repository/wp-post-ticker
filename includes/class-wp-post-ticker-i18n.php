<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Define the internationalization functionality 
 * This feature will be added in v2.
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/includes
 * @author     iCanWP Team
 */
class WP_Post_ticker_i18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-post-ticker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}