<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статьи");
?><div class="content_width clear_fix">

<?
$APPLICATION->IncludeFile(
	SITE_DIR."/bitrix/templates/.default/inc/r_column.php",
	Array(),
	Array("MODE"=>"html")
);
?>

	<div class="s_left_column">

		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main_tsep", Array(

			),
			false
		);?>


		<?$APPLICATION->IncludeComponent("bitrix:menu", "menu_art_sub", Array(
	
	),
	false
);?>




	</div>



</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>