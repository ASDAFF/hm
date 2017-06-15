<?php

namespace WM\Parser;

\Bitrix\Main\Loader::includeModule('iblock');

/**
 * Class IblockSection
 * @package WM\Parser
 */
class IblockSection
{
    /**
     * @var array
     */
    protected $categories = array();
    /**
     * @var null
     */
    protected $iblockId = null;

    /**
     * IblockSection constructor.
     * @param null $iblockId
     * @param array $categories
     */
    public function __construct($iblockId = null, array $categories = array())
    {
        isset($categories) && $this->setCategories($categories);
        isset($iblockId) && $this->setIblockId($iblockId);
    }

    /**
     * @param array $categories
     */
    public function setCategories(array $categories = array())
    {
        $this->categories = $categories;
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
     * @return bool
     */
    public function loadCategories()
    {
        //search existing sections
        $existsCategories = $this->getExistsCategories();
        $catXMLIds = $existsCategories['xmlIds'];
        $catsInfo = $existsCategories['info'];
        unset($existsCategories);

        //add or update sections
        $bs = new \CIBlockSection;
        $arFields = Array(
            'ACTIVE' => 'Y',
            'IBLOCK_SECTION_ID' => null,
            'IBLOCK_ID' => $this->iblockId,
            'NAME' => null,
            'XML_ID' => null,
        );
        $status = true;
        foreach($this->categories as $id => $cat)
        {
            $arFields['NAME'] = $cat['name'];
            $arFields['CODE'] = \CUtil::translit($cat['name'], 'ru');
            $arFields['XML_ID'] = $id;
            $arFields['IBLOCK_SECTION_ID'] = isset($catXMLIds[$cat['parentId']]) ? $catXMLIds[$cat['parentId']] : false;

            //if category exists search differences (need update?)
            if(isset($catsInfo[$id]))
            {
                $tmp = $catsInfo[$id];
                //don't need to update
                if($tmp['NAME'] == $arFields['NAME'] && $tmp['IBLOCK_SECTION_ID'] == $arFields['IBLOCK_SECTION_ID'])
                    continue;
            }
            $status = true;
            if(isset($catXMLIds[$id]))
                $status = $status && $bs->Update($catXMLIds[$id], $arFields);
            else
                $status = $status && $bs->Add($arFields) > 0;
        }
        return $status;
    }

    /**
     * @param null $xmlId
     * @return array
     */
    public function getExistsCategories($xmlId = null)
    {
        $catXMLIds = $catsInfo = array();
        $res = \Bitrix\Iblock\SectionTable::getList(array(
            'filter' => array('IBLOCK_ID' => $this->iblockId, 'XML_ID' => (isset($xmlId) ? $xmlId : array_keys($this->categories))),
            'select' => array('ID', 'XML_ID', 'NAME', 'IBLOCK_SECTION_ID'),
        ));
        while($row = $res->Fetch())
        {
            $catXMLIds[$row['XML_ID']]['ID'] = $row['ID'];
            $catXMLIds[$row['XML_ID']]['NAME'] = $row['NAME'];
            $catsInfo[$row['XML_ID']] = $row;
        }
        return array(
            'xmlIds' => $catXMLIds,
            'info' => $catsInfo,
        );
    }
}