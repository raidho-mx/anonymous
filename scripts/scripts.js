

$(window).on("resize", function () {
	var count = 0;

	var clientHeight = document.getElementById('animacion_contenedor').clientHeight;
	var clientWidth = document.getElementById('animacion_contenedor').clientWidth;
	var offsetHeight = document.getElementById('animacion_contenedor').offsetHeight;

	var mask_container = document.getElementById('animacion_contenedor');
	var mask = document.getElementsByClassName('anim_imagen');

	var mask_init_top = (clientHeight/100*20);
	var mask_init_right = clientWidth - (clientWidth/100*20);
	var mask_init_bottom = clientHeight - (clientHeight/100*20);
	var mask_init_left = (clientWidth/100*20);


	$(".anim_imagen").each(function() {
		$(this).attr("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect("+ mask_init_top +"px, "+ mask_init_right +"px, "+ mask_init_bottom +"px, "+ mask_init_left +"px)");
		$(this).css("opacity", "0.2");
	});


	$('.slick-slide').on({
		mouseenter: function () {
			// console.log('poop');
			$(this).find('.anim_imagen').attr("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect(0, "+ clientWidth +"px, "+ clientHeight +"px, 0)");
			$(this).find('.anim_imagen').css("opacity", "1");
			$("h1.huge").css("opacity","0.5");
		},
		mouseout: function () {
			$(this).find('.anim_imagen').attr("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect("+ mask_init_top +"px, "+ mask_init_right +"px, "+ mask_init_bottom +"px, "+ mask_init_left +"px)");
			$(this).find('.anim_imagen').css("opacity", "0.2");
			$("h1.huge").css("opacity","1");
		}
	});
}).resize();


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

// Toggle Search Box
$( "#search" ).click(function(){
	$( ".searchbox" ).toggleClass( "show_search" );
});

// Slick for home slider
$(document).ready(function(){
	$('.home-slider').slick({
		dots: true,
		arrows: false,
		autoplay: true,
		slidesToScroll: 1,
		slidesToShow: 1,
		infinite: true,
		fade: true,
		cssEase: 'linear'
	});

	var clientHeight = document.getElementById('animacion_contenedor').clientHeight;
	var clientWidth = document.getElementById('animacion_contenedor').clientWidth;
	var offsetHeight = document.getElementById('animacion_contenedor').offsetHeight;

	var mask_container = document.getElementById('animacion_contenedor');
	var mask = document.getElementsByClassName('anim_imagen');

	var mask_init_top = (clientHeight/100*20);
	var mask_init_right = clientWidth - (clientWidth/100*20);
	var mask_init_bottom = clientHeight - (clientHeight/100*20);
	var mask_init_left = (clientWidth/100*20);

	$('.slick-slide').on({
		mouseenter: function () {
			// console.log('poop');
			$(this).find('.anim_imagen').attr("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect(0, "+ clientWidth +"px, "+ clientHeight +"px, 0)");
			$(this).find('.anim_imagen').css("opacity", "1");
			$("h1.huge").css("opacity","0.5");
		},
		mouseout: function () {
			$(this).find('.anim_imagen').attr("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect("+ mask_init_top +"px, "+ mask_init_right +"px, "+ mask_init_bottom +"px, "+ mask_init_left +"px)");
			$(this).find('.anim_imagen').css("opacity", "0.2");
			$("h1.huge").css("opacity","1");
		}
	});
});


// Trigger Menu
$(function() {
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
})

// If menu is open: Hide height above 750px
function checkWidth() {
	if ($(window).width() < 750) {
		$('#list').removeClass('hide_list');
	} else {
		$('#list').addClass('hide_list');
	}
}
$(window).resize(checkWidth);
