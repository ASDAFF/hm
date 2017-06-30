<?php

namespace WM\Parser;

class Gamma extends SimpleXMLReader
{
	const PREFIX = 'GAMMA_';

	public $categories = [];
	public $items = [];

	public function __construct()
	{
		$this->registerCallback("/yml_catalog/shop/categories/category", [$this, "callbackCategory"]);
		$this->registerCallback("/yml_catalog/shop/offers/offer", [$this, "callbackOffer"]);
	}

	/**
	 * @param SimpleXMLReader $reader
	 * @return bool
	 */
	protected function callbackCategory($reader)
	{
		$xml = $reader->expandSimpleXml();
		$attributes = $xml->attributes();
		$id = (string)$attributes->{"id"};
		if ($id)
		{
			$xmlId = $this::PREFIX . $id;
			$name = trim((string)$xml);
			$parentId = (string)$attributes->{'parentId'};
			$this->categories[$xmlId]['XML_ID'] = $xmlId;
			$this->categories[$xmlId]['NAME'] = $name;
			$this->categories[$xmlId]['PARENT'] = ($parentId) ? $this::PREFIX . $parentId : '';
		}
		return true;
	}

	/**
	 * @param SimpleXMLReader $reader
	 * @return bool
	 */
	protected function callbackOffer($reader)
	{
		$xml = $reader->expandSimpleXml();
		if ($xml === false)
			return true;

		$attributes = $xml->attributes();
		$category = $this::PREFIX . (string)$xml->categoryId;
		$id = (string)$attributes->{"id"};
		$name = trim((string)$xml->name);
		$xmlId = 'GAMMA_' . $id;
		$barcodes = [];
		foreach ($xml->barcodes->barcode as $barcode)
			$barcodes[(string)$barcode->attributes()] = (string)$barcode;
		$images = array();
		foreach (explode(',', (string)$xml->imagelist) as $picture)
			$images[] = trim((string)$picture);

		$item = [
			'XML_ID' => $xmlId,
			'PRICE' => (float)$xml->price,
			'NAME' => $name,
			'PARENT' => $category,
			'PROP' => [
				'BARCODES' => implode(',', $barcodes),
				'UNIT_NAME' => (string)$xml->unitName,
				'KOEF' => (string)$xml->koef,
				'MRRC' => (string)$xml->mrrc,
				'IMAGES' => implode(',', $images),
				'AVAILABLE' => $attributes->{"available"} == 'true' ? 1 : 0,
				'AVAILABLE_TEXT' => (string)$xml->availableText,
				'OPTPART' => (bool)$xml->optPart ? 1 : 0,
			],
		];

		_log_array([
			$xmlId,
			$name,
		]);

		$this->items[$id] = $item;

		return true;
	}
}
