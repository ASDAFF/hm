<?$APPLICATION->IncludeComponent(
	"bitrix:search.title",
	"inheader",
	array(
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "N",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => "/search/",
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0" => array(
			0 => "no",
		),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "title-search",
		"IBLOCK_ID" => array(
			0 => "#IBLOCK_ID_catalog#",
		),
		"PRICE_CODE" => array(
			0 => "BASE",
			1 => "WHOLE",
			2 => "RETAIL",
			3 => "EXTPRICE",
			4 => "EXTPRICE2",
		),
		"PRICE_VAT_INCLUDE" => "N",
		"OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_LINK",
			1 => "",
		),
		"CONVERT_CURRENCY" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quan"
	),
	false
);?>