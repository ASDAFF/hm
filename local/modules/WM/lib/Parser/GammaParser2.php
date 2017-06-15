<?php

namespace WM\Parser;

class GammaParser2 extends SimpleXMLReader
{
	public $categories = [];
	public $items = [];

	public function __construct()
	{
		$this->registerCallback("/yml_catalog/shop/categories/category", [$this, "callbackCategory"]);
		$this->registerCallback("/yml_catalog/shop/offers/offer", [$this, "callbackOffer"]);

	}

	protected function callbackCategory($reader)
	{
		$xml = $reader->expandSimpleXml();
		$attributes = $xml->attributes();
		$id = 'GAMMA_'.(string)$attributes->{"id"};
		if ($id)
		{
			$val = $xml;
			$this->categories[$id]['XML_ID'] = $id;
			$this->categories[$id]['NAME'] = trim((string)$val);
			$this->categories[$id]['PARENT'] = ($attributes->{'parentId'}) ? 'GAMMA_' . (string)$attributes->{'parentId'} : 0;
		}
		return true;


	}

	protected function callbackOffer($reader)
	{
		$item = [];
		$xml = $reader->expandSimpleXml();
		$attributes = $xml->attributes();
		$category = 'GAMMA_' . (string)$xml->categoryId;
		$id = 'GAMMA_' . (string)$attributes->{"id"};
		$barcodes = [];
		$item['XML_ID'] = (string)$id;
		$item['PRICE'] = (float)$xml->price;
		$item['NAME'] = (string)$id;
		$item['PARENT'] = $category;
		foreach ($xml->barcodes->barcode as $barcode)
		{
			$barcodes[(string)$barcode->attributes()] = (string)$barcode;
		}
		$item['PROP']['BARCODES'] = json_encode($barcodes);
		$item['PROP']['UNIT_NAME'] = (string)$xml->unitName;
		$item['PROP']['KOEF'] = (string)$xml->koef;
		$item['PROP']['MRRC'] = (string)$xml->mrrc;
		$item['PROP']['IMAGE_URL'] = (string)$xml->imagelist;
		$item['PROP']['AVAILABLE'] = (string)$xml->availableText;
		$this->items[$id] = $item;

		return true;
	}
}
