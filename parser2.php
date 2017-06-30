<?php

use \WM\Parser\Gamma;
use \WM\Parser\Worker;
use \WM\Parser\RiolisParser;

@set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define('CHK_EVENT', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

$gamma = new \WM\Parser\GammaImport($_SERVER['DOCUMENT_ROOT']);
$gamma->start();

/*
$file1 = $_SERVER['DOCUMENT_ROOT'] . '/upload/parser/fullcatalog.yml';
//$file2 = $_SERVER['DOCUMENT_ROOT'] . '/upload/parser/riolis.json';

$parser = new Gamma();
$res = $parser->open($file1);
$parser->parse();
$parser->close();

$cats = $parser->categories;
$products = $parser->items;

debugmessage($cats);
debugmessage($products);

$iblockID = 39;
$worker = new Worker($iblockID);
$worker->getSections();
$worker->getProducts();
$worker->checkSections($cats);
$worker->checkProducts($products);


/*

$riolis = new RiolisParser($file2);
$cats = $riolis->sections;
$products = $riolis->items;

$worker->checkSections($cats);
$worker->checkProducts($products);

$cats = $parser->sections;
$products = $parser->items;

$worker->checkSections($cats);
$worker->checkProducts($products);*/













































/*$file = $_SERVER['DOCUMENT_ROOT'] . '/upload/parser/fullcatalog.xml';
$section = new \WM\Parser\IblockSection($iblockID);
$element = new \WM\Parser\IblockElement($iblockID);


$parser = new GammaParser2();
$parser->open($file);
$parser->parse();
$parser->close();
$cats = $parser->categories;
$products = $parser->items;
$section->setCategories($parser->categories);

$existsCats = $section->getExistsCategories();
$existsCats = $existsCats['xmlIds'];

$existsProducts = $element->getExistsProducts();
$existsProducts = $existsProducts['xmlIds'];


foreach ($cats as $key => $category)
{
	$catID = null;

	if (!isset($existsCats[$key]))
	{
		$catID = editSection($iblockID, $category, 0);
	}
	elseif ($existsCats[$key]['NAME'] != $category['NAME'])
	{
		$catID = editSection($iblockID, $category, $existsCats[$key]['ID']);
	}

	foreach ($products[$key] as $xmlId => $product)
	{
		if (!isset($existsProducts[$xmlId]))
		{
			editProduct($iblockID, $key, $product, 0);
		}
		else
		{
			editProduct($iblockID, $key, $product, $existsCats[$xmlId]);
		}
	}
}

function editSection($iblockID, $section, $ID)
{
	$bs = new CIBlockSection;
	$parent = false;
	$parentSection = null;
	if ((int)$section['PARENT'] > 0)
	{
		$list = $bs->GetList([], ['XML_ID' => 'GAMMA_' . $section['PARENT']]);

		if ($item = $list->Fetch())
		{
			$parentSection = $item;
			$parent = true;
		}
	}

	$arFields = [
		"ACTIVE" => 'Y',
		"IBLOCK_SECTION_ID" => ($parent) ? $parentSection['ID'] : 0,
		"IBLOCK_ID" => $iblockID,
		"XML_ID" => $section['XML_ID'],
		"NAME" => $section['NAME'],
		"CODE" => \CUtil::translit($section['NAME'], 'ru'),
		"SORT" => 500,
		"PICTURE" => '',
		"DESCRIPTION" => '',
		"DESCRIPTION_TYPE" => '',
	];

	if ($ID > 0)
	{
		$res = $bs->Update($ID, $arFields);
	}
	else
	{
		$ID = $bs->Add($arFields);
		$res = ($ID > 0);
	}

	if (!$res)
	{
		$arFields['CODE'] = \CUtil::translit($section['NAME'], 'ru') . '-2';
		$ID = $bs->Add($arFields);
		$res = ($ID > 0);
	}

	//echo $bs->LAST_ERROR . '<br>';


	return $section['XML_ID'];
}

function editProduct($iblockID, $catID, $product, $catID)
{
	$section = new CIBlockSection();
	$res = $section->GetList([],['XML_ID' => $catID]);
	$category = null;
	if($cat = $res->Fetch())
	{
		$category = $cat['ID'];
	}

	$el = new \CIBlockElement;
	$arrFields = [
		"IBLOCK_SECTION_ID" => $category,
		"IBLOCK_ID" => $iblockID,
		"NAME" => $product['NAME'],
		"CODE" => \CUtil::translit($product['NAME'], 'ru'),
		"ACTIVE" => "Y",
		"XML_ID" => $product['XML_ID'],
		$arFields['PROPERTY_VALUES'] = [
			"IMAGE_URL" => $product['IMAGE_URL'],
			"BARCODES" => json_encode($product['BARCODES']),
			"KOEF" => $product['KOEF'],
			"MRRC" => $product['MRRC'],
			"AVAILABLE" => $product['AVAILABLE'],
		],
	];

	$el->Add($arrFields);

	echo $el->LAST_ERROR;
	echo "<br>";

}*/