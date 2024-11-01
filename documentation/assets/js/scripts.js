$(document).ready(function(){
	
	//Add .active class to navigation links
  $('.navigation ul li a').click(function(){
    $('.navigation ul li a').removeClass('active');
    $(this).addClass('active');
	});
	
	//Smooth Anchor Scrolling
	$(function() {
		$('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 500);
					return false;
				}
			}
		});
	});

});

