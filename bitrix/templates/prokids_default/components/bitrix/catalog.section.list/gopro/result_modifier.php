<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if (!CModule::IncludeModule('redsign.devfunc'))
	return;

if (IntVal($arParams["SHOW_COUNT_LVL2"])<0)
	$arParams["SHOW_COUNT_LVL2"] = 11;

$arSizes = array("width"=>250,"height"=>250);
$noPhotoFileID = COption::GetOptionInt('redsign.devfunc', 'no_photo_fileid', 0);
if ($noPhotoFileID > 0){
	$arResult["NO_PHOTO"] = CFile::ResizeImageGet($noPhotoFileID,$arSizes,BX_RESIZE_IMAGE_PROPORTIONAL);
}

$arResult['LEVELING'] = array(
	'FIRST_LEVEL' => $arResult["SECTIONS"][0]['DEPTH_LEVEL'],
	'SECOND_LEVEL' => ($arResult["SECTIONS"][0]['DEPTH_LEVEL']+1),
);


if (isset($arResult['SECTION']) && $arResult['SECTION']['DESCRIPTION'] != '') {
	$arSection = $arResult['SECTION'];
	$mxPicture = false;
	$arSection['PICTURE'] = intval($arSection['PICTURE']);
	if (0 < $arSection['PICTURE'])
		$mxPicture = CFile::GetFileArray($arSection['PICTURE']);
	$arSection['PICTURE'] = $mxPicture;
	if ($arSection['PICTURE'])
	{
		$arSection['PICTURE']['ALT'] = $arSection['IPROPERTY_VALUES']['SECTION_PICTURE_FILE_ALT'];
		if ($arSection['PICTURE']['ALT'] == '')
			$arSection['PICTURE']['ALT'] = $arSection['NAME'];
		$arSection['PICTURE']['TITLE'] = $arSection['IPROPERTY_VALUES']['SECTION_PICTURE_FILE_TITLE'];
		if ($arSection['PICTURE']['TITLE'] == '')
			$arSection['PICTURE']['TITLE'] = $arSection['NAME'];
	}
	$arResult['SECTION'] = $arSection;
}
