<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Мой город");
?>

<?$APPLICATION->IncludeComponent("redsign:autodetect.location", "gopro", array(
	"RSLOC_INCLUDE_JQUERY" => "N",
	"RSLOC_LOAD_LOCATIONS" => "Y",
	"RSLOC_LOAD_LOCATIONS_CNT" => "20"
	),
	false
);
?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>