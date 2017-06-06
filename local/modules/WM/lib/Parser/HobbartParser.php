<?php

namespace WM\Parser;

/**
 * Class HobbartParser
 * @package WM\Parser
 */
class HobbartParser extends XMLParser
{
    /**
     * @return array
     * @throws \Exception
     */
    public function getCategories()
    {
        if(!$this->loaded)
            throw new \Exception('File is not loaded');
        $categories = array();
        foreach($this->doc->shop->categories->category as $category)
        {
            $attrs = $category->attributes();
            $categories[$this->getXmlPrefix() . (int) $attrs['id']] = array(
                'id' => $this->getXmlPrefix() . (int) $attrs['id'],
                'parentId' => $this->getXmlPrefix() . (int) $attrs['parentId'],
                'name' => (string) $category
            );
        }
        return $categories;
    }

    /**
     * @param array $catXmlIds
     * @return array
     * @throws \Exception
     */
    public function getProducts(array $catXmlIds = array(), $cat = null)
    {
        if(!$this->loaded)
            throw new \Exception('File is not loaded');
        $offers = array();
        foreach($this->doc->shop->offers->offer as $offer)
        {
            if(isset($cat) && $this->getXmlPrefix() . (int) $offer->categoryId != $cat)
                continue;
            
            $attrs = $offer->attributes();

            $pictures = array();
            foreach($offer->picture as $picture)
                $pictures[] = (string) $picture;

            $offers[$this->getXmlPrefix() . (int) $attrs['id']] = array(
                'id' => $this->getXmlPrefix() . (int) $attrs['id'],
                'active' => ((string) $attrs['available'] == 'true' ? 'Y' : 'N'),
                'categoryId' => (int) $catXmlIds[$this->getXmlPrefix() . (int) $offer->categoryId],
                'name' => (string) $offer->name,
                'url' => (string) $offer->url,
                'price' => (string) $offer->price,
                'currencyId' => (string) $offer->currencyId,
                'picture' => $pictures,
                'description' => (string) $offer->description,
                'sales_notes' => (string) $offer->sales_notes,
            );
        }
        return $offers;
    }
}