<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/* WP Post Ticker Widget */
class WP_Post_ticker_Widget extends WP_Widget{
	public function __construct() {
		parent::__construct(
			'wp-post-ticker-widget',
			'WP Post Ticker',
			array(
				'description' => __( 'Add this widget to display WP Post Ticker', 'wp-post-ticker' )
			)
		);
	}
	
	/* Admin Dislay */
	public function form( $instance ) { //loads all published settings
		$wppt_ticker_selected = ( !empty( $instance ) ? strip_tags( $instance['wppt_ticker_selected'] ) : '' );
		$wppt_arg = array(
		 'orderby' => 'ASC',
		 'post_type' => 'wppt_post_ticker',
		 'posts_per_page' => -1,
		 'post_status' => 'publish'
		);
		$wppt_settings = get_posts( $wppt_arg );
		$html = '
			<div class="wppt-widget-post-ticker-settings">
				<label for="'. $this->get_field_id('wppt_ticker_selected') .'">' . _e('WP Post Ticker:') . '</label>
				<select class="widefat" id="' . $this->get_field_id('wppt_ticker_selected') . '" name="' . $this->get_field_name('wppt_ticker_selected') .'">';
		foreach ( $wppt_settings as $wppt_setting ){
			$wppt_title = $wppt_setting->post_title;
			$wppt_id = $wppt_setting->ID;
			$html .= '<option value="' . $wppt_id . '"' . ( $wppt_ticker_selected == $wppt_id ? ' selected' : '' ) . '>' . ( !empty( $wppt_title ) ? $wppt_title : '[No Name]' ) . ' (Widget ID: '. $wppt_id . ')</option>';
		}
		$html .='
				</select>
			</div>';
		echo $html;
	}
	
	/* Handles Widget Data Update */	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;		
		$instance['wppt_ticker_selected'] = strip_tags($new_instance['wppt_ticker_selected']);

		return $instance;
	}
	
	/* Widget public output */
	public function widget( $args, $instance ) {
		$wppt_id = $instance['wppt_ticker_selected'];
		require plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/wp-post-ticker-public-display.php';
	}
}
?>