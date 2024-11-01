<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_title_padding' );
$wppt_container_title_padding_top = ( empty( $data['top'] ) ? 15 : $data['top'] );
$wppt_container_title_padding_right = ( empty( $data['right'] ) ? 15 : $data['right'] );
$wppt_container_title_padding_bottom = ( empty( $data['bottom'] ) ? 15 : $data['bottom'] );
$wppt_container_title_padding_left = ( empty( $data['left'] ) ? 15 : $data['left'] );
 ?>
<div class="wppt-ticker-container-padding wppt-ticker-container-spacing">
	<label for="wppt-ticker-container-padding-top">Top:</label>
	<input type="number" name="wppt_global_container_title_padding[top]" class="wppt-ticker-container-padding-top"" min="0" max="500" value="<?php echo $wppt_container_title_padding_top ?>" /><span class="wppt-right-margin">px</span>
	
	<label for="wppt-ticker-container-padding-right">Right:</label>
	<input type="number" name="wppt_global_container_title_padding[right]" class="wppt-ticker-container-padding-right"" min="0" max="500" value="<?php echo $wppt_container_title_padding_right ?>" /><span class="wppt-right-margin">px</span>
	
	<label for="wppt-ticker-container-padding-bottom">Bottom:</label>
	<input type="number" name="wppt_global_container_title_padding[bottom]" class="wppt-ticker-container-padding-bottom"" min="0" max="500" value="<?php echo $wppt_container_title_padding_bottom ?>" /><span class="wppt-right-margin">px</span>
	
	<label for="wppt-ticker-container-padding-left">Left:</label>
	<input type="number" name="wppt_global_container_title_padding[left]" class="wppt-ticker-container-padding-left"" min="0" max="500" value="<?php echo $wppt_container_title_padding_left ?>" /><span class="wppt-right-margin">px</span>
</div>