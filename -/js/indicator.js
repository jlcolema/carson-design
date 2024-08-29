(function($) {

	$.fn.indicator = function(options) {
	
		options = $.extend({
			overlap : 0,
			speed : 500,
			reset : 500,
			color : '',
			easing : 'easeOutExpo'
		}, options);
	
		return this.each(function() {
		
		 	var nav = $(this),
		 		currentPageItem = $('.current-menu-item, .current-page-ancestor', nav),
		 		indicator,
		 		reset;
		 		
		 	$('<li id="indicator"></li>').css({
		 		width : currentPageItem.outerWidth(),
		 		// height : currentPageItem.outerHeight() + options.overlap,
		 		left : currentPageItem.position().left,
		 		// top : currentPageItem.position().top - options.overlap / 2,
		 		// backgroundColor : options.color
		 	}).prependTo(this);
		 	
		 	indicator = $('#indicator', nav);
					 	
			$('li:not(#indicator)', nav).hover(function() {
				// mouse over
				clearTimeout(reset);
				indicator.animate(
					{
						left : $(this).position().left,
						width : $(this).width()
					},
					{
						duration : options.speed,
						easing : options.easing,
						queue : false
					}
				);
			}, function() {
				// mouse out	
				reset = setTimeout(function() {
					indicator.animate({
						width : currentPageItem.outerWidth(),
						left : currentPageItem.position().left
					}, options.speed)
				}, options.reset);
				
			});
			
			
			$(window).smartresize(function() {
				reset = setTimeout(function() {
					indicator.animate({
						width : currentPageItem.outerWidth(),
						left : currentPageItem.position().left
					}, options.speed)
				}, options.reset);
			});
		 
		
		}); // end each
	
	};

})(jQuery);