<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/public/partials
 */

 
$wppt_settings = get_post_meta( $wppt_id ); //get all the settings of wppt
$wppt_settings_title = get_the_title( $wppt_id );
//wppt SETTINGS 
$wppt_adv_mode = $wppt_settings['_wppt_post_advance_mode'][0]; // @param: 0,1,2,3,4 - scroll options 
$wppt_adv_speed = $wppt_settings['_wppt_post_advance_speed'][0]; // @cond: adv_mode = 1/2/3 - @param: integer (milliseconds)
$wppt_adv_direction = $wppt_settings['_wppt_post_advance_direction'][0]; // @cond: adv_mode = 1/2/3 - @param: 0, 1
$wppt_adv_animation_speed = $wppt_settings['_wppt_post_advance_animation_speed'][0];
$wppt_adv_animation_easing = $wppt_settings['_wppt_post_advance_animation_easing'][0];
$wppt_cat = $wppt_settings['_wppt_post_cat']; // @param: integer - Serialized Data at Array[0]
$wppt_filter_mode = $wppt_settings['_wppt_post_filter_mode'][0]; // @param: 0/1/2
$wppt_filter_auth = $wppt_settings['_wppt_post_filter_author']; // @cond: filter_mode = 1/2 - Serialized Data at Array[0]
$wppt_sort = $wppt_settings['_wppt_post_sort'][0]; // @param: 0/1/2/3/4
$wppt_disp_opt_thumb = $wppt_settings['_wppt_post_display_options_thumb'][0]; //@param: 0/1
$wppt_disp_opt_metaone = $wppt_settings['_wppt_post_display_options_metaone'][0]; //@param: 0/1/2/3/4/5
$wppt_disp_opt_metatwo = $wppt_settings['_wppt_post_display_options_metatwo'][0]; //@param: 0/1/2/3/4/5
$wppt_thumb_w = $wppt_settings['_wppt_post_thumb_width'][0]; // @cond: disp_opt_thumb = 0 | @param: 40/60/80/100/120/140/160/180/200
$wppt_thumb_r = $wppt_settings['_wppt_post_thumb_ratio'][0]; // @cond: disp_opt_thumb = 0 | @param: 100/50/75/5625
$wppt_num_view = intval( $wppt_settings['_wppt_post_num_view'][0] ); // @param: integer 1~15
$wppt_num_load = $wppt_settings['_wppt_post_num_load'][0]; // @param: integer 1~45
$wppt_frame_max_w_opt = $wppt_settings['_wppt_post_frame_max_width_option'][0]; //@param: 0/1/2
$wppt_frame_max_w_pc = $wppt_settings['_wppt_post_frame_max_width_pc'][0]; // @cond: frame_max_w_opt = 1/2 | @param: integer 
$wppt_frame_max_w_px = $wppt_settings['_wppt_post_frame_max_width_px'][0]; // @cond: frame_max_w_opt = 1/2 | @param: integer 
$wppt_hide_pass = $wppt_settings['_wppt_post_hide_pass_protected'][0]; // @param: 0/1
$wppt_thumb_position = $wppt_settings['_wppt_post_thumb_position'][0]; // @param: 0 - top / 1 - center

$wppt_frame_max_width = ''; //create max width of the ticker frame to use as  a inline css
if( $wppt_frame_max_w_opt == '1' ){
	$wppt_frame_max_width .= $wppt_frame_max_w_px . 'px';
} elseif ( $wppt_frame_max_w_opt == '2' ){
	$wppt_frame_max_width .= $wppt_frame_max_w_pc . '%';
} else {
	$wppt_frame_max_width = '100%';
}

//wppt unserialization.
$wppt_cat	=	unserialize( $wppt_cat[0] ); 
$wppt_filter_auth	=	unserialize( $wppt_filter_auth[0] );

$wppt_use_global = $wppt_settings['_wppt_ticker_inherit_global_style'][0]; //check if using global settings override

if( $wppt_use_global == '0' ){ //Using Global Style
	$wppt_arr_container_bt = get_option( 'wppt_global_container_border_top' );
	$wppt_arr_container_br = get_option( 'wppt_global_container_border_right' );
	$wppt_arr_container_bb = get_option( 'wppt_global_container_border_bottom' );
	$wppt_arr_container_bl = get_option( 'wppt_global_container_border_left' );
	$wppt_arr_title_color = get_option( 'wppt_global_container_title_colors' );
	$wppt_arr_title_padding = get_option( 'wppt_global_container_title_padding' );
	$wppt_arr_title_bb = get_option( 'wppt_global_container_title_border_bottom' );
	$wppt_arr_title_font = get_option( 'wppt_global_container_title_font_size' );
	$wppt_arr_icon_options = get_option( 'wppt_global_container_title_icon_options' );
	$wppt_arr_nav_border_bottom = get_option( 'wppt_global_container_title_nav_border_bottom' );
	$wppt_arr_nav_padding = get_option( 'wppt_global_container_title_nav_padding' );
	$wppt_arr_post_divider_options = get_option( 'wppt_global_container_post_divider' );
	$wppt_arr_post_padding = get_option( 'wppt_global_container_post_padding' );
	$wppt_arr_post_title_options = get_option( 'wppt_global_container_post_display_title' );
	$wppt_arr_post_meta_one_options = get_option( 'wppt_global_container_post_display_meta_one' );
	$wppt_arr_post_meta_two_options = get_option( 'wppt_global_container_post_display_meta_two' );
	$wppt_arr_container_bg = get_option( 'wppt_global_container_bg' );
	$wppt_style_control_nav_display = get_option( 'wppt_global_container_nav_display' );	
	if( isset( $wppt_arr_container_bg['transparent'] ) ){
		$wppt_style_container_bg = 'rbga(0,0,0,0)';
	} else {
		$wppt_style_container_bg = $wppt_arr_container_bg['color'];
	}
	$wppt_style_container_btw = $wppt_arr_container_bt['width'];
	$wppt_style_container_bts = $wppt_arr_container_bt['style'];
	$wppt_style_container_btc = $wppt_arr_container_bt['color'];
	$wppt_style_container_brw = $wppt_arr_container_br['width'];
	$wppt_style_container_brs = $wppt_arr_container_br['style'];
	$wppt_style_container_brc = $wppt_arr_container_br['color'];
	$wppt_style_container_bbw = $wppt_arr_container_bb['width'];
	$wppt_style_container_bbs = $wppt_arr_container_bb['style'];
	$wppt_style_container_bbc = $wppt_arr_container_bb['color'];
	$wppt_style_container_blw = $wppt_arr_container_bl['width'];
	$wppt_style_container_bls = $wppt_arr_container_bl['style'];
	$wppt_style_container_blc = $wppt_arr_container_bl['color'];
	$wppt_style_container_title_size = $wppt_arr_title_font['size'];
	$wppt_style_container_title_line_height = $wppt_arr_title_font['height'];
	$wppt_style_container_title_text_align = $wppt_arr_title_font['align'];
	$wppt_style_container_title_padding_top = $wppt_arr_title_padding['top'];	
	$wppt_style_container_title_padding_right = $wppt_arr_title_padding['right'];	
	$wppt_style_container_title_padding_bottom = $wppt_arr_title_padding['bottom'];	
	$wppt_style_container_title_padding_left = $wppt_arr_title_padding['left'];	
	$wppt_style_container_title_color = $wppt_arr_title_color['fcolor'];
	$wppt_style_container_title_bg = $wppt_arr_title_color['bcolor'];
	$wppt_style_container_title_bbw = $wppt_arr_title_bb['width'];
	$wppt_style_container_title_bbs = $wppt_arr_title_bb['style'];
	$wppt_style_container_title_bbc = $wppt_arr_title_bb['color'];
	$wppt_style_control_icon_size = $wppt_arr_icon_options['size'];
	$wppt_style_control_icon_color = $wppt_arr_icon_options['color'];
	$wppt_style_control_icon_align = $wppt_arr_icon_options['align'];
	$wppt_style_control_nav_padding_top = $wppt_arr_nav_padding['top'];
	$wppt_style_control_nav_padding_right = $wppt_arr_nav_padding['right'];
	$wppt_style_control_nav_padding_bottom = $wppt_arr_nav_padding['bottom'];
	$wppt_style_control_nav_padding_left = $wppt_arr_nav_padding['left'];
	$wppt_style_control_nav_bbw = $wppt_arr_nav_border_bottom['width'];
	$wppt_style_control_nav_bbs = $wppt_arr_nav_border_bottom['style'];
	$wppt_style_control_nav_bbc = $wppt_arr_nav_border_bottom['color'];
	$wppt_style_post_divider_width = intval( $wppt_arr_post_divider_options['width'] );
	$wppt_style_post_divider_style = $wppt_arr_post_divider_options['style'];
	$wppt_style_post_divider_color = $wppt_arr_post_divider_options['color'];
	$wppt_style_post_padding_top = $wppt_arr_post_padding['top'];
	$wppt_style_post_padding_right = $wppt_arr_post_padding['right'];
	$wppt_style_post_padding_bottom = $wppt_arr_post_padding['bottom'];
	$wppt_style_post_padding_left = $wppt_arr_post_padding['left'];
	$wppt_style_post_title_size = $wppt_arr_post_title_options['width'];
	$wppt_style_post_title_color = $wppt_arr_post_title_options['color'];
	$wppt_style_post_meta_one_size = $wppt_arr_post_meta_one_options['width'];
	$wppt_style_post_meta_one_color = $wppt_arr_post_meta_one_options['color'];
	$wppt_style_post_meta_two_size = $wppt_arr_post_meta_two_options['width'];
	$wppt_style_post_meta_two_color = $wppt_arr_post_meta_two_options['color'];
} else { // When not using the global style setting, use independent style settings
	//wppt STYLE
	$wppt_style_container_bg = $wppt_settings['_wppt_ticker_container_bg'][0];
	if( $wppt_settings['_wppt_ticker_container_bg_transparent'][0] == '1' ){ //check to see if bg color is set transparent
		$wppt_style_container_bg = 'rgba(0,0,0,0)';
	} else {
		$wppt_style_container_bg = $wppt_settings['_wppt_ticker_container_bg'][0];
	}
	$wppt_style_control_nav_display = $wppt_settings['_wppt_ticker_control_display'][0]; //accessing values from the first index of array
	$wppt_style_container_btw = $wppt_settings['_wppt_ticker_container_btw'][0]; 
	$wppt_style_container_bts = $wppt_settings['_wppt_ticker_container_bts'][0];
	$wppt_style_container_btc = $wppt_settings['_wppt_ticker_container_btc'][0];
	$wppt_style_container_brw = $wppt_settings['_wppt_ticker_container_brw'][0];
	$wppt_style_container_brs = $wppt_settings['_wppt_ticker_container_brs'][0];
	$wppt_style_container_brc = $wppt_settings['_wppt_ticker_container_brc'][0];
	$wppt_style_container_bbw = $wppt_settings['_wppt_ticker_container_bbw'][0];
	$wppt_style_container_bbs = $wppt_settings['_wppt_ticker_container_bbs'][0];
	$wppt_style_container_bbc = $wppt_settings['_wppt_ticker_container_bbc'][0];
	$wppt_style_container_blw = $wppt_settings['_wppt_ticker_container_blw'][0];
	$wppt_style_container_bls = $wppt_settings['_wppt_ticker_container_bls'][0];
	$wppt_style_container_blc = $wppt_settings['_wppt_ticker_container_blc'][0];
	$wppt_style_container_title_size = $wppt_settings['_wppt_ticker_title_font_size'][0];
	$wppt_style_container_title_line_height = $wppt_settings['_wppt_ticker_title_font_line_height'][0];
	$wppt_style_container_title_text_align = $wppt_settings['_wppt_ticker_title_alignment'][0];
	$wppt_style_container_title_color = $wppt_settings['_wppt_ticker_title_font_color'][0];
	$wppt_style_container_title_padding_top = $wppt_settings['_wppt_ticker_title_padding_top'][0];
	$wppt_style_container_title_padding_right = $wppt_settings['_wppt_ticker_title_padding_right'][0];
	$wppt_style_container_title_padding_bottom = $wppt_settings['_wppt_ticker_title_padding_bottom'][0];
	$wppt_style_container_title_padding_left = $wppt_settings['_wppt_ticker_title_padding_left'][0];
	$wppt_style_container_title_bg = $wppt_settings['_wppt_ticker_title_bg'][0];
	$wppt_style_container_title_bbw = $wppt_settings['_wppt_ticker_title_bbw'][0];
	$wppt_style_container_title_bbs = $wppt_settings['_wppt_ticker_title_bbs'][0];
	$wppt_style_container_title_bbc = $wppt_settings['_wppt_ticker_title_bbc'][0];
	$wppt_style_control_icon_size = $wppt_settings['_wppt_ticker_control_icon_size'][0];
	$wppt_style_control_icon_color = $wppt_settings['_wppt_ticker_control_icon_color'][0];
	$wppt_style_control_icon_align = $wppt_settings['_wppt_ticker_control_icon_align'][0];
	$wppt_style_control_nav_padding_top = $wppt_settings['_wppt_ticker_control_padding_top'][0];
	$wppt_style_control_nav_padding_right = $wppt_settings['_wppt_ticker_control_padding_right'][0];
	$wppt_style_control_nav_padding_bottom = $wppt_settings['_wppt_ticker_control_padding_bottom'][0];
	$wppt_style_control_nav_padding_left = $wppt_settings['_wppt_ticker_control_padding_left'][0];
	$wppt_style_control_nav_bbw = $wppt_settings['_wppt_ticker_control_bbw'][0];
	$wppt_style_control_nav_bbs = $wppt_settings['_wppt_ticker_control_bbs'][0];
	$wppt_style_control_nav_bbc = $wppt_settings['_wppt_ticker_control_bbc'][0];
	$wppt_style_post_divider_width = intval( $wppt_settings['_wppt_ticker_post_divider_width'][0] );
	$wppt_style_post_divider_style = $wppt_settings['_wppt_ticker_post_divider_style'][0];
	$wppt_style_post_divider_color = $wppt_settings['_wppt_ticker_post_divider_color'][0];
	$wppt_style_post_padding_top = $wppt_settings['_wppt_ticker_post_padding_top'][0];
	$wppt_style_post_padding_right = $wppt_settings['_wppt_ticker_post_padding_right'][0];
	$wppt_style_post_padding_bottom = $wppt_settings['_wppt_ticker_post_padding_bottom'][0];
	$wppt_style_post_padding_left = $wppt_settings['_wppt_ticker_post_padding_left'][0];
	$wppt_style_post_title_size = $wppt_settings['_wppt_ticker_post_title_size'][0];
	$wppt_style_post_title_color = $wppt_settings['_wppt_ticker_post_title_color'][0];
	$wppt_style_post_meta_one_size = $wppt_settings['_wppt_ticker_post_meta_one_size'][0];
	$wppt_style_post_meta_one_color = $wppt_settings['_wppt_ticker_post_meta_one_color'][0];
	$wppt_style_post_meta_two_size = $wppt_settings['_wppt_ticker_post_meta_two_size'][0];
	$wppt_style_post_meta_two_color = $wppt_settings['_wppt_ticker_post_meta_two_color'][0];
}

$wppt_post_element_margin_bottom = 15; //default margin, currently a fixed value, from post title, meta 1, and meta 2 is calculated to be always 15 px.
$wppt_style_post_height = 0;
$wppt_style_content_height = floatval( $wppt_style_post_meta_one_size ) + floatval( $wppt_style_post_meta_two_size ) + ( floatval( $wppt_style_post_title_size ) * 2.4 )  + $wppt_post_element_margin_bottom;
$wppt_style_thumb_margin_top = 0;

if ( $wppt_disp_opt_thumb == '1' ){ //not show thumbnail
	$wppt_style_post_height = $wppt_style_content_height;// + floatval( $wppt_style_post_padding_top ) + floatval( $wppt_style_post_padding_bottom );
} else { //show thumbnail
	$wppt_thumb_w = intval( $wppt_thumb_w );
	$wppt_thumb_h = $wppt_thumb_w * intval( $wppt_thumb_r ) / 100;
	$wppt_style_thumb_height = floatval( $wppt_thumb_h ); 
	if( $wppt_style_content_height > $wppt_style_thumb_height ){
		$wppt_style_thumb_margin_top = ( $wppt_style_content_height - $wppt_style_thumb_height ) / 2;
		$wppt_style_post_height = $wppt_style_content_height;// + floatval( $wppt_style_post_padding_top ) + floatval( $wppt_style_post_padding_bottom );
	} else {
		$wppt_style_post_height = $wppt_style_thumb_height;// + floatval( $wppt_style_post_padding_top ) + floatval( $wppt_style_post_padding_bottom );
	}
}

//Author Filter Section
$wppt_arg_authors = '';
$wppt_thumb_section_w = 0;

if( $wppt_filter_mode == '1' ){
	$wppt_filter_auth = $wppt_filter_auth;
} elseif ( $wppt_filter_mode == '2'){ //Defines whether to include or exclude authors
	$wppt_author_arr = array();
	foreach( $wppt_filter_auth as $author ){
		$author_exclude = intval( $author ) * -1;
		array_push( $wppt_author_arr, $author_exclude );
	}
	$wppt_filter_auth = $wppt_author_arr;
} else {
	$wppt_filter_auth = array( -0 );
}

$wppt_arg_authors = implode ( ', ', $wppt_filter_auth );

if( $wppt_hide_pass == '0' ){
	$wppt_hide_pass = false;
} else {
	$wppt_hide_pass = null;
}
//get sorting preference
if( $wppt_sort == '1'){
	$wppt_load_order = 'ASC';
	$wppt_load_orderby = 'date';
} elseif ( $wppt_sort == '2'){
	$wppt_load_order = 'DESC';
	$wppt_load_orderby = 'modified';
} elseif ( $wppt_sort == '3'){
	$wppt_load_order = 'ASC';
	$wppt_load_orderby = 'modified';
} elseif ( $wppt_sort == '4'){
	$wppt_load_order = '';
	$wppt_load_orderby = 'rand';
} else {
	$wppt_load_order = 'DESC';
	$wppt_load_orderby = 'date';
}

// builds argument to pass to build a new query
$wppt_arg = array( 
	'post_type' => 'post',
	'post_status' => 'publish',
	'order' => $wppt_load_order,
	'orderby' => $wppt_load_orderby,
	'category__in' => $wppt_cat,
	'author' => $wppt_arg_authors,
	'has_password' => $wppt_hide_pass,
	'posts_per_page' => intval($wppt_num_load)
);

// Create VAR Strings
$css_wppt_container_title_padding = $wppt_style_container_title_padding_top . 'px ' . $wppt_style_container_title_padding_right . 'px ' . $wppt_style_container_title_padding_bottom . 'px ' . $wppt_style_container_title_padding_left . 'px ';
$css_wppt_post_padding = $wppt_style_post_padding_top . 'px ' . $wppt_style_post_padding_right . 'px ' . $wppt_style_post_padding_bottom . 'px ' . $wppt_style_post_padding_left . 'px';
$css_wppt_nav_padding = $wppt_style_control_nav_padding_top . 'px ' . $wppt_style_control_nav_padding_right . 'px ' . $wppt_style_control_nav_padding_bottom . 'px ' . $wppt_style_control_nav_padding_left . 'px ';
$css_wppt_nav_border_bottom = $wppt_style_control_nav_bbw . 'px ' . $wppt_style_control_nav_bbs . ' ' . $wppt_style_control_nav_bbc;

/* wppt Display Loop */
$wppt_query = new WP_Query( $wppt_arg );
$wppt_post_count = $wppt_query->post_count;
if ( $wppt_post_count < $wppt_num_view ){
	$wppt_num_view = $wppt_post_count;
}
$wppt_post_outer_height = $wppt_style_post_height + floatval( $wppt_style_post_padding_top ) + floatval( $wppt_style_post_padding_bottom );
$wppt_post_container_height = ( $wppt_post_outer_height * $wppt_num_view ) + ( intval( $wppt_style_post_divider_width ) * ( $wppt_num_view - 1 ) );
//iterate through loaded posts with selected options
if( $wppt_query->have_posts() ){
	$html = '
	<div class="wppt-wrapper" style="width:' . $wppt_frame_max_width . ';min-width:120px;background-color:' . $wppt_style_container_bg . ';border-top:' . $wppt_style_container_btw . 'px ' . $wppt_style_container_bts . ' ' . $wppt_style_container_btc . ';border-right:' . $wppt_style_container_brw . 'px ' . $wppt_style_container_brs . ' ' . $wppt_style_container_brc . ';border-bottom:' . $wppt_style_container_bbw . 'px ' . $wppt_style_container_bbs . ' ' . $wppt_style_container_bbc . ';border-left:' . $wppt_style_container_blw . 'px ' . $wppt_style_container_bls . ' ' . $wppt_style_container_blc . ';" data-wppt-post-height="' . $wppt_post_outer_height . '" data-wppt-num-view="' . $wppt_num_view . '" data-wppt-adv-mode="' . $wppt_adv_mode . '" data-wppt-adv-speed="' . $wppt_adv_speed . '" data-wppt-adv-dir="' . $wppt_adv_direction . '" data-wppt-border-size="' .  $wppt_style_post_divider_width . '" data-wppt-post-cont="' . $wppt_post_container_height . '" data-wppt-easing-animation="' . $wppt_adv_animation_easing . '" data-wppt-easing-speed="' . $wppt_adv_animation_speed . '">
		<div class="wppt-header-wrapper">
			<div class="wppt-title-container" style="padding:' . $css_wppt_container_title_padding . ';border-bottom:' . $wppt_style_container_title_bbw . 'px ' . $wppt_style_container_title_bbs . ' ' . $wppt_style_container_title_bbc . ';background-color:' . $wppt_style_container_title_bg . ';margin:0;">
				<p class="wppt-title" style="font-size:' . $wppt_style_container_title_size . 'px;line-height:' . $wppt_style_container_title_line_height . 'px;color:' . $wppt_style_container_title_color . ';margin:0;text-align:' . $wppt_style_container_title_text_align . ';">' . $wppt_settings_title . '</p>
			</div>';
		if( $wppt_style_control_nav_display == '0'){
			$html .= '
			<div class="wppt-navigation" style="text-align:' . $wppt_style_control_icon_align . ';margin:0;padding:0;border-bottom:' . $css_wppt_nav_border_bottom . ';">
				<button type="button" class="fa fa-chevron-up wppt-next" style="background:none; border:none; font-size:' . $wppt_style_control_icon_size . 'px;line-height:' . $wppt_style_control_icon_size . 'px;color:' . $wppt_style_control_icon_color . ';padding:' . $css_wppt_nav_padding . '"></button>
				<button type="button" class="fa fa-chevron-down wppt-prev" style="background:none; border:none; font-size:' . $wppt_style_control_icon_size . 'px;line-height:' . $wppt_style_control_icon_size . 'px;color:' . $wppt_style_control_icon_color . ';padding:' . $css_wppt_nav_padding . '"></button>';
			if( $wppt_adv_mode == 2 || $wppt_adv_mode == 3 ){
				$html .='
					<button type="button" class="fa fa-play wppt-play" style="display:none; background:none; border:none; font-size:' . $wppt_style_control_icon_size . 'px;line-height:' . $wppt_style_control_icon_size . 'px;color:' . $wppt_style_control_icon_color . ';padding:' . $css_wppt_nav_padding . '"></button>
					<button type="button" class="fa fa-pause wppt-stop" style="background:none; border:none; font-size:' . $wppt_style_control_icon_size . 'px;line-height:' . $wppt_style_control_icon_size . 'px;color:' . $wppt_style_control_icon_color . ';padding:' . $css_wppt_nav_padding . '"></button>';
			} else {
				$html .='
					<button type="button" class="fa fa-play wppt-play" style="background:none; border:none; font-size:' . $wppt_style_control_icon_size . 'px;line-height:' . $wppt_style_control_icon_size . 'px;color:' . $wppt_style_control_icon_color . ';padding:' . $css_wppt_nav_padding . '"></button>
					<button type="button" class="fa fa-pause wppt-stop" style="display:none; background:none; border:none; font-size:' . $wppt_style_control_icon_size . 'px;line-height:' . $wppt_style_control_icon_size . 'px;color:' . $wppt_style_control_icon_color . ';padding:' . $css_wppt_nav_padding . '"></button>';
			}
			$html .= '</div>';
		}
		$html .= '<div class="wppt-clear-section"></div>
		</div>
		<div class="wppt-post-wrapper" style="position:relative;height:' . $wppt_post_container_height . 'px;overflow:hidden;display:block;">
			<ul class="wppt-post-container" style="padding-left:0;">
	';
	$count = 0; //display order of loaded posts in the ticker
	while ( $wppt_query->have_posts() ){
		$wppt_query->the_post();
		$wppt_this_post_meta = get_post_meta( get_the_ID() );
		$count++;
		if( isset( $wppt_this_post_meta['_wppt_wp_post_rating'][0] ) ){
			$wppt_this_post_rating = $wppt_this_post_meta['_wppt_wp_post_rating'][0];
		} else {
			$wppt_this_post_rating = null;
		}
		
		$wppt_post_cat = get_the_category();
		$wppt_post_cat = $wppt_post_cat[0]->cat_name;
		$wppt_post_images = get_attached_media( 'image' );
		$wppt_post_meta_one = '';
		$wppt_post_meta_two = '';

		if( $wppt_disp_opt_metaone == '1' ){
			$wppt_post_meta_one = 'by ' . get_the_author_link();
		} elseif( $wppt_disp_opt_metaone == '2' ){
			$wppt_post_meta_one = get_the_date( 'F j, Y' );
		} elseif( $wppt_disp_opt_metaone == '3' ){
			$wppt_post_meta_one = 'Updated: ' . get_the_modified_date( 'F j, Y' );
		} elseif( $wppt_disp_opt_metaone == '4' ){
			$wppt_post_meta_one = $wppt_post_cat;
		} elseif( $wppt_disp_opt_metaone == '5' ){
			if( isset( $wppt_this_post_rating ) ){
				$wppt_post_meta_one = '<span class="wppt-post-rating-' . $wppt_this_post_rating  . '"><span class="wppt-star"></span><span class="wppt-star"></span><span class="wppt-star"></span><span class="wppt-star"></span><span class="wppt-star"></span></span>';
			} else {
				$wppt_post_meta_one = null;
			}
		} else {
			$wppt_post_meta_one = null;
		}
		if( $wppt_disp_opt_metatwo == '1' ){
			$wppt_post_meta_two = 'by ' . get_the_author_link();
		} elseif( $wppt_disp_opt_metatwo == '2' ){
			$wppt_post_meta_two = get_the_date( 'F j, Y' ); //change date format here
		} elseif( $wppt_disp_opt_metatwo == '3' ){
			$wppt_post_meta_two = 'Updated: ' . get_the_modified_date( 'F j, Y' );
		} elseif( $wppt_disp_opt_metatwo == '4' ){
			$wppt_post_meta_two = $wppt_post_cat;
		} elseif( $wppt_disp_opt_metatwo == '5' ){
			if( isset( $wppt_this_post_rating ) ){
				$wppt_post_meta_two = '<span class="wppt-post-rating-' . $wppt_this_post_rating  . '"><span class="wppt-star"></span><span class="wppt-star"></span><span class="wppt-star"></span><span class="wppt-star"></span><span class="wppt-star"></span></span>';
			} else {
				$wppt_post_meta_two = null;
			}
		} else {
			$wppt_post_meta_two = null;
		}
		
		$html .= '
				<li class="wppt-post" data-wppt-order="' . $count . '" style="margin:0;padding:' . $css_wppt_post_padding . '; height:' . $wppt_style_post_height . 'px; border-bottom:' . $wppt_style_post_divider_width . 'px ' . $wppt_style_post_divider_style . ' ' . $wppt_style_post_divider_color . ';">
		';
		
		if ( $wppt_disp_opt_thumb == '0' && has_post_thumbnail() ){
			$wppt_thumb_section_w = intval( $wppt_thumb_w ) + 10;
			$html .= '
					<div class="wppt-thumbnail-wrapper" style="width:'.$wppt_thumb_w.'px; height:'.$wppt_thumb_h.'px; margin-right:10px; margin-top:' . ( $wppt_thumb_position == '1' ? $wppt_style_thumb_margin_top : 0 ) . 'px; float:left;">
						<div class="wppt-thumb-container">
							<div class="wppt-img-thumb" style="width:'.$wppt_thumb_w.'px; height:'.$wppt_thumb_h.'px; background-image:url('.wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( $wppt_thumb_w, $wppt_thumb_h  ) )[0].'); background-size:cover;">&nbsp;</div>
						</div>
					</div>
			';
		}
		
		$html .= '
					<div class="wppt-content" style="width: calc(100% - ' . $wppt_thumb_section_w . 'px);">
						<div class="wppt-post-title-wrapper" style="overflow:hidden;margin-bottom:10px;padding:0;height:' . intval($wppt_style_post_title_size) * 2.4 . 'px;">
							<h3 class="wppt-post-title" style="font-size:' . $wppt_style_post_title_size . 'px;color:' . $wppt_style_post_title_color . ';line-height:' . intval($wppt_style_post_title_size) * 1.2 . 'px;margin:0;padding:0;"><a href="' . get_permalink() . '" style="box-shadow:none; font-size:' . $wppt_style_post_title_size . 'px;color:' . $wppt_style_post_title_color . ';line-height:' . intval($wppt_style_post_title_size) * 1.2 . 'px;margin:0;padding:0;border:none;text-decoration:none;">' . get_the_title() . '</a></h3>
						</div>
		';
		
		if( isset( $wppt_post_meta_one ) ){
			$html .= '
						<div class="wppt-meta first-meta">
							<p class="wppt-meta-one" style="font-size:' . $wppt_style_post_meta_one_size . 'px;line-height:' . $wppt_style_post_meta_one_size . 'px;height:' . $wppt_style_post_meta_one_size . 'px;overflow:hidden;color:' . $wppt_style_post_meta_one_color . ';margin:0;padding:0;">' . $wppt_post_meta_one . '</p>
						</div>
			';
		}
		
		if( isset( $wppt_post_meta_two ) ){
			$html .= '
						<div class="wppt-meta second-meta" style="margin:0;">
							<p class="wppt-meta-two" style="font-size:' . $wppt_style_post_meta_two_size . 'px;line-height:' . $wppt_style_post_meta_two_size . 'px;height:' . $wppt_style_post_meta_two_size . 'px;overflow:hidden;color:' . $wppt_style_post_meta_two_color . ';margin:0;padding:0;">' . $wppt_post_meta_two . '</p>
						</div>
			';
		}
		$html .= '
					</div>
				</li>
		';
	} //END Custom Loop
	wp_reset_postdata(); //RESET WP QUERY
	$html .= '
			</ul>
		</div>
	</div>
	';
}
echo $html;
?>