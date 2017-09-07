<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("title", "Главная");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"banners",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "banners",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "34",
		"IBLOCK_TYPE" => "presscenter",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"LINK",1=>"BANNER_TYPE",2=>"BLANK",3=>"TITLE1",4=>"TITLE2",5=>"TEXT",6=>"",),
		"RSGOPRO_ALONE" => "ALONE",
		"RSGOPRO_BANNER_HEIGHT" => "402",
		"RSGOPRO_BANNER_TYPE" => "BANNER_TYPE",
		"RSGOPRO_BANNER_VIDEO_MP4" => "-",
		"RSGOPRO_BANNER_VIDEO_PIC" => "-",
		"RSGOPRO_BANNER_VIDEO_WEBM" => "-",
		"RSGOPRO_BLANK" => "-",
		"RSGOPRO_CHANGE_DELAY" => "8000",
		"RSGOPRO_CHANGE_SPEED" => "2000",
		"RSGOPRO_LINK" => "-",
		"RSGOPRO_PRICE" => "-",
		"RSGOPRO_TEXT" => "-",
		"RSGOPRO_TITLE1" => "-",
		"RSGOPRO_TITLE2" => "-",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "TIMESTAMP_X",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_COUNT_LVL1" => "8",
		"SHOW_COUNT_LVL2" => "11",
		"TOP_DEPTH" => "2"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.line",
	"main",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "300",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array(0=>"PREVIEW_PICTURE",1=>"IBLOCK_NAME",),
		"IBLOCKS" => array(0=>"37",1=>"33",),
		"IBLOCK_TYPE" => "presscenter",
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
<h3></h3>
<div class="sorter_and_name clearfix">
	<h3 class="name">Лучшие товары</h3>
	<div class="sorter">
		 <?
global $alfaCTemplate, $alfaCSortType, $alfaCSortToo, $alfaCOutput;
$APPLICATION->IncludeComponent('redsign:catalog.sorter', 'gopro', array(
	'ALFA_ACTION_PARAM_NAME' => 'alfaction',
	'ALFA_ACTION_PARAM_VALUE' => 'alfavalue',
	'ALFA_CHOSE_TEMPLATES_SHOW' => 'Y',
	'ALFA_CNT_TEMPLATES' => '3',
	'ALFA_DEFAULT_TEMPLATE' => 'showcase',
	'ALFA_CNT_TEMPLATES_0' => 'Список',
	'ALFA_CNT_TEMPLATES_NAME_0' => 'table',
	'ALFA_CNT_TEMPLATES_1' => 'Галерея',
	'ALFA_CNT_TEMPLATES_NAME_1' => 'gallery',
	'ALFA_CNT_TEMPLATES_2' => 'Витрина',
	'ALFA_CNT_TEMPLATES_NAME_2' => 'showcase',
	'ALFA_SORT_BY_SHOW' => 'N',
	'ALFA_OUTPUT_OF_SHOW' => 'N',
	'AJAXPAGESID' => 'ajaxpages_main',
	),
	false
);
?>
	</div>
</div>
<div id="ajaxpages_main" class="ajaxpages_main">
	 <?
global $APPLICATION,$JSON;
$IS_SORTERCHANGE = 'N';
if($_REQUEST['AJAX_CALL']=='Y' && $_REQUEST['sorterchange']=='ajaxpages_main')
{
	$IS_SORTERCHANGE = 'Y';
	$JSON['TYPE'] = 'OK';
}
$IS_AJAXPAGES = 'N';
if($_REQUEST['ajaxpages']=='Y' && $_REQUEST['ajaxpagesid']=='ajaxpages_main')
{
	$IS_AJAXPAGES = 'Y';
	$JSON['TYPE'] = 'OK';
}
?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"gopro",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAXPAGESID" => "ajaxpages_main",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "#SITE_DIR#personal/cart/",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COLUMNS5" => "Y",
		"COMPARE_PATH" => "",
		"COMPONENT_TEMPLATE" => "gopro",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DONT_SHOW_LINKS" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "timestamp_x",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "asc",
		"EMPTY_ITEMS_HIDE_FIL_SORT" => "Y",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "A",
		"IS_AJAXPAGES" => $IS_AJAXPAGES,
		"IS_SORTERCHANGE" => $IS_SORTERCHANGE,
		"LINE_ELEMENT_COUNT" => "3",
		"MAIN_TITLE" => "Наличие на складах",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "",
		"META_KEYWORDS" => "",
		"MIN_AMOUNT" => "10",
		"OFFERS_CART_PROPERTIES" => array(),
		"OFFERS_FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array(0=>"COLOR_DIRECTORY",1=>"MORE_PHOTO",2=>"CML2_ARTICLE",3=>"COLOR2_DIRECTORY",4=>"STORAGE",5=>"",),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "asc",
		"OFF_MEASURE_RATION" => "N",
		"OFF_SMALLPOPUP" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "gopro",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "5",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(0=>"BASE",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(0=>"CML2_ARTICLE",1=>"BRAND",2=>"YEAR",3=>"ACCESSORIES",4=>"OS",5=>"WEIGHT",6=>"FORUM_MESSAGE_CNT",7=>"RSFAVORITE_COUNTER",8=>"FORUM_TOPIC_ID",9=>"HEIGHT",10=>"TICKNESS",11=>"WIDTH",12=>"DIAGONAL",13=>"SOLUTION",14=>"INTERNET_ACCESS",15=>"INTERFACES",16=>"NAVI",17=>"CARD",18=>"VIDEO",19=>"POHOZHIE",20=>"BUY_WITH_THIS",21=>"YEARS",22=>"",),
		"PROPS_ATTRIBUTES" => array(0=>"COLOR_DIRECTORY",),
		"PROPS_ATTRIBUTES_COLOR" => array(0=>"COLOR_DIRECTORY",),
		"PROP_ACCESSORIES" => "-",
		"PROP_ARTICLE" => "-",
		"PROP_MORE_PHOTO" => "-",
		"PROP_SKU_ARTICLE" => "-",
		"PROP_SKU_MORE_PHOTO" => "MORE_PHOTO",
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_ERROR_EMPTY_ITEMS" => "Y",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "",
		"USE_AUTO_AJAXPAGES" => "N",
		"USE_FAVORITE" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_MIN_AMOUNT" => "Y",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_SHADOW_ON_HOVER" => "N",
		"USE_SHARE" => "Y",
		"USE_STORE" => "Y",
		"VIEW" => $alfaCTemplate
	)
);?>
</div>
<?
if($IS_AJAXPAGES=='Y' || $IS_SORTERCHANGE=='Y')
{
	$APPLICATION->RestartBuffer();
	if(SITE_CHARSET!='utf-8')
	{
		$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
		$json_str_utf = json_encode($data);
		$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
		echo $json_str;
	} else {
		echo json_encode($JSON);
	}
	die();
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"brands",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_STYLES_FOR_MAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BRAND_CODE" => "-",
		"BRAND_PAGE" => "#SITE_DIR#brands/",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CATALOG_BRAND_CODE" => "BRAND",
		"CATALOG_FILTER_NAME" => "arrFilter",
		"CATALOG_IBLOCK_ID" => "#IBLOCK_ID_catalog#",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "brands",
		"COUNT_ITEMS" => "0",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "35",
		"IBLOCK_TYPE" => "presscenter",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10000",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"BRAND",1=>"",),
		"SECTIONS_CODE" => "BRAND",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_BOTTOM_SECTIONS" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>