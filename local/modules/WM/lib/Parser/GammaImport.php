<?

namespace WM\Parser;

use Bitrix\Main\Loader;
use WM\Log;

class GammaImport
{
	const IBLOCK_ID = 39;
	const PROVIDER_ID = 177497;
	const NO_SECTION_ID = 1216;
	const DIR = '/upload/parser/';
	const YML_FILE_NAME = 'fullcatalog.yml';
	const XML_FILE_NAME = 'fullcatalog.xml';
	const ZIP_FILE_NAME = 'fullcatalog.yml.zip';
	const PREFIX = 'GAMMA_';

	public $categories = [];
	public $offers = [];
	public $sections;
	public $items;

	public $counts = [];
	private $yml;
	private $zip;
	private $dir;

	/**
	 * @var Log
	 */
	private $_log;

	function __construct($docRoot)
	{
		$this->dir = $docRoot . self::DIR;
		$this->yml = $this->dir . self::YML_FILE_NAME;
		$this->xml = $this->dir . self::XML_FILE_NAME;
		$this->zip = $this->dir . self::ZIP_FILE_NAME;
	}

	public function start()
	{
		$this->_log = new Log('import/gamma/' . date('Y_m') . '.log');

		// Загрузка архива
		$loaded = $this->loadYml();
		if (!$loaded)
			return false;

		// Распаковка
		$res = $this->unzip();
		if (!$res)
			return false;

		// Парсинг данных в массив
		$this->parse();

		// Инициализация счетчиков
		$this->counts = [
			'CAT' => [
				'ALL' => count($this->categories),
				'ADD' => 0,
				'ADD_ERROR' => 0,
				'UPDATE' => 0,
			],
			'ITEMS' => [
				'ALL' => count($this->offers),
				'ADD' => 0,
				'ADD_ERROR' => 0,
				'UPDATE' => 0,
			],
		];

		// Обработка данных
		if ($this->categories)
		{
			$this->importCategories();
			if ($this->offers)
				$this->importItems();
		}

		$this->_log->writeArray($this->counts, 'Результаты:');
	}

	private function loadYml()
	{
		$this->log('Началось скачивание файла');

		$file = fopen($this->zip, "w");
		$resource = curl_init();
		curl_setopt($resource, CURLOPT_URL, 'http://shop.firma-gamma.ru/api/v1.0/fullcatalog.php?type=yml&compression=zip');
		curl_setopt($resource, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($resource,CURLOPT_USERPWD,'webkmv:03webkmv');
		curl_setopt($resource, CURLOPT_FILE, $file);
		curl_setopt($resource, CURLOPT_HEADER, 0);
		curl_exec($resource);
		$info = curl_getinfo($resource);
		curl_close($resource);
		fclose($file);

		if ($info['http_code'] != 200)
		{
			$this->log('http_code: ' . $info['http_code']);
			return false;
		}

		$this->log('Файл загружен. Размер: ' . $info['size_download']);
		return true;
	}

	private function unzip()
	{
		$command = "unzip $this->zip -d $this->dir";
		exec($command);
		return true;
	}

	/**
	 * Пришлось сделать ручной парсер из-за странных ошибок в родных парсерах php
	 */
	private function parse()
	{
		$this->log('Парсинг...');
		$s = file_get_contents($this->yml);
		$ar = explode('</categories>', $s);
		$ar1 = explode('<category id="', $ar[0]);
		foreach ($ar1 as $i => $s1)
		{
			if (!$i)
				continue;

			$ar2 = explode('" parentId="', $s1);
			$parentId = '';
			$id = '';

			if (count($ar2) > 1)
			{
				$id = $ar2[0];
				$s1 = $ar2[1];
			}

			$ar3 = explode('">', $s1);
			if ($id)
				$parentId = $ar3[0];
			else
				$id = $ar3[0];
			$ar4 = explode('</category>', $ar3[1]);
			$name = trim($ar4[0]);
			$name = iconv('windows-1251', 'utf-8', $name);

			$xmlId = $this::PREFIX . $id;
			$this->categories[$xmlId] = [
				'XML_ID' => $xmlId,
				'NAME' => $name,
				'PARENT' => ($parentId) ? $this::PREFIX . $parentId : '',
			];
		}

		$arTags = [
			'price',
			'availableText',
			'categoryId',
			'name',
			'unitName',
			'koef',
			'barcodes',
			'mrrc',
			'imagelist',
			'optPart',
		];

		$ar1 = explode('<offer id="', $ar[1]);
		foreach ($ar1 as $i => $s1)
		{
			if (!$i)
				continue;

			$ar2 = explode('" available="', $s1);
			$id = $ar2[0];

			$ar3 = explode('">', $ar2[1], 2);
			$avail = $ar3[0];

			$values = [];
			foreach ($arTags as $tag)
			{
				$ar4 = explode('<' . $tag . '>', $ar3[1]);
				if (count($ar4) > 1)
				{
					$ar5 =  explode('</' . $tag . '>', $ar4[1]);
					if (count($ar5) > 1)
					{
						$values[$tag] = trim($ar5[0]);
						if ($tag == 'barcodes')
						{
							$tmp = [];
							$ar6 = explode('<barcode type="', $values[$tag]);
							foreach ($ar6 as $j => $s2)
							{
								if (!$j)
									continue;

								$ar7 = explode('">', $s2);
								$ar8 = explode('</barcode>', $ar7[1]);
								$tmp[$ar7[0]] = $ar8[0];
							}
							$values[$tag] = json_encode($tmp);
						}
					}
				}
			}

			$category = $values['categoryId'] ? $this::PREFIX . $values['categoryId'] : '';
			$xmlId = 'GAMMA_' . $id;

			$offer = [
				'XML_ID' => $xmlId,
				'PRICE' => floatval($values['price']),
				'NAME' => iconv('windows-1251', 'utf-8', $values['name']),
				'PARENT' => $category,
				'PROP' => [
					'PROVIDER' => self::PROVIDER_ID,
					'BARCODES' => $values['barcodes'],
					'UNIT_NAME' => iconv('windows-1251', 'utf-8', $values['unitName']),
					'KOEF' => $values['koef'],
					'MRRC' => $values['mrrc'],
					'IMAGES' => $values['imagelist'],
					'AVAILABLE' => $avail == 'true' ? 1 : 0,
					'AVAILABLE_TEXT' => iconv('windows-1251', 'utf-8', $values['availableText']),
					'OPTPART' => $values['optPart'] == 'true' ? 1 : 0,
				],
			];

			$this->offers[$xmlId] = $offer;
		}
	}
	
	private function importCategories()
	{
		$this->log('Импорт разделов');
		$iblockSection = new \CIBlockSection();
		$res = $iblockSection->GetList([], ['IBLOCK_ID' => self::IBLOCK_ID]);

		$this->sections = [];
		while ($section = $res->Fetch())
		{
			$this->sections[$section['XML_ID']] = [
				'ID' => $section['ID'],
				'NAME' => $section['NAME'],
				'XML_ID' => $section['XML_ID'],
			];
		}

		$this->counts['CAT']['EXIST'] = count($this->sections);

		foreach ($this->categories as $category)
		{
			$xmlId = $category['XML_ID'];
			$fields = [
				'ACTIVE' => 'Y',
				'IBLOCK_ID' => self::IBLOCK_ID,
				'XML_ID' => $xmlId,
				'NAME' => $category['NAME'],
				'CODE' => \CUtil::translit($category['NAME'], 'ru'),
			];

			$section = $this->sections[$xmlId];
			$id = $section['ID'];
			if (!$id)
			{
				$parentSectionId = 0;
				if ($category['PARENT'])
				{
					$parent = $this->sections[$category['PARENT']];
					$parentSectionId = $parent['ID'];
				}
				$fields['IBLOCK_SECTION_ID'] = $parentSectionId;

				$id = $iblockSection->Add($fields);
				if (empty($id))
				{
					$fields['CODE'] = \CUtil::translit($category['NAME'], 'ru') . '_' . $xmlId;
					$id = $iblockSection->Add($fields);
				}

				if ($id)
				{
					$this->sections[$xmlId] = [
						'ID' => $id,
						'NAME' => $fields['NAME'],
						'XML_ID' => $xmlId,
					];
					$this->counts['CAT']['ADD']++;
				}
				else
					$this->counts['CAT']['ADD_ERROR']++;
			}
			else
			{
				$update = [];
				if ($section['NAME'] != $fields['NAME'])
					$update['NAME'] = $fields['NAME'];

				if ($update)
				{
					$iblockSection->Update($id, $update);
					$this->counts['CAT']['UPDATE']++;
				}
			}
		}
	}

	private function importItems()
	{
		Loader::IncludeModule('catalog');

		$this->log('Импорт товаров');
		$iblockElement = new \CIBlockElement();
		$catalogProduct = new \CCatalogProduct();
		$res = $iblockElement->GetList([], ['IBLOCK_ID' => self::IBLOCK_ID], false, false, [
			'ID', 'NAME', 'IBLOCK_ID', 'CODE', 'XML_ID',
			'PROPERTY_PROVIDER',
			'PROPERTY_BARCODES',
			'PROPERTY_UNIT_NAME',
			'PROPERTY_KOEF',
			'PROPERTY_MRRC',
			'PROPERTY_IMAGES',
			'PROPERTY_AVAILABLE',
			'PROPERTY_AVAILABLE_TEXT',
			'PROPERTY_OPTPART',
		]);

		$this->items = [];
		while ($item = $res->Fetch())
			$this->items[$item['XML_ID']] = $item;

		$res = \CPrice::GetList();
		$prices = [];
		while ($price = $res->Fetch())
			$prices[$price['PRODUCT_ID']] = $price;

		$this->counts['ITEMS']['EXIST'] = count($this->items);

		foreach ($this->offers as $product)
		{
			$xmlId = $product['XML_ID'];
			$fields = [
				'ACTIVE' => 'Y',
				'IBLOCK_ID' => self::IBLOCK_ID,
				'XML_ID' => $xmlId,
				'NAME' => $product['NAME'],
				'CODE' => \CUtil::translit($product['NAME'], 'ru'),
				'PROPERTY_VALUES' => $product['PROP'],
			];

			$item = $this->items[$xmlId];
			$id = $item['ID'];
			if (!$id)
			{
				$parentSectionId = self::NO_SECTION_ID;
				if ($product['PARENT'])
				{
					$parent = $this->sections[$product['PARENT']];
					$parentSectionId = $parent['ID'];
				}

				$fields['IBLOCK_SECTION_ID'] = $parentSectionId;
				$images = $this->generateImages($product['PROP']['IMAGES']);
				$fields['PROPERTY_VALUES']['MORE_PHOTO'] = $images;

				$id = $iblockElement->Add($fields);
				if ($id)
				{
					if ($catalogProduct->Add(['ID' => $id, 'QUANTITY' => 1, 'VAT_ID' => 1, 'VAT_INCLUDED' => 'Y']))
					{
						$priceFields = array(
							'PRODUCT_ID' => $id,
							'CATALOG_GROUP_ID' => 1,
							'PRICE' => floatval($product['PRICE']),
							'CURRENCY' => 'RUB',
						);
						\CPrice::Add($priceFields);
					}

					$this->counts['ITEMS']['ADD']++;
				}
				else
				{
					$this->counts['ITEMS']['ADD_ERROR']++;
					$this->log($iblockElement->LAST_ERROR);
				}

			}
			else
			{
				$update = [];
				$updateProps = [];
				$updatePrice = false;
				if ($item['NAME'] != $fields['NAME'])
				{
					$update['NAME'] = $fields['NAME'];
					$update['CODE'] = \CUtil::translit($fields['NAME'], 'ru');
				}
				foreach ($product['PROP'] as $k => $v)
				{
					if ($item['PROPERTY_' . $k . '_VALUE'] != $v)
						$updateProps[$k] = $v;
				}
				if ($product['PRICE'] != $prices[$id]['PRICE'] && $prices[$id]['ID'])
					$updatePrice = $product['PRICE'];

				if ($update)
					$iblockElement->Update($id, $update);
				if ($updateProps)
				{
					if ($updateProps['IMAGES'])
					{
						$images = $this->generateImages($updateProps['IMAGES']);
						$updateProps['MORE_PHOTO'] = $images;
					}
					$iblockElement->SetPropertyValuesEx($id, self::IBLOCK_ID, $updateProps);
				}
				if ($updatePrice !== false)
					\CPrice::Update($prices[$id]['ID'], ['PRICE' => $updatePrice]);

				if ($update || $updateProps || $updatePrice !== false)
					$this->counts['ITEMS']['UPDATE']++;
			}
		}
	}

	private function generateImages($images)
	{
		$return = [];
		if ($images)
		{
			$ar = explode(',', $images);
			foreach ($ar as $url)
				$return[] = \CFile::MakeFileArray($url);
		}

		return $return;
	}

	private function log($s)
	{
		$this->_log->writeText($s);
	}

}