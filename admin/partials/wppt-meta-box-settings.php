<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
	
	//Define variables to call saved data from the custom post metabox as the plugin settings
	$post_advance_mode = get_post_meta( $post->ID, '_wppt_post_advance_mode', true );
	$post_advance_speed = get_post_meta( $post->ID, '_wppt_post_advance_speed', true );	
	$post_advance_direction = get_post_meta( $post->ID, '_wppt_post_advance_direction', true );
	$post_advance_animation_easing = get_post_meta( $post->ID, '_wppt_post_advance_animation_easing', true );
	$post_advance_animation_speed = get_post_meta( $post->ID, '_wppt_post_advance_animation_speed', true );
	$post_cat = get_post_meta( $post->ID, '_wppt_post_cat', true );
	$post_filter_mode = get_post_meta( $post->ID, '_wppt_post_filter_mode', true );
	$post_filter_author = get_post_meta( $post->ID, '_wppt_post_filter_author', true );
	$post_sort = get_post_meta( $post->ID, '_wppt_post_sort', true );
	$post_display_options_show_thumb = get_post_meta( $post->ID, '_wppt_post_display_options_thumb', true );
	$post_display_options_metaone = get_post_meta( $post->ID, '_wppt_post_display_options_metaone', true );
	$post_display_options_metatwo = get_post_meta( $post->ID, '_wppt_post_display_options_metatwo', true );
	$post_thumb_width = get_post_meta( $post->ID, '_wppt_post_thumb_width', true );
	$post_thumb_ratio = get_post_meta( $post->ID, '_wppt_post_thumb_ratio', true );
	$post_thumb_position = get_post_meta( $post->ID, '_wppt_post_thumb_position', true );
	$post_num_view = get_post_meta( $post->ID, '_wppt_post_num_view', true );
	$post_num_load = get_post_meta( $post->ID, '_wppt_post_num_load', true );
	$post_frame_max_width_option = get_post_meta( $post->ID, '_wppt_post_frame_max_width_option', true );
	$post_frame_max_width_pc = get_post_meta( $post->ID, '_wppt_post_frame_max_width_pc', true );
	$post_frame_max_width_px = get_post_meta( $post->ID, '_wppt_post_frame_max_width_px', true );
	$post_hide_pass_protected = get_post_meta( $post->ID, '_wppt_post_hide_pass_protected', true );	
	$show_advanced_settings = get_post_meta( $post->ID, '_wppt_show_advanced_settings', true );
	
	//setting the default
	if( empty( $post_cat ) ){
		$post_cat = array();
	}
	if( empty( $post_display_options_show_thumb ) ){
		$post_display_options_show_thumb = 0;
	}
	if( empty( $post_thumb_position ) ){
		$post_thumb_position = 0;
	}
	if( empty( $post_display_options_metaone ) ){
		$post_display_options_metaone = 1;
	}
	if( $show_advanced_settings != '0' && $show_advanced_settings != '1' ){
		$show_advanced_settings = 1;
	}
	if( empty( $post_display_options_metatwo ) ){
		$post_display_options_metatwo = 2;
	}
	if( empty( $post_advance_mode ) ) {
		$post_advance_mode = 3;
	}
	if ( empty( $post_frame_max_width_pc ) ) {
		$post_frame_max_width_pc = 100;
	}
	if ( empty( $post_frame_max_width_px ) ) {
		$post_frame_max_width_px = 300;
	}
	
	if (empty( $post_thumb_width ) ){
		$post_thumb_width = 100;
	}
	if (empty( $post_advance_animation_easing ) ){
		$post_advance_animation_easing = 'easeInOutElastic';
	}
	$post_hide_pass_protected = 1; //set to hide password protected posts
	$post_sort = 0;	
?>

<div id="wppt-setting-wrapper">	
	<div class="wppt-post-cat-container wppt-inline-block">
		<div class="wppt-section-title">
			<p>Category Selection</p>
			<p class="wppt-section-desc wppt-promo">
				Limted to 1 selection in this version.
				Upgrade to <a href="http://codecanyon.net/item/wp-post-ticker-pro/15578349?ref=iCanWP" target="_blank">Pro Version</a> for unlimited category selections.
			</p>
		</div>
		<div class="wppt-section-options">
			<div class="clearfix"></div>
			<div class="wppt-category-selection-container">
				<?php	
					// Get all categories
					$wppt_post_cat = get_categories( array( 
						'orderby' => 'name', 
						'hide_empty' => false 
					) );

					// Declare an Array for all categories to be stored
					$wppt_array = array();

					// Build Array to contain all categories with needed info
					foreach( $wppt_post_cat as $cat ){
						$wppt_array[] = array( 
							'wppt_parent'=> $cat->category_parent,
							'wppt_cat_name' => $cat->name,
							'wppt_post_count' => $cat->category_count,
							'wppt_id' => $cat->cat_ID
						);
					}

					// Sort the category array by the parent ID
					array_multisort($wppt_array);

					// Class name switcher
					$class_switch = true;
					// Iterate through list of categories to initiate parent-child relations build
					foreach( $wppt_array as $key => $val ) {	
						if( $val['wppt_parent'] == 0 ){
							$html = '<ul id="wppt-cat-'.$val['wppt_id'].'" class="wppt-category-container ' . ( $class_switch ? 'horl' : 'jjak' ) .'">';
							$html .= '<li class="wppt-category-root wppt-category-list"><label><input type="checkbox" class="wppt-post-cat" name="wppt-post-cat[]" value="' . $val['wppt_id'] . '"';
							if( in_array( $val['wppt_id'], $post_cat ) ){
								$html .= ' checked'; 
							}
							$html .= ' />'. $val['wppt_cat_name'] . ' (' . $val['wppt_post_count'] . ')</label>';
							$html_child = wppt_build_category( $wppt_array, $val['wppt_id'], $post_cat, false );
							if( !empty( $html_child) ){
								$html .= '<ul class="wppt-category-sub-container">' . $html_child . '</ul></li>';
							} else {
								$html .='</li>';
							}
							$html .= '</ul>';
							echo $html;
							$class_switch = !$class_switch;
						}
					}

					// Function Call to iterate through all list of categories to build parent-child relationship recursively
					function wppt_build_category( $arr = array(), $parent = 0, $post_cat = array(), $is_sibling = false ){
						$this_arr = $arr;
						$html = '';
						if( $this_arr[0]['wppt_parent'] ==  $parent ){
							$html .= '<li class="wppt-category-sub wppt-category-list"><label><input type="checkbox" class="wppt-post-cat" name="wppt-post-cat[]" value="' . $arr[0]['wppt_id'] . '"';
							if( in_array( $arr[0]['wppt_id'], $post_cat ) ){
								$html .= ' checked'; 
							}
							$html .= ' />'. $arr[0]['wppt_cat_name'] . ' (' . $arr[0]['wppt_post_count'] . ')</label>';
							$html .= wppt_build_category( $arr, $arr[0]['wppt_id'], $post_cat, true );
						} 
						array_shift( $this_arr );
						if ( !empty( $this_arr ) ){
							$html .= wppt_build_category( $this_arr, $parent, $post_cat, false );
						}
						if ( $is_sibling ){
							$html = '<ul class="wppt-category-sub-container">' . $html . '</ul>';
						}
						
						$html .= '</li>';
						return $html;
					}
				?>
			</div>
		</div>
	</div>
	
	<div class="wppt-post-options-container wppt-inline-block">
		<div class="wppt-section-title">
			<p>Post Display</p>
			<p class="wppt-section-desc wppt-promo">
				Upgrade to <a href="http://codecanyon.net/item/wp-post-ticker-pro/15578349?ref=iCanWP" target="_blank">Pro Version</a> for unlimited display selections.
			</p>
		</div>
		<div class="wppt-section-options">
			<div class="wppt-post-num-load-section">
				<p class="wppt-msg-error"><i class="fa fa-exclamation-triangle"></i> Number of posts loaded must be a larger number than number of posts for view.</p>
				<label for="wppt-post-num-load">How many posts do you want to load? (Limted to Min 1 ~ Max 3)</label>
				<input type="number" name="wppt-post-num-load" class="wppt-post-num-load"  min="1" max="3" value="<?php echo ( empty($post_num_load) ? 3 : $post_num_load ) ?>" />
			</div>
			<div class="wppt-post-num-view-section">
				<p class="wppt-msg-error"><i class="fa fa-exclamation-triangle"></i> Number of posts per view must be less than the total posts loaded.</p>
				<label for="wppt-post-num-view">How many posts do you want to display at a time? (Limted to Min 1 ~ Max 2)</label>
				<input type="number" name="wppt-post-num-view" class="wppt-post-num-view" min="1" max="2" value="<?php echo ( empty($post_num_view) ? 1 : $post_num_view ) ?>" />
			</div>
			<div class="wppt-post-hide-pass-protected-section">
				<label for="wppt-post-hide-pass-protected">Hide Password Protected Posts? | <a href="http://codecanyon.net/item/wp-post-ticker-pro/15578349?ref=iCanWP" target="_blank" class="wppt-promo">Pro only</a></label>
			</div>
		</div>
	</div>
	
	<div class="wppt-post-sort-container wppt-inline-block noborder">
		<div class="wppt-section-title">
			<p>Sorting Order</p>
		</div>
		<div class="wppt-section-options">
			<label for="wppt-post-sort">Choose the post sort order</label>
			<select name="wppt-post-sort" class="wppt-post-sort">
				<option value="0" <?php echo ( $post_sort == 0 ? 'selected' : '' ) ?>>Published Date (Latest to Oldest)</option> 
				<option disabled>Published Date (Oldest to Latest) | (Pro Only)</option> 
				<option disabled>Modified Date (Latest to Oldest) | (Pro Only)</option>
				<option disabled>Modified Date (Oldest to Latest) | (Pro Only)</option>
				<option disabled>Random | (Pro Only)</option>
			</select>
		</div>
	</div>
	<div class="wppt-post-advance-settings-container wppt-inline-block wppt-post-options-show-hide noborder">
		<div class="wppt-section-title">
			<p>Show More Settings</p>
		</div>
		<div class="wppt-post-advance-direction-section wppt-post-auto-play-section">
			<label for="wppt-show-advanced-settings"><input type="radio" name="wppt-show-advanced-settings" class="wppt-show-advanced-settings" value="0" <?php echo ( $show_advanced_settings == 0 ? 'checked' : '' ) ?>> Show</label>
			<label for="wppt-show-advanced-settings"><input type="radio" name="wppt-show-advanced-settings" class="wppt-show-advanced-settings" value="1" <?php echo ( $show_advanced_settings == 1 ? 'checked' : '' ) ?>> Hide</label>
		</div>
	</div>
	<div id="wppt-advanced-settings" <?php echo ( $show_advanced_settings == 1 ? 'style="display:none;"' : '' ) ?>>	
		<div class="wppt-post-display-options-container wppt-inline-block">
			<div class="wppt-section-title">
				<p>Thumbnail Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-display-thumb-section">
					<label for="wppt-post-display-options-thumb">Display Post Thumbnail</label>
					<label><input type="radio" class="wppt-post-display-options-thumb" name="wppt-post-display-options-thumb" value="0" <?php echo ( $post_display_options_show_thumb == 0 ? 'checked' : '' ) ?>> Display </label>
					<label><input type="radio" class="wppt-post-display-options-thumb" name="wppt-post-display-options-thumb" value="1" <?php echo ( $post_display_options_show_thumb == 1 ? 'checked' : '' ) ?>> Do not display </label>
				</div>
				<div class="wppt-post-display-thumb-section" <?php echo ( $post_display_options_show_thumb == 1 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-display-options-thumb-position">Thumbnail Image Vertical Align</label>
					<label><input type="radio" class="wppt-post-display-options-thumb" name="wppt-post-display-options-thumb-position" value="0" <?php echo ( $post_thumb_position == 0 ? 'checked' : '' ) ?>> Top </label>
					<label><input type="radio" class="wppt-post-display-options-thumb" name="wppt-post-display-options-thumb-position" value="1" <?php echo ( $post_thumb_position == 1 ? 'checked' : '' ) ?>> Center </label>
				</div>
				<div class="wppt-post-thumb-width-section" <?php echo ( $post_display_options_show_thumb == 1 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-thumb-width">Post Thumbnail Width in Px</label>
					<select name="wppt-post-thumb-width" class="wppt-post-thumb-width">
						<option disabled>40 px (Pro Only)</option> 
						<option disabled>60 px (Pro Only)</option> 
						<option disabled>80 px (Pro Only)</option> 
						<option value="100" <?php echo ( $post_thumb_width == 100 ? 'selected' : '' ) ?>>100 px</option> 
						<option disabled>120 px (Pro Only)</option> 
						<option disabled>140 px (Pro Only)</option> 
						<option disabled>160 px (Pro Only)</option> 
						<option disabled>180 px (Pro Only)</option> 
						<option disabled>200 px (Pro Only)</option> 
					</select>
				</div>
				<div class="wppt-post-thum-ratio-section" <?php echo ( $post_display_options_show_thumb == 1 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-thumb-ratio">Post Thumbnail width to height ratio (width:height)</label>
					<select name="wppt-post-thumb-ratio" class="wppt-post-thumb-ratio">
						<option value="100" <?php echo ( $post_thumb_ratio == 100 ? 'selected' : '' ) ?>>1:1</option> 
						<option value="50" <?php echo ( $post_thumb_ratio == 50 ? 'selected' : '' ) ?>>2:1</option> 
						<option value="75" <?php echo ( $post_thumb_ratio == 75 ? 'selected' : '' ) ?>>4:3</option> 
						<option value="5625" <?php echo ( $post_thumb_ratio == 5625 ? 'selected' : '' ) ?>>16:9</option> 
					</select>
				</div>
			</div>
		</div>
		<div class="wppt-post-advance-option-container wppt-inline-block">
			<div class="wppt-section-title">
				<p>Scroll Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-advance-mode-section">
					<label for="wppt-post-advance-mode">Scroll Behaviour</label>
					<select name="wppt-post-advance-mode" class="wppt-post-advance-mode">
						<option value="0" <?php echo ( $post_advance_mode == 0 ? 'selected' : '' ) ?>>Manual - one by one</option>
						<option disabled>Manual - shift all posts in view (Pro Only)</option>
						<option disabled>Auto - one by one (Pro Only)</option>
						<option value="3" <?php echo ( $post_advance_mode == 3 ? 'selected' : '' ) ?>>Auto - shift all posts in view</option>
					</select>
				</div>
				<?php 
					$hide_post_advance_speed = 0;
					if ( $post_advance_mode == 0  || $post_advance_mode == 4 ){
						$hide_post_advance_speed = 1;
					}
				?>
				<div class="wppt-post-advance-speed-section wppt-post-auto-play-section" <?php echo ( $hide_post_advance_speed == 1 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-advance-speed">Scroll Speed (<a href="http://codecanyon.net/item/wp-post-ticker-pro/15578349?ref=iCanWP" target="_blank" class="wppt-promo">Pro version</a> is required to modify this value)</label>
					<input type="number" name="wppt-post-advance-speed" class="wppt-post-advance-speed" min="3000" max="3000" value="3000" />
				</div>
				<div class="wppt-post-advance-direction-section wppt-post-auto-play-section" <?php echo ( $hide_post_advance_speed == 1 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-advance-direction">Scroll Direction</label>
					<label><input type="radio" name="wppt-post-advance-direction" value="0" <?php echo ( $post_advance_direction == 0 ? 'checked' : '' ) ?>> Scroll Up </label>
					<label><input type="radio" name="wppt-post-advance-direction" value="1" <?php echo ( $post_advance_direction == 1 ? 'checked' : '' ) ?>> Scroll Down</label>
				</div>
			</div>
				<div class="wppt-section-title">
					<p>Animation Easing Options</p>
				</div>
				<div class="wppt-section-options">
					<label for="wppt-post-advance-animation-easing">Choose the post sliding animation.</label>
					<select name="wppt-post-advance-animation-easing" class="wppt-post-sort">
						<option value="linear" <?php echo ( $post_advance_animation_easing == 'linear' ? 'selected' : '' ) ?>>linear</option> 
						<option value="easeInOutSine" <?php echo ( $post_advance_animation_easing == 'easeInOutSine' ? 'selected' : '' ) ?>>easeInOutSine</option> 
						<option value="easeInOutCubic" <?php echo ( $post_advance_animation_easing == 'easeInOutCubic' ? 'selected' : '' ) ?>>easeInOutCubic</option>
						<option value="easeInOutQuint" <?php echo ( $post_advance_animation_easing == 'easeInOutQuint' ? 'selected' : '' ) ?>>easeInOutQuint</option>
						<option value="easeInOutCirc" <?php echo ( $post_advance_animation_easing == 'easeInOutCirc' ? 'selected' : '' ) ?>>easeInOutCirc</option>
						<option value="easeInOutElastic" <?php echo ( $post_advance_animation_easing == 'easeInOutElastic' ? 'selected' : '' ) ?>>easeInOutElastic</option> 
						<option value="easeInOutQuad" <?php echo ( $post_advance_animation_easing == 'easeInOutQuad' ? 'selected' : '' ) ?>>easeInOutQuad</option> 
						<option value="easeInOutQuart" <?php echo ( $post_advance_animation_easing == 'easeInOutQuart' ? 'selected' : '' ) ?>>easeInOutQuart</option>
						<option value="easeInOutExpo" <?php echo ( $post_advance_animation_easing == 'easeInOutExpo' ? 'selected' : '' ) ?>>easeInOutExpo</option>
						<option value="easeInOutBack" <?php echo ( $post_advance_animation_easing == 'easeInOutBack' ? 'selected' : '' ) ?>>easeInOutBack</option>
						<option value="easeInOutBounce" <?php echo ( $post_advance_animation_easing == 'easeInOutBounce' ? 'selected' : '' ) ?>>easeInOutBounce</option>
					</select>
					<div class="wppt-post-advance-animation-speed-section" <?php echo ( $hide_post_advance_speed == 1 ? 'style="display:none;"' : '' ) ?>>
						<label for="wppt-post-advance-animation-speed">Animation Easing Transition Speed (Unit: millisecond i.e. 1 second = 1,000 milliseconds)</label>
						<input type="number" name="wppt-post-advance-animation-speed" class="wppt-post-advance-animation-speed" min="1000" max="30000" value="<?php echo ( empty($post_advance_animation_speed) ? 2000 : $post_advance_animation_speed ) ?>" />
					</div>
				</div>
		</div>
		
		<div class="wppt-post-filter-container wppt-inline-block">
			<div class="wppt-section-title">
				<p>Author Selection</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-filter-mode-section">
					<label for="wppt-post-filter-mode">Filter by Author (Pro Only)</label>
					<select name="wppt-post-filter-mode" class="wppt-post-filter-mode">
						<option selected>None</option> 
						<option>Only show posts written by the following authors</option>
						<option>Hide posts written by the following authors</option>
					</select>
				</div>
				<div class="wppt-post-filter-author-section" <?php echo ( $post_filter_mode == 0 ? 'style="display:none;"' : '' ) ?>>
					<label for="">Please hold down on your &ldquo;Ctrl&rdquo; key to select multiple. </label>
					<p class="wppt-msg-notice">(Only able to select Authors/Editors for security reasons.)</p>
					<select name="wppt-post-filter-author[]" size="5" multiple="multiple" >
					<?php 
						$blog_id = get_current_blog_id();
						$wppt_authors = array_merge( 
							get_users( array(
								'blog_id'      => $blog_id,
								'role'         => 'Author',
								'meta_key'     => '',
								'meta_value'   => '',
								'meta_compare' => '',
								'meta_query'   => array(),
								'date_query'   => array(),        
								'include'      => array(),
								'exclude'      => array(),
								'orderby'      => 'nicename',
								'order'        => 'ASC',
								'offset'       => '',
								'search'       => '',
								'number'       => '',
								'count_total'  => false,
								'fields'       => array('ID','user_login'),
								'who'          => ''
							) ),
							get_users( array(
								'blog_id'      => $blog_id,
								'role'         => 'Editor',
								'meta_key'     => '',
								'meta_value'   => '',
								'meta_compare' => '',
								'meta_query'   => array(),
								'date_query'   => array(),        
								'include'      => array(),
								'exclude'      => array(),
								'orderby'      => 'nicename',
								'order'        => 'ASC',
								'offset'       => '',
								'search'       => '',
								'number'       => '',
								'count_total'  => false,
								'fields'       => array('ID','user_login'),
								'who'          => ''
							) )
						);
						function compare_author_name( $x, $y ){ //function to sort combined array of users of different type
							return strcasecmp( $x->user_login, $y->user_login ); //case insensitive sorting based on the user_login name
						}
						usort( $wppt_authors, "compare_author_name" ); //Sort array
						
						foreach( $wppt_authors as $author ){
							echo '<option value="' . $author->ID . '"'. ( in_array( $author->ID, $post_filter_author ) ? ' selected' : '' ) .'>' . $author->user_login . ' </option>';
						}
					?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="wppt-post-meta-options-container wppt-inline-block">
			<div class="wppt-section-title">
				<p>Post Meta Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-display-meta-one-section">
					<label for="wppt-post-display-options-metaone">Display on meta line 1</label>
					<select name="wppt-post-display-options-metaone" class="wppt-post-display-options-metaone">
						<option value="0" <?php echo ( $post_display_options_metaone == 0 ? 'selected' : '' ) ?>>None</option> 
						<option value="1" <?php echo ( $post_display_options_metaone == 1 ? 'selected' : '' ) ?>>Author</option> 
						<option value="2" <?php echo ( $post_display_options_metaone == 2 ? 'selected' : '' ) ?>>Post Date</option> 
						<option value="3" <?php echo ( $post_display_options_metaone == 3 ? 'selected' : '' ) ?>>Last Modified Date</option> 
						<option value="4" <?php echo ( $post_display_options_metaone == 4 ? 'selected' : '' ) ?>>Category</option> 
						<option value="5" <?php echo ( $post_display_options_metaone == 5 ? 'selected' : '' ) ?>>Rating</option> 
					</select>
				</div>
				<div class="wppt-post-display-meta-two-section">
					<label for="wppt-post-display-options-metatwo">Display on meta line 2</label>
					<select name="wppt-post-display-options-metatwo" class="wppt-post-display-options-metatwo">
						<option value="0" <?php echo ( $post_display_options_metatwo == 0 ? 'selected' : '' ) ?>>None</option> 
						<option value="1" <?php echo ( $post_display_options_metatwo == 1 ? 'selected' : '' ) ?>>Author</option> 
						<option value="2" <?php echo ( $post_display_options_metatwo == 2 ? 'selected' : '' ) ?>>Post Date</option> 
						<option value="3" <?php echo ( $post_display_options_metatwo == 3 ? 'selected' : '' ) ?>>Last Modified Date</option> 
						<option value="4" <?php echo ( $post_display_options_metatwo == 4 ? 'selected' : '' ) ?>>Category</option> 
						<option value="5" <?php echo ( $post_display_options_metatwo == 5 ? 'selected' : '' ) ?>>Rating</option> 
					</select>
				</div>
			</div>
		</div>
		
		<div class="wppt-post-advanced-options-container wppt-inline-block">
			<div class="wppt-section-title">
				<p>Width Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-frame-width-option-section">
					<label for="wppt-post-frame-width-option">Set <span>Width</span> of the Post Ticker Frame (Min-Width is always set at 120px):</label>
					<select name="wppt-post-frame-max-width-option" class="wppt-post-frame-max-width-option">
						<option value="0" selected>Parent Container Width</option> 
						<option value="0" disabled>Specific Width in Pixels (px) (Pro Only)</option> 
						<option value="0" disabled>Specific Width in Percent (%) (Pro Only)</option> 
					</select>
				</div>
				<div class="wppt-post-frame-max-width-px-section" <?php echo ( $post_frame_max_width_option != 1 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-frame-max-width">Specify Width of the post container in pixels (px)</label>
					<input type="number" name="wppt-post-frame-max-width-px" class="wppt-post-frame-max-width-px" min="120" max="2000" value="<?php echo ( empty($post_frame_max_width_px) ? 300 : $post_frame_max_width_px ) ?>" />
				</div>
				<div class="wppt-post-frame-max-width-pc-section" <?php echo ( $post_frame_max_width_option != 2 ? 'style="display:none;"' : '' ) ?>>
					<label for="wppt-post-frame-max-width[pc]">Specify Width of the post container in percent (%)</label>
					<input type="number" name="wppt-post-frame-max-width-pc" class="wppt-post-frame-max-width-pc" min="1" max="100" value="<?php echo ( empty($post_frame_max_width_pc) ? 100 : $post_frame_max_width_pc ) ?>" />
				</div>
			</div>
		</div>
		
		<div class="wppt-update-button-wrapper">
		<?php wp_nonce_field( 'wppt_save','wppt_setting_nonce' ); ?>
			<a id="wppt-post-top" class="wppt-custom-btn" href="#">Top <i class="fa fa-arrow-up"></i></a>
		<?php
			if ( get_post_status ( get_the_ID () ) == 'publish' ) {
				echo '<a id="wppt-post-setting" class="wppt-custom-btn" href="#">Update</a>';
			}
		?>
		</div>
	</div>
</div>