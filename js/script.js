$(document).scroll(function() {
	if($(document).scrollTop () > $('header').height () + 10)
	$('nav').addClass('fixed');
	else 
		$('nav').removeClass('fixed');
});

$(document).ready(function () {
	$(".new_sticker").jCarouselLite({
		vertical: true,
		hoverPause:true,
		btnPrev: ".drop_up",
		btnNext: ".drop_down",
		visible: 3,
		auto:3000,
		speed:500
	});
});
