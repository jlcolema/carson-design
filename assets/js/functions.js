// remap jQuery to $
(function($){})(window.jQuery);


/* trigger when page is ready */
$(document).ready(function (){

	$(".option-set li a").click(function() {
		$('.row.projects-wrapper').removeClass("no-results");
	});

	// Navigation Indicator

	// $('.menu').indicator();

});


$(window).load(function() {

	// Slideshow

	$('.home .flexslider').flexslider({

		animation: "slide",
		smoothHeight: true,
		slideshowSpeed: 9000,
		pauseOnHover: true,
		useCSS: false,
		touch: false,
		prevText: "<span>&larr;</span> Previous",
		nextText: "Next <span>&rarr;</span>"

	});

	$('.project-slides').flexslider({

		animation: "slide",
		smoothHeight: true,
		slideshowSpeed: 9000,
		pauseOnHover: true,
		useCSS: false,
		touch: false,
		prevText: "<span>&larr;</span> Previous",
		nextText: "Next <span>&rarr;</span>"

	});

	// Testimonials

	$('.testimonials-container').flexslider({

		selector: ".slides > blockquote",
		animation: "slide",
		smoothHeight: true,
		slideshowSpeed: 7000,
		pauseOnHover: true,
		useCSS: false,
		touch: false,
		slideshow: false,
		controlNav: false,
		prevText: "<span>&larr;</span> Previous",
		nextText: "Next <span>&rarr;</span>"

	});

	// Navigation Toggle

	$("nav .toggle").click(function(){

		$(this).toggleClass("active");
		$('nav .nav').toggleClass("active");
	
	});

	// Case Study Popover

	$('.case-study .basic').click(function (e) {

		$('#basic-modal-content').modal();
	
		return false;

	});

	// Projects

	$(function(){
	
		var $container = $('#container');
	
		$container.isotope({
	
			itemSelector: '.project',
			layoutMode: 'fitRows'
	
		});

		$(window).smartresize(function() {
		
		
			// ****************************************
			// begin code to change cols based on width
			// ****************************************
			//console.log($container.width());
			
			if ( $container.width() >= 500 &&  $container.width() <= 800 ) {
				$cols = 2.00;
			} else {
				$cols = 3.00;
			}
			// ****************************************
			// end code to change cols based on width
			// ****************************************

			
			$container.isotope({
			
				resizable: false,
				masonry: { columnWidth: $container.width() / $cols }
				
			});
			
		}).smartresize();

		$container.imagesLoaded( function(){
		
			$(window).smartresize();
			
		});

		var $optionSets = $('.option-set'),
		$optionLinks = $optionSets.find('a');
	
		$optionLinks.click(function(){
	
			var $this = $(this);
	
			// don't proceed if already selected
	
			if ( $this.hasClass('selected') ) {
	
				return false;
	
			}

			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
	
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
	
			var options = {},
			key = $optionSet.attr('data-option-key'),
			value = $this.attr('data-option-value');
	
			// parse 'false' as false boolean
	
			value = value === 'false' ? false : value;
			options[ key ] = value;
	
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	
				// changes in layout modes need extra logic
	
				changeLayoutMode( $this, options )
	
			} else {
	
				// otherwise, apply new options
	
				$container.isotope( options );
				$container.isotope( 'reLayout', noResultsCheck );

			}

			return false;
	
		});
		
		function noResultsCheck() {

			var numItems = $('.isotope-item:not(.isotope-hidden)').length;   
	
			if (numItems == 0) {
		
				$('.row.projects-wrapper').addClass("no-results");
		
			} else {

				$('.row.projects-wrapper').removeClass("no-results");
		
			}
		}
	
	});

	// Category Dropdown
	
	function DropDown(el) {

		this.dd = el;
		this.placeholder = this.dd.children('span');
		this.opts = this.dd.find('ul.option-set > li > a');
		this.val = '';
		this.index = -1;
		this.initEvents();

	}

	DropDown.prototype = {

		initEvents : function() {
	
			var obj = this;
	
			obj.dd.on('click', function(event){
	
				$(this).toggleClass('active');
	
				return false;
	
			});
	
			obj.opts.on('click',function(){
				var opt = $(this);
				obj.val = opt.text();
				obj.index = opt.index();
				obj.placeholder.text(obj.val);

			});
	
		},
	
		getValue : function() {
	
			return this.val;
	
		},
	
		getIndex : function() {
	
			return this.index;
	
		}
	
	}
	
	$(function() {
	
		var dd = new DropDown( $('.dropdown .markets') );
		var dd = new DropDown( $('.dropdown .services') );
	
		$('.filter .option-set a').click(function() {
	
			// all dropdowns
	
			$('.inner-dropdown').removeClass('active');
	
		});

		$(document).click(function() {
	
			// all dropdowns
	
			$('.inner-dropdown').removeClass('active');
	
		});
	
	});

});

$(window).resize(function() {
	
});