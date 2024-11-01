<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/public
 * @author     iCanWP Team
 */
class WP_Post_ticker_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp_post_ticker    The ID of this plugin.
	 */
	private $wp_post_ticker;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wp_post_ticker       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_post_ticker, $version ) {

		$this->wp_post_ticker = $wp_post_ticker;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->wp_post_ticker, plugin_dir_url( __FILE__ ) . 'css/wp-post-ticker-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->wp_post_ticker . '-font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site with proper dependencies
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->wp_post_ticker, plugin_dir_url( __FILE__ ) . 'js/wp-post-ticker-public.js', array( 'jquery', 'jquery-ui-core', 'jquery-effects-core' ), $this->version, false );
	}
	
	//Shortcode Reigstration
	public function wppt_register_shortcode(){
		add_shortcode( 'wppt', array( $this, 'wppt_display_shortcode' ) );
	}
	
	//Get shortcode public display
	public function wppt_display_shortcode( $atts ){
		$atts = shortcode_atts( 
			array(
				'id' => 'default'
			), $atts, 'wppt' 
		);
		$wppt_id = $atts['id'];
		ob_start();
		require plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/wp-post-ticker-public-display.php';
		$output = ob_get_contents();
		ob_get_clean();
		return $output;
	}
}