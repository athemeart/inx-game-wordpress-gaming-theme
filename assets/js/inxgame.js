;(function($) {
'use strict'
// Dom Ready

	var back_to_top_scroll = function() {
			
			$('#backToTop').on('click', function() {
				$("html, body").animate({ scrollTop: 0 }, 500);
				return false;
			});
			
			$(window).scroll(function() {
				if ( $(this).scrollTop() > 500 ) {
					
					$('#backToTop').addClass('active');
				} else {
				  
					$('#backToTop').removeClass('active');
				}
				
			});
			
		}; // back_to_top_scroll   
	
	
		//Trap focus inside mobile menu modal
		//Based on https://codepen.io/eskjondal/pen/zKZyyg	
		var trapFocusInsiders = function(elem) {
			
				
			var tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
			
			var firstTabbable = tabbable.first();
			var lastTabbable = tabbable.last();
			/*set focus on first input*/
			firstTabbable.focus();
			
			/*redirect last tab to first input*/
			lastTabbable.on('keydown', function (e) {
			   if ((e.which === 9 && !e.shiftKey)) {
				   e.preventDefault();
				   
				   firstTabbable.focus();
				  
			   }
			});
			
			/*redirect first shift+tab to last input*/
			firstTabbable.on('keydown', function (e) {
				if ((e.which === 9 && e.shiftKey)) {
					e.preventDefault();
					lastTabbable.focus();
				}
			});
			
			/* allow escape key to close insiders div */
			elem.on('keyup', function(e){
			  if (e.keyCode === 27 ) {
				elem.hide();
			  };
			});
			
		};
	
	$(function() {
		
		back_to_top_scroll();
		
		
		if( $('.rd-navbar').length ){ 
		 $('.rd-navbar').RDNavbar({ stickUpClone: false, stickUpOffset: 160});   
		}
		   
		   
		if( $('.owlGallery').length ){
			$(".owlGallery").owlCarousel({
				stagePadding: 0,
				loop: true,
				autoplay: true,
				autoplayTimeout: 2000,
				margin: 0,
				nav: false,
				dots: false,
				smartSpeed: 1000,
				rtl: ( $("body.rtl").length ) ? true : false, 
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 1
					},
					1000: {
						items: 1
					}
				}
			});
		}
	 
	 	if( $('#secondary').length ){
			$('#secondary').stickySidebar({
				topSpacing: 60,
				bottomSpacing: 60,
			});
		}
		
		if( $('.inx-post-carousel-widgets').length ){
			
			$(".inx-post-carousel-widgets").owlCarousel({
				stagePadding: 0,
				loop: true,
				autoplay: true,
				autoplayTimeout: 2000,
				margin: 0,
				nav: false,
				dots: false,
				rtl: ( $("body.rtl").length ) ? true : false, 
				smartSpeed: 1000,
				responsive: {
					0: {
						items: ( $(".inx-post-carousel-widgets").data('xs') != "" ) ? $(".inx-post-carousel-widgets").data('xs') : 1
					},
					600: {
						items: ( $(".inx-post-carousel-widgets").data('sm') != "" ) ? $(".inx-post-carousel-widgets").data('sm') : 1
					},
					1000: {
						items: ( $(".inx-post-carousel-widgets").data('md') != "" ) ? $(".inx-post-carousel-widgets").data('md') : 1
					}
				}
			});
		}
		
	
	
	if( $('.rd-navbar-static .rd-navbar-nav li > a').length ){
		
		$(".rd-navbar-wrap").on("hover", function() {
			$( ".rd-navbar-static .rd-navbar-nav li" ).removeClass('nav_focus_mod');
		});
		$( ".rd-navbar-static .rd-navbar-nav li > a" ).keyup(function() {

			$( ".rd-navbar-static .rd-navbar-nav li" ).removeClass('focus').addClass('nav_focus_mod');	
			
			if( $(this).parents('li.rd-navbar-submenu').length ){
				$(this).parent('li').addClass('focus');
			}

		});
		$( ".rd-navbar-static li.rd-navbar-submenu li > a" ).keyup(function() {
			$(this).parents('li.rd-navbar-submenu').addClass('focus');
		});
	}

	if( $('.inx-rd-navbar-toggle').length ){
			
		$('.inx-rd-navbar-toggle').on('click', function() {
			$('.rd-navbar-nav-wrap.toggle-original-elements,.rd-navbar-fixed .rd-navbar-nav-wrap').toggleClass('active');
			$(this).find('i').toggleClass('icofont-arrow-left').toggleClass('icofont-navigation-menu');
			
			$('.rd-navbar-fixed .rd-navbar-submenu-toggle').attr('tabindex', 0).attr('autofocus', 'true');
			
			return false;
		}); 

		$('.rd-navbar-toggle').on('click', function() {
			$('.rd-navbar-nav-wrap.toggle-original-elements,.rd-navbar-fixed .rd-navbar-nav-wrap').removeClass('active');
		    $('.inx-rd-navbar-toggle').find('i').removeClass('icofont-arrow-left').addClass('icofont-navigation-menu');
			
		}); 
	}
	
	if( $('.rd-navbar-fixed .rd-navbar-nav li > .rd-navbar-submenu-toggle').length ){
		
		$('.rd-navbar-fixed .rd-navbar-nav li > .rd-navbar-submenu-toggle').keypress(function (e) {
			$(this).parents('li.rd-navbar-submenu').toggleClass('opened');
		});   
	}
	
	
	$(window).on('load resize', function() {
		
		if ( matchMedia( 'only screen and (max-width: 992px)' ).matches ) {
      		trapFocusInsiders( $('.rd-navbar-wrap .rd-navbar-fixed') );
      	}else{
		
      	$('.rd-navbar-nav-wrap.toggle-original-elements,.rd-navbar-fixed .rd-navbar-nav-wrap').removeClass('active');
		$('.inx-rd-navbar-toggle').find('i').removeClass('icofont-arrow-left').addClass('icofont-navigation-menu');
			
		$('.rd-navbar-nav-wrap .rd-navbar-submenu-toggle').removeAttr('tabindex').removeAttr('autofocus');
		}	
	});



	$('#static_header_banner,#content,.inx-breadcrumbs-wrap').on('keydown', function(event) {
		
		$('.rd-navbar-static .rd-navbar-nav li.menu-item-has-children').removeClass('opened').removeClass('focus');
		$('.rd-navbar-toggle.toggle-original').removeClass('active');
		$('.rd-navbar-nav-wrap.toggle-original-elements').removeClass('active');
	});
		
	});
})(jQuery);