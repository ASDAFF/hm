<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?foreach($arResult["ITEMS"] as $arItem){?>
	<h3>
		<span><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?=$arItem["NAME"]?>
	</h3>
	<div>
		<?=$arItem["PREVIEW_TEXT"]?>
	</div>
<?}?>