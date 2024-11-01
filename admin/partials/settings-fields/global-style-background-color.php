<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_bg' );
$wppt_gc_bg_color = ( empty( $data['color'] ) ? 'rgba(255,255,255,1)' : $data['color'] );
$wppt_gc_bg_transparent = ( empty( $data['transparent'] ) ? 1 : 0 );
?>
	<div class="wppt-ticker-container-bg-section">
		<input type="text" class="wppt-color-picker-down" name="wppt_global_container_bg[color]" data-format="rgb" value="<?php echo ( empty( $wppt_gc_bg_color ) ? 'rgba(255, 255, 255, 1)' : $wppt_gc_bg_color ) ?>" />
		<label for="wppt-ticker-container-bg-is-transparent">No Background Color (Transparent)
			<input type="checkbox" name="wppt_global_container_bg[transparent]" value="1" <?php checked( $wppt_gc_bg_transparent, 1 ) ?> />
		</label>
	</div>