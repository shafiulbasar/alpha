(function($) {

	wp.customize( 'blogname', function( value )
	{
		value.bind( function( to )
		{
			$( 'h1.site-title' ).html( to );
		});
	});
	
	
	wp.customize( 'blogdescription', function( value )
	{
		value.bind( function( to )
		{
			// $( 'header  p.site-description' ).html( to );
		});
	});


// ====================================================================================================================


 	wp.customize( 'pixelwars__setting_font_1', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">' );
			
			
			var styleCss = '<style type="text/css">' + 
								
								'.site-title { font-family: "' + to + '"; }' +
								
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
 	wp.customize( 'pixelwars__setting_font_2', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">' );
			
			
			var styleCss = '<style type="text/css">' + 
								
								'.nav-menu { font-family: "' + to + '"; }' +
								
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
 	wp.customize( 'pixelwars__setting_font_3', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">' );
			
			
			var styleCss = '<style type="text/css">' + 
								
								'h1, h2, h3, h4, h5, h6, .filters, th, dt, .button, input[type=submit], button, label, .tab-titles { font-family: "' + to + '"; }' +
								
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
 	wp.customize( 'pixelwars__setting_font_4', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">' );
			
			
			var styleCss = '<style type="text/css">' + 
								
								'body, input, textarea, select { font-family: "' + to + '"; }' +
								
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});


// ====================================================================================================================


	wp.customize( 'pixelwars__setting_color_1', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.site-title { color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_2', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'@media screen and (min-width: 768px) { .site-title { background: ' + to + '; } }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_3', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.header, .header-wrap { background: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_4', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'a { color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_5', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'a:hover { color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	function ColorLuminance( hex, lum )
	{
		// validate hex string
		hex = String(hex).replace(/[^0-9a-f]/gi, '');
		
		if ( hex.length < 6 )
		{
			hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
		}
		
		lum = lum || 0;
		
		// convert to decimal and change luminosity
		var rgb = "#", c, i;
		
		for ( i = 0; i < 3; i++ )
		{
			c = parseInt(hex.substr(i*2,2), 16);
			c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
			rgb += ("00"+c).substr(c.length);
		}
		
		return rgb;
	}
	
	
	wp.customize( 'pixelwars__setting_color_6', function( value )
	{
		value.bind( function( to )
		{
			color = ColorLuminance( to, -0.15 );
			
			var styleCss = '<style type="text/css">' +
							
								'input[type=submit]:hover, input[type=button]:hover, button:hover, a.button:hover, .event h3, .event h2 + p i, .event h2 + p img, #search-submit, .entry-meta .cat-links a, .pagination a:hover, .navigation a:hover, a.more-link:hover, .section-title h2 i, .event:nth-of-type(2):after { background-color: ' + to + '; }' +
								
								'.bypostauthor > article { border-color: ' + to + '; }' +
								
								'.event h3:before { border-color: ' + to + '; }' +
								
								'.section-title h2:after, .section-title h2:before { background-color: ' + color + '; }' +
							
							'</style>';
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize('pixelwars__setting_color_progress_bar', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' +
							
								'#nprogress .bar { background-color: ' + to + '; }' +
								
								'#nprogress .spinner-icon { border-top-color: ' + to + '; border-left-color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


	wp.customize( 'pixelwars__setting_color_7', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.one-page-layout .site-main > section:nth-of-type(1) { background-color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_7b', function( value )
	{
		value.bind( function( to )
		{
			$( '.one-page-layout .site-main > section:nth-of-type(1)' ).toggleClass( 'light-text' );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_8', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.one-page-layout .site-main > section:nth-of-type(2) { background-color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_8b', function( value )
	{
		value.bind( function( to )
		{
			$( '.one-page-layout .site-main > section:nth-of-type(2)' ).toggleClass( 'light-text' );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_9', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.one-page-layout .site-main > section:nth-of-type(3) { background-color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_9b', function( value )
	{
		value.bind( function( to )
		{
			$( '.one-page-layout .site-main > section:nth-of-type(3)' ).toggleClass( 'light-text' );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_10', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.one-page-layout .site-main > section:nth-of-type(4) { background-color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_10b', function( value )
	{
		value.bind( function( to )
		{
			$( '.one-page-layout .site-main > section:nth-of-type(4)' ).toggleClass( 'light-text' );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_11', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.one-page-layout .site-main > section:nth-of-type(5) { background-color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_11b', function( value )
	{
		value.bind( function( to )
		{
			$( '.one-page-layout .site-main > section:nth-of-type(5)' ).toggleClass( 'light-text' );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_12', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' +
							
								'.one-page-layout .site-main > section:nth-of-type(6) { background-color: ' + to + '; }' +
							
							'</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});
	
	
	wp.customize( 'pixelwars__setting_color_12b', function( value )
	{
		value.bind( function( to )
		{
			$( '.one-page-layout .site-main > section:nth-of-type(6)' ).toggleClass( 'light-text' );
		});
	});


// ====================================================================================================================


 	wp.customize( 'pixelwars__setting_animation_1', function( value )
	{
		value.bind( function( to )
		{
			window.randomize = to;
		});
	});
	
	
 	wp.customize( 'pixelwars__setting_animation_2', function( value )
	{
		value.bind( function( to )
		{
			window.prevAnimation = parseInt(to);
			var index = $('.one-page-layout .nav-menu li.current_page_item').index();
			var total = $('.one-page-layout .nav-menu li').length - 1;
			var target_index = index > 0 ? index - 1 : total;
			window.nextPage( target_index );
			$('.one-page-layout .nav-menu li').eq(target_index).trigger('click');
		});
	});
	
	
 	wp.customize( 'pixelwars__setting_animation_3', function( value )
	{
		value.bind( function( to )
		{
			window.nextAnimation = parseInt(to);
			var index = $('.one-page-layout .nav-menu li.current_page_item').index();
			var total = $('.one-page-layout .nav-menu li').length - 1;
			var target_index = index < total ? index + 1 : 0;
			window.nextPage( target_index );
			//$('.one-page-layout .nav-menu li').eq(target_index).addClass('current_page_item').siblings().removeClass('current_page_item');
			$('.one-page-layout .nav-menu li').eq(target_index).trigger('click');
		});
	});


// ====================================================================================================================


 	wp.customize( 'pixelwars__setting_custom_css', function( value )
	{
		value.bind( function( to )
		{
			var styleCss = '<style type="text/css">' + to + '</style>';
			
			
			$( 'body' ).append( styleCss );
		});
	});

})(jQuery);