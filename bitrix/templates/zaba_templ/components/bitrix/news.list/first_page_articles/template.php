<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="statyi_list_elem" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])){?>
			<div class="img_elem">
				<img style="min-height: 200px;" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
			</div>
		<?}?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]){?>
				<h3><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h3>
		<?}?>
		
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]){?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?}?>


		<?
		$itemsComm = GetIBlockElementList(2,0,Array("SORT"=>"ASC"),0,array(
			"ACTIVE"=>"Y",
			"PROPERTY_IDPAGE"=>$arItem['ID'],
		));

		$commentCount = 0;
		while($itemsComm->GetNext())
		{
			$commentCount++;
		}

		echo('<div class="comment time_aft"><a href="' . $arItem["DETAIL_PAGE_URL"] . '#comment">Комментариев ' . $commentCount . '</a></div>');

		?>




	</div>
<?}?>