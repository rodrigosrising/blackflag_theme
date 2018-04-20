jQuery(function ($) {
	$(document).foundation();

	$( document ).ready(function() {
	    $('.olw-home-slides').owlCarousel({
      items:1,
      loop:true,
      dots:true,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      mouseDrag: false,
      touchDrag: true,
    });

    $('.owl-empresas').owlCarousel({
      loop:true,
      dots:false,
      nav: true,
      navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      responsiveClass:true,
      responsive:{
        0:{
          items:2,
          slideBy:2,
          nav:true,
          dots: false
        },
        640:{
          items:5,
          nav:false,
          dots:true,
        },
        1024:{
          items:7,
          nav:false,
          dots:true,
        },
        1200:{
          items:9,
          nav:false,
          dots:true,
        }
      }
    });

	});

	$(document).ready(function( ) {
		$('#facebook-share').on('click', function() {
			ga('send', 'event', 'redes sociais', 'click', 'Compartilhado no Facebook');
			// console.log( "Compartilhado no Facebook" );
		});
		$('#twitter-share').on('click', function() {
			ga('send', 'event', 'redes sociais', 'click', 'Compartilhado no Twitter');
			// console.log( "Compartilhado no Twitter" );
		});
		$('#linkedin-share').on('click', function() {
			ga('send', 'event', 'redes sociais', 'click', 'Compartilhado no LinkedIn');
			// console.log( "Compartilhado no LinkedIn" );
		});
		$('#google-plus-share').on('click', function() {
			ga('send', 'event', 'redes sociais', 'click', 'Compartilhado no Google Plus');
			// console.log( "Compartilhado no Google Plus" );
		});
		$('#whatsapp-share').on('click', function() {
			ga('send', 'event', 'redes sociais', 'click', 'Compartilhado no WhatsApp');
		});
	});

	if($('.home-animation').length >0 ){
		$( document ).ready(function() {
			for (var i = 0; i < 240; i++) {
				$('.home-animation').append('<div class="cube" id="cube_'+i+'"></div>');
			}
		});

		function hideCube() {
		$('.cube').each(function(index, element) {
		    	var sleepTime = Math.floor(Math.random() * 1500);
		    	var t = setTimeout(function() {
		    		var d = Math.floor(Math.random() * 2500);
		    		$(element).fadeTo(d, 0.25);
		    	}, sleepTime);
		    });
		}

		$(function() {
			$('.cube').each(function(index, element) {
				var sleepTime = Math.floor(Math.random() * 1500);
				var t = setInterval(function() {
					var d = Math.floor(Math.random() * 2500);
					$(element).fadeTo(d, 0);
				}, sleepTime);
			});
			var h = setInterval(hideCube, 2500);
		});
	};

	$.stellar({
    horizontalScrolling: false,
    verticalOffset: 0,
    horizontalOffset: 0
  });
});/*END JQUERY WRAPPER*/