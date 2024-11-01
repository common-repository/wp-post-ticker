<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/wp-post-ticker-pro/
 * @since      1.0.0
 *
 * @package    WP_Post_ticker
 * @subpackage WP_Post_ticker/admin/partials
 */
 $image_url = plugins_url( '../assets/', __FILE__ ); 
?>
<div class="icanwp-promo">
Unleash the full potential of WP Post Ticker!
<a href="http://codecanyon.net/item/wp-post-ticker-pro/15578349?ref=iCanWP" target="_blank">Buy Pro Version</a><a href="https://icanwp.com/plugins/wp-post-ticker-pro-demo/" target="_blank">Demo Pro Version</a>
</div>
<div class="user-instructions-wrapper">
	<h1>WP Post Ticker Instructions</h1>
	<h2>Creating A Post Ticker</h2>
	<div class="instruction-row">
		<div class="wppt-instruction-content">
			<ol>
				<li>Click "Post Ticker" <img src="<?php echo $image_url . 'wp-post-ticker-admin-menu.jpg' ?>" class="wppt-inst-under" /></li>
				<li>Click "Add New Post Ticker". <img src="<?php echo $image_url . 'wp-post-ticker-new.jpg' ?>" class="wppt-inst-under" /></li>
				<li>Configure Options for the Post Ticker
					<div class="wppt-setting-detail">
						<i>A. Give your new post ticker a title.</i><img src="<?php echo $image_url . 'wp-post-ticker-new-title.jpg' ?>" class="wppt-inst-under" /><br />
						<i>B. Select which categories you would like to ticker to slide through.</i><img src="<?php echo $image_url . 'wp-post-ticker-new-cat.jpg' ?>" class="wppt-inst-under" />
					</div>
				</li>
				<li>Click "Publish" to save it. <img src="<?php echo $image_url . 'wp-post-ticker-create-publish.jpg' ?>" class="wppt-inst-under" /></li>
			</ol>
		</div>
		<div class="clearfix"></div>
	</div>
	<h2>Using the Post Ticker</h2>
	<div class="instruction-row">
		<div class="wppt-instruction-content">
			<ol>
				<li>Copy the shortcode into any page or post <img src="<?php echo $image_url . 'wp-post-ticker-shortcode.jpg' ?>" class="wppt-inst-under" /></li>
				<li>Go to Appearance > Widgets and drag WP Post Ticker into any widget. <img src="<?php echo $image_url . 'wp-post-ticker-widget.jpg' ?>" class="wppt-inst-under" /></li>
			</ol>
		</div>
		<div class="clearfix"></div>
	</div>
	<h2>Explanation of Settings</h2>
	<ol>
		<li><strong>Category Selection</strong>: This is where you select which post categories will be displayed on your ticker. If a category is checked, it will be displayed. If unchecked, it will not be displayed.</li>
		<li><strong>Post Display</strong>: Choose how many posts to show at a time as well as the total amount of posts you want to load into the ticker.
			<div class="wppt-setting-detail">
				<i>A. How many posts do you want to display at a time?</i> - Controls the number of posts that are displayed at a single time.<br />
				<i>B. How many posts do you want to load?</i> - Sets the total amount of posts you load into a single ticker.<br />
				<i>C. Hide Password Protected Posts?</i> - Hides or shows password protected posts from showing on your ticker.
			</div>
		</li>
	<li><strong>Sorting Order</strong>: Choose the order your posts are displayed on your ticker.</li>
	<li class="wppt-show-hide-option"><strong>Show More Settings</strong>: Select "Show" to see following options.</li>
	<img src="<?php echo $image_url . 'wp-post-ticker-show-more-settings.jpg' ?>" class="wppt-inst-under" />
	<li><strong>Thumbnail Options</strong>: Controls how the featured image attached to the post shows.
		<div class="wppt-setting-detail">
			<i>A. Display Post Thumbnail</i> - Hide or show the featured image on each post.<br />
			<img src="<?php echo $image_url . 'wp-post-ticker-thumbnail-option-display.jpg' ?>" class="wppt-inst-under" />
			<i>B. Thumbnail Image Vertical Align</i> - Choose the position of the featured image.<br />
			<img src="<?php echo $image_url . 'wp-post-ticker-thumbnail-option-align.jpg' ?>" class="wppt-inst-under" />
			<i>C. Post Thumbnail Width in Px</i> - Controls the size of the thumbnail image.
			<img src="<?php echo $image_url . 'wp-post-ticker-thumbnail-width.jpg' ?>" class="wppt-inst-under" /><br />
			<i>D. Post Thumbnail width to height ratio</i> - Controls the ratio of the thumbnail image. For example 1:1 ratio is a square, 1:2 ratio is rectangular.<br />
			<img src="<?php echo $image_url . 'wp-post-ticker-thumbnail-ratio.jpg' ?>" class="wppt-inst-under" />
		</div>
	</li>
	<li>
		<strong>Scroll Options</strong>: Choose the way your ticker slides through the posts.
		<div class="wppt-setting-detail">
			<i>A. Manual - one by one</i> - Disables auto scrolling. The user can still scroll through the posts on the front end with the navigation icons<br />
			<i>B. Manual - shift all posts in view</i> - Disables auto scrolling. When the user clicks the up or down arrow icon, the ticker will shift the amount of posts you decide to display. For example if you chose to display 3 posts at a time, the ticker will slide through 3 posts with one click.<br />
			<i>C. Auto - one by one</i> - Enables auto scrolling. Ticker will scroll through a single post at a time.<br />
			<i>D. Auto - shift all posts in view</i> Enables auto scrolling. Ticker will rotate through a whole set of posts for each scroll. For example if you choose to display 3 posts at a time, it will replace all 3 posts for every scroll.<br />
			<i>E. Scroll Speed</i> - This determines the scrolling/rotate speed in milliseconds.<br />
			<i>F. Scroll Direction</i> - Choose whether your ticker scrolls up or down.
		</div>
	</li>
	<li>
		<strong>Animation Easing Options</strong>: Choose the type of sliding animation and its transition speed.
	</li>
	<li>
		<strong>Author Selection</strong>: Choose to show or hide posts depending on the author of the post.<br />
		<img src="<?php echo $image_url . 'wp-post-ticker-filter-author.jpg' ?>" class="wppt-inst-under" />
	</li>
	<li>
		<strong>Post Meta Options</strong>: You can choose to display up to two post meta options. Post meta options include Author, Post Date, Last Modified Date, Category, Rating.
			<img src="<?php echo $image_url . 'wp-post-ticker-options-meta.jpg' ?>" class="wppt-inst-under" />
			<div class="wppt-setting-detail">
				<i>A. Rating</i> - You apply this option inside each individual post on the right hand sidebar.
				<img src="<?php echo $image_url . 'wp-post-ticker-options-meta-rating.jpg' ?>" class="wppt-inst-under" />
			</div>
	</li>
	<li>
		<strong>Width Options</strong>: Controls the width of the ticker container. You can use pixels or percentages to control the width.
		<img src="<?php echo $image_url . 'wp-post-ticker-container-width.jpg' ?>" class="wppt-inst-under" />
	</li>
	
	<h2>Explanation of Styles</h2>
	<li class="wppt-show-hide-option">
		<strong>Global Options</strong>: Selecting this option will override all individual style settings and apply the global style settings.
	</li>
	<li>
		<strong>Ticker Container Options</strong>: Customize the background color and border styles for the ticker container.
		<div class="wppt-setting-detail">
				<i>A. Background</i> - Change the whole ticker container background color, or choose to have no background color at all.<img src="<?php echo $image_url . 'wp-post-ticker-bg-color.jpg' ?>" class="wppt-inst-under" /><br>
				<i>B. Borders</i> - Change the outside borders of the ticker container individually. Choose the width, style and color of each individual border!<img src="<?php echo $image_url . 'wp-post-ticker-container-border.jpg' ?>" class="wppt-inst-under" /><br>
		</div>
	</li>
	<li>
		<strong>Title Options</strong>: Control the padding, bottom border, color, font size, alignment and line height of the post ticker title.
			<div class="wppt-setting-detail">
				<i>A. Title Alignment</i> - Choose to align your WP Post Ticker title to the left, center or right.
				<img src="<?php echo $image_url . 'wp-post-ticker-title-align.jpg' ?>" class="wppt-inst-under" /><br>
				<i>B. Padding</i> - Individually choose the padding for the left, right, top and bottom of the title.
				<img src="<?php echo $image_url . 'wp-post-ticker-title-padding.jpg' ?>" class="wppt-inst-under" /><br>
				<i>C. Title Border Bottom</i> - This is the line that is directly below the title. You can customize the width, style and color of this line.
				<img src="<?php echo $image_url . 'wp-post-ticker-title-border-bottom.jpg' ?>" class="wppt-inst-under" /><br>
				<i>D. Title Colors</i> - Simply change the font color and background color of your WP Post Ticker Title.
				<img src="<?php echo $image_url . 'wp-post-ticker-title-color.jpg' ?>" class="wppt-inst-under" /><br>
				<i>E. Title Font Size</i> - Increase or decrease the font size and line height of your WP Post Ticker Title
				<img src="<?php echo $image_url . 'wp-post-ticker-title-font-size.jpg' ?>" class="wppt-inst-under" />
		</div>
	</li>
	<li>
		<strong>Navigation Options</strong>: Customize the styles of the navigation section, including the icons.
		<div class="wppt-setting-detail">
			<i>A. Navigation Container</i> - Choose to show or hide the front end post navigation arrows and align them to the left, right or center. Also customize the width, style and color of the border bottom, which is the line below the controls.
			<img src="<?php echo $image_url . 'wp-post-ticker-nav-container.jpg' ?>" class="wppt-inst-under" /><br />
			<i>B. Navigation Icons</i> - Space out the navigation icons with custom padding on the left, right, top and bottom. Also choose the font size and color of the navigation icons.
			<img src="<?php echo $image_url . 'wp-post-ticker-nav-icons.jpg' ?>" class="wppt-inst-under" />
		</div>
	</li>
	<li>
		<strong>Post Section Options</strong>: Customize the styles of the post container, post title and post meta options.
		<div class="wppt-setting-detail">
			<i>A. Post Container</i> - Choose the width, style and color of the line that divides each individual post. Also customize the padding for the left, right, top and bottom to increase or decrease the amount of space on the edges. of each post inside your WP Post Ticker.
			<img src="<?php echo $image_url . 'wp-post-ticker-post-container.jpg' ?>" class="wppt-inst-under" /><br />
			<i>B. Post Title Options</i> - Simply choose the font size and color of your post titles.
			<img src="<?php echo $image_url . 'wp-post-ticker-post-title.jpg' ?>" class="wppt-inst-under" /><br />
			<i>C. Post Meta 1 Options</i> - Simply choose the font size and color of your first post meta option.
			<img src="<?php echo $image_url . 'wp-post-ticker-post-meta-one.jpg' ?>" class="wppt-inst-under" /><br />
			<i>D. Post Meta 2 Options</i> - Simply choose the font size and color of your second post meta option.
			<img src="<?php echo $image_url . 'wp-post-ticker-post-meta-two.jpg' ?>" class="wppt-inst-under" /><br />
		</div>
	</li>
</div>