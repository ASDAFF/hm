<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?/*if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;*/

$sect_name_id = 0;

?>
<div class="statyi_list_in_two clear_fix">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
		if($arItem['IBLOCK_SECTION_ID'] && ($arItem['IBLOCK_SECTION_ID'] != $sect_name_id)){
			$sect_name_id = $arItem['IBLOCK_SECTION_ID'];
			$sect_name = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID'])->Fetch();
			echo('<div class="txt_head_name clear_fix"><h2>' . $sect_name['NAME'] . '</h2></div>');
		}
	?>
	<div class="statyi_list_elem" class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="img_elem">
				<img style="min-height: 200px;" class="preview_picture" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
			</div>
		<?endif?>
		
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
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

</div>