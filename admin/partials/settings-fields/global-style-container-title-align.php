<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data= get_option( 'wppt_global_container_title_font_align' );
$wppt_container_title_text_align = ( empty( $data ) ? 'left' : $data );
 ?>
<div class="wppt-ticker-title-section wppt-ticker-container-spacing">
	<label for="wppt_global_container_title_text_align">Text Align:</label>
	<label><input type="radio" class="wppt-ticker-title-font-size" name="wppt_global_container_title_align" value="left" <?php echo ( $wppt_container_title_text_align == 'left' ? 'checked' : '' ) ?>> Left </label>
	<label><input type="radio" class="wppt-ticker-title-font-size" name="wppt_global_container_title_align" value="center" <?php echo ( $wppt_container_title_text_align == 'center' ? 'checked' : '' ) ?>> Center</label>
	<label><input type="radio" class="wppt-ticker-title-font-size" name="wppt_global_container_title_align" value="right" <?php echo ( $wppt_container_title_text_align == 'right' ? 'checked' : '' ) ?>> Right</label>
</div>