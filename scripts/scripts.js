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
	console.log('popetoe');
	var numberItems = $( "#list li" ).length;
	var heightItems = $( "#list li" ).outerHeight();
	var totalSize = numberItems * heightItems

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
