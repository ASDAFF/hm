<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem){?>

	<?if($USER->isAdmin()){
		//print_r(strtotime($arItem['ACTIVE_FROM']));

		//$('#modalw form input[name="timestamp"]').val();
		//print_r($arItem['PROPERTIES']['LVLDP']['VALUE']);
		//print_r($arItem['PROPERTIES']['SHOWDATE']['VALUE']);
	}?>

	<?

	if($arItem['DETAIL_TEXT']==''){
		$rsUser = CUser::GetByID($arItem["NAME"]);
		$arUser = $rsUser->Fetch();
	}else{
		$arUser['LOGIN'] = $arItem['DETAIL_TEXT'];
	}


	?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<?
	if($arItem['PROPERTIES']['SHOWDATE']['VALUE'] == ''){
		$arItem['PROPERTIES']['SHOWDATE']['VALUE'] = $arItem["ACTIVE_FROM"];
	}

	$arr = ParseDateTime($arItem['PROPERTIES']['SHOWDATE']['VALUE'], FORMAT_DATETIME);
	?>

	<div class="comment_item <?if($arItem['PROPERTIES']['LVLDP']['VALUE']>'0')echo('comment_item_re')?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && $arUser['PERSONAL_PHOTO']){?>
			<div class="comment_item_img">
				<img src="<?=CFile::GetPath($arUser['PERSONAL_PHOTO'])?>" />
			</div>
		<?}?>

		<?

	if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]){?>
			<span class="comment_name"><?=$arUser['LOGIN'];?></span>
		<?}?>


		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="comment_date"><?echo $arr["DD"]." ".ToLower(GetMessage("MONTH_".intval($arr["MM"])."_S")).", ".$arr["YYYY"];?></span>
		<?endif?>

		<a data-target="<?=$arUser['LOGIN'];?>" data-text="<?=$arItem['ACTIVE_FROM']?>" class="fancybox reotv" href="#modalw">Ответить</a>

		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
		<div class="comment_text"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>

	</div>
<?}?>


