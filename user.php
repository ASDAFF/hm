<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
?><div class="content_width">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	"",
	Array(
	)
);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>