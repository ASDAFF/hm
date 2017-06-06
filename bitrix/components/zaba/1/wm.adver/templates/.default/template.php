<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))die();
	//
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
	<?
	$globSection = '';
	$globSectionName = 'Объявления';

	if($arIBlockSection = GetIBlockSection($_REQUEST['SECTION_ID'], $arParams["IBLOCK_TYPE"])){
		$globSection = $arIBlockSection['ID'];
		$globSectionName = $arIBlockSection['NAME'];
	}

	$arMSectIn = Array(
		"IBLOCK_TYPE"=>$arParams["IBLOCK_TYPE"],
		"SECTION_ID"=>$globSection
	);

	$arMSectInCount = CIBlockSection::GetCount($arMSectIn);

	$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
	$GLOBALS['arrFinder'] = array("PREVIEW_TEXT" => '%' . $_REQUEST['arrFinder'] . '%');
	?>

<script type="text/javascript">

	var issystemopen = true;

	$(document).ready(function(){

		$(".zaba_button_open").click(function(){
			toggleSendForm($(this).children('.adv_answer_id').val());
		});

		$(".fancybox").fancybox({
			margin:0,
			padding:0,
			helpers : {
				overlay: {
					locked : false
				}
			}
		});

		$('.adver_itm_show').click(function(){
			var $det_par = $(this).parent().children('.adver_itm_detail').eq(0);
			if($det_par.hasClass('adv_viewed')){
				$det_par.removeClass('adv_viewed');
				$det_par.fadeOut(120);
				$(this).text('Подробнее');
			}else{
				$('.adver_itm_detail').fadeOut(120);
				$('.adver_itm_detail').removeClass('adv_viewed');
				$('.adver_itm_show').text('Подробнее');

				$det_par.addClass('adv_viewed');
				$det_par.fadeIn(120);
				$(this).text('Скрыть');
			}
		});

		function toggleSendForm(idset){
			var newadver_dt = $('#newadver_dt');
			var newadver_pt = $('#newadver_pt');
			var newadver_img = $('#newadver_img');
			var newadver_si = $('#newadver_si');
			var newadver_h2 = $('#newadver_h2');

			if(!issystemopen){
				$('.adv_error_div').hide();
			}

			if(idset){
				newadver_dt.val(idset);
				newadver_dt.hide();
				newadver_img.hide();
				newadver_pt.attr('placeholder','Ваш комментарий');
				newadver_si.val('');
				newadver_h2.text('Комментарий');
			}else{
				newadver_dt.val('');
				newadver_dt.show();
				newadver_img.show();
				newadver_pt.attr('placeholder','Краткое описание');
				newadver_si.val(<?=$globSection?>);
				newadver_h2.text('Новое оъявление');
			}
		}



	});
</script>

<?if($arMSectInCount == 0){?>
		<a id="newadver_btn" class="fancybox zaba_button zaba_button_open" href="#newadver">Оставить объявление</a>
<?}else{?>
	Перейдите в раздел, чтобы оставить объявление
<?}?>

<?
$z_commutator_ib = $arParams["IBLOCK_ID_COMMENT"];
$z_commutator_si = '';
$z_commutator_ll = 'N';

if($_POST['PROPERTY']['IBLOCK_SECTION'][0]>0){
	$z_commutator_ib = $arParams["IBLOCK_ID"];
	$z_commutator_si = $globSection;
	$z_commutator_ll = 'Y';

}

$APPLICATION->IncludeComponent("bitrix:iblock.element.add.form", "adver_add_form", array(
		"IBLOCK_ID" => $z_commutator_ib,
		"SECTION_ID" => $z_commutator_si,
		"STATUS_NEW" => "N",
		"LIST_URL" => "",
		"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
		"USER_MESSAGE_EDIT" => "Сохранено",
		"USER_MESSAGE_ADD" => "Добавлено",
		"DEFAULT_INPUT_SIZE" => "30",
		"RESIZE_IMAGES" => "N",
		"PROPERTY_CODES" => array(
			0 => "NAME",
			1 => "IBLOCK_SECTION",
			2 => "PREVIEW_TEXT",
			3 => "DETAIL_TEXT",
			4 => "PREVIEW_PICTURE",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
		),
		"GROUPS" => array(
			0 => "2",
		),
		"STATUS" => "ANY",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"MAX_USER_ENTRIES" => "100000",
		"MAX_LEVELS" => "100000",
		"LEVEL_LAST" => $z_commutator_ll,
		"MAX_FILE_SIZE" => "1048576",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/adver/",
		"CUSTOM_TITLE_NAME" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => ""
	),
	$component
);
?>

<form class="find_form" action="" method="get">
	<input type="hidden" name="SECTION_ID" value="<?=$globSection?>">
	<input class="find_text" type="text" name="arrFinder" placeholder="Поиск">
	<input class="find_submit" type="submit" value="">
</form>

<?
$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "adver_section", array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "4",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"VIEW_MODE" => "LIST",
		"SHOW_PARENT_NAME" => "Y"
	),
	$component
);?>

<h1 class="answer_head_h1"><?=$globSectionName?>:</h1>

<?

$news_count_l = 20;
if(intval($_GET['SIZEN_1']>0)){
	$news_count_l = $_GET['SIZEN_1'];
}

$APPLICATION->IncludeComponent("bitrix:news.list", "adver_list", array(
		"IBLOCK_TYPE" => "-",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_ID_COMMENT" => $arParams["IBLOCK_ID_COMMENT"],
		"NEWS_COUNT" => $news_count_l,
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFinder",
		"FIELD_CODE" => array(
			//0 => "DETAIL_TEXT",
		),
		"PROPERTY_CODE" => array(
			0 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "?ID=#ELEMENT_ID#",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => $globSection,
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "visual",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_DETAIL_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	$component
);
?>