<?php

namespace WM\Parser;

class GammaParser extends XMLParser
{
    public function getCategories()
    {
        //if(!$this->loaded)
        //    throw new \Exception('File is not loaded');
        $path = $_SERVER['DOCUMENT_ROOT'] . static::PATH_DIR . $this->getXmlPrefix() . 'categories.json';

        if(!is_file($path))
        {
            $categories = array();
            foreach ($this->doc->shop->categories->category as $category)
            {
                $attrs = $category->attributes();
                $categories[$this->getXmlPrefix() . (int) $attrs['id']] = array(
                    'id' => $this->getXmlPrefix() . (int) $attrs['id'],
                    'parentId' => $this->getXmlPrefix() . (int) $attrs['parentId'],
                    'name' => (string) $category
                );
            }
            file_put_contents($path, json_encode($categories));
            return $categories;
        }
        return json_decode(file_get_contents($path), true);
    }
    public function getProducts(array $catXmlIds = array(), $cat = null, $needUpdate = false)
    {
        //if(!$this->loaded)
        //    throw new \Exception('File is not loaded');
        $path = $_SERVER['DOCUMENT_ROOT'] . static::PATH_DIR . 'json_products/' . $this->getXmlPrefix() . 'products_' . $cat . '.json';
        if($needUpdate || !is_file($path))
        {
            $offers = array();
            foreach ($this->doc->shop->offers->offer as $offer)
            {
                if (isset($cat) && $this->getXmlPrefix() . (int) $offer->categoryId != $cat)
                    continue;
                $attrs = $offer->attributes();

                $pictures = array();
                if (trim((string) $offer->imagelist))
                {
                    foreach (explode(',', (string) $offer->imagelist) as $picture)
                        $pictures[] = trim((string) $picture);
                }

                $barcodes = array();
                if (!empty($offer->barcodes->barcode))
                {
                    foreach ($offer->barcodes->barcode as $barcode)
                        $barcodes[trim($barcode->attributes()['type'])] = trim((string) $barcode);
                }

                $offers[$this->getXmlPrefix() . (int) $attrs['id']] = array(
                    'id' => $this->getXmlPrefix() . (int) $attrs['id'],
                    'active' => ((string) $attrs['available'] == 'true' ? 'Y' : 'N'),
                    'categoryId' => (int) $catXmlIds[$this->getXmlPrefix() . (int) $offer->categoryId],
                    'name' => (string) $offer->name,
                    'unitName' => (string) $offer->unitName,
                    'koef' => (string) $offer->koef,
                    'optPart' => (string) $offer->optPart == 'true',
                    'mrrc' => (string) $offer->mrrc,
                    'barcodes' => $barcodes,
                    'price' => (string) $offer->price,
                    'picture' => $pictures,
                );
            }
            file_put_contents($path, json_encode($offers));
            return $offers;
        }
        return json_decode(file_get_contents($path), true);
    }
}