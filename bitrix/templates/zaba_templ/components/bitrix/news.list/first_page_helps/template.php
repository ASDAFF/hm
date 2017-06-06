<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	

<a style="background-image:url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="/helps/<?echo $arItem["PREVIEW_TEXT"]?>/" class="ico_s1"><?echo $arItem["NAME"]?></a>



<?}?>