<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Контакты");

?><div style="line-height:18px;">
<div>
Адрес: Пятигорск, ул. Ессентукская 31а, ТРЦ «Вершина Плаза»<br />
Ставрополь, ул. Доваторцев 61, ОРТЦ «Ставрополь»<br />
Телефон: +7 (988) 114 57 27<br />
Время работы: c 10:00 до 22:00, без выходных<br /><br /><br />
<p><b>Схема проезда:</b></p><?
$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"contacts", 
	array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:44.61707046847955;s:10:\"yandex_lon\";d:42.443290692984;s:12:\"yandex_scale\";i:8;s:10:\"PLACEMARKS\";a:2:{i:0;a:3:{s:3:\"LON\";d:43.034348203705;s:3:\"LAT\";d:44.051208131092;s:4:\"TEXT\";s:93:\"Пятигорск, ул. Ессентукская 31а, ТРЦ «Вершина Плаза»\";}i:1;a:3:{s:3:\"LON\";d:41.926269593918;s:3:\"LAT\";d:45.005219367775;s:4:\"TEXT\";s:86:\"Ставрополь, ул. Доваторцев 61, ОРТЦ «Ставрополь»\";}}}",
		"MAP_WIDTH" => "750",
		"MAP_HEIGHT" => "500",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "SMALLZOOM",
			2 => "MINIMAP",
			3 => "TYPECONTROL",
			4 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => "contacts",
		"COMPONENT_TEMPLATE" => "contacts"
	),
	false
);
?></div>
</div><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>