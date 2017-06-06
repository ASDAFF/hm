<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$IS_AJAX = false;
if ($_REQUEST['rsec_ajax_post'] == 'Y' && $_REQUEST['rsec_mode'] == 'compare') {
	$IS_AJAX = true;
	$APPLICATION->RestartBuffer();
	// compare delete
	foreach($_SESSION[$arParams["COMPARE_NAME"]][$arParams["COMPARE_IBLOCK_ID"]]["ITEMS"] as $key => $ar) {
		$deleteTmp = ($_REQUEST["DELETE_".$key]=='Y')?'Y':'N';
		if ($deleteTmp=='Y') {
			unset($_SESSION[$arParams["COMPARE_NAME"]][$arParams["COMPARE_IBLOCK_ID"]]["ITEMS"][$key]);
		}
	}
}

$APPLICATION->IncludeFile(
  SITE_DIR."include/easycart/compare.php",
  array(),
  array("MODE" => "html")
);

if ($IS_AJAX) {
	die();
}
