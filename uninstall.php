<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
if ( ! current_user_can( 'activate_plugins' ) ) {
	exit;
}

// Deletes all global style settings in the WP Options table upon uninstall
$wppt_global_options = array(
	'wppt_global_container_bg',
	'wppt_global_container_border_top',
	'wppt_global_container_border_right',
	'wppt_global_container_border_bottom',
	'wppt_global_container_border_left',
	'wppt_global_container_title_font_align',
	'wppt_global_container_title_colors',
	'wppt_global_container_title_padding',
	'wppt_global_container_title_font_size',
	'wppt_global_container_title_border_bottom',
	'wppt_global_container_title_icon_options',
	'wppt_global_container_nav_display',
	'wppt_global_container_title_nav_padding',
	'wppt_global_container_title_nav_border_bottom',
	'wppt_global_container_post_divider',
	'wppt_global_container_post_padding',
	'wppt_global_container_post_display_title',
	'wppt_global_container_post_display_meta_one',
	'wppt_global_container_post_display_meta_two'
);
foreach( $wppt_global_options as $option ){
	delete_option($option);	
}

// Remove all the WP Post Settings - Custom Post Types
$wppt_args = array( // builds argument to pass to build a new query
	'post_type' => 'wppt_post_ticker',
	'post_status' => array( 'any', 'trash', 'auto-draft' ),
	'posts_per_page' => -1,
	'no_found_rows'          => true,
	'cache_results'          => false,
	'update_post_term_cache' => false,
	'update_post_meta_cache' => false,
);
$wppt_posts = new WP_Query( $wppt_args );

foreach( $wppt_posts->posts as $post ){
	wp_delete_post( $post->ID, true );
}

wp_reset_postdata(); //reset the WP Query