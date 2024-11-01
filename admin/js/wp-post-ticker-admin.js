jQuery(document).ready( function($){
	
		$( '.wppt-pro-notification' ).on( 'click', function(){
			$.ajax({
				url: wppt_admin_localized.admin_ajax_url,
				data: {
					action: 'wppt_portfolio_dismiss_pro_notice'
				},
				success: function( data ){
				}
			});
		});
	
	$( '.wppt-shortcode-select' ).on( 'click', function() {
		$(this).select();
	});
	$( '.wppt-post-advance-mode' ).change( function () {
		var $advanceMode = $(this).find('option:selected').val();
		if( $advanceMode == "0" || $advanceMode == "4" ){
			$( 'div.wppt-post-auto-play-section' ).hide();
		} else {
			$( 'div.wppt-post-auto-play-section' ).show();
		}
	});
	
	$('input[name="wppt-post-cat[]"]').on('change', function() {
		 $('input[name="wppt-post-cat[]"]').not(this).prop('checked', false);
	});
	$( '.wppt-show-advanced-settings' ).change( function (){
		if ( $( '.wppt-show-advanced-settings' ).prop( 'checked' ) == true ) {
			$( '#wppt-advanced-settings' ).show();
		} else {
			$( '#wppt-advanced-settings' ).hide();
		}
	});
	
	$( '.wppt-ticker-inherit-global-style' ).change( function (){
		if( $( ".wppt-ticker-inherit-global-style" ).prop( 'checked' ) == true ){
			$( '#wppt-advanced-styles' ).hide();
		} else {
			$( '#wppt-advanced-styles' ).show();
		}
	});

	$( '.wppt-post-display-options-thumb' ).change( function (){
		if ( $( '.wppt-post-display-options-thumb:checked' ).val() < 1 ) {
			$( 'div.wppt-post-thumb-width-section' ).show();
			$( 'div.wppt-post-thum-ratio-section' ).show();
		} else {
			$( 'div.wppt-post-thumb-width-section' ).hide();
			$( 'div.wppt-post-thum-ratio-section' ).hide();
		}
	});
	
	$( '.wppt-post-num-load' ).change( function (){
		var $numView = parseInt( $( '.wppt-post-num-view' ).val() );
		var $numLoad = parseInt( $( '.wppt-post-num-load' ).val() );
		if( $numLoad < $numView ){
			$( '.wppt-post-num-load-section .wppt-msg-error' ).show();
			$( '.wppt-post-num-load' ).val( $numView );
		} else {
			$( '.wppt-post-num-load-section .wppt-msg-error' ).hide();
		}
	});
	$( '.wppt-post-num-view' ).change( function (){
		var $numView = parseInt( $( '.wppt-post-num-view' ).val() );
		var $numLoad = parseInt( $( '.wppt-post-num-load' ).val() );
		if( $numView > $numLoad ){
			$( '.wppt-post-num-view-section .wppt-msg-error' ).show();
			$( '.wppt-post-num-view' ).val( $numLoad );
		} else {
			$( '.wppt-post-num-view-section .wppt-msg-error' ).hide();
		}
	});	
	$('.wppt-color-picker').each( function(){
		$(this).minicolors({
			animationSpeed: 10,
			animationEasing: 'swing',
			change: null,
			changeDelay: 10,
			control: 'hue',
			dataUris: true,
			defaultValue: '',
			format: 'rgb',
			hide: null,
			hideSpeed: 100,
			inline: false,
			keywords: '',
			letterCase: 'lowercase',
			opacity: true,
			position: 'top	right',
			show: null,
			showSpeed: 100,
			theme: 'default'
		})
	});	
	$('.wppt-color-picker-down').each( function(){
		$(this).minicolors({
			animationSpeed: 10,
			animationEasing: 'swing',
			change: null,
			changeDelay: 10,
			control: 'hue',
			dataUris: true,
			defaultValue: '',
			format: 'rgb',
			hide: null,
			hideSpeed: 100,
			inline: false,
			keywords: '',
			letterCase: 'lowercase',
			opacity: true,
			position: 'bottom	right',
			show: null,
			showSpeed: 100,
			theme: 'default'
		})
	});
	$( 'a#wppt-post-setting' ).on( 'click', function( event ) {
		$( 'input#publish' ).trigger( 'click' );
		event.preventDefault();
	});
	$( 'a#wppt-post-top' ).on( 'click', function( event ) {
		$( 'html, body' ).animate( { scrollTop: 0 }, 'slow' );
		event.preventDefault();
	});
});