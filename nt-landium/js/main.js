
'use strict';

var $window = jQuery(window),
	nStartScreen = document.getElementById('start-screen');

/* smartresize
================================================== */
(function($,sr){

	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;

		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
					if (!execAsap)
							func.apply(obj, args);
					timeout = null;
			};

			if (timeout)
					clearTimeout(timeout);
			else if (execAsap)
					func.apply(obj, args);

			timeout = setTimeout(delayed, threshold || 100);
		};
	}
	// smartresize
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
})(jQuery,'smartresize');

/* main menu
================================================== */
function _main_menu ()
{
	var show_menu = prefix.showmenu;//default 80'
	var show_menufinal = parseInt(show_menu);
	if( !!show_menufinal ){var showmenuoffset = show_menufinal;}else{ var showmenuoffset = 80;}

	var nTopBar      = document.getElementById('top-bar'),
		nMenuToggler = document.getElementById('top-bar__navigation-toggler'),
		nNav         = document.getElementById('top-bar__navigation'),

		jTopBar      = jQuery(nTopBar),
		jMenuToggler = jQuery(nMenuToggler),
		jNav         = jQuery(nNav),

		jLink        = jNav.find('li > a[href*="#"]:not([href="#"])'),
		iTop         = jQuery(nStartScreen).innerHeight() - showmenuoffset;

	window.onscroll = function() {
		if ( (window.pageYOffset || document.documentElement.scrollTop) >= iTop ) {

			jTopBar.addClass('fixed in');

		} else if ( jTopBar.hasClass('fixed') ) {

			jTopBar.removeClass('in').addClass('out');

			setTimeout(function(){
				jTopBar.removeClass('fixed out');
			}, 100 );

		};
	};

if (jQuery('body.page-template.page-template-one-page-template').length > 0) {
	jLink.on('touchend click', function (e) {
		e.preventDefault();

		if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {

			var target = jQuery(this.hash);

			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');


			if ( target.length ) {
				jQuery('html,body').stop().animate({
					scrollTop: target.offset().top - 80
				}, 1000);
			}
		}

		if ( jMenuToggler.is(':visible') ) {

			jTopBar.removeClass('expanded');
			jMenuToggler.removeClass('active');
		}

		return false;
	});
}
	jMenuToggler.on('touchend click', function (e) {
		e.preventDefault();

		var $this = jQuery(this);

		$this.toggleClass('active');
		jTopBar.toggleClass('expanded');

		return false;
	});

	$window.smartresize(function() {
		if ( jQuery(this).width() > 991 ) {

			jMenuToggler.removeClass('active');
			jTopBar.removeClass('expanded');
		}
	});
};


/* owl carousel
================================================== */
function _owl_carousel ()
{
	var slider_1 = jQuery('.feedback-slider--style-1'),
		slider_2 = jQuery('.feedback-slider--style-2');

	if ( slider_1.length > 0 ) {

		slider_1.children('.owl-carousel').owlCarousel({
			loop: true,
			nav: false,
			dots: true,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			autoHeight: true,
			smartSpeed: 1000,
			margin: 30,
			navText: [
				'<i class="fa fa-angle-left"></i>',
				'<i class="fa fa-angle-right"></i>'
			],
			responsive: {
				0:{
					items:1
				},
				992:{
					items:2
				}
			}
		});
	}

	if ( slider_2.length > 0 ) {

		slider_2.children('.owl-carousel').owlCarousel({
			loop: true,
			nav: false,
			dots: true,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			autoHeight: true,
			smartSpeed: 1000,
			margin: 30,
			navText: [
				'<i class="fa fa-angle-left"></i>',
				'<i class="fa fa-angle-right"></i>'
			],
			responsive: {
				0:{
					items:1
				},
				992:{
					items:1
				}
			}
		});
	}
}


/* parallax
================================================== */
function _parallax ()
{
	if ( device.desktop() )
	{
		jQuery.stellar({
			scrollProperty: 'scroll',
			verticalOffset: 0,
			horizontalOffset: 0,
			horizontalScrolling: false
		});

		$window.smartresize(function() {
			jQuery.stellar('refresh');
		});
	};
};

/* scroll to top
================================================== */
function _scrollTop ()
{
	var	nBtnToTopWrap = document.getElementById('btn-to-top-wrap'),
		jBtnToTopWrap = jQuery(nBtnToTopWrap);

	if ( jBtnToTopWrap.length > 0 ) {

		var nBtnToTop = document.getElementById('btn-to-top'),
			jBtnToTop = jQuery(nBtnToTop);

		jBtnToTop.on('click', function (e) {
			e.preventDefault();

			jQuery('body,html').stop().animate({ scrollTop: 0 } , 1500);

			return false;
		});

		$window.on('scroll', function(e) {

			if ( $window.scrollTop() > jBtnToTop.data('visible-offset') ) {

				if ( jBtnToTopWrap.is(":hidden") ) {
					jBtnToTopWrap.fadeIn();
				};

			} else {

				if ( jBtnToTopWrap.is(":visible") ) {
					jBtnToTopWrap.fadeOut();
				};
			};
		});
	};
};

/* boxer gall
================================================== */
function _gall ()
{
	var galleryElement = jQuery("a[data-gallery]");

	if ( galleryElement.length > 0 ) {
		galleryElement.boxer({
			fixed: true,
			mobile: false,
			videoWidth: 1200
		});
	}
};

/*------------------------------------
    13. Modal
--------------------------------------*/
function _modalvideo ()
{
	var modalgallery = jQuery(".izimodal");
	if ( modalgallery.length > 0 ) {
		jQuery(".izimodal").iziModal({
		width: 820,
		top: null,
		bottom: null,
		borderBottom: false,
		padding: 0,
		radius: 3,
		zindex: 999999,
		iframe: false,
		iframeHeight: 400,
		iframeURL: null,
		focusInput: false,
		group: '',
		loop: false,
		arrowKeys: true,
		navigateCaption: true,
		navigateArrows: true,
		history: false,
		restoreDefaultContent: true,
		autoOpen: 0, // Boolean, Number
		bodyOverflow: false,
		fullscreen: true,
		openFullscreen: false,
		closeOnEscape: true,
		closeButton: true,
		appendTo: 'body', // or false
		appendToOverlay: 'body', // or false
		overlay: true,
		overlayClose: true,
		overlayColor: 'rgba(0, 0, 0, .75)',
		timeout: false,
		timeoutProgressbar: false,
		pauseOnHover: false,
		timeoutProgressbarColor: 'rgba(255,255,255,0)',
		transitionIn: 'comingIn',
		transitionOut: 'comingOut',
		transitionInOverlay: 'fadeIn',
		transitionOutOverlay: 'fadeOut',
		onFullscreen: function(){},
		onResize: function(){},
		onOpening: function(){},
		onOpened: function(){},
		onClosing: function(){},
		onClosed: function(){},
		afterRender: function(){}
		});
		jQuery(document).on('click', '.trigger', function (event) {
		event.preventDefault();
		jQuery('.izimodal').iziModal('setZindex', 99999999);
		jQuery('.izimodal').iziModal('open', { zindex: 99999999 });
		jQuery('.izimodal').iziModal('open');
		});
	}
}

/* equal height
================================================== */
function _equal_height ()
{
	jQuery('.matchHeight-container').each(function() {
		jQuery(this).find('.matchHeight-item').matchHeight({
			byRow: true,
			property: 'height'
		});
	});
};

jQuery(document).ready(function() {



	/* main menu
	================================================== */
	_main_menu();


	/* owl carousel
	================================================== */
	_owl_carousel();


	/* parallax
	================================================== */
	_parallax();

	/* scroll to top
	================================================== */
	_scrollTop();

	/* boxer gall
	================================================== */
	_gall();
	_modalvideo ()

	/* equal height
	================================================== */
	_equal_height();



	var wow = new WOW(
	  {
		animateClass: 'animated',
		offset: 100
	  }
	);
	wow.init();

});



jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();

    if (scroll > 10) {
        jQuery("#top-bar").addClass("mobile-top-go"); // you don't need to add a "." in before your class name
    } else {
        jQuery("#top-bar").removeClass("mobile-top-go");
    }
});

// preloader
jQuery(window).load(function(){
		jQuery('body').css('overflow-y', 'visible');
		jQuery('.preloader-container').fadeOut('slow', function(){
				jQuery(this).remove();
		});
});
