<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
/*----------------------------------*/
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "REVIEWS_FORM";
/*----------------------------------*/
/*
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");
*/
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();
	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
			if(empty($arParams["REQUIRED_FIELDS"]))
				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_MESSAGE");
			////////////////////////////////////////////	
		}
	

		if(empty($arResult["ERROR_MESSAGE"]))
		{
	

			//else	CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
			
			///////////////////////////////////////////
			
			//Сохранение в инфоблок
			
			if(CModule::IncludeModule('iblock'))
			{
				$to_ibl = new CIBlockElement;

				//$string=iconv("windows-1251","utf-8",$string);

				$setdated = date('d.m.Y H:i:s');
				$setdepth = 0;
				if($_POST['timestamp']!=''){
					$setdated= $_POST['timestamp'];
					$setdepth = 1;
				}

				$arCommentNew = Array(
					//"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
					//"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
					"DATE_ACTIVE_FROM" => $setdated,
					"IBLOCK_ID"      => $arParams['IBLOCK_ID'],
					//"NAME"           => iconv("utf-8","windows-1251",$f_name),
					"NAME"           => $USER->GetID(),///////////////////////////////////////////////////////////////////////////
					"ACTIVE"         => "Y",            // активен
					"PREVIEW_TEXT"   => htmlspecialcharsbx($_POST["MESSAGE"]),
					"DETAIL_TEXT"    => '',
					//"PROPERTY_VALUES" => Array("USER_PHONE" => $arFields['PHONE'], "USER_MAIL" => $arFields['AUTHOR_EMAIL'], ),
					"PROPERTY_VALUES" => Array("IDPAGE" => $arParams['IDPAGE'], "LVLDP" => $setdepth, "SHOWDATE" => $setdated),
				);
				$to_ibl->Add($arCommentNew);
			}
			

				
		
			////////////////////////////////////////////////		
			LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
		}
		
		$arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
	}
	else
		$arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
}
/*
elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}
*/
if(empty($arResult["ERROR_MESSAGE"]))
{
	if($USER->IsAuthorized())
	{
		$arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
	}
	else
	{
		if(strlen($_SESSION["MF_NAME"]) > 0)
			$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
		if(strlen($_SESSION["MF_EMAIL"]) > 0)
			$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
	}
}


$this->IncludeComponentTemplate();
