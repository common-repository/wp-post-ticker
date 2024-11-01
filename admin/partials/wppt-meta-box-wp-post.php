<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
	$wppt_post_rating =  get_post_meta( $post->ID, '_wppt_wp_post_rating', true );
 ?>
<div class="wppt-wp-post-section">
	<label for="wppt-wp-post-section-label">WP Post Ticker Post Rating</label>
	<select name="wppt-wp-post-rating" class="wppt-wp-post-rating">
		<option value="0" <?php echo ( $wppt_post_rating == '0' ? 'selected' : '' ) ?>>Disabled</option>
		<option value="1" <?php echo ( $wppt_post_rating == '1' ? 'selected' : '' ) ?>>1 Star</option>
		<option value="2" <?php echo ( $wppt_post_rating == '2' ? 'selected' : '' ) ?>>2 Stars</option>
		<option value="3" <?php echo ( $wppt_post_rating == '3' ? 'selected' : '' ) ?>>3 Stars</option>
		<option value="4" <?php echo ( $wppt_post_rating == '4' ? 'selected' : '' ) ?>>4 Stars</option>
		<option value="5" <?php echo ( $wppt_post_rating == '5' ? 'selected' : '' ) ?>>5 Stars</option>
	</select>
</div>