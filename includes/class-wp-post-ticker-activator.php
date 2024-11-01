<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Fired during plugin activation
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/includes
 * @author     iCanWP Team
 */
class WP_Post_ticker_Activator {

	/**
	 * On plugin activation, sets the default values for all global style options.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$wppt_global_container_bg = array(
			'color' => 'rgba(255,255,255,1)',
			'transparent' => 1
		);
		$wppt_global_container_border_top = array(
			'width' =>'5',
			'style' =>'solid',
			'color' =>'rgba(0, 133, 186, 1)'
		);
		$wppt_global_container_border_right = array(
			'width' =>'1',
			'style' =>'solid',
			'color' =>'rgba(200, 200, 200, 1)'
		);
		$wppt_global_container_border_bottom = array(
			'width' =>'1',
			'style' =>'solid',
			'color' =>'rgba(200, 200, 200, 1)'
		);
		$wppt_global_container_border_left = array(
			'width' =>'1',
			'style' =>'solid',
			'color' =>'rgba(200, 200, 200, 1)'
		);
		$wppt_global_container_title_font_align = 'left';
		$wppt_global_container_title_colors = array(
			'fcolor' => 'rgba(0, 0, 0, 1)',
			'bcolor' => 'rgba(255, 255, 255, 1)'
		);
		$wppt_global_container_title_padding = array(
			'top' => 15,
			'right' => 15,
			'bottom' => 15,
			'left' => 15
		);
		$wppt_global_container_title_font_size = array(
			'size' => 20,
			'height' => 20
		);
		$wppt_global_container_title_border_bottom = array(
			'width' =>'1',
			'style' =>'solid',
			'color' =>'rgba(200, 200, 200, 1)'
		);
		$wppt_global_container_title_icon_options = array(
			'size' => 14,
			'color' => 'rgba(122, 122, 122, 1)',
			'align' => 'center'
		);
		$wppt_global_container_nav_display = 'yes';
		$wppt_global_container_title_nav_padding = array(
			'top' => 5,
			'right' => 5,
			'bottom' => 5,
			'left' => 5
		);
		$wppt_global_container_title_nav_border_bottom = array(
			'width' =>'1',
			'style' =>'solid',
			'color' =>'rgba(200, 200, 200, 1)'
		);
		$wppt_global_container_post_divider = array(
			'width' =>'1',
			'style' =>'solid',
			'color' =>'rgba(200, 200, 200, 1)'
		);
		$wppt_global_container_post_padding = array(
			'top' => 10,
			'right' => 10,
			'bottom' => 10,
			'left' => 10
		);
		$wppt_global_container_post_display_title = array(
			'width' => 16,
			'color' => 'rgba(0, 0, 0, 1)'
		);
		$wppt_global_container_post_display_meta_one = array(
			'width' => 13,
			'color' => 'rgba(0, 0, 0, 1)'
		);
		$wppt_global_container_post_display_meta_two = array(
			'width' => 13,
			'color' => 'rgba(0, 0, 0, 1)'
		);
		
		add_option( 'wppt_global_container_bg', $wppt_global_container_bg );
		add_option( 'wppt_global_container_border_top', $wppt_global_container_border_top );
		add_option( 'wppt_global_container_border_right', $wppt_global_container_border_right );
		add_option( 'wppt_global_container_border_bottom', $wppt_global_container_border_bottom );
		add_option( 'wppt_global_container_border_left', $wppt_global_container_border_left );
		add_option( 'wppt_global_container_title_font_align', $wppt_global_container_title_font_align );
		add_option( 'wppt_global_container_title_colors', $wppt_global_container_title_colors );
		add_option( 'wppt_global_container_title_padding', $wppt_global_container_title_padding );
		add_option( 'wppt_global_container_title_font_size', $wppt_global_container_title_font_size );
		add_option( 'wppt_global_container_title_border_bottom', $wppt_global_container_title_border_bottom );
		add_option( 'wppt_global_container_title_icon_options', $wppt_global_container_title_icon_options );
		add_option( 'wppt_global_container_nav_display', $wppt_global_container_nav_display );
		add_option( 'wppt_global_container_title_nav_padding', $wppt_global_container_title_nav_padding );
		add_option( 'wppt_global_container_title_nav_border_bottom', $wppt_global_container_title_nav_border_bottom );
		add_option( 'wppt_global_container_post_divider', $wppt_global_container_post_divider );
		add_option( 'wppt_global_container_post_padding', $wppt_global_container_post_padding );
		add_option( 'wppt_global_container_post_display_title', $wppt_global_container_post_display_title );
		add_option( 'wppt_global_container_post_display_meta_one', $wppt_global_container_post_display_meta_one );
		add_option( 'wppt_global_container_post_display_meta_two', $wppt_global_container_post_display_meta_two );
	}

}
