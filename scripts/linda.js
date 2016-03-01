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

var n = $( ".img_cont" ).length;
$( ".counter span" ).append( $( "<b></b>" ) );
$( ".counter span b" ).text( "de " + n );

// Toggle Menu
$("#burger").click(function(){
	$("header").toggleClass("show_menu");
});

// Toggle Search Box
$("#search").click(function(){
	$(".searchbox").toggleClass("show_search");
});


$(function(){
	$('#list').children().wrapAll('<div class="wrapper"></div>');
	var expandedHeight = $('.wrapper').height();
	var collapsedHeight = $('#list').height();
	//$('p').text(innerHeight);
	$('#burger').on("click", function(){
		if ($(this).hasClass("expand")) {
			$("#list").animate({
				height: 0
			}, 200, function(){
				$('.expand').toggleClass("expand reset");
			});
		}
		else {
			$("#list").animate({height: expandedHeight}, 200 );
			$(this).toggleClass("expand reset");
		}
	});
});



function checkWidth() {
	if ($(window).width() < 750) {
		$('#list').removeClass('hide_list');
	} else {
		$('#list').addClass('hide_list');
	}
}
$(window).resize(checkWidth);
