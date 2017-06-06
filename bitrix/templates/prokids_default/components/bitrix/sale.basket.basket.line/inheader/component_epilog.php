<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (is_array($arResult["CATEGORIES"]["READY"]) && count($arResult["CATEGORIES"]["READY"]) > 0) {
	$arrIDs = array();
	foreach ($arResult["CATEGORIES"]["READY"] as $arItem) {
		$arrIDs[$arItem["PRODUCT_ID"]] = 'Y';
	}
	?><script>RSGoPro_INBASKET = <?=json_encode($arrIDs)?>;</script><?
}
