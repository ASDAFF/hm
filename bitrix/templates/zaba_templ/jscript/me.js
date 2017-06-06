$(document).ready(function(){
	$('.fancybox').fancybox();


	$('.bl_reg_small_r').click(function(){
		/*
		$('.bl_reg_forma').toggle();
		$('.bl_log_forma').hide();
		*/
		$.fancybox($('#bl_reg_forma'));
	});

	$('.bl_log_small_r').click(function(){
		/*
		$('.bl_log_forma').toggle();
		$('.bl_reg_forma').hide();
		*/
		$.fancybox($('#bl_log_forma'));
	});

	$('.main_btn_login').click(function(){
		$('.bl_reg_forma').hide();
		$('.bl_log_forma').show();
	});

	$('.main_btn_registr').click(function(){
		$('.bl_reg_forma').show();
		$('.bl_log_forma').hide();
	});




/*
	$('.bl_slider_main').click(function(){
		clearInterval(sliderTimer);
		sliderTimer = setInterval(function(){nextSliderMain()},3000);
		nextSliderMain();
	});
*/
	var sliderTimer = setInterval(function(){nextSliderMain()},3000);

	$('.btn_add_com').click(function(){
		$('#modalw form input[name="timestamp"]').val('');
		$('#mfeedbacktar').val('');
	});

	$('.reotv').click(function(){
		$('#modalw form input[name="timestamp"]').val($(this).attr('data-text'));
		$('#mfeedbacktar').val($(this).attr('data-target')+', ');
	});

	emojify.run();

	$.fancybox($('.errortext').parent().parent());


});

function nextSliderMain(){
	$('.bl_slider_main a').eq(0).css('left', '600px');
	$('.bl_slider_main a').eq(0).animate({'left':0},500);
	$('.bl_slider_main').append($('.bl_slider_main a').eq(0));
}

