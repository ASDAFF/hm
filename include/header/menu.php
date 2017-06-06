<?php
$IS_MAIN = 'N';
if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php')
	$IS_MAIN = 'Y';
?>

<?$APPLICATION->IncludeComponent("bitrix:menu", "catalog", array(
	"ROOT_MENU_TYPE" => "catalog",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N",
	"CATALOG_PATH" => "/catalog/",
	"MAX_ITEM" => "9",
	"IS_MAIN" => $IS_MAIN
	),
	false
);?>