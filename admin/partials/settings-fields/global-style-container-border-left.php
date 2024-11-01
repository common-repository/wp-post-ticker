<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_border_left' );
$wppt_container_border_left_width = ( empty( $data['width'] ) ? 1 : $data['width'] );
$wppt_container_border_left_style = ( empty( $data['style'] ) ? 'solid' : $data['style'] );
$wppt_container_border_left_color = ( empty( $data['color'] ) ? 'rgba(200, 200, 200, 1)' : $data['color'] );
 ?>
<div class="wppt-ticker-container-border-top wppt-ticker-container-spacing">
	<label for="wppt-ticker-container-btw">Pixel Width:</label>
	<input type="number" name="wppt_global_container_border_left[width]" class="wppt-ticker-container-btw"" min="0" max="500" value="<?php echo $wppt_container_border_left_width ?>" /><span class="wppt-right-margin">px</span>
	<label for="wppt-ticker-container-bts">Border Line Style:</label>
	<select name="wppt_global_container_border_left[style]" class="wppt-ticker-container-bts">
		<option value="none" <?php echo ( $wppt_container_border_left_style == 'none' ? 'selected' : '' ) ?>>None</option>
		<option value="hidden" <?php echo ( $wppt_container_border_left_style == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
		<option value="dotted" <?php echo ( $wppt_container_border_left_style == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
		<option value="dashed" <?php echo ( $wppt_container_border_left_style == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
		<option value="solid" <?php echo ( $wppt_container_border_left_style == 'solid' ? 'selected' : '' ) ?>>Solid</option>
		<option value="double" <?php echo ( $wppt_container_border_left_style == 'double' ? 'selected' : '' ) ?>>Double</option>
		<option value="groove" <?php echo ( $wppt_container_border_left_style == 'groove' ? 'selected' : '' ) ?>>Groove</option>
		<option value="ridge" <?php echo ( $wppt_container_border_left_style == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
		<option value="inset" <?php echo ( $wppt_container_border_left_style == 'inset' ? 'selected' : '' ) ?>>Inset</option>
		<option value="outset" <?php echo ( $wppt_container_border_left_style == 'outset' ? 'selected' : '' ) ?>>Outset</option>
		<option value="initial" <?php echo ( $wppt_container_border_left_style == 'initial' ? 'selected' : '' ) ?>>Initial</option>
		<option value="inherit" <?php echo ( $wppt_container_border_left_style == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
	</select>
	<label for="wppt-ticker-container-btc">Line Color:</label>
	<input type="text" id="wppt-ticker-container-btc" name="wppt_global_container_border_left[color]" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo $wppt_container_border_left_color ?>"  />
</div>