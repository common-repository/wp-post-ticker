<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * @link              https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since             1.0.0
 * @package           WP_Post_ticker
 *
 * @wordpress-plugin
 * Plugin Name:       WP Post Ticker
 * Plugin URI:        https://icanwp.com/plugins/wp-post-ticker-pro/
 * Description:       WP Post Ticker plugin is designed to beautifully display your WordPress posts via shortcode and widget area. This WordPress Post Ticker plugin is especially useful when you want to display multiple post categories with different sets of options.
 * Version:           1.0.8
 * Author:            iCanWP Team
 * Author URI:        https://icanwp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-post-ticker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-post-ticker-activator.php
 */
function activate_wp_post_ticker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-ticker-activator.php';
	WP_Post_ticker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-post-ticker-deactivator.php
 */
function deactivate_wp_post_ticker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-ticker-deactivator.php';
	WP_Post_ticker_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_wp_post_ticker' );
register_deactivation_hook( __FILE__, 'deactivate_wp_post_ticker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-ticker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_post_ticker() {

	$plugin = new WP_Post_ticker();
	$plugin->run();

}

run_wp_post_ticker();