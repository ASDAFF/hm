<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
// Картинка автора
//echo "<pre>";
//print_r($arResult['FIELDS']['CREATED_BY']);

$rsUser = CUser::GetByID($arResult["CREATED_BY"]);
$arUser = $rsUser->Fetch();


// Id пользователя
//echo "<pre>";
//print_r($arUser['NAME']);

?>
<?=$arResult['DETAIL_TEXT']?>

