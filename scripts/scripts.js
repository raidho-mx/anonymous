$(document).ready(function(){

	// Toggle: Newsletter - Feedburner
	$("input#mensualCh").click(function(){
		if ($('form#diario').is(':visible')) {
			$("form#diario").fadeOut('fast');
			$("form#mensual").fadeIn('fast');
		}
	});
	$("input#diarioCh").click(function(){
		if ($('form#mensual').is(':visible')) {
			$("form#mensual").fadeOut('fast');
			$("form#diario").fadeIn('fast');
		}
	});


	// Toggle: Search Box
	$( "#search" ).click(function(){
		$( ".searchbox" ).toggleClass( "show_search" );
	});


	// Trigger: Menu
	// console.log('popetoe');
	var numberItems = $( "#list li" ).length;
	var heightItems = $( "#list li" ).outerHeight();
	var totalSize = numberItems * heightItems;

	$( "#list" ).children().wrapAll('<div class="wrapper"></div>');
	$( "#burger" ).on("click", function(){
		$("header").toggleClass( "show_menu" );
		if ($(this).hasClass( "expand" )) {
			$( "#list" ).animate({ height: "0px" }, 300);
			$(this).toggleClass( "expand reset" );
		}
		else {
			$( "#list" ).animate({ height: totalSize }, 300 );
			$(this).toggleClass( "expand reset" );
		}
	});
});




// Slick Slider
$('.slider-for').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: true	,
	fade: true,
	asNavFor: '.slider-nav',
});

$('.slider-nav').slick({
	variableWidth: true,
	arrows: false,
	slidesToShow: 5,
	slidesToScroll: 1,
	asNavFor: '.slider-for',
	dots: false,
	centerMode: true,
	focusOnSelect: true
});

// Slick Image Counter
var n = $( ".img_cont" ).length;
$( ".counter span" ).append( $( "<b></b>" ) );
$( ".counter span b" ).text( "de " + n );








// If menu is open: Hide height above 750px
function checkWidth() {
	if ($(window).width() < 750) {
		$('#list').removeClass('hide_list');
	} else {
		$('#list').addClass('hide_list');
	}
}
$(window).resize(checkWidth);







/*
 * Sends Views to GA
 */


// functions:
// 1- $function is item on screen
	$.fn.isOnScreen = function() {
		var win = $(window);

		var viewport = {
		top: win.scrollTop(),
		left: win.scrollLeft()
		};

		viewport.right = viewport.left + win.width();
		viewport.bottom = viewport.top + win.height();

		var bounds = this.offset();
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();

		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};


// 2- THIS es el elemento en pantalla
	function isTargetVisible() {
		returnVal = [];
		$('.register_ga').each(function() {
			if ($(this).isOnScreen()) {
				returnVal.push( $(this).attr('title') );
			}
		});
		return returnVal;
	}




// object: adPool junta todos los ADs en esta pagina
	var adPool = {};
	$('.register_ga').each(function() {
		var key = $(this).attr('title');
		if( $(this).hasClass('complex') ) {
			var type = 'complex';
		} else {
			var type = 'image';
		}
		adPool[key] = {
			'title': $(this).attr('data-title'),
			'id': $(this).attr('id'),
			'seen': false,
			'adtype': type
		};
	});





// action: cuando dejamos de scrollear, registramos los ADs que estan visibles en la pantalla solo una vez
	var timeout;
	$(window).scroll(function() {
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			if ($('.register_ga').length > 0) {
				if (isTargetVisible().length > 0) {
					var a = isTargetVisible();
					for (i = 0; i < a.length; i++) {
						var currName = a[i];
						var currSeen = adPool[currName].seen;
						if(currSeen == false) {
							adPool[currName].seen = true;
							console.log(adPool[currName].adtype + ': ' + adPool[currName].title);
							ga('send', 'event', adPool[currName].adtype + ': ' + adPool[currName].title, 'impression', location.pathname);
						}
					}
				}
			}
		}, 25);
	});
