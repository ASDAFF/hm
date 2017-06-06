<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('catalog'))
	return;
if(!CModule::IncludeModule('redsign.devfunc'))
	return;

$listProp = RSDevFuncParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);
$arCatalog = CCatalog::GetByID($arCurrentValues['IBLOCK_ID']);

$arViewModeList = array(
	'VIEW_SECTIONS' => GetMessage('RSGOPRO_VIEW_SECTIONS'),
	'VIEW_ELEMENTS' => GetMessage('RSGOPRO_VIEW_ELEMENTS')
);

$arSectionsDescriptionPosition = array(
	'none' => GetMessage('RSGOPRO.SECTIONS_DESCRIPTION_POSITION.NONE'),
	'top' => GetMessage('RSGOPRO.SECTIONS_DESCRIPTION_POSITION.TOP'),
	'bottom' => GetMessage('RSGOPRO.SECTIONS_DESCRIPTION_POSITION.BOTTOM'),
);
$arSectionDescriptionPosition = array(
	'none' => GetMessage('RSGOPRO.SECTION_DESCRIPTION_POSITION.NONE'),
	'top' => GetMessage('RSGOPRO.SECTION_DESCRIPTION_POSITION.TOP'),
	'bottom' => GetMessage('RSGOPRO.SECTION_DESCRIPTION_POSITION.BOTTOM'),
);

$highload_type = array(
	'HIGHLOAD_TYPE_SELECT' => GetMessage('HIGHLOAD_TYPE_SELECT'),
	'HIGHLOAD_TYPE_LIST' => GetMessage('HIGHLOAD_TYPE_LIST')
);

$arPrice = array();
$rsPrice = CCatalogGroup::GetList($v1='sort', $v2='asc');
while($arr = $rsPrice->Fetch())
{
	$arPrice[$arr['NAME']] = '['.$arr['NAME'].'] '.$arr['NAME_LANG'];
}

$arrViews = array(
	'tab' => GetMessage('DETAIL_ARR_TABS_VIEW_TAB'),
	'anchor' => GetMessage('DETAIL_ARR_TABS_VIEW_ANCHOR'),
);

$arFilterDisabledPicEffect = array(
	'none' => GetMessage('FILTER_DISABLED_PIC_EFFECT_none'),
	'cross' => GetMessage('FILTER_DISABLED_PIC_EFFECT_cross'),
	'opacity' => GetMessage('FILTER_DISABLED_PIC_EFFECT_opacity'),
	'hide' => GetMessage('FILTER_DISABLED_PIC_EFFECT_hide'),
);

$arShareBlock = array(
	'collections' => GetMessage("MSG_SHARE-collections"),
	'vkontakte' => GetMessage("MSG_SHARE-vkontakte"),
	'facebook' => GetMessage("MSG_SHARE-facebook"),
	'odnoklassniki' => GetMessage("MSG_SHARE-odnoklassniki"),
	'moimir' => GetMessage("MSG_SHARE-moimir"),
	'gplus' => GetMessage("MSG_SHARE-gplus"),
	'twitter' => GetMessage("MSG_SHARE-twitter"),
	'blogger' => GetMessage("MSG_SHARE-blogger"),
	'delicious' => GetMessage("MSG_SHARE-delicious"),
	'digg' => GetMessage("MSG_SHARE-digg"),
	'reddit' => GetMessage("MSG_SHARE-reddit"),
	'evernote' => GetMessage("MSG_SHARE-evernote"),
	'linkedin' => GetMessage("MSG_SHARE-linkedin"),
	'lj' => GetMessage("MSG_SHARE-lj"),
	'pocket' => GetMessage("MSG_SHARE-pocket"),
	'qzone' => GetMessage("MSG_SHARE-qzone"),
	'renren' => GetMessage("MSG_SHARE-renren"),
	'sinaWeibo' => GetMessage("MSG_SHARE-sinaWeibo"),
	'surfingbird' => GetMessage("MSG_SHARE-surfingbird"),
	'tencentWeibo' => GetMessage("MSG_SHARE-tencentWeibo"),
	'tumblr' => GetMessage("MSG_SHARE-tumblr"),
	'viber' => GetMessage("MSG_SHARE-viber"),
	'whatsapp' => GetMessage("MSG_SHARE-whatsapp"),
	'skype' => GetMessage("MSG_SHARE-skype"),
	'telegram' => GetMessage("MSG_SHARE-telegram"),
);

$arTemplateParameters = array(
    // base
	'SECTIONS_VIEW_MODE' => array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('RSGOPRO_VIEW_MODE'),
		'TYPE' => 'LIST',
		'VALUES' => $arViewModeList,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'LIST',
	),
    // additional
    'PROP_MORE_PHOTO' => array(
		'NAME' => GetMessage('PROP_MORE_PHOTO'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
	),
	'USE_FAVORITE' => array(
		'NAME' => GetMessage('USE_FAVORITE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'USE_SHARE' => array(
		'NAME' => GetMessage('USE_SHARE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'SOC_SHARE_ICON' => array(
		'NAME' => GetMessage('SOC_SHARE_ICON'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $arShareBlock,
	),
	'OFF_MEASURE_RATION' => array(
		'NAME' => GetMessage('OFF_MEASURE_RATION'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	// sections
	'SECTIONS_DESCRIPTION_POSITION' => array(
		'PARENT' => 'SECTIONS_SETTINGS',
		'NAME' => GetMessage('RSGOPRO.SECTIONS_DESCRIPTION_POSITION'),
		'TYPE' => 'LIST',
		'VALUES' => $arSectionsDescriptionPosition,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'top',
	),
	// section
	'SHOW_ERROR_EMPTY_ITEMS' => array(
        'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('SHOW_ERROR_EMPTY_ITEMS'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'USE_AUTO_AJAXPAGES' => array(
        'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('USE_AUTO_AJAXPAGES'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	'OFF_SMALLPOPUP' => array(
        'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('OFF_SMALLPOPUP'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
    'USE_SHADOW_ON_HOVER' => array(
        'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('USE_SHADOW_ON_HOVER'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	'SECTION_DESCRIPTION_POSITION' => array(
		'PARENT' => 'LIST_SETTINGS',
		'NAME' => GetMessage('RSGOPRO.SECTION_DESCRIPTION_POSITION'),
		'TYPE' => 'LIST',
		'VALUES' => $arSectionDescriptionPosition,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'top',
	),
	// detail
	'PROPS_TABS' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('PROPS_TABS'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['ALL'],
		'MULTIPLE' => 'Y',
	),
	'USE_CHEAPER' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('USE_CHEAPER'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'USE_BLOCK_MODS' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('USE_BLOCK_MODS'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'MODS_BLOCK_NAME' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('MODS_BLOCK_NAME'),
		'TYPE' => 'STRING',
	),
	'DETAIL_TABS_VIEW' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('DETAIL_TABS_VIEW'),
		'TYPE' => 'LIST',
		'VALUES' => $arrViews,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'tab',
	),
	'SHOW_PREVIEW_TEXT' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('SHOW_PREVIEW_TEXT'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
    'USE_CUSTOM_COLLECTION' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('USE_CUSTOM_COLLECTION'),
        'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
        'DEFAULT' => 'Y',
        'REFRESH' => 'Y',
    ),
	'HIGHLOAD' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('HIGHLOAD'),
		'TYPE' => 'LIST',
		'VALUES' => $highload_type,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'LIST',
	),
	'PROP_ARTICLE' => array(
        'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('PROP_ARTICLE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'USE_DELIVERY_COST_BLOCK' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('USE_DELIVERY_COST_BLOCK'),
        'TYPE' => 'CHECKBOX',
        'VALUE' => 'Y',
        'DEFAULT' => 'N',
		'REFRESH' => 'Y',
    ),
	'USE_DELIVERY_COST_TAB' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('USE_DELIVERY_COST_TAB'),
        'TYPE' => 'CHECKBOX',
        'VALUE' => 'Y',
        'DEFAULT' => 'N',
    ),
	// filter
	'FILTER_PROP_SCROLL' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_PROP_SCROLL'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp['ALL'],
	),
	'FILTER_PROP_SEARCH' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_PROP_SEARCH'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp['ALL'],
	),
	'FILTER_FIXED' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_FIXED'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
	'FILTER_USE_AJAX' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_USE_AJAX'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
    'FILTER_HIDE_PROP_COUNT' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_HIDE_PROP_COUNT'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
    'FILTER_DISABLED_PIC_EFFECT' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_DISABLED_PIC_EFFECT'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'N',
		'DEFAULT' => 'none',
		'VALUES' => $arFilterDisabledPicEffect,
	),
    // bigdata
    'USE_BIG_DATA' => array(
		'PARENT' => 'BIG_DATA_SETTINGS',
		'NAME' => GetMessage('CP_BC_TPL_USE_BIG_DATA'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
		'REFRESH' => 'Y',
	),
);

if (IntVal($arCurrentValues['USE_BIG_DATA']) == 'Y') {
	$arTemplateParameters['BIGDATA_BLOCK_NAME'] = array(
		'PARENT' => 'BIG_DATA_SETTINGS',
		'NAME' => GetMessage('BIGDATA_BLOCK_NAME'),
		'TYPE' => 'STRING',
	);
}

if (IntVal($arCatalog["OFFERS_IBLOCK_ID"])) {
	$listProp2 = RSDevFuncParameters::GetTemplateParamsPropertiesList($arCatalog['OFFERS_IBLOCK_ID']);
	$arTemplateParameters['PROP_SKU_MORE_PHOTO'] = array(
		'NAME' => GetMessage('PROP_SKU_MORE_PHOTO'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['F'],
	);
	$arTemplateParameters['PROP_SKU_ARTICLE'] = array(
		'NAME' => GetMessage('PROP_SKU_ARTICLE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['SNL'],
	);
	$arTemplateParameters['PROPS_ATTRIBUTES'] = array(
		'NAME' => GetMessage('PROPS_ATTRIBUTES'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['SNL'],
		'MULTIPLE' => 'Y',
	);
	$arTemplateParameters['PROPS_ATTRIBUTES_COLOR'] = array(
		'NAME' => GetMessage('PROPS_ATTRIBUTES_COLOR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['HL'],
		'MULTIPLE' => 'Y',
	);
	$arTemplateParameters['FILTER_SKU_PROP_SCROLL'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_SKU_PROP_SCROLL'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp2['ALL'],
	);
	$arTemplateParameters['FILTER_SKU_PROP_SEARCH'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_SKU_PROP_SEARCH'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp2['ALL'],
	);
}

/* collections */
if (!isset($arCurrentValues['USE_CUSTOM_COLLECTION']) || $arCurrentValues['USE_CUSTOM_COLLECTION'] == 'Y') {
    $arTemplateParameters['CUSTOM_COLLECTION_PROPERTY'] = array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('CUSTOM_COLLECTION_PROPERTY'),
        'TYPE' => 'LIST',
        'VALUES' => $listProp['E']
    );
}

/* detail */
if ($arCurrentValues['USE_DELIVERY_COST_BLOCK'] == 'Y') {
	$arTemplateParameters['DELIVERY_COST_PAY_LINK'] = array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('DELIVERY_COST_PAY_LINK'),
		'TYPE' => 'STRING',
	);
	$arTemplateParameters['DELIVERY_COST_DELIVERY_LINK'] = array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('DELIVERY_COST_DELIVERY_LINK'),
		'TYPE' => 'STRING',
	);
}

/* bigdata */
if (!isset($arCurrentValues['USE_BIG_DATA']) || $arCurrentValues['USE_BIG_DATA'] == 'Y') {
	$rcmTypeList = array(
		'bestsell' => GetMessage('CP_BC_TPL_RCM_BESTSELLERS'),
		'personal' => GetMessage('CP_BC_TPL_RCM_PERSONAL'),
		'similar_sell' => GetMessage('CP_BC_TPL_RCM_SOLD_WITH'),
		'similar_view' => GetMessage('CP_BC_TPL_RCM_VIEWED_WITH'),
		'similar' => GetMessage('CP_BC_TPL_RCM_SIMILAR'),
		'any_similar' => GetMessage('CP_BC_TPL_RCM_SIMILAR_ANY'),
		'any_personal' => GetMessage('CP_BC_TPL_RCM_PERSONAL_WBEST'),
		'any' => GetMessage('CP_BC_TPL_RCM_RAND')
	);
	$arTemplateParameters['BIG_DATA_RCM_TYPE'] = array(
		'PARENT' => 'BIG_DATA_SETTINGS',
		'NAME' => GetMessage('CP_BC_TPL_BIG_DATA_RCM_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $rcmTypeList
	);
	unset($rcmTypeList);
}
