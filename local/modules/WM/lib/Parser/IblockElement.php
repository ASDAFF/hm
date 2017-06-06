<?php

namespace WM\Parser;

\Bitrix\Main\Loader::includeModule('iblock');

/**
 * Class IblockElement
 * @package WM\Parser
 */
class IblockElement
{
    /**
     * @var null
     */
    protected $iblockId = null;
    /**
     * @var array
     */
    protected $products = array();

    /**
     * IblockElement constructor.
     * @param null $iblockId
     * @param array $products
     */
    public function __construct($iblockId = null, array $products = array())
    {
        isset($products) && $this->setProducts($products);
        isset($iblockId) && $this->setIblockId($iblockId);
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products = array())
    {
        $this->products = $products;
    }

    /**
     * @param $iblockId
     * @throws \Exception
     */
    public function setIblockId($iblockId)
    {
        $iblockId = (int) $iblockId;
        if($iblockId < 1)
            throw new \Exception('Unknown IBLOCK');
        $this->iblockId = $iblockId;
    }

    /**
     * @param $step
     * @param $stepSize
     * @param $redirectUri
     * @return bool
     */
    public function loadProducts($step, $stepSize, $redirectUri, $needUpdate = false)
    {
        //search existing products
        $existsProducts = $this->getExistsProducts();
        $elXMLIds = $existsProducts['xmlIds'];
        $elInfo = $existsProducts['info'];
        unset($existsProducts);

        //add or update sections
        $el = new \CIBlockElement;
        $arFields = Array(
            'IBLOCK_SECTION_ID' => false,
            'IBLOCK_ID'      => $this->iblockId,
            'PROPERTY_VALUES'=> array(),
            'NAME'           => 'Элемент',
            'XML_ID'         => 0,
            'ACTIVE'         => 'Y',            // активен
            'PREVIEW_TEXT'   => '',
            'DETAIL_TEXT'    => '',
            'PREVIEW_TEXT_TYPE' =>'html',
            'DETAIL_TEXT_TYPE' =>'html',
        );
        $status = true;
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload/parser/images/';
        $i = 0;
        $start = ($step - 1) * $stepSize;
        $end = $start + $stepSize;
        foreach($this->products as $id => $element)
        {
            if(++$i <= $start)
                continue;

            if($i === $end)
            {
                //header('Location: ' . $redirectUri . '&step=' . ++$step);
                echo ++$step;
                exit;
            }

            $arFields['NAME'] = $element['name'];
            $arFields['CODE'] = \CUtil::translit($element['name'], 'ru');
            $arFields['ACTIVE'] = $element['active'];
            $arFields['XML_ID'] = $id;
            $arFields['IBLOCK_SECTION_ID'] = $element['categoryId'];
            $arFields['PREVIEW_TEXT'] = $arFields['DETAIL_TEXT'] = htmlspecialcharsback($element['description']);

            $arFields['PROPERTY_VALUES'] = array(
                'URL' => $element['url'],
                'SALES_NOTES' => $element['sales_notes'],
            );
            //if product exists search differences (need update?)
            if(false && isset($elInfo[$id]))
            {
                $tmp = $elInfo[$id];
                //don't need to update
                if($tmp['NAME'] == $arFields['NAME'] && $tmp['IBLOCK_SECTION_ID'] == $arFields['IBLOCK_SECTION_ID'])
                    continue;
            }

            $elImgDir = $dir . $arFields['XML_ID'];
            if(!is_dir($elImgDir))
                mkdir($elImgDir, 0755);
            $elImgDir .= '/';

            //set element photo
            if(!empty($element['picture']))
            {
                $pic = array_shift($element['picture']);
                $path = $elImgDir . basename($pic);
                if(!is_file($path))
                    file_put_contents($path, file_get_contents($pic));
                $arFields['PREVIEW_PICTURE'] = \CFile::MakeFileArray($path);
                $arFields['DETAIL_PICTURE'] = \CFile::MakeFileArray($path);
            }

            $oldProduct = isset($elXMLIds[$arFields['XML_ID']]);

            if($oldProduct)
                $id = $el->Update($elXMLIds[$id], $arFields);
            else
                $id = $el->Add($arFields);

            if(empty($id))
            {
                $arFields['CODE'] .= mt_rand(10, 99);
                if($oldProduct)
                    $id = $el->Update($elXMLIds[$id], $arFields);
                else
                    $id = $el->Add($arFields);
            }

            $status = $status && !empty($id);

            if($id)
            {
                if($oldProduct)
                    $id = $elXMLIds[$arFields['XML_ID']];
                //add product to catalog, set product count
                if(\CCAtalogProduct::Add(array('ID' => $id, 'QUANTITY' => 1, 'VAT_ID' => 1, 'VAT_INCLUDED' => 'Y')))
                {
                    $price = (string) $element['price'];
                    $price = false === strpos($price, '.') ? (int) $price : (double) $price;
                    $priceFields = array(
                        'PRODUCT_ID' => $id,
                        'CATALOG_GROUP_ID' => 1,
                        'PRICE' => $price,
                        'CURRENCY' => 'RUB',
                    );

                    //set product price
                    $res = \CPrice::GetList(array(), array('PRODUCT_ID' => $id, 'CATALOG_GROUP_ID' => 1));

                    if ($arr = $res->Fetch())
                        \CPrice::Update($arr['ID'], $priceFields);
                    else
                        \CPrice::Add($priceFields);
                }

                //set element photos
                if(!empty($element['picture']))
                {
                    $files = $existsFiles = array();
                    //search existing files
                    $res = \CIBlockElement::GetProperty($this->iblockId, $id, 'sort', 'asc', array('CODE' => 'MORE_PHOTO'));
                    while($arProp = $res->fetch())
                    {
                        $oldFile = \CFile::GetFileArray($arProp['VALUE']);
                        if(is_file($elImgDir . $oldFile['ORIGINAL_NAME']))
                            $existsFiles[$arProp['PROPERTY_VALUE_ID']] = $oldFile['ORIGINAL_NAME'];
                        $files[$arProp['PROPERTY_VALUE_ID']] = array('VALUE' => array('del' => 'Y'));
                    }
                    //compare with files from xml
                    foreach($element['picture'] as $picture)
                    {
                        $path = $elImgDir . basename($picture);
                        if(!is_file($path))
                            file_put_contents($path, file_get_contents($picture));
                        if(false === ($k = array_search(basename($picture), $existsFiles)))
                            $files[] = array('VALUE' => \CFile::MakeFileArray($path), 'DESCRIPTION' => '');
                        else
                            unset($files[$k]);
                    }

                    //update if needed
                    if(!empty($files))
                        \CIBlockElement::SetPropertyValueCode($id, 'MORE_PHOTO', $files);

                    unset($files, $existsFiles);
                }
            }
        }
        //header('Location: ' . $redirectUri . '&step=' . ++$step);
        echo ++$step;
        exit;
        return $status;
    }

    /**
     * @param null $xmlId
     * @return array
     */
    public function getExistsProducts($xmlId = null, $needUpdate = false)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/upload/parser/json_products/exists_products' . $xmlId . '.json';
        if($needUpdate || !is_file($path))
        {
            $elXMLIds = $elInfo = array();
            $res = \Bitrix\Iblock\ElementTable::getList(array(
                'filter' => array('IBLOCK_ID' => $this->iblockId, 'XML_ID' => (isset($xmlId) ? $xmlId : array_keys($this->products))),
                'select' => array('ID', 'XML_ID', 'NAME', 'IBLOCK_SECTION_ID'),
            ));

            while($row = $res->Fetch())
            {
                $elXMLIds[$row['XML_ID']] = $row['ID'];
                $elInfo[$row['XML_ID']] = $row;
            }
            $ret = array(
                'xmlIds' => $elXMLIds,
                'info' => $elInfo,
            );
            file_put_contents($path, json_encode($ret));
            return $ret;
        }
        return json_decode(file_get_contents($path), true);
    }
}