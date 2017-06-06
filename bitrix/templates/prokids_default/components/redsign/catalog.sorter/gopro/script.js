function RSGoProSorterGo(ajaxpagesid,$link,isBigdata) {
	if($link) {
		var catalog_selector = '#'+ajaxpagesid,
			url = $link.attr('href');
		RSGoPro_Area2Darken($(catalog_selector),'animashka');
		$link.parent().find('a').removeClass('selected');
		$link.addClass('selected')
		// dropdown
		if( $link.parents('.dropdown').find('.select').length>0 ) {
			$link.parents('.dropdown').find('.select').html( $link.html() );
		}
		// shortsorter
		if( $link.parents('.shortsort').length>0 ) {
			if(url==$link.data('url1')){
				$link.attr('href',$link.data('url2'));
			} else {
				$link.attr('href',$link.data('url1'));
			}
			if($link.find('.icon').hasClass('asc')){
				$link.find('.icon').removeClass('asc').addClass('desc');
			} else {
				$link.find('.icon').removeClass('desc').addClass('asc');
			}
		}
		if(isBigdata!='Y' && url && url!='') {
			url+= '&AJAX_CALL=Y&sorterchange='+ajaxpagesid;
			$.getJSON(url, {}, function(json){
				RSGoPro_PutJSon( json,false,ajaxpagesid );
				setTimeout(function(){
					RSGoPro_ScrollInit('.prices_jscrollpane');
					RSGoPro_TIMER();
					RSGoPro_SetSet();
				},75); // for slow shit
			}).fail(function(json){
				console.warn( 'sorter - change template -> error responsed' );
			}).always(function(){
				RSGoPro_Area2Darken($(catalog_selector),'animashka');
			});
		}
	}
}

$(document).ready(function(){
	
	// ajax sorter -> change (click link)
	$(document).on('click','.catalogsorter .template a, .catalogsorter .output .cool .dropdownin a, .catalogsorter .sort .cool .dropdownin a, .catalogsorter .shortsort .cool a',function(){
		var $link = $(this);
		if( $link.parents('.catalogsorter').length>0 ) {
			var ajaxpagesid = $link.parents('.catalogsorter').data('ajaxpagesid');
			if( ajaxpagesid && ajaxpagesid!='' ) {
				if( $link.parents('.js-bigdata').length>0 ) { // big data
					RSGoProSorterGo(ajaxpagesid,$link,'','Y');
					var $jsBigdata = $link.parents('.js-bigdata');
					BX.ajax({
						url: $jsBigdata.data('url'),
						method: 'POST',
						data: {'parameters':$jsBigdata.data('parameters'), 'template':$jsBigdata.data('template'), 'rcm':'yes', 'view':$link.data('fvalue')},
						dataType: 'html',
						processData: false,
						start: true,
						onsuccess: function (html) {
							var ob = BX.processHTML(html);
							// inject
							BX($jsBigdata.data('injectId')).innerHTML = ob.HTML;
							BX.ajax.processScripts(ob.SCRIPT);
							RSGoPro_ScrollInit('.prices_jscrollpane');
							//RSGoPro_Area2Darken($('#'+ajaxpagesid),'animashka');
							RSGoPro_TIMER();
							RSGoPro_SetSet();
						}
					});
				} else { // normal components
					RSGoProSorterGo(ajaxpagesid,$link,'N');
					if( $link.parents('.dropdown').length>0 ) {
						$link.parents('.dropdown').removeClass('hover');
					}
				}
			}
		}
		return false;
	});
	
	$(document).on('mouseenter','.catalogsorter .dropdown',function(){
		$(this).addClass('hover');
		return false;
	}).on('mouseleave','.catalogsorter .dropdown',function(){
		$(this).removeClass('hover');
		return false;
	}).on('click','.catalogsorter .dropdown',function(){
		$(this).toggleClass('hover');
		return false;
	});
	
	$('.mix .catalogsorter').addClass('used');
	
});