var RSGoPro_Hider_called = false;
var RSGoPro_BigadataGalleryFlag = true;

function RSGoPro_DetectTable() {
	$('.artables').each(function(i){
		if ($(this).parents('.js-bigdata').length>=1 && RSGoPro_BigadataGalleryFlag) {
			RSGoPro_BigadataGalleryFlag = false;
		} else {
			var $artables = $(this);
			if($artables.outerWidth(true)<$artables.find('.products').outerWidth(true) && !$artables.hasClass('adap'))
			{
				$artables.addClass('adap');
			}
		}
	});
}

// hide filter and sorter when goods is empty
function RSGoPro_Hider() {
	RSGoPro_Hider_called = true;
	$('.sidebar, .mix, .navi, .catalogsorter').hide();
	$('.catalog .prods').css('marginLeft','0px');
}

$(document).ready(function(){
	
	// fix tables if stupid styles didnt work
	RSGoPro_DetectTable();
	$(window).resize(function(){
		RSGoPro_DetectTable();
	});
	
	if( $('.prices_jscrollpane').length>0 ) {
		RSGoPro_ScrollInit('.prices_jscrollpane');
		$(window).resize(function(){
			RSGoPro_ScrollReinit('.prices_jscrollpane');
		});
	}
	
	$(document).on('mouseenter','.showcase .js-element',function(){
		$(this).addClass('hover');
		return false;
	}).on('mouseleave','.showcase .js-element',function(){
		$(this).removeClass('hover');
		return false;
	});
	if(add_hidder == true)
	{
		RSGoPro_Hider();
	}
	if(RSGoPro_Hider_called) {
		RSGoPro_Hider();
	}
	
});