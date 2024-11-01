<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
$data = get_option( 'wppt_global_container_nav_display' );
$wppt_container_nav_display = ( empty( $data ) ? 0 : $data );
?>
<div class="wppt-ticker-icon-section wppt-ticker-container-spacing">
	<label for="wppt-ticker-container-nav-display">Show Post Navigation Control: </label>
	<label><input type="radio" class="wppt_global_container_nav_display" name="wppt_global_container_nav_display" value="0" <?php echo ( $wppt_container_nav_display == 0 ? 'checked' : '' ) ?>> Yes </label>
	<label><input type="radio" class="wppt_global_container_nav_display" name="wppt_global_container_nav_display" value="1" <?php echo ( $wppt_container_nav_display == 1 ? 'checked' : '' ) ?>> No </label>
</div>