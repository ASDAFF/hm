<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?><div class="content_width clear_fix">
	<?
$APPLICATION->IncludeFile(
	SITE_DIR."/bitrix/templates/.default/inc/r_column.php",
	Array(),
	Array("MODE"=>"html")
);
?>
	<div class="s_left_column">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"main_tsep",
	Array(
	)
);?>
		<div class="txt_head_name txt_head_name_left clear_fix">
			<h2>Контакты</h2>
		</div>
		По вопросам размещения рекламы обращаться по телефону: 8-928-309-51-10
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>