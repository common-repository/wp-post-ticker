<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_title_font_size' );
$wppt_container_title_font_size =  ( empty( $data['size'] ) ? 20 : $data['size'] );
$wppt_container_title_line_height = ( empty( $data['height'] ) ? 20 : $data['size'] );

 ?>
<div class="wppt-ticker-title-section wppt-ticker-container-spacing">
	<label for="wppt_global_container_title_font_size">Font Size in Pixels:</label>
	<input type="number" name="wppt_global_container_title_font_size[size]" class="wppt-ticker-title-font-size" min="1" max="500" value="<?php echo $wppt_container_title_font_size ?>" /><span class="wppt-right-margin">px</span>
	<label for="wppt_global_container_title_line_height">Line Height in Pixels:</label>
	<input type="number" name="wppt_global_container_title_font_size[height]" class="wppt-ticker-title-font-size" min="1" max="500" value="<?php echo $wppt_container_title_line_height ?>" /><span class="wppt-right-margin">px</span>
</div>