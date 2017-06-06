<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#/razvitie-i-obuchenie/Rannee-razvitie-detskie-tsentri-obucheniya/studiya-iskusstv-fly.html.*#",
		"RULE" => "EID=2714&2714=2714",
		"ID" => "bitrix:news",
		"PATH" => "/card/index.php",
	),
	array(
		"CONDITION" => "#/razvitie-i-obuchenie/detskie-sady/nyanyushka-gruppa-dnevnogo-posescheniya.html.*#",
		"RULE" => "EID=2807&2807=2807",
		"ID" => "bitrix:news",
		"PATH" => "/card/index.php",
	),
	array(
		"CONDITION" => "#/razvitie-i-obuchenie/detskie-kruzhki/studiya-iskusstv-fly9.html.*#",
		"RULE" => "EID=2714&2714=2714",
		"ID" => "bitrix:news",
		"PATH" => "/card/index.php",
	),
	array(
		"CONDITION" => "#/detskie-uslugi/odezhda/magazin-detskoy-odezhdy-baby-room3.html.*#",
		"RULE" => "EID=2790&2790=2790",
		"ID" => "bitrix:news",
		"PATH" => "/card/index.php",
	),
	array(
		"CONDITION" => "#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#",
		"RULE" => "alias=\$1",
		"ID" => "bitrix:im.router",
		"PATH" => "/desktop_app/router.php",
	),
	array(
		"CONDITION" => "#^/meditsinskie-uchrezhdeniya/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/meditsinskie-uchrezhdeniya/index.php",
	),
	array(
		"CONDITION" => "#^/razvitie-i-obuchenie/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/razvitie-i-obuchenie/index.php",
	),
	array(
		"CONDITION" => "#^/interesno-pochitat/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/interesno-pochitat/index.php",
	),
	array(
		"CONDITION" => "#^/personal/delivery/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.profile",
		"PATH" => "/personal/delivery/index.php",
	),
	array(
		"CONDITION" => "#^/online/(/?)([^/]*)#",
		"RULE" => "",
		"ID" => "bitrix:im.router",
		"PATH" => "/desktop_app/router.php",
	),
	array(
		"CONDITION" => "#^/detskie-uslugi/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/detskie-uslugi/index.php",
	),
	array(
		"CONDITION" => "#^/helps/(.*)/#",
		"RULE" => "togis=\$1",
		"ID" => "",
		"PATH" => "/helps/index.php",
	),
	array(
		"CONDITION" => "#^/interview/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/interview/index.php",
	),
	array(
		"CONDITION" => "#^/baraholka/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/baraholka/index.php",
	),
	array(
		"CONDITION" => "#^/personal/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.section",
		"PATH" => "/personal/index.php",
	),
	array(
		"CONDITION" => "#^/articles/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/articles/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/actions/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/actions/index.php",
	),
	array(
		"CONDITION" => "#^/action/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/action/index.php",
	),
	array(
		"CONDITION" => "#^/brands/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/brands/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
	array(
		"CONDITION" => "#^/card/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/card/index.php",
	),
);

?>