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

	// Вигляд кнопок
	$("#icon_grid").click(function() {
		$("#block_tovar_list").hide();
		$("#block_tovar_grid").show();

		$("#icon_grid").attr("src", "images/icon_grid_active.png");
		$("#icon_list").attr("src", "images/icon_list.png");

		$.cookie('select_style', 'grid');
	});

	$("#icon_list").click(function() {
		$("#block_tovar_grid").hide();
		$("#block_tovar_list").show();

		$("#icon_list").attr("src", "images/icon_list_active.png");
		$("#icon_grid").attr("src", "images/icon_grid.png");

		$.cookie('select_style', 'list');
	});

	if($.cookie('select_style') == 'grid'){
		$("#block_tovar_list").hide();
		$("#block_tovar_grid").show();

		$("#icon_grid").attr("src", "images/icon_grid_active.png");
		$("#icon_list").attr("src", "images/icon_list.png");
	} else if($.cookie('select_style') == 'list') {
		$("#block_tovar_grid").hide();
		$("#block_tovar_list").show();

		$("#icon_list").attr("src", "images/icon_list_active.png");
		$("#icon_grid").attr("src", "images/icon_grid.png");
	} 

	if(!$.cookie('select_style')){
		$("#icon_grid").attr("src", "images/icon_grid_active.png");
	} 

	$('#select_sort').click(function() {
		$("#sorting_list").slideToggle(200);
	});

	//*********************Акардіон
	$('#block_category > ul > li > a').click(function() {
		if($(this).attr('class') != 'active') {
			$('#block_category > ul > li > ul').slideUp(400);
			$(this).next().slideToggle(400);

				$('#block_category > ul > li > a').removeClass('active');
				$(this).addClass('active');
				$.cookie('select_cat', $(this).attr('id'));
		} else {
			$('#block_category > ul > li > a').removeClass('active');
			$('#block_category > ul > li > ul').slideUp(400);
			$.cookie('select_cat', '');
		}
	});

	if($.cookie('select_cat') != '') {
		$('#block_category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
	}

	$("#auth_user_info").toggle(function() {
		$("#block_user").fadeIn(400);
	}, function() {
		$("#block_user").fadeOut(400);
	});

	// ajax запит на вихід із акаунта
	$(".logout").click(function() {
		$.ajax({
			type: "POST",
			url: "include/functions/sign_in_close_session.php",
			dataType: "html",
			cache: false,
			success: function(data) {
				if(data == "logout"){
					location.reload();
				}
			}
		});
	});
	
	$(".setting").click(function() {
		window.location.replace("http://logoshop.ua/setting.php");
	});

});


