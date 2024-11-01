<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
 ?>
<h4>Shortcode</h4>
<?php
	if ( get_post_status ( get_the_ID() ) == 'publish' ) {
		echo '<input class="wppt-shortcode-select" type="text" value="[wppt id=' . get_the_ID() . ']" size="15" readonly>';
	} else {
		echo '<div class="wppt-warning">Please publish this settings to see the shortcode.</div>';
	}
?>
