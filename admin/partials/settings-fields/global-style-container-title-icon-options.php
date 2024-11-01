<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_title_icon_options' );
$wppt_container_control_icon_size = ( empty( $data['size'] ) ? 14 : $data['size'] );
$wppt_container_control_icon_color = ( empty( $data['color'] ) ? 'rgba(122, 122, 122, 1)' : $data['color'] );
$wppt_container_control_icon_align = ( empty( $data['align'] ) ? 'center': $data['align'] );
 ?>
<div class="wppt-ticker-icon-section wppt-ticker-container-spacing">
	<label for="wppt-ticker-control-icon-size">Size in Pixels:</label>
	<input type="number" name="wppt_global_container_title_icon_options[size]" class="wppt-ticker-control-icon-size" min="0" max="500" value="<?php echo $wppt_container_control_icon_size ?>" /><span class="wppt-right-margin">px</span>
	<label for="wppt-ticker-control-icon-color">Color:</label>
	<input type="text" id="wppt-ticker-control-icon-color" name="wppt_global_container_title_icon_options[color]" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo $wppt_container_control_icon_color ?>"  />
	<label for="wppt-ticker-container-bts">Alignment:</label>
	<label><input type="radio" class="wppt-ticker-control-icon-align" name="wppt_global_container_title_icon_options[align]" value="center" <?php echo ( $wppt_container_control_icon_align == 'center' ? 'checked' : '' ) ?>> Center </label>
	<label><input type="radio" class="wppt-ticker-control-icon-align" name="wppt_global_container_title_icon_options[align]" value="left" <?php echo ( $wppt_container_control_icon_align == 'left' ? 'checked' : '' ) ?>> Left </label>
	<label><input type="radio" class="wppt-ticker-control-icon-align" name="wppt_global_container_title_icon_options[align]" value="right" <?php echo ( $wppt_container_control_icon_align == 'right' ? 'checked' : '' ) ?>> Right </label>
</div>