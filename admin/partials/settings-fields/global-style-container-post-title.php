<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_post_display_title' );
$wppt_container_post_title_size = ( empty( $data['width'] ) ? 16 : $data['width'] );
$wppt_container_post_title_color = ( empty( $data['color'] ) ? 'rgba(0, 0, 0, 1)' : $data['color'] );
 ?>
<div class="wppt-ticker-post-title-section wppt-ticker-container-spacing">
	<label for="wppt-ticker-post-title-size">Size in Pixels:</label>
	<input type="number" name="wppt_global_container_post_display_title[width]" class="wppt-ticker-post-title-size" min="0" max="500" value="<?php echo $wppt_container_post_title_size ?>" /><span class="wppt-right-margin">px</span>
	<label for="wppt-ticker-post-title-color">Color:</label>
	<input type="text" id="wppt-ticker-post-title-color" name="wppt_global_container_post_display_title[color]" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo $wppt_container_post_title_color ?>"  />
</div>