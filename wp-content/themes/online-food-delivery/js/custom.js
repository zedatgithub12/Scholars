jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed:'fast'
	});
});

function online_food_delivery_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function online_food_delivery_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

function online_food_delivery_search_show() {
	jQuery(".search-outer").addClass('show');
	jQuery(".search-outer").fadeIn();
}
function online_food_delivery_search_hide() {
	jQuery(".search-outer").removeClass('show');
	jQuery(".search-outer").fadeOut();
}

function online_food_delivery_social_show() {
	if (jQuery(".social-icon").hasClass("opened")) {
	  jQuery(".social-icon").removeClass("opened");
	} else {
	  jQuery(".social-icon").addClass("opened");
	}
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header px-lg-3 px-2');
		else sticky.removeClass('fixed-header px-lg-3 px-2');
	});

	// Back to top
	jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 0) {
      	jQuery('.scrollup').fadeIn();
      } else {
        jQuery('.scrollup').fadeOut();
      }
    });
    jQuery('.scrollup').click(function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });
	});

	// Window load function
	window.addEventListener('load', (event) => {
		jQuery(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

( function( window, document ) {
	function online_food_delivery_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const online_food_delivery_nav = document.querySelector( '.side-menu' );

			if ( ! online_food_delivery_nav || ! online_food_delivery_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...online_food_delivery_nav.querySelectorAll( 'input, a, button' )],
				online_food_delivery_lastEl = elements[ elements.length - 1 ],
				online_food_delivery_firstEl = elements[0],
				online_food_delivery_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && online_food_delivery_lastEl === online_food_delivery_activeEl ) {
				e.preventDefault();
				online_food_delivery_firstEl.focus();
			}

			if ( shiftKey && tabKey && online_food_delivery_firstEl === online_food_delivery_activeEl ) {
				e.preventDefault();
				online_food_delivery_lastEl.focus();
			}
		} );
	}

	
	
	function online_food_delivery_keepfocus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const online_food_delivery_search = document.querySelector( '.search-outer' );

			if ( ! online_food_delivery_search || ! online_food_delivery_search.classList.contains( 'show' ) ) {
				return;
			}

			const elements = [...online_food_delivery_search.querySelectorAll( 'input, a, button' )],
				online_food_delivery_lastEl = elements[ elements.length - 1 ],
				online_food_delivery_firstEl = elements[0],
				online_food_delivery_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && online_food_delivery_lastEl === online_food_delivery_activeEl ) {
				e.preventDefault();
				online_food_delivery_firstEl.focus();
			}

			if ( shiftKey && tabKey && online_food_delivery_firstEl === online_food_delivery_activeEl ) {
				e.preventDefault();
				online_food_delivery_lastEl.focus();
			}
		} );
	}

	online_food_delivery_keepFocusInMenu();

	online_food_delivery_keepfocus_search();
} )( window, document );
