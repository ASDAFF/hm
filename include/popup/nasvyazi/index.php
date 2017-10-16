<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Мы всегда на связи");
?>

<?php
echo '<link href="'.SITE_DIR.'include/popup/nasvyazi/style.css?'.randString(10, array('1234567890')).'" type="text/css" rel="stylesheet" />';
?>

<div class="nasvyazi">

	<div class="center">

		<div class="phone">
			<div class="column1inner">
				<i class="icon pngicons mobile_hide"></i>
				<a href="tel:89881145727">8 (988) 114 57 27</a>
			</div>
		</div>

		<?
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.store.list",
			"nasvyazi",
			Array(
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"PHONE" => $arParams["PHONE"],
				"SCHEDULE" => $arParams["SCHEDULE"],
				"MIN_AMOUNT" => $arParams["MIN_AMOUNT"],
				"TITLE" => $arParams["TITLE"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"PATH_TO_ELEMENT" => $arResult["PATH_TO_ELEMENT"],
				"PATH_TO_LISTSTORES" => $arResult["PATH_TO_LISTSTORES"],
				"MAP_TYPE" => $arParams["MAP_TYPE"],
			)
		);
	?></div>
</div>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>