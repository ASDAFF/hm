<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$IS_AJAX = false;
if ($_REQUEST['rsec_ajax_post'] == 'Y' && $_REQUEST['rsec_mode'] == 'favorite') {
	$IS_AJAX = true;
	$APPLICATION->RestartBuffer();
}

$APPLICATION->IncludeFile(
  SITE_DIR."include/easycart/favorite.php",
  array(),
  array("MODE" => "html")
);

if ($IS_AJAX) {
	die();
}
