<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_title_colors' );
$wppt_container_title_font_color = ( empty( $data['fcolor'] ) ? 'rgba(0, 0, 0, 1)' : $data['fcolor'] );
$wppt_container_title_bg_color = ( empty( $data['bcolor'] ) ? 'rgba(255, 255, 255, 1)' : $data['bcolor'] );
 ?>
<div class="wppt-ticker-title-section wppt-ticker-container-spacing">
	<label for="wppt-ticker-title-font-color">Font Color:</label>
	<input type="text" id="wppt-ticker-title-font-color" name="wppt_global_container_title_colors[fcolor]" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo $wppt_container_title_font_color ?>"  />
	<label for="wppt-ticker-title-bg">Background Color:</label>
	<input type="text" id="wppt-ticker-title-bg" name="wppt_global_container_title_colors[bcolor]" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo $wppt_container_title_bg_color ?>"  />
</div>	