(function($) { "use strict"; 
	
	/* DOCUMENT LOAD */
	$(function() {
	
		// wp-customizer simulator
		setTimeout(prepare, 1000);
		
		function prepare() {
			$('.one-page-layout .nav-menu a').each(function(index, element) {
				$(this).removeAttr('href');
			});
		};
		
		
		// navigate on list item click	
		$('.one-page-layout .nav-menu li').on('click', function() {
			window.nextPage( $(this).index());
			$(this).addClass('current_page_item').siblings().removeClass('current_page_item');
		});
		
		
		// FOR DEMO PURPOSES
		$( '#nextAni li' ).on('click', function() {
			var current_menu_link = $('.nav-menu .current_page_item');
			window.nextAnimation  = $(this).data( 'animation' );
			return false;
		});
		
		
		$( '#prevAni li' ).on('click', function() {
			var current_menu_link = $('.nav-menu .current_page_item');
			window.prevAnimation  = $(this).data( 'animation' );
			return false;
		});
		// FOR DEMO PURPOSES	
	});

})(jQuery);