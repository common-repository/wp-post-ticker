<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_post_display_meta_one' );
$wppt_container_post_meta_one_size = ( empty( $data['width'] ) ? 13 : $data['width'] );
$wppt_container_post_meta_one_color = ( empty( $data['color'] ) ? 'rgba(0, 0, 0, 1)' : $data['color'] );
 ?>
<div class="wppt-ticker-post-meta-section wppt-ticker-container-spacing">
	<label for="wppt-ticker-post-meta-size">Size in Pixels:</label>
	<input type="number" name="wppt_global_container_post_display_meta_one[width]" class="wppt-ticker-post-title-size" min="0" max="500" value="<?php echo $wppt_container_post_meta_one_size ?>" /><span class="wppt-right-margin">px</span>
	<label for="wppt-ticker-post-meta-color">Color:</label>
	<input type="text" id="wppt-ticker-post-meta-color" name="wppt_global_container_post_display_meta_one[color]" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo $wppt_container_post_meta_one_color ?>"  />
</div>