<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/includes
 * @author     iCanWP Team
 */
class WP_Post_ticker {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WP_Post_ticker_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $wp_post_ticker    The string used to uniquely identify this plugin.
	 */
	protected $wp_post_ticker;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->wp_post_ticker = 'wp-post-ticker';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP_Post_ticker_Loader. Orchestrates the hooks of the plugin.
	 * - WP_Post_ticker_i18n. Defines internationalization functionality.
	 * - WP_Post_ticker_Admin. Defines all hooks for the admin area.
	 * - WP_Post_ticker_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-post-ticker-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-post-ticker-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-post-ticker-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/class-wp-post-ticker-widget.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-post-ticker-public.php';

		$this->loader = new WP_Post_ticker_Loader();
		
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WP_Post_ticker_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WP_Post_ticker_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WP_Post_ticker_Admin( $this->get_wp_post_ticker(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'wppt_add_admin_menu' );
		$this->loader->add_action( 'init', $plugin_admin, 'wppt_register_custom_post_type' );
		$this->loader->add_action( 'wp_login', $plugin_admin, 'wppt_user_logins' );
		$this->loader->add_action( 'wp_ajax_bsm_portfolio_dismiss_pro_notice', $plugin_admin, 'wppt_portfolio_dismiss_pro_notice' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'wppt_add_meta_boxes' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'wppt_save_wp_post_meta_boxes' ); //fires when saving default wordpress post
		$this->loader->add_action( 'save_post_wppt_post_ticker', $plugin_admin, 'wppt_save_meta_boxes' ); //fires when saving custom post type
		$this->loader->add_action( 'admin_init', $plugin_admin, 'wppt_init_options' ); // Define settings, menu, and etc
		$this->loader->add_action( 'widgets_init', $plugin_admin, 'wppt_register_widgets' ); // Register Widget
		$this->loader->add_filter( 'manage_wppt_post_ticker_posts_columns', $plugin_admin, 'wppt_add_custom_column_title' );
		$this->loader->add_action( 'manage_wppt_post_ticker_posts_custom_column', $plugin_admin, 'wppt_add_custom_column_data', 10, 2 );
		if( version_compare( PHP_VERSION, '5.6.0', '<' ) ){
			$this->loader->add_action( 'admin_notices', $plugin_admin, 'wppt_notice_php_version_critical' );
		}
		if( empty( get_option( 'wppt_notice_get_pro_version_dismissed' ) ) ){
			$this->loader->add_action( 'admin_notices', $plugin_admin, 'wppt_notice_get_pro_version' );
		}
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WP_Post_ticker_Public( $this->get_wp_post_ticker(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_public, 'wppt_register_shortcode' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_wp_post_ticker() {
		return $this->wp_post_ticker;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WP_Post_ticker_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
