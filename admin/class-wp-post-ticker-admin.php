<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin
 */

/**
 *
 * Admin configuration. Includes: Metabox, Settings API, CSS, JS used for Admin Area
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin
 * @author     iCanWP Team
 */
class WP_Post_ticker_Admin {

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
	 * @param      string    $wp_post_ticker       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_post_ticker, $version ) {
		$this->wp_post_ticker = $wp_post_ticker;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		//Handles loading neccessary styles via enqueue style to avoid conflict
		wp_enqueue_style( $this->wp_post_ticker, plugin_dir_url( __FILE__ ) . 'css/wp-post-ticker-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->wp_post_ticker . '-color-picker', plugin_dir_url( __FILE__ ) . 'css/jquery.minicolors.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->wp_post_ticker . '-font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		//Handles loading neccessary scripts via enqueue script to avoid conflict
		wp_enqueue_media();
		wp_register_script( $this->plugin_name . '-wppt-admin-js', plugin_dir_url( __FILE__ ) . 'js/wp-post-ticker-admin.js', array('jquery','jquery-ui-sortable'), $this->version, 'all' );
		$wppt_variables = array(
			'plugin_admin_url' => plugin_dir_url( __FILE__ ),
			'admin_ajax_url' => admin_url( 'admin-ajax.php' )
		);
		wp_localize_script( $this->plugin_name . '-wppt-admin-js', 'wppt_admin_localized', $wppt_variables );
		wp_enqueue_script( $this->plugin_name . '-wppt-admin-js' );
		wp_enqueue_script( $this->wp_post_ticker . '-color-picker', plugin_dir_url( __FILE__ ) . 'js/jquery.minicolors.min.js', array( 'jquery' ), $this->version, false );

	}
	
	//Adds Plugin Admin Menu Page
	public function wppt_add_admin_menu(){
		add_menu_page(
			'WP Post Ticker', // The title to be displayed on this menu's corresponding page
			'Post Ticker', // The text to be displayed for this actual menu item
			'manage_options', // Which type of users can see this menu
			'wppt_admin_menu', // The unique ID - that is, the slug - for this menu item
			'', // The name of the function to call when rendering this menu's page
			plugin_dir_url( __FILE__ ) . 'assets/admin-icon.png', // icon url
			173.797 // position
		);
		add_submenu_page(
			'wppt_admin_menu',                  // Register this submenu with the menu defined above
			'Global Style',          // The text to the display in the browser when this menu item is active
			'Global Style Settings',                  // The text for this menu item
			'manage_options',            // Which type of users can see this menu
			'wppt_admin_menu_global_style',          // The unique ID - the slug - for this menu item
			array($this, 'display_wppt_admin_menu_global_style')   // The function used to render this menu's page to the screen
		);
		add_submenu_page(
			'wppt_admin_menu',                  // Register this submenu with the menu defined above
			'Instructions',          // The text to the display in the browser when this menu item is active
			'Instructions',                  // The text for this menu item
			'manage_options',            // Which type of users can see this menu
			'wppt_admin_menu_instruction',          // The unique ID - the slug - for this menu item
			array($this, 'display_wppt_admin_menu_instruction')   // The function used to render this menu's page to the screen
		);
	}
	
	//Initialized on admin_init to add plugin admin sections
	public function wppt_init_options(){
		//Create settings section to display options configurable for this plugin
		add_settings_section(
			'settings_section_wppt_global_styles_container_general',
			'Ticker Container Options',
			array( $this, 'callback_wppt_settings_section_global_style_container_general' ),
			'wppt_admin_menu_global_style'
		);
		add_settings_section(
			'settings_section_wppt_global_styles_container_title',
			'Title Options',
			array( $this, 'callback_wppt_settings_section_global_style_container_title' ),
			'wppt_admin_menu_global_style'
		);
		add_settings_section(
			'settings_section_wppt_global_styles_navigation',
			'Navigation Options',
			array( $this, 'callback_wppt_settings_section_global_style_navigation' ),
			'wppt_admin_menu_global_style'
		);
		add_settings_section(
			'settings_section_wppt_global_styles_container_post_display',
			'Post Section Options',
			array( $this, 'callback_wppt_settings_section_global_style_container_post_display' ),
			'wppt_admin_menu_global_style'
		);
		add_settings_field(
			'wppt_global_container_bg',
			'Background Color',
			array( $this, 'callback_wppt_settings_field_background_color'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_general'
		);
		add_settings_field(
			'wppt_global_container_border_top',
			'Border Top',
			array( $this, 'callback_wppt_settings_field_container_border_top'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_general'
		);
		add_settings_field(
			'wppt_global_container_border_right',
			'Border Right',
			array( $this, 'callback_wppt_settings_field_container_border_right'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_general'
		);
		add_settings_field(
			'wppt_global_container_border_bottom',
			'Border Bottom',
			array( $this, 'callback_wppt_settings_field_container_border_bottom'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_general'
		);
		add_settings_field(
			'wppt_global_container_border_left',
			'Border Left',
			array( $this, 'callback_wppt_settings_field_container_border_left'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_general'
		);
		add_settings_field(
			'wppt_global_container_title_font_align',
			'Title Alignment',
			array( $this, 'callback_wppt_settings_field_container_title_align'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_title'
		);
		add_settings_field(
			'wppt_global_container_title_border_bottom',
			'Title Border Bottom',
			array( $this, 'callback_wppt_settings_field_container_title_border_bottom'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_title'
		);
		add_settings_field(
			'wppt_global_container_title_colors',
			'Title Colors',
			array( $this, 'callback_wppt_settings_field_container_title_colors'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_title'
		);
		add_settings_field(
			'wppt_global_container_title_padding',
			'Title Padding',
			array( $this, 'callback_wppt_settings_field_container_title_padding'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_title'
		);
		add_settings_field(
			'wppt_global_container_title_font_size',
			'Title Font Size',
			array( $this, 'callback_wppt_settings_field_container_title_font_size'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_title'
		);
		add_settings_field(
			'wppt_global_container_nav_display',
			'Show Navigation',
			array( $this, 'callback_wppt_settings_field_container_title_nav_display'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_navigation'
		);
		add_settings_field(
			'wppt_global_container_title_nav_border_bottom',
			'Border Bottom',
			array( $this, 'callback_wppt_settings_field_container_title_nav_border_bottom'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_navigation'
		);
		add_settings_field(
			'wppt_global_container_title_icon_options',
			'Icon Options',
			array( $this, 'callback_wppt_settings_field_container_title_icon_options'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_navigation'
		);
		add_settings_field(
			'wppt_global_container_title_nav_padding',
			'Icon Padding',
			array( $this, 'callback_wppt_settings_field_container_title_nav_padding'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_navigation'
		);
		add_settings_field(
			'wppt_global_container_post_display_title',
			'Post Title',
			array( $this, 'callback_wppt_settings_field_container_post_title'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_post_display'
		);
		add_settings_field(
			'wppt_global_container_post_display_meta_one',
			'Post Meta 1',
			array( $this, 'callback_wppt_settings_field_container_post_meta_one'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_post_display'
		);
		add_settings_field(
			'wppt_global_container_post_display_meta_two',
			'Post Meta 2',
			array( $this, 'callback_wppt_settings_field_container_post_meta_two'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_post_display'
		);
		add_settings_field(
			'wppt_global_container_post_padding',
			'Post Section Padding',
			array( $this, 'callback_wppt_settings_field_container_post_padding'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_post_display'
		);
		add_settings_field(
			'wppt_global_container_post_divider',
			'Post Divider Options',
			array( $this, 'callback_wppt_settings_field_container_post_divider'),
			'wppt_admin_menu_global_style',
			'settings_section_wppt_global_styles_container_post_display'
		);

		//Register all the defined Options for this plugin
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_bg'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_border_top'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_border_right'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_border_bottom'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_border_left'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_font_align'
		);
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_colors'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_padding'
		);			
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_font_size'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_border_bottom'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_icon_options'
		);				
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_nav_display'
		);				
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_nav_padding'
		);
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_title_nav_border_bottom'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_post_divider'
		);
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_post_padding'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_post_display_title'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_post_display_meta_one'
		);		
		register_setting(
			'wppt_admin_menu_global_style',
			'wppt_global_container_post_display_meta_two'
		);
		
	}
	
	//Callbacks to load the display for admin settings, menu pages, sections, and fields
	public function callback_wppt_settings_field_background_color(){
		require_once('partials/settings-fields/global-style-background-color.php');
	}
	public function callback_wppt_settings_field_container_border_top(){
		require_once('partials/settings-fields/global-style-container-border-top.php');
	}
	public function callback_wppt_settings_field_container_border_right(){
		require_once('partials/settings-fields/global-style-container-border-right.php');
	}
	public function callback_wppt_settings_field_container_border_bottom(){
		require_once('partials/settings-fields/global-style-container-border-bottom.php');
	}
	public function callback_wppt_settings_field_container_border_left(){
		require_once('partials/settings-fields/global-style-container-border-left.php');
	}
	public function callback_wppt_settings_field_container_title_align(){
		require_once('partials/settings-fields/global-style-container-title-align.php');
	}
	public function callback_wppt_settings_field_container_title_border_bottom(){
		require_once('partials/settings-fields/global-style-container-title-border-bottom.php');
	}
	public function callback_wppt_settings_field_container_title_padding(){
		require_once('partials/settings-fields/global-style-container-title-padding.php');
	}
	public function callback_wppt_settings_field_container_title_colors(){
		require_once('partials/settings-fields/global-style-container-title-colors.php');
	}
	public function callback_wppt_settings_field_container_title_font_size(){
		require_once('partials/settings-fields/global-style-container-title-font-size.php');
	}
	public function callback_wppt_settings_field_container_title_nav_display(){
		require_once('partials/settings-fields/global-style-container-title-nav-display.php');
	}
	public function callback_wppt_settings_field_container_title_icon_options(){
		require_once('partials/settings-fields/global-style-container-title-icon-options.php');
	}	
	public function callback_wppt_settings_field_container_title_nav_padding(){
		require_once('partials/settings-fields/global-style-container-title-nav-padding.php');
	}	
	public function callback_wppt_settings_field_container_title_nav_border_bottom(){
		require_once('partials/settings-fields/global-style-container-title-nav-border.php');
	}	
	public function callback_wppt_settings_field_container_post_divider(){
		require_once('partials/settings-fields/global-style-container-post-divider.php');
	}
	public function callback_wppt_settings_field_container_post_padding(){
		require_once('partials/settings-fields/global-style-container-post-padding.php');
	}
	public function callback_wppt_settings_field_container_post_title(){
		require_once('partials/settings-fields/global-style-container-post-title.php');
	}
	public function callback_wppt_settings_field_container_post_meta_one(){
		require_once('partials/settings-fields/global-style-container-post-meta-one.php');
	}
	public function callback_wppt_settings_field_container_post_meta_two(){
		require_once('partials/settings-fields/global-style-container-post-meta-two.php');
	}
	public function callback_wppt_settings_section_global_style_container_general(){
		require_once('partials/settings-sections/global-style-container-general.php');
	}	
	public function callback_wppt_settings_section_global_style_container_title(){
		require_once('partials/settings-sections/global-style-container-title.php');
	}	
	public function callback_wppt_settings_section_global_style_container_post_display(){
		require_once('partials/settings-sections/global-style-container-post-display.php');
	}
	public function callback_wppt_settings_section_global_style_navigation(){
		require_once('partials/settings-sections/global-style-container-navigation.php');
	}
	
	//Custom Post Type Resgistration with options	
	public function wppt_register_custom_post_type(){
		$labels = array(
			'name'               => 'WP Post Ticker',
			'singular_name'      => 'WP Post Ticker',
			'menu_name'          => 'Post Ticker',
			'name_admin_bar'     => 'Post Ticker',
			'add_new'            => 'Add New Post Ticker',
			'add_new_item'       => 'Add New Post Ticker',
			'new_item'           => 'New Post Ticker',
			'edit_item'          => 'Edit Post Ticker',
			'view_item'          => 'View Post Ticker',
			'all_items'          => 'All Post Tickers',
			'search_items'       => 'Search Post Ticker',
			'parent_item_colon'  => 'Parent Post Ticker',
			'not_found'          => 'No Post Ticker Found',
			'not_found_in_trash' => 'No Post Ticker Found in Trash.'
		);

		$args = array(
			'labels'             => $labels,
			'description'        => 'WP Post Ticker',
			'public'             => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui'            => true,
			'show_in_menu'       => 'wppt_admin_menu',
			'menu_position'			=> 23.79,
			'query_var'          => false,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'supports'           => array( 'title' )
		);

		register_post_type( 'wppt_post_ticker', $args ); //Register custom post type used as plugin settings
	}
	
	//Customize the custom column title on the custom post type page
	public function wppt_add_custom_column_title( $columns ){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'WP Post Ticker Title',
			'widgetid' =>'Widget ID',
			'shortcode' => 'Shortcode',
			'date' => 'Date'
		);
		return $columns;
	}
	
	//Display custom columns on the custom post type page to display the shortcode and widget ID
	public function wppt_add_custom_column_data( $column, $post_id ){
		switch( $column ){
			case 'shortcode' :
				echo '<input class="wppt-shortcode-select" type="text" value="[wppt id=' . $post_id . ']" size="15" readonly>';
				break;
			case 'widgetid' :
				echo $post_id;
				break;
		} 
	}
	
	//Add Metabox for WP Post Ticker settings and default WordPress post type
	public function wppt_add_meta_boxes($post_type){
		add_meta_box(
			'wppt_post_ticker_meta_box', //Meta box ID
			'WP Post Ticker Options', //title
			array($this, 'callback_wppt_add_meta_box'), //callback
			'wppt_post_ticker', // The screen or screens on which to show the box; Accepts a single screen ID, WP_Screen object, or array of screen IDs. Default is the current screen.
			'normal',
			'high'
		);
		add_meta_box(
			'wppt_post_ticker_meta_style',
			'WP Post Ticker Style',
			array($this, 'callback_wppt_add_meta_style'),
			'wppt_post_ticker',
			'normal',
			'default'
		);
		add_meta_box(
			'wppt_post_ticker_meta_info',
			'WP Post Ticker Information',
			array($this, 'callback_wppt_add_meta_info'),
			'wppt_post_ticker',
			'side',
			'default'
		);
		
		//register metabox for all posts
		$default_post_types = array( 'post' ); //add more post types to the array to enable this control from other post types
		if ( in_array( $post_type, $default_post_types )) {
			add_meta_box(
			'wppt_global_post_meta_box',
			'WP Post Ticker',
			array($this, 'callback_wppt_global_post_add_meta_box'),
			$post_type,
			'side',
			'default'
			);
		}
	}
	
	//Function to handle post rating feature via custom metabox added to the default wordpress post type
	public function wppt_save_wp_post_meta_boxes( $post_id ){
		//Make sure the user has ability to edit post
		if ( !current_user_can( 'edit_post', $post_id ) ) {
			die("You do not have sufficient previlliege to edit the post.");
		}
		//When doing autosave, it doesn't do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		//WP Post Ticker Default Post Meta Field
		if ( isset( $_POST["wppt-wp-post-rating"] ) ){ // parameter: 0,1,2,3,4
			$result = $_POST["wppt-wp-post-rating"];
			update_post_meta( $post_id, '_wppt_wp_post_rating', $result );
		}
	}
	
	//Function to handle saving data via metabox of each custom post used as the plugin setting
	public function wppt_save_meta_boxes ( $post_id ){	
		//Make sure the user has ability to edit post
		if ( !current_user_can( 'edit_post', $post_id ) ) {
			die("You do not have sufficient previlliege to edit the post.");
		}
		if ( ! isset( $_POST['wppt_setting_nonce'] ) ) {
			return $post_id;
		} else {
			$nonce = $_POST['wppt_setting_nonce']; //Session Integrity check
			if ( ! wp_verify_nonce( $nonce, 'wppt_save' ) ){
				die('[This is not a critical warning.] WP Post Ticker Settings Session does not validate. Please go back to the post ticker settings form, refresh the session, then try it again.');
			}
		}
		//When doing autosave, it doesn't do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		//WP Post Ticker Post Type Metabox Configuration
		if ( isset( $_POST["wppt-post-advance-mode"] ) ){ // parameter: 0,1,2,3,4
			$result = $_POST["wppt-post-advance-mode"];
			$result = intval( $result );
			if ( $result !== 0 | $result !== 3 ){
				$result = 3;
			}
			update_post_meta( $post_id, '_wppt_post_advance_mode', $result );
		}
			update_post_meta( $post_id, '_wppt_post_advance_speed', 3000 );
		if ( isset( $_POST["wppt-post-advance-direction"] ) ){
			$result = $_POST["wppt-post-advance-direction"];
			update_post_meta( $post_id, '_wppt_post_advance_direction', $result );
		}
		if ( isset( $_POST["wppt-show-advanced-settings"] ) ){
			$result = $_POST["wppt-show-advanced-settings"];
			update_post_meta( $post_id, '_wppt_show_advanced_settings', $result );
		}
		if ( isset( $_POST["wppt-post-advance-animation-easing"] ) ){
			$result = $_POST["wppt-post-advance-animation-easing"];
			update_post_meta( $post_id, '_wppt_post_advance_animation_easing', $result );
		}
		if ( isset( $_POST["wppt-post-advance-animation-speed"] ) ){
			$result = $_POST["wppt-post-advance-animation-speed"];
			update_post_meta( $post_id, '_wppt_post_advance_animation_speed', $result );
		} else { //When the animation speed is not set, it is set to 2 seconds by default
			update_post_meta( $post_id, '_wppt_post_advance_animation_speed', 2000 );
		}
		if ( isset( $_POST["wppt-post-cat"] ) ){ // parameter: array( int post_id )
			$result = $_POST["wppt-post-cat"];
			update_post_meta( $post_id, '_wppt_post_cat', $result );
		}
		if ( isset( $_POST["wppt-post-filter-mode"] ) ){
			$result = $_POST["wppt-post-filter-mode"];
			update_post_meta( $post_id, '_wppt_post_filter_mode', 0 );
		}
		if ( isset( $_POST["wppt-post-filter-author"] ) ){
			$result = $_POST["wppt-post-filter-author"];
			update_post_meta( $post_id, '_wppt_post_filter_author', $result );
		} else { //When Author filter is not used, set to display posts from all authors
			$result = array( -0 );
			update_post_meta( $post_id, '_wppt_post_filter_author', $result );
		}
		if ( isset( $_POST["wppt-post-sort"] ) ){
			$result = 0;
			update_post_meta( $post_id, '_wppt_post_sort', $result );
		}
		if ( isset( $_POST["wppt-post-display-options-thumb"] ) ){
			$result = $_POST["wppt-post-display-options-thumb"];
			update_post_meta( $post_id, '_wppt_post_display_options_thumb', $result );
		}
		if ( isset( $_POST["wppt-post-display-options-thumb-position"] ) ){
			$result = $_POST["wppt-post-display-options-thumb-position"];
			update_post_meta( $post_id, '_wppt_post_thumb_position', $result );
		}
		if ( isset( $_POST["wppt-post-display-options-metaone"] ) ){
			$result = $_POST["wppt-post-display-options-metaone"];
			update_post_meta( $post_id, '_wppt_post_display_options_metaone', $result );
		}
		if ( isset( $_POST["wppt-post-display-options-metatwo"] ) ){
			$result = $_POST["wppt-post-display-options-metatwo"];
			update_post_meta( $post_id, '_wppt_post_display_options_metatwo', $result );
		}
		if ( isset( $_POST["wppt-post-thumb-width"] ) ){
			$result = 100;
			update_post_meta( $post_id, '_wppt_post_thumb_width', $result );
		}
		if ( isset( $_POST["wppt-post-thumb-ratio"] ) ){
			$result = $_POST["wppt-post-thumb-ratio"];
			update_post_meta( $post_id, '_wppt_post_thumb_ratio', $result );
		}
		if ( isset( $_POST["wppt-post-num-view"] ) ){
			$result = intval( $_POST["wppt-post-num-view"] );
			if ( $result > 2 ){
				$result = 2;
			} elseif( $result < 0 ){
				$result = 1;
			}
			update_post_meta( $post_id, '_wppt_post_num_view', $result );
		}
		if ( isset( $_POST["wppt-post-num-load"] ) ){
			$result = intval( $_POST["wppt-post-num-load"] );
			if ( $result > 3 ){
				$result = 3;
			} elseif( $result < 1 ){
				$result = 1;
			}
			update_post_meta( $post_id, '_wppt_post_num_load', $result );
		}
		if ( isset( $_POST["wppt-post-frame-max-width-option"] ) ){
			$result = $_POST["wppt-post-frame-max-width-option"];
			update_post_meta( $post_id, '_wppt_post_frame_max_width_option', 0 );
		}
		if ( isset( $_POST["wppt-post-frame-max-width-pc"] ) ){
			$result = $_POST["wppt-post-frame-max-width-pc"];
			update_post_meta( $post_id, '_wppt_post_frame_max_width_pc', $result );
		}
		if ( isset( $_POST["wppt-post-frame-max-width-px"] ) ){
			$result = $_POST["wppt-post-frame-max-width-px"];
			update_post_meta( $post_id, '_wppt_post_frame_max_width_px', $result );
		}
		if ( isset( $_POST["wppt-post-hide-pass-protected"] ) ){
			$result = 1;
			update_post_meta( $post_id, '_wppt_post_hide_pass_protected', $result );
		}
		
		//WP Post Ticker Style Settings via Custom Post Type Metabox
		if ( isset( $_POST["wppt-ticker-inherit-global-style"] ) ){ // value: color picker
			$result = 0;
			update_post_meta( $post_id, '_wppt_ticker_inherit_global_style', $result );
		} else {
			update_post_meta( $post_id, '_wppt_ticker_inherit_global_style', '0' );
		}
		if ( isset( $_POST["wppt-ticker-container-bg"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-container-bg"];
			update_post_meta( $post_id, '_wppt_ticker_container_bg', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-bg-transparent"] ) ){ // value: set or not
			$result = $_POST["wppt-ticker-container-bg-transparent"];
			update_post_meta( $post_id, '_wppt_ticker_container_bg_transparent', $result );
		} else {
			update_post_meta( $post_id, '_wppt_ticker_container_bg_transparent', '0' );
		}
		if ( isset( $_POST["wppt-ticker-container-brw"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-container-brw"];
			update_post_meta( $post_id, '_wppt_ticker_container_brw', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-brs"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-container-brs"];
			update_post_meta( $post_id, '_wppt_ticker_container_brs', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-brc"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-container-brc"];
			update_post_meta( $post_id, '_wppt_ticker_container_brc', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-bbw"] ) ){ // value: select style
			$result = $_POST["wppt-ticker-container-bbw"];
			update_post_meta( $post_id, '_wppt_ticker_container_bbw', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-bbs"] ) ){ // value: select style
			$result = $_POST["wppt-ticker-container-bbs"];
			update_post_meta( $post_id, '_wppt_ticker_container_bbs', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-bbc"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-container-bbc"];
			update_post_meta( $post_id, '_wppt_ticker_container_bbc', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-blw"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-container-blw"];
			update_post_meta( $post_id, '_wppt_ticker_container_blw', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-bls"] ) ){ // value: select style
			$result = $_POST["wppt-ticker-container-bls"];
			update_post_meta( $post_id, '_wppt_ticker_container_bls', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-blc"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-container-blc"];
			update_post_meta( $post_id, '_wppt_ticker_container_blc', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-btw"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-container-btw"];
			update_post_meta( $post_id, '_wppt_ticker_container_btw', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-bts"] ) ){ // value: select style
			$result = $_POST["wppt-ticker-container-bts"];
			update_post_meta( $post_id, '_wppt_ticker_container_bts', $result );
		}
		if ( isset( $_POST["wppt-ticker-container-btc"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-container-btc"];
			update_post_meta( $post_id, '_wppt_ticker_container_btc', $result );
		}
	
		if ( isset( $_POST["wppt-ticker-title-padding-top"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-padding-top"];
			update_post_meta( $post_id, '_wppt_ticker_title_padding_top', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-padding-right"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-padding-right"];
			update_post_meta( $post_id, '_wppt_ticker_title_padding_right', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-padding-bottom"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-padding-bottom"];
			update_post_meta( $post_id, '_wppt_ticker_title_padding_bottom', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-padding-left"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-padding-left"];
			update_post_meta( $post_id, '_wppt_ticker_title_padding_left', $result );
		}
		
		if ( isset( $_POST["wppt-ticker-title-align"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-align"];
			update_post_meta( $post_id, '_wppt_ticker_title_alignment', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-font-line-height"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-font-line-height"];
			update_post_meta( $post_id, '_wppt_ticker_title_font_line_height', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-font-size"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-font-size"];
			update_post_meta( $post_id, '_wppt_ticker_title_font_size', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-font-color"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-title-font-color"];
			update_post_meta( $post_id, '_wppt_ticker_title_font_color', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-bg"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-title-bg"];
			update_post_meta( $post_id, '_wppt_ticker_title_bg', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-bbw"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-title-bbw"];
			update_post_meta( $post_id, '_wppt_ticker_title_bbw', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-bbs"] ) ){ // value: select style
			$result = $_POST["wppt-ticker-title-bbs"];
			update_post_meta( $post_id, '_wppt_ticker_title_bbs', $result );
		}
		if ( isset( $_POST["wppt-ticker-title-bbc"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-title-bbc"];
			update_post_meta( $post_id, '_wppt_ticker_title_bbc', $result );
		}
		
		if ( isset( $_POST["wppt-ticker-control-display"] ) ){ // value: int
			$result = $_POST["wppt-ticker-control-display"];
			update_post_meta( $post_id, '_wppt_ticker_control_display', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-icon-size"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-control-icon-size"];
			update_post_meta( $post_id, '_wppt_ticker_control_icon_size', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-icon-color"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-icon-color"];
			update_post_meta( $post_id, '_wppt_ticker_control_icon_color', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-icon-align"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-icon-align"];
			update_post_meta( $post_id, '_wppt_ticker_control_icon_align', $result );
		}
		
		if ( isset( $_POST["wppt-ticker-control-padding-top"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-padding-top"];
			update_post_meta( $post_id, '_wppt_ticker_control_padding_top', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-padding-right"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-padding-right"];
			update_post_meta( $post_id, '_wppt_ticker_control_padding_right', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-padding-bottom"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-padding-bottom"];
			update_post_meta( $post_id, '_wppt_ticker_control_padding_bottom', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-padding-left"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-padding-left"];
			update_post_meta( $post_id, '_wppt_ticker_control_padding_left', $result );
		}
		
		if ( isset( $_POST["wppt-ticker-control-bbw"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-control-bbw"];
			update_post_meta( $post_id, '_wppt_ticker_control_bbw', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-bbs"] ) ){ // value: select style
			$result = $_POST["wppt-ticker-control-bbs"];
			update_post_meta( $post_id, '_wppt_ticker_control_bbs', $result );
		}
		if ( isset( $_POST["wppt-ticker-control-bbc"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-control-bbc"];
			update_post_meta( $post_id, '_wppt_ticker_control_bbc', $result );
		}
		
		if ( isset( $_POST["wppt-ticker-post-divider-width"] ) ){
			$result = $_POST["wppt-ticker-post-divider-width"];
			update_post_meta( $post_id, '_wppt_ticker_post_divider_width', $result );
		}
		if ( isset( $_POST["wppt-ticker-post-padding-top"] ) ){
			$result = $_POST["wppt-ticker-post-padding-top"];
			update_post_meta( $post_id, '_wppt_ticker_post_padding_top', $result );
		}
				
		if ( isset( $_POST["wppt-ticker-post-padding-right"] ) ){
			$result = $_POST["wppt-ticker-post-padding-right"];
			update_post_meta( $post_id, '_wppt_ticker_post_padding_right', $result );
		}	
		if ( isset( $_POST["wppt-ticker-post-padding-bottom"] ) ){
			$result = $_POST["wppt-ticker-post-padding-bottom"];
			update_post_meta( $post_id, '_wppt_ticker_post_padding_bottom', $result );
		}	
		if ( isset( $_POST["wppt-ticker-post-padding-left"] ) ){
			$result = $_POST["wppt-ticker-post-padding-left"];
			update_post_meta( $post_id, '_wppt_ticker_post_padding_left', $result );
		}	
		if ( isset( $_POST["wppt-ticker-post-divider-style"] ) ){
			$result = $_POST["wppt-ticker-post-divider-style"];
			update_post_meta( $post_id, '_wppt_ticker_post_divider_style', $result );
		}	
		if ( isset( $_POST["wppt-ticker-post-divider-color"] ) ){
			$result = $_POST["wppt-ticker-post-divider-color"];
			update_post_meta( $post_id, '_wppt_ticker_post_divider_color', $result );
		}	
		if ( isset( $_POST["wppt-ticker-post-title-size"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-post-title-size"];
			update_post_meta( $post_id, '_wppt_ticker_post_title_size', $result );
		}
		if ( isset( $_POST["wppt-ticker-post-title-color"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-post-title-color"];
			update_post_meta( $post_id, '_wppt_ticker_post_title_color', $result );
		}
		if ( isset( $_POST["wppt-ticker-post-meta-one-size"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-post-meta-one-size"];
			update_post_meta( $post_id, '_wppt_ticker_post_meta_one_size', $result );
		}
		if ( isset( $_POST["wppt-ticker-post-meta-one-color"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-post-meta-one-color"];
			update_post_meta( $post_id, '_wppt_ticker_post_meta_one_color', $result );
		}
		if ( isset( $_POST["wppt-ticker-post-meta-two-size"] ) ){ // value: int in px
			$result = $_POST["wppt-ticker-post-meta-two-size"];
			update_post_meta( $post_id, '_wppt_ticker_post_meta_two_size', $result );
		}
		if ( isset( $_POST["wppt-ticker-post-meta-two-color"] ) ){ // value: color picker
			$result = $_POST["wppt-ticker-post-meta-two-color"];
			update_post_meta( $post_id, '_wppt_ticker_post_meta_two_color', $result );
		}
	}
	
	//Add widget to call the plugin public display
	public function wppt_register_widgets(){
		register_widget( 'WP_Post_ticker_Widget' );
	}
	//Metabox Callbacks - Options
	public function callback_wppt_add_meta_box( $post ){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wppt-meta-box-settings.php';
	}
	//Metabox Callback - Information
	public function callback_wppt_add_meta_info( $post ){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wppt-meta-box-info.php';
	}
	//Metabox Callback - Style
	public function callback_wppt_add_meta_style( $post ){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wppt-meta-box-styles.php';
	}
	//Metabox Callback to add each post an option to specifcy ratings
	public function callback_wppt_global_post_add_meta_box( $post ){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wppt-meta-box-wp-post.php';
	}
	//Callback to display insturction menu page
	public function display_wppt_admin_menu_instruction(){
		require_once('partials/menu-page-instruction.php');
	}
	//Callback to display global style options menu page
	public function display_wppt_admin_menu_global_style(){
		require_once('partials/menu-page-global-styles.php');
	}
	public function wppt_notice_php_version_critical(){
		$notice = '<div class="notice notice-error is-dismissible wpcdd-notice-error"><p>
		<strong>Your PHP Version ' . phpversion() . '	is <a href="http://php.net/supported-versions.php" target="_blank">out of support</a></strong> and there could be <a href="https://www.cvedetails.com/vulnerability-list/vendor_id-74/product_id-128/PHP-PHP.html" target="_blank">serious security issues</a>. We strongly recommend that you upgrade your PHP version. If security and performance of your website is important, please checkout the <a href="https://icanwp.com/_link?a=we" target="_blank">Managed WordPress Hosting</a> we recommend.</p></div>';
		echo $notice;
	}
	
	public function wppt_notice_get_pro_version(){
		$notice = '<div class="notice notice-warning is-dismissible wpcdd-notice-warning wppt-pro-notification"><p>
		If you like our Post Ticker, please support us by purchasing our pro version <a href="https://icanwp.com/_link?a=ccpt" target="_blank">WP Post Ticker Pro</a> that has many more features.</div>';
		echo $notice;
	}
	
	public function wppt_portfolio_dismiss_pro_notice(){
		update_option( 'wppt_notice_get_pro_version_dismissed', '1' );
	}
	
	public function wppt_user_logins(){
		delete_option( 'wppt_notice_get_pro_version_dismissed' );
	}
}