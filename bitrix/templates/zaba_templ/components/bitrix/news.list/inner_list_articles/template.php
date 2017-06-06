<?/*
 <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="statyi_list_elem" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if(is_array($arItem["PREVIEW_PICTURE"])){?>
			<div class="img_elem">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
			</div>
		<?}?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]){?>
				<h3><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h3>
		<?}?>

	</div>
<?}?>

*/?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="statyi_list_elem" class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

			<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
				<div class="img_elem">
					<img class="preview_picture" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
				</div>
			<?endif?>

			<?if($arItem["NAME"]):?>
				<h3><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h3>
			<?endif;?>

			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<?echo $arItem["PREVIEW_TEXT"];?>
			<?endif;?>

			<div class="comment time_aft"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>#comment">

				</a>

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
				echo('Комментариев ' . $commentCount);

				?>



			</div>

		</div>
	<?endforeach;?>

	<?

	if($arParams["DISPLAY_BOTTOM_PAGER"]){
		?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?
	};

	?>

