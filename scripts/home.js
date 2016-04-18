// Slick for home slider
$(document).ready(function(){

	var clientHeight = document.getElementById('animacion_contenedor').clientHeight;
	var clientWidth = document.getElementById('animacion_contenedor').clientWidth;
	var offsetHeight = document.getElementById('animacion_contenedor').offsetHeight;

	var mask_container = document.getElementById('animacion_contenedor');
	var mask = document.getElementsByClassName('anim_imagen');

	var mask_init_top = (clientHeight/100*20);
	var mask_init_right = clientWidth - (clientWidth/100*20);
	var mask_init_bottom = clientHeight - (clientHeight/100*20);
	var mask_init_left = (clientWidth/100*20);


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


	$('.slick-slide').on({
		mouseenter: function () {
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
