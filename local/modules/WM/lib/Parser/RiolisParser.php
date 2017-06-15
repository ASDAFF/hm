<?php

namespace WM\Parser;

class RiolisParser
{
	public $sections;
	public $items;
	private $data;

	public function __construct($file)
	{
		$fdata = file_get_contents($file);
		$arr = json_decode($fdata, true);
		$this->data = $arr['goods'];
		$this->getCats();
		$this->getItems();
	}

	public function getCats()
	{
		foreach ($this->data as $item)
		{
			$catName = strip_tags($item['category_name']);
			$catCode = 'RIOLIS_'.$this->translit($catName);
			$this->sections[$catCode] = [
				'NAME' => $catName,
			    'XML_ID' => $catCode,
			    'PARENT' => 0
			];
		}
	}

	public function getItems()
	{
		foreach ($this->data as $item)
		{
			$this->items[$item['article']] = [
				'NAME' => $item['article_name'],
				'PRICE' => $item['price_opt'],
			    'XML_ID' => $item['article']
			];
		}
	}

	private function translit($str)
	{
		$rus = [
			'А', 'Б', 'В', 'Г', 'Д',
			'Е', 'Ё', 'Ж', 'З', 'И',
			'Й', 'К', 'Л', 'М', 'Н',
			'О', 'П', 'Р', 'С', 'Т',
			'У', 'Ф', 'Х', 'Ц', 'Ч',
			'Ш', 'Щ', 'Ъ', 'Ы', 'Ь',
			'Э', 'Ю', 'Я', 'а', 'б',
			'в', 'г', 'д', 'е', 'ё',
			'ж', 'з', 'и', 'й', 'к',
			'л', 'м', 'н', 'о', 'п',
			'р', 'с', 'т', 'у', 'ф',
			'х', 'ц', 'ч', 'ш', 'щ',
			'ъ', 'ы', 'ь', 'э', 'ю',
			'я', ' '
		];
		$lat = [
			'A', 'B', 'V', 'G', 'D',
			'E', 'E', 'Gh', 'Z', 'I',
			'Y', 'K', 'L', 'M', 'N',
			'O', 'P', 'R', 'S', 'T',
			'U', 'F', 'H', 'C', 'Ch',
			'Sh', 'Sch', 'Y', 'Y', 'Y',
			'E', 'Yu', 'Ya', 'a', 'b',
			'v', 'g', 'd', 'e', 'e',
			'gh', 'z', 'i', 'y', 'k',
			'l', 'm', 'n', 'o', 'p',
			'r', 's', 't', 'u', 'f',
			'h', 'c', 'ch', 'sh', 'sch',
			'y', 'y', 'y', 'e', 'yu',
			'ya', '_'
		];

		return str_replace($rus, $lat, $str);
	}
}