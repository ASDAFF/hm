<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="menu content_width">

<?

$i = 0;

while($arItem = $arResult[$i]){
	$addedclass = "";
	if($arItem["SELECTED"]){$addedclass = ' class="active"';}
	?>
	<li>
		<a href="<?=$arItem["LINK"]?>" <?=$addedclass?>><?=$arItem["TEXT"]?></a>
		<?if($arResult[$i+1]["DEPTH_LEVEL"]>1){
			echo('<div>');
			while($arResult[$i+1]["DEPTH_LEVEL"]>1){
				$i++;
				$arItem = $arResult[$i];
				?><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><?
			}
			echo('</div>');
		}?>
	</li>
	<?
	$i++;
}



/*
foreach($arResult as $arItem){
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?}*/?>

</ul>
<?endif?>