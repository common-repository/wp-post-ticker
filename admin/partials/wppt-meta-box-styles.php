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
<?php
	//Variables to call from post meta of custom post type registered
	$ticker_inherit_global_style = 0;
	$ticker_container_bg = get_post_meta( $post->ID, '_wppt_ticker_container_bg', true );
	$ticker_container_bg_transparent = get_post_meta( $post->ID, '_wppt_ticker_container_bg_transparent', true );
	$ticker_container_btw = get_post_meta( $post->ID, '_wppt_ticker_container_btw', true );
	$ticker_container_bts = get_post_meta( $post->ID, '_wppt_ticker_container_bts', true );
	$ticker_container_btc = get_post_meta( $post->ID, '_wppt_ticker_container_btc', true );
	$ticker_container_brw = get_post_meta( $post->ID, '_wppt_ticker_container_brw', true );
	$ticker_container_brs = get_post_meta( $post->ID, '_wppt_ticker_container_brs', true );
	$ticker_container_brc = get_post_meta( $post->ID, '_wppt_ticker_container_brc', true );
	$ticker_container_bbw = get_post_meta( $post->ID, '_wppt_ticker_container_bbw', true );
	$ticker_container_bbs = get_post_meta( $post->ID, '_wppt_ticker_container_bbs', true );
	$ticker_container_bbc = get_post_meta( $post->ID, '_wppt_ticker_container_bbc', true );
	$ticker_container_blw = get_post_meta( $post->ID, '_wppt_ticker_container_blw', true );
	$ticker_container_bls = get_post_meta( $post->ID, '_wppt_ticker_container_bls', true );
	$ticker_container_blc = get_post_meta( $post->ID, '_wppt_ticker_container_blc', true );
	$ticker_title_align = get_post_meta( $post->ID, '_wppt_ticker_title_alignment', true );
	$ticker_title_font_size = get_post_meta( $post->ID, '_wppt_ticker_title_font_size', true );
	$ticker_title_font_line_height = get_post_meta( $post->ID, '_wppt_ticker_title_font_line_height', true );
	$ticker_title_padding_top = get_post_meta( $post->ID, '_wppt_ticker_title_padding_top', true );
	$ticker_title_padding_right = get_post_meta( $post->ID, '_wppt_ticker_title_padding_right', true );
	$ticker_title_padding_bottom = get_post_meta( $post->ID, '_wppt_ticker_title_padding_bottom', true );
	$ticker_title_padding_left = get_post_meta( $post->ID, '_wppt_ticker_title_padding_left', true );
	$ticker_title_font_color = get_post_meta( $post->ID, '_wppt_ticker_title_font_color', true );
	$ticker_title_bg = get_post_meta( $post->ID, '_wppt_ticker_title_bg', true );
	$ticker_title_bbw = get_post_meta( $post->ID, '_wppt_ticker_title_bbw', true );
	$ticker_title_bbs = get_post_meta( $post->ID, '_wppt_ticker_title_bbs', true );
	$ticker_title_bbc = get_post_meta( $post->ID, '_wppt_ticker_title_bbc', true );
	$ticker_control_display = get_post_meta( $post->ID, '_wppt_ticker_control_display', true );
	$ticker_control_icon_size = get_post_meta( $post->ID, '_wppt_ticker_control_icon_size', true );
	$ticker_control_icon_color = get_post_meta( $post->ID, '_wppt_ticker_control_icon_color', true );
	$ticker_control_icon_align = get_post_meta( $post->ID, '_wppt_ticker_control_icon_align', true );
	$ticker_control_padding_top = get_post_meta( $post->ID, '_wppt_ticker_control_padding_top', true );
	$ticker_control_padding_right = get_post_meta( $post->ID, '_wppt_ticker_control_padding_right', true );
	$ticker_control_padding_bottom = get_post_meta( $post->ID, '_wppt_ticker_control_padding_bottom', true );
	$ticker_control_padding_left = get_post_meta( $post->ID, '_wppt_ticker_control_padding_left', true );
	$ticker_control_bbw = get_post_meta( $post->ID, '_wppt_ticker_control_bbw', true );
	$ticker_control_bbs = get_post_meta( $post->ID, '_wppt_ticker_control_bbs', true );
	$ticker_control_bbc = get_post_meta( $post->ID, '_wppt_ticker_control_bbc', true );
	$ticker_post_divider_width = get_post_meta( $post->ID, '_wppt_ticker_post_divider_width', true );
	$ticker_post_divider_style = get_post_meta( $post->ID, '_wppt_ticker_post_divider_style', true );
	$ticker_post_divider_color = get_post_meta( $post->ID, '_wppt_ticker_post_divider_color', true );
	$ticker_post_padding_top = get_post_meta( $post->ID, '_wppt_ticker_post_padding_top', true );
	$ticker_post_padding_right = get_post_meta( $post->ID, '_wppt_ticker_post_padding_right', true );
	$ticker_post_padding_bottom = get_post_meta( $post->ID, '_wppt_ticker_post_padding_bottom', true );
	$ticker_post_padding_left = get_post_meta( $post->ID, '_wppt_ticker_post_padding_left', true );
	$ticker_post_title_size = get_post_meta( $post->ID, '_wppt_ticker_post_title_size', true );
	$ticker_post_title_color = get_post_meta( $post->ID, '_wppt_ticker_post_title_color', true );
	$ticker_post_meta_one_size = get_post_meta( $post->ID, '_wppt_ticker_post_meta_one_size', true );
	$ticker_post_meta_one_color = get_post_meta( $post->ID, '_wppt_ticker_post_meta_one_color', true );
	$ticker_post_meta_two_size = get_post_meta( $post->ID, '_wppt_ticker_post_meta_two_size', true );
	$ticker_post_meta_two_color = get_post_meta( $post->ID, '_wppt_ticker_post_meta_two_color', true );
	
	//setting the default
	if ( empty( $ticker_control_icon_align ) ){
		$ticker_control_icon_align = 'center';
	}
	if ( empty( $ticker_control_display ) ){
		$ticker_control_display = 0;
	}
	if ( empty( $ticker_title_align ) ){
		$ticker_title_align = 'left';
	}
	if ( empty( $ticker_inherit_global_style ) ){
		$ticker_inherit_global_style = 0;
	}
?>
<div id="wppt-style-wrapper">
	<div class="wppt-ticker-container-container wppt-inline-block wppt-post-options-show-hide noborder">
		<div class="wppt-section-title">
			<p>Override Global Style<br /> <a href="http://codecanyon.net/item/wp-post-ticker-pro/15578349?ref=iCanWP" target="_blank" class="wppt-promo">Pro Only</a></p>
		</div>
		<div class="wppt-section-options">
			<label for="wppt-ticker-inherit-global-style"><input type="radio" name="wppt-ticker-inherit-global-style" class="wppt-ticker-inherit-global-style" value="0" checked> Use Global Style</label> &nbsp;&nbsp;&nbsp;&nbsp;
			<label for="wppt-ticker-inherit-global-style"><input type="radio" name="wppt-ticker-inherit-global-style" class="wppt-ticker-inherit-global-style" value="0" disabled> Override Global Style</label><br /><br />
			(Global Style can be configured <a href="admin.php?page=wppt_admin_menu_global_style" target="_blank">here</a>.)
		</div>
	</div>
	<div id="wppt-advanced-styles" <?php echo ( $ticker_inherit_global_style == 0 ? 'style="display:none;"' : '' ) ?>>
		<div class="wppt-ticker-container-container wppt-inline-block">
			<div class="wppt-container-title">Ticker Container Options</div>
			<div class="wppt-section-title">
				<p>Background Color</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-container-bg-section">
					<label for="wppt-ticker-container-bg">Background Color</label>
					<input type="text" id="wppt-ticker-container-bg" class="wppt-color-picker" name="wppt-ticker-container-bg" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_container_bg ) ? 'rgba(255, 255, 255, 1)' : $ticker_container_bg ) ?>" />
					<label for="wppt-ticker-container-bg-transparent">No Background Color (Transparent)
						<input type="checkbox" name="wppt-ticker-container-bg-transparent" value="1" <?php checked( $ticker_container_bg_transparent, 1 ) ?> />
					</label>
				</div>
			</div>
			<div class="wppt-section-title">
				<p>Border Top</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-container-border-section">
					<div class="wppt-ticker-container-border-top wppt-ticker-container-spacing">
						<label for="wppt-ticker-container-btw">Pixel Width:</label>
						<input type="number" name="wppt-ticker-container-btw" class="wppt-ticker-container-btw" min="0" max="500" value="<?php echo ( empty($ticker_container_btw) ? 5 : $ticker_container_btw ) ?>" /><span class="wppt-right-margin">px</span>
						<label for="wppt-ticker-container-bts">Border Line Style:</label>
						<select name="wppt-ticker-container-bts" class="wppt-ticker-container-bts">
							<option value="solid" <?php echo ( $ticker_container_bts == 'solid' ? 'selected' : '' ) ?>>Solid</option>
							<option value="none" <?php echo ( $ticker_container_bts == 'none' ? 'selected' : '' ) ?>>None</option>
							<option value="hidden" <?php echo ( $ticker_container_bts == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
							<option value="dotted" <?php echo ( $ticker_container_bts == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
							<option value="dashed" <?php echo ( $ticker_container_bts == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
							<option value="double" <?php echo ( $ticker_container_bts == 'double' ? 'selected' : '' ) ?>>Double</option>
							<option value="groove" <?php echo ( $ticker_container_bts == 'groove' ? 'selected' : '' ) ?>>Groove</option>
							<option value="ridge" <?php echo ( $ticker_container_bts == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
							<option value="inset" <?php echo ( $ticker_container_bts == 'inset' ? 'selected' : '' ) ?>>Inset</option>
							<option value="outset" <?php echo ( $ticker_container_bts == 'outset' ? 'selected' : '' ) ?>>Outset</option>
							<option value="initial" <?php echo ( $ticker_container_bts == 'initial' ? 'selected' : '' ) ?>>Initial</option>
							<option value="inherit" <?php echo ( $ticker_container_bts == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
						</select>
						<label for="wppt-ticker-container-btc">Line Color:</label>
						<input type="text" id="wppt-ticker-container-btc" name="wppt-ticker-container-btc" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_container_btc ) ? 'rgba(0, 133, 186, 1)' : $ticker_container_btc ) ?>"  />
					</div>
				</div>
			</div>
			<div class="wppt-section-title">
				<p>Border Bottom</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-container-border-section">
					<div class="wppt-ticker-container-border-bottom wppt-ticker-container-spacing">
						<label for="wppt-ticker-container-bbw">Pixel Width:</label>
						<input type="number" name="wppt-ticker-container-bbw" class="wppt-ticker-container-bbw" min="0" max="500" value="<?php echo ( empty( $ticker_container_bbw ) ? 1 : $ticker_container_bbw ) ?>" /><span class="wppt-right-margin">px</span>
						<label for="wppt-ticker-container-bbs">Border Line Style:</label>
						<select name="wppt-ticker-container-bbs" class="wppt-ticker-container-bbs">
							<option value="solid" <?php echo ( $ticker_container_bbs == 'solid' ? 'selected' : '' ) ?>>Solid</option>
							<option value="none" <?php echo ( $ticker_container_bbs == 'none' ? 'selected' : '' ) ?>>None</option>
							<option value="hidden" <?php echo ( $ticker_container_bbs == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
							<option value="dotted" <?php echo ( $ticker_container_bbs == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
							<option value="dashed" <?php echo ( $ticker_container_bbs == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
							<option value="double" <?php echo ( $ticker_container_bbs == 'double' ? 'selected' : '' ) ?>>Double</option>
							<option value="groove" <?php echo ( $ticker_container_bbs == 'groove' ? 'selected' : '' ) ?>>Groove</option>
							<option value="ridge" <?php echo ( $ticker_container_bbs == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
							<option value="inset" <?php echo ( $ticker_container_bbs == 'inset' ? 'selected' : '' ) ?>>Inset</option>
							<option value="outset" <?php echo ( $ticker_container_bbs == 'outset' ? 'selected' : '' ) ?>>Outset</option>
							<option value="initial" <?php echo ( $ticker_container_bbs == 'initial' ? 'selected' : '' ) ?>>Initial</option>
							<option value="inherit" <?php echo ( $ticker_container_bbs == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
						</select>
						<label for="wppt-ticker-container-bbc">Line Color:</label>
						<input type="text" id="wppt-ticker-container-bbc" name="wppt-ticker-container-bbc" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_container_bbc ) ? 'rgba(200, 200, 200, 1)' : $ticker_container_bbc ) ?>"  />
					</div>
				</div>
			</div>
			<div class="wppt-section-title">
				<p>Border Left</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-container-border-section">
					<div class="wppt-ticker-container-border-left wppt-ticker-container-spacing">
						<label for="wppt-ticker-container-blw">Pixel Width:</label>
						<input type="number" name="wppt-ticker-container-blw" class="wppt-ticker-container-blw" min="0" max="500" value="<?php echo ( empty( $ticker_container_blw ) ? 1 : $ticker_container_blw ) ?>" /><span class="wppt-right-margin">px</span>
						<label for="wppt-ticker-container-bls">Border Line Style:</label>
						<select name="wppt-ticker-container-bls" class="wppt-ticker-container-bls">
							<option value="solid" <?php echo ( $ticker_container_bls == 'solid' ? 'selected' : '' ) ?>>Solid</option>
							<option value="none" <?php echo ( $ticker_container_bls == 'none' ? 'selected' : '' ) ?>>None</option>
							<option value="hidden" <?php echo ( $ticker_container_bls == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
							<option value="dotted" <?php echo ( $ticker_container_bls == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
							<option value="dashed" <?php echo ( $ticker_container_bls == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
							<option value="double" <?php echo ( $ticker_container_bls == 'double' ? 'selected' : '' ) ?>>Double</option>
							<option value="groove" <?php echo ( $ticker_container_bls == 'groove' ? 'selected' : '' ) ?>>Groove</option>
							<option value="ridge" <?php echo ( $ticker_container_bls == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
							<option value="inset" <?php echo ( $ticker_container_bls == 'inset' ? 'selected' : '' ) ?>>Inset</option>
							<option value="outset" <?php echo ( $ticker_container_bls == 'outset' ? 'selected' : '' ) ?>>Outset</option>
							<option value="initial" <?php echo ( $ticker_container_bls == 'initial' ? 'selected' : '' ) ?>>Initial</option>
							<option value="inherit" <?php echo ( $ticker_container_bls == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
						</select>
						<label for="wppt-ticker-container-blc">Line Color:</label>
						<input type="text" id="wppt-ticker-container-blc" name="wppt-ticker-container-blc" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_container_blc ) ? 'rgba(200, 200, 200, 1)' : $ticker_container_blc ) ?>"  />
					</div>
				</div>
			</div>
			<div class="wppt-section-title">
				<p>Border Right</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-container-border-section">
					<div class="wppt-ticker-container-border-right wppt-ticker-container-spacing">
						<label for="wppt-ticker-container-brw">Pixel Width:</label>
						<input type="number" name="wppt-ticker-container-brw" class="wppt-ticker-container-brw" min="0" max="500" value="<?php echo ( empty( $ticker_container_brw ) ? 1 : $ticker_container_brw ) ?>" /><span class="wppt-right-margin">px</span>
						<label for="wppt-ticker-container-brs">Border Line Style:</label>
						<select name="wppt-ticker-container-brs" class="wppt-ticker-container-brs">
							<option value="solid" <?php echo ( $ticker_container_brs == 'solid' ? 'selected' : '' ) ?>>Solid</option>
							<option value="none" <?php echo ( $ticker_container_brs == 'none' ? 'selected' : '' ) ?>>None</option>
							<option value="hidden" <?php echo ( $ticker_container_brs == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
							<option value="dotted" <?php echo ( $ticker_container_brs == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
							<option value="dashed" <?php echo ( $ticker_container_brs == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
							<option value="double" <?php echo ( $ticker_container_brs == 'double' ? 'selected' : '' ) ?>>Double</option>
							<option value="groove" <?php echo ( $ticker_container_brs == 'groove' ? 'selected' : '' ) ?>>Groove</option>
							<option value="ridge" <?php echo ( $ticker_container_brs == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
							<option value="inset" <?php echo ( $ticker_container_brs == 'inset' ? 'selected' : '' ) ?>>Inset</option>
							<option value="outset" <?php echo ( $ticker_container_brs == 'outset' ? 'selected' : '' ) ?>>Outset</option>
							<option value="initial" <?php echo ( $ticker_container_brs == 'initial' ? 'selected' : '' ) ?>>Initial</option>
							<option value="inherit" <?php echo ( $ticker_container_brs == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
						</select>
						<label for="wppt-ticker-container-brc">Line Color:</label>
						<input type="text" id="wppt-ticker-container-brc" name="wppt-ticker-container-brc" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_container_brc ) ? 'rgba(200, 200, 200, 1)' : $ticker_container_brc ) ?>"  />
					</div>
				</div>
			</div>
		</div>
		
		<div class="wppt-ticker-container-container wppt-inline-block">
			<div class="wppt-container-title">Title Options</div>
			<div class="wppt-section-title">
				<p>Title Alignment</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-nav-display-section">
					<label for="wppt-ticker-title-align">Text Align:</label>
					<label><input type="radio" class="wppt-ticker-title-align" name="wppt-ticker-title-align" value="left" <?php echo ( $ticker_title_align == 'left' ? 'checked' : '' ) ?>> Left </label>
					<label><input type="radio" class="wppt-ticker-title-align" name="wppt-ticker-title-align" value="center" <?php echo ( $ticker_title_align == 'center' ? 'checked' : '' ) ?>> Center</label>
					<label><input type="radio" class="wppt-ticker-title-align" name="wppt-ticker-title-align" value="right" <?php echo ( $ticker_title_align == 'right' ? 'checked' : '' ) ?>> Right</label>
				</div>	
			</div>
			<div class="wppt-section-title">
				<p>Title Padding</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-title-padding wppt-ticker-container-spacing">
					<label for="wppt-ticker-title-padding-top">Padding Top:</label>
					<input type="number" name="wppt-ticker-title-padding-top" class="wppt-ticker-title-padding-top" min="0" max="500" value="<?php echo ( empty( $ticker_title_padding_top ) ? 15 : $ticker_title_padding_top ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-title-padding-right">Padding Right:</label>
					<input type="number" name="wppt-ticker-title-padding-right" class="wppt-ticker-title-padding-right" min="0" max="500" value="<?php echo ( empty( $ticker_title_padding_right ) ? 15 : $ticker_title_padding_right ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-title-padding-bottom">Padding Bottom:</label>
					<input type="number" name="wppt-ticker-title-padding-bottom" class="wppt-ticker-title-padding-bottom" min="0" max="500" value="<?php echo ( empty( $ticker_title_padding_bottom ) ? 15 : $ticker_title_padding_bottom ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-title-padding-left">Padding Left:</label>
					<input type="number" name="wppt-ticker-title-padding-left" class="wppt-ticker-title-padding-left" min="0" max="500" value="<?php echo ( empty( $ticker_title_padding_left ) ? 15 : $ticker_title_padding_left ) ?>" /><span class="wppt-right-margin">px</span>
				</div>
			</div>
			<div class="wppt-section-title">
				<p>Title Border Bottom</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-title-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-title-bbw">Pixel Width:</label>
					<input type="number" name="wppt-ticker-title-bbw" class="wppt-ticker-title-bbw" min="0" max="500" value="<?php echo ( empty( $ticker_title_bbw ) ? 1 : $ticker_title_bbw ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-title-bbs">Border Line Style:</label>
					<select name="wppt-ticker-title-bbs" class="wppt-ticker-title-bbs">
						<option value="solid" <?php echo ( $ticker_title_bbs == 'solid' ? 'selected' : '' ) ?>>Solid</option>
						<option value="none" <?php echo ( $ticker_title_bbs == 'none' ? 'selected' : '' ) ?>>None</option>
						<option value="hidden" <?php echo ( $ticker_title_bbs == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
						<option value="dotted" <?php echo ( $ticker_title_bbs == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
						<option value="dashed" <?php echo ( $ticker_title_bbs == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
						<option value="double" <?php echo ( $ticker_title_bbs == 'double' ? 'selected' : '' ) ?>>Double</option>
						<option value="groove" <?php echo ( $ticker_title_bbs == 'groove' ? 'selected' : '' ) ?>>Groove</option>
						<option value="ridge" <?php echo ( $ticker_title_bbs == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
						<option value="inset" <?php echo ( $ticker_title_bbs == 'inset' ? 'selected' : '' ) ?>>Inset</option>
						<option value="outset" <?php echo ( $ticker_title_bbs == 'outset' ? 'selected' : '' ) ?>>Outset</option>
						<option value="initial" <?php echo ( $ticker_title_bbs == 'initial' ? 'selected' : '' ) ?>>Initial</option>
						<option value="inherit" <?php echo ( $ticker_title_bbs == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
					</select>
					<label for="wppt-ticker-title-bbc">Line Color:</label>
					<input type="text" id="wppt-ticker-title-bbc" name="wppt-ticker-title-bbc" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_title_bbc ) ? 'rgba(200, 200, 200, 1)' : $ticker_title_bbc ) ?>"  />
				</div>	
			</div>
			<div class="wppt-section-title">
				<p>Title Colors</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-title-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-title-font-color">Font Color:</label>
					<input type="text" id="wppt-ticker-title-font-color" name="wppt-ticker-title-font-color" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_title_font_color ) ? 'rgba(0, 0, 0, 1))' : $ticker_title_font_color ) ?>"  />
					<label for="wppt-ticker-title-bg">Background Color:</label>
					<input type="text" id="wppt-ticker-title-bg" name="wppt-ticker-title-bg" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_title_bg ) ? 'rgba(255, 255, 255, 1)' : $ticker_title_bg ) ?>"  />
				</div>
			</div>
			<div class="wppt-section-title">
				<p>Title Font Size</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-title-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-title-font-size">Font Size in Pixels:</label>
					<input type="number" name="wppt-ticker-title-font-size" class="wppt-ticker-title-font-size" min="0" max="500" value="<?php echo ( empty( $ticker_title_font_size ) ? 20 : $ticker_title_font_size ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-title-font-line-height">Line Height in Pixels:</label>
					<input type="number" name="wppt-ticker-title-font-line-height" class="wppt-ticker-title-font-line-height" min="0" max="500" value="<?php echo ( empty( $ticker_title_font_line_height ) ? 20 : $ticker_title_font_line_height ) ?>" /><span class="wppt-right-margin">px</span>
				</div>
			</div>
			</div>

		
		<div class="wppt-ticker-container-container wppt-inline-block">
			<div class="wppt-container-title">Navigation Options</div>
			<div class="wppt-section-title">
				<p>Navigation Container</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-nav-display-section">
					<label for="wppt-ticker-control-display">Show Post Navigation Control:</label>
					<label><input type="radio" class="wppt-ticker-control-display" name="wppt-ticker-control-display" value="0" <?php echo ( $ticker_control_display == '0' ? 'checked' : '' ) ?>> Yes </label>
					<label><input type="radio" class="wppt-ticker-control-display" name="wppt-ticker-control-display" value="1" <?php echo ( $ticker_control_display == '1' ? 'checked' : '' ) ?>> No</label>
				</div>	
				<div class="wppt-ticker-container-border-section">
					<div class="wppt-ticker-control-border-bottom wppt-ticker-container-spacing">
						<label for="wppt-ticker-control-bbw">Border Bottom Pixel Width:</label>
						<input type="number" name="wppt-ticker-control-bbw" class="wppt-ticker-control-bbw" min="0" max="500" value="<?php echo ( empty( $ticker_control_bbw ) ? 1 : $ticker_control_bbw ) ?>" /><span class="wppt-right-margin">px</span>
						<label for="wppt-ticker-control-bbs">Border Line Style:</label>
						<select name="wppt-ticker-control-bbs" class="wppt-ticker-control-bbs">
							<option value="solid" <?php echo ( $ticker_control_bbs == 'solid' ? 'selected' : '' ) ?>>Solid</option>
							<option value="none" <?php echo ( $ticker_control_bbs == 'none' ? 'selected' : '' ) ?>>None</option>
							<option value="hidden" <?php echo ( $ticker_control_bbs == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
							<option value="dotted" <?php echo ( $ticker_control_bbs == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
							<option value="dashed" <?php echo ( $ticker_control_bbs == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
							<option value="double" <?php echo ( $ticker_control_bbs == 'double' ? 'selected' : '' ) ?>>Double</option>
							<option value="groove" <?php echo ( $ticker_control_bbs == 'groove' ? 'selected' : '' ) ?>>Groove</option>
							<option value="ridge" <?php echo ( $ticker_control_bbs == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
							<option value="inset" <?php echo ( $ticker_control_bbs == 'inset' ? 'selected' : '' ) ?>>Inset</option>
							<option value="outset" <?php echo ( $ticker_control_bbs == 'outset' ? 'selected' : '' ) ?>>Outset</option>
							<option value="initial" <?php echo ( $ticker_control_bbs == 'initial' ? 'selected' : '' ) ?>>Initial</option>
							<option value="inherit" <?php echo ( $ticker_control_bbs == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
						</select>
						<label for="wppt-ticker-control-bbc">Line Color:</label>
						<input type="text" id="wppt-ticker-control-bbc" name="wppt-ticker-control-bbc" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_control_bbc ) ? 'rgba(200, 200, 200, 1)' : $ticker_control_bbc ) ?>"  />
					</div>
				</div>
				
				<div class="wppt-post-nav-alignment-section">
					<label for="wppt-ticker-control-icon-align">Button Control Alignment:</label>
					<label><input type="radio" class="wppt-ticker-control-icon-align" name="wppt-ticker-control-icon-align" value="center" <?php echo ( $ticker_control_icon_align == 'center' ? 'checked' : '' ) ?>> Center </label>
					<label><input type="radio" class="wppt-ticker-control-icon-align" name="wppt-ticker-control-icon-align" value="left" <?php echo ( $ticker_control_icon_align == 'left' ? 'checked' : '' ) ?>> Left</label>
					<label><input type="radio" class="wppt-ticker-control-icon-align" name="wppt-ticker-control-icon-align" value="right" <?php echo ( $ticker_control_icon_align == 'right' ? 'checked' : '' ) ?>> Right</label>
				</div>		
			</div>

			<div class="wppt-section-title">
				<p>Navigation Icons</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-post-nav-padding-section">
					<label for="wppt-ticker-control-padding-top">Padding Top:</label>
					<input type="number" name="wppt-ticker-control-padding-top" class="wppt-ticker-control-padding-top" min="0" max="500" value="<?php echo ( empty( $ticker_control_padding_top ) ? 5 : $ticker_control_padding_top ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-control-padding-right">Padding Right:</label>
					<input type="number" name="wppt-ticker-control-padding-right" class="wppt-ticker-control-padding-right" min="0" max="500" value="<?php echo ( empty( $ticker_control_padding_right ) ? 5 : $ticker_control_padding_right ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-control-padding-bottom">Padding Bottom:</label>
					<input type="number" name="wppt-ticker-control-padding-bottom" class="wppt-ticker-control-padding-bottom" min="0" max="500" value="<?php echo ( empty( $ticker_control_padding_bottom ) ? 5 : $ticker_control_padding_bottom ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-control-padding-left">Padding Left:</label>
					<input type="number" name="wppt-ticker-control-padding-left" class="wppt-ticker-control-padding-left" min="0" max="500" value="<?php echo ( empty( $ticker_control_padding_left ) ? 5 : $ticker_control_padding_left ) ?>" /><span class="wppt-right-margin">px</span>
				</div>
				
				<div class="wppt-ticker-icon-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-control-icon-size">Size in Pixels:</label>
					<input type="number" name="wppt-ticker-control-icon-size" class="wppt-ticker-control-icon-size" min="0" max="500" value="<?php echo ( empty( $ticker_control_icon_size ) ? 14 : $ticker_control_icon_size ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-control-icon-color">Color:</label>
					<input type="text" id="wppt-ticker-control-icon-color" name="wppt-ticker-control-icon-color" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_control_icon_color ) ? 'rgba(122, 122, 122, 1)' : $ticker_control_icon_color ) ?>"  />
				</div>
			</div>

		</div>
		<div class="wppt-ticker-container-container wppt-inline-block">
			<div class="wppt-container-title">Post Section Options</div>
			<div class="wppt-section-title">
				<p>Post Container</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-post-divider-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-post-divider-width">Post Divider Pixel Width:</label>
						<input type="number" name="wppt-ticker-post-divider-width" class="wppt-ticker-post-divider-width" min="0" max="500" value="<?php echo ( empty( $ticker_post_divider_width ) ? 1 : $ticker_post_divider_width ) ?>" /><span class="wppt-right-margin">px</span>
						<label for="wppt-ticker-post-divider-style">Divider Line Style:</label>
						<select name="wppt-ticker-post-divider-style" class="wppt-ticker-post-divider-style">
							<option value="solid" <?php echo ( $ticker_post_divider_style == 'solid' ? 'selected' : '' ) ?>>Solid</option>
							<option value="none" <?php echo ( $ticker_post_divider_style == 'none' ? 'selected' : '' ) ?>>None</option>
							<option value="hidden" <?php echo ( $ticker_post_divider_style == 'hidden' ? 'selected' : '' ) ?>>Hidden</option>
							<option value="dotted" <?php echo ( $ticker_post_divider_style == 'dotted' ? 'selected' : '' ) ?>>Dotted</option>
							<option value="dashed" <?php echo ( $ticker_post_divider_style == 'dashed' ? 'selected' : '' ) ?>>Dashed</option>
							<option value="double" <?php echo ( $ticker_post_divider_style == 'double' ? 'selected' : '' ) ?>>Double</option>
							<option value="groove" <?php echo ( $ticker_post_divider_style == 'groove' ? 'selected' : '' ) ?>>Groove</option>
							<option value="ridge" <?php echo ( $ticker_post_divider_style == 'ridge' ? 'selected' : '' ) ?>>Ridge</option>
							<option value="inset" <?php echo ( $ticker_post_divider_style == 'inset' ? 'selected' : '' ) ?>>Inset</option>
							<option value="outset" <?php echo ( $ticker_post_divider_style == 'outset' ? 'selected' : '' ) ?>>Outset</option>
							<option value="initial" <?php echo ( $ticker_post_divider_style == 'initial' ? 'selected' : '' ) ?>>Initial</option>
							<option value="inherit" <?php echo ( $ticker_post_divider_style == 'inherit' ? 'selected' : '' ) ?>>Inherit</option>
						</select>
						<label for="wppt-ticker-post-divider-color">Divider Line Color:</label>
						<input type="text" id="wppt-ticker-post-divider-color" name="wppt-ticker-post-divider-color" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_post_divider_color ) ? 'rgba(200, 200, 200, 1)' : $ticker_post_divider_color ) ?>"  />
				</div>
				<div class="wppt-ticker-post-divider-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-post-padding-top">Padding Top:</label>
					<input type="number" name="wppt-ticker-post-padding-top" class="wppt-ticker-post-padding-top" min="0" max="500" value="<?php echo ( empty( $ticker_post_padding_top ) ? 10 : $ticker_post_padding_top ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-post-padding-right">Padding Right:</label>
					<input type="number" name="wppt-ticker-post-padding-right" class="wppt-ticker-post-padding-right" min="0" max="500" value="<?php echo ( empty( $ticker_post_padding_right ) ? 10 : $ticker_post_padding_right ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-post-padding-bottom">Padding Bottom:</label>
					<input type="number" name="wppt-ticker-post-padding-bottom" class="wppt-ticker-post-padding-bottom" min="0" max="500" value="<?php echo ( empty( $ticker_post_padding_bottom ) ? 10 : $ticker_post_padding_bottom ) ?>" /><span class="wppt-right-margin">px</span>
					
					<label for="wppt-ticker-post-padding-left">Padding Left:</label>
					<input type="number" name="wppt-ticker-post-padding-left" class="wppt-ticker-post-padding-left" min="0" max="500" value="<?php echo ( empty( $ticker_post_padding_left ) ? 10 : $ticker_post_padding_left ) ?>" /><span class="wppt-right-margin">px</span>
				</div>
			</div>
			
			<div class="wppt-section-title">
				<p>Post Title Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-post-title-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-post-title-size">Size in Pixels:</label>
					<input type="number" name="wppt-ticker-post-title-size" class="wppt-ticker-post-title-size" min="0" max="500" value="<?php echo ( empty($ticker_post_title_size) ? 16 : $ticker_post_title_size ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-post-title-color">Color:</label>
					<input type="text" id="wppt-ticker-post-title-color" name="wppt-ticker-post-title-color" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_post_title_color ) ? 'rgba(0, 0, 0, 1)' : $ticker_post_title_color ) ?>"  />
				</div>
			</div>

			<div class="wppt-section-title">
				<p>Post Meta 1 Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-post-meta-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-post-meta-size">Size in Pixels:</label>
					<input type="number" name="wppt-ticker-post-meta-one-size" class="wppt-ticker-post-title-size" min="0" max="500" value="<?php echo ( empty($ticker_post_meta_one_size) ? 13 : $ticker_post_meta_one_size ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-post-meta-color">Color:</label>
					<input type="text" id="wppt-ticker-post-meta-color" name="wppt-ticker-post-meta-one-color" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_post_meta_one_color ) ? 'rgba(0, 0, 0, 1)' : $ticker_post_meta_one_color ) ?>"  />
				</div>
			</div>	

			<div class="wppt-section-title">
				<p>Post Meta 2 Options</p>
			</div>
			<div class="wppt-section-options">
				<div class="wppt-ticker-post-meta-section wppt-ticker-container-spacing">
					<label for="wppt-ticker-post-meta-size">Size in Pixels:</label>
					<input type="number" name="wppt-ticker-post-meta-two-size" class="wppt-ticker-post-title-size" min="0" max="500" value="<?php echo ( empty($ticker_post_meta_two_size) ? 13 : $ticker_post_meta_two_size ) ?>" /><span class="wppt-right-margin">px</span>
					<label for="wppt-ticker-post-meta-color">Color:</label>
					<input type="text" id="wppt-ticker-post-meta-color" name="wppt-ticker-post-meta-two-color" class="wppt-color-picker" data-format="rgb" data-opacity="" value="<?php echo ( empty( $ticker_post_meta_two_color ) ? 'rgba(0, 0, 0, 1)' : $ticker_post_meta_two_color ) ?>"  />
				</div>
			</div>		
		</div>

		<div class="wppt-update-button-wrapper">
			<a id="wppt-post-top" class="wppt-custom-btn" href="#">Top <i class="fa fa-arrow-up"></i></a>
		<?php
			if ( get_post_status ( get_the_ID () ) == 'publish' ) {
				echo ''; //provides the shortcut button to update the settings.
			}
		?>
		</div>
	</div>
</div>