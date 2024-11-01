(function( $ ){ //jQuery plugin to handle animation of ticker
	$.fn.getNextwppt = function( options ) { //handles loading the next post one by one
		var settings = $.extend( {}, options );
		var postContainer =  $( this ).find( 'ul.wppt-post-container' );
		var post = $( this ).find( 'li.wppt-post' ).first();
		if ( post.is(':animated') ) { //if currently being animated, does not another scrolling behavior
			return false;
		}
		settings.controlBtnNext.prop('disabled',true);
		settings.controlBtnNext.css( 'opacity','0.5' );
		settings.controlBtnPrev.prop('disabled',true);
		postContainer.append( post.clone() ); //clones the set of the posts then run through animation to show smooth scrolling
		
		post.animate({
				marginTop: settings.postHeight - settings.postDivSize //measures the proper margin offset to take height, border, padding of the post
			},
			{
				duration: settings.animationEasingSpeed,
				easing: settings.animationEasingOption,
				complete: function(){
					post.detach();
					settings.controlBtnNext.css( 'opacity','1' );
					settings.controlBtnNext.prop('disabled',false);
					settings.controlBtnPrev.prop('disabled',false);
				}
			}
		);
		return post;
	};
	
	$.fn.getPrevwppt = function( options ) { //handles loading previous post one by one
		var settings = $.extend( {}, options );
		var postContainer =  $( this ).find( 'ul.wppt-post-container' );
		var post = $( this ).find( 'li' ).last();
		var postClone = post.clone();
		if ( postClone.is(':animated') ) {
			return false;
		}
		settings.controlBtnPrev.prop('disabled',true);
		settings.controlBtnPrev.css( 'opacity','0.5' );
		settings.controlBtnNext.prop('disabled',true);

		postContainer.prepend( postClone );
		postClone.css( 'margin-top', settings.postHeight - settings.postDivSize );
		
		postClone.animate({
				marginTop: 0
			},
			{
				duration: settings.animationEasingSpeed,
				easing: settings.animationEasingOption,
				complete: function(){
					settings.controlBtnPrev.prop('disabled',false);
					settings.controlBtnPrev.css( 'opacity','1' );
					settings.controlBtnNext.prop('disabled',false);
					post.detach();
				}
			}
		);
		return postClone;
	};
	
	
$.fn.getNextwpptBulk = function( options ){ //handles loading next posts in bulk
		var settings = $.extend( {}, options );
		var postContainer =  $( this ).find( 'ul.wppt-post-container' );
		var post = $( this ).find( 'li' );
		var postView = post.slice( 0, settings.postNumView );
		
		if ( postContainer.is(':animated') ) {
			return false;
		}
		settings.controlBtnNext.prop('disabled',true);
		settings.controlBtnNext.css( 'opacity','0.5' );
		settings.controlBtnPrev.prop('disabled',true);

		postContainer.append( postView.clone() );
		postContainer.animate({
				marginTop: settings.postContHeight - settings.postDivSize
			},
			{
				duration: settings.animationEasingSpeed,
				easing: settings.animationEasingOption,
				complete: function(){
					postView.detach();
					postContainer.css( 'margin', 0 );
					settings.controlBtnNext.css( 'opacity','1' );
					settings.controlBtnNext.prop('disabled',false);
					settings.controlBtnPrev.prop('disabled',false);
				}
			}
		);
		
		return $( this );
	};
	
	$.fn.getPrevwpptBulk = function( options ){ //handles loading previous posts in bulk
		var settings = $.extend( {}, options );
		var postContainer =  $( this ).find( 'ul.wppt-post-container' );
		var post = $( this ).find( 'li' );
		var postView = post.slice( settings.postNumView * -1 );
		if ( postContainer.is(':animated') ) {
			return false;
		}
		
		settings.controlBtnNext.prop('disabled',true);
		settings.controlBtnPrev.css( 'opacity','0.5' );
		settings.controlBtnPrev.prop('disabled',true);

		postContainer.prepend( postView.clone() );
		postContainer.css( 'margin-top', settings.postContHeight - settings.postDivSize );
		
		postContainer.animate({
				marginTop: 0
			},
			{
				duration: settings.animationEasingSpeed,
				easing: settings.animationEasingOption,
				complete: function(){
					settings.controlBtnPrev.css( 'opacity','1' );
					settings.controlBtnNext.prop('disabled',false);
					settings.controlBtnPrev.prop('disabled',false);
					postView.detach();
				}
			}
		
		);
		
		return $( this );
	};
})( jQuery );

jQuery(document).ready( function($){
	'use strict';
	//each post ticker is called in seperate instances to handle multiple tickers from the same page with unique settings
	$( 'div.wppt-wrapper' ).each( function(){
		var $wppt = $( this );
		var $wppt_posts = $wppt.find( 'ul.wppt-post-container' );
		var $wppt_post_height = $wppt.data( 'wppt-post-height' ) * -1;
		var $wppt_post_cont = $wppt.data('wppt-post-cont') * -1;
		var $wppt_post_ticker_mode = $wppt.data( 'wppt-adv-mode' ); // Need to connect to the settings
		var $wppt_speed = $wppt.data( 'wppt-adv-speed' ); // Need to connect to the settings
		var $wppt_dir = $wppt.data( 'wppt-adv-dir' ); // Need to connect to the settings
		var $wppt_post_view = $wppt.data( 'wppt-num-view' );
		var $wppt_next = $wppt.find( 'button.wppt-next' );
		var $wppt_prev = $wppt.find( 'button.wppt-prev' );
		var $wppt_stop = $wppt.find( 'button.wppt-stop' );
		var $wppt_play = $wppt.find( 'button.wppt-play' );
		var $wppt_post_div = $wppt.data('wppt-border-size');
		var $wppt_easing = $wppt.data('wppt-easing-animation');
		var $wppt_easing_speed = $wppt.data('wppt-easing-speed');
	
		var $wppt_timeout = null;
		
		//Depends on the setting, it starts the auto ticking mode when loaded
		if ( $wppt_post_ticker_mode == '2' || $wppt_post_ticker_mode == '3'  ){ //Auto Start if option is set.
			wppt_auto_play(); 
		}
		
		//Calls a function to load next post one by one or in bulk depends on the setting upon next post button click
		$wppt_next.on( 'click', function(){
			wppt_stop();
			if( $wppt_post_ticker_mode == '1' || $wppt_post_ticker_mode == '3' ){
				wppt_advance_next_bulk();
			} else {
				wppt_advance_next();
			}
		});
	
		//Calls a function to load previous post one by one or in bulk depends on the setting upon previous post button click
		$wppt_prev.on( 'click', function(){
			wppt_stop();
			if( $wppt_post_ticker_mode == '1' || $wppt_post_ticker_mode == '3' ){
				wppt_advance_prev_bulk();
			} else {
				wppt_advance_prev();
			}
		});
		
		//Calls a function to stop the auto ticker
		$wppt_stop.on( 'click', function(){
			wppt_stop();
		});
		
		//Calls a function to start auto play of ticker
		$wppt_play.on( 'click', function(){
			wppt_stop();
			wppt_auto_play();
		});
		
		//Stops currently running auto play of ticker
		function wppt_stop(){
			clearTimeout( $wppt_timeout );
			$wppt_play.prop('disabled',false);
			$wppt_play.show();
			$wppt_stop.prop('disabled',true);
			$wppt_stop.hide();
		}
		//Set the ticker to run until manual stop
		function wppt_auto_play(){
			if( $wppt_post_ticker_mode == '0' || $wppt_post_ticker_mode == '2' ){ //auto one by one
				$wppt_play.prop('disabled',true);
				$wppt_play.hide();
				$wppt_stop.prop('disabled',false);
				$wppt_stop.show();
				if( $wppt_dir == '0' ){
					$wppt_timeout = setTimeout( wppt_auto_next, $wppt_speed );
				} else if( $wppt_dir == '1' ){
					$wppt_timeout = setTimeout( wppt_auto_prev, $wppt_speed );
				}
			} else if( $wppt_post_ticker_mode == '1' || $wppt_post_ticker_mode == '3' ){ //auto bulk
				$wppt_play.prop('disabled',true);
				$wppt_play.hide();
				$wppt_stop.prop('disabled',false);
				$wppt_stop.show();
				if( $wppt_dir == '0' ){ //direction - scroll up
					$wppt_timeout = setTimeout( wppt_auto_next_bulk, $wppt_speed );
				} else if( $wppt_dir == '1' ){ //direction - scroll down
					$wppt_timeout = setTimeout( wppt_auto_prev_bulk, $wppt_speed );
				}
			}
			return false;
		}
		
		//Calls itself to handle auto play of loading next post one by one
		function wppt_auto_next(){
			wppt_advance_next();
			$wppt_timeout = setTimeout( wppt_auto_next, $wppt_speed );
		}
		
		//Calls itself to handle auto play of loading next post in bulk
		function wppt_auto_next_bulk(){
			wppt_advance_next_bulk();
			$wppt_timeout = setTimeout( wppt_auto_next_bulk, $wppt_speed );
		}
		//Calls itself to handle auto play of loading previous post one by one
		function wppt_auto_prev(){
			wppt_advance_prev();
			$wppt_timeout = setTimeout( wppt_auto_prev, $wppt_speed );
		}
		//Calls itself to handle auto play of loading previous post in bulk
		function wppt_auto_prev_bulk(){
			wppt_advance_prev_bulk();
			$wppt_timeout = setTimeout( wppt_auto_prev_bulk, $wppt_speed );
		}
		
		/*
		 * Actual functions to trigger the animation via jQuery plugin
		 */
		function wppt_advance_next_bulk(){
			return $wppt.getNextwpptBulk( { postContHeight:$wppt_post_cont, postHeight:$wppt_post_height, postDivSize:$wppt_post_div, postNumView:$wppt_post_view, controlBtnNext:$wppt_next, controlBtnPrev:$wppt_prev, animationEasingOption:$wppt_easing, animationEasingSpeed:$wppt_easing_speed } );
		}
		function wppt_advance_next(){
			return $wppt.getNextwppt( { postHeight:$wppt_post_height, postDivSize:$wppt_post_div, controlBtnNext:$wppt_next, controlBtnPrev:$wppt_prev, animationEasingOption:$wppt_easing, animationEasingSpeed:$wppt_easing_speed } );
		}
		function wppt_advance_prev_bulk(){
			return $wppt.getPrevwpptBulk( { postContHeight:$wppt_post_cont, postHeight:$wppt_post_height, postDivSize:$wppt_post_div, postNumView:$wppt_post_view, controlBtnNext:$wppt_next, controlBtnPrev:$wppt_prev, animationEasingOption:$wppt_easing, animationEasingSpeed:$wppt_easing_speed } );
		}
		function wppt_advance_prev(){
			return $wppt.getPrevwppt( { postHeight:$wppt_post_height, postDivSize:$wppt_post_div, controlBtnNext:$wppt_next, controlBtnPrev:$wppt_prev, animationEasingOption:$wppt_easing, animationEasingSpeed:$wppt_easing_speed } );
		}
	});
});