<?php

namespace App\Classes;

use App\Classes\CitrusGoodsParser as Parser;
use DiDom\Document;

class Item extends Document
{
    public function __construct($string = null, bool $isFile = false, string $encoding = 'UTF-8', string $type = Document::TYPE_HTML)
    {
        parent::__construct($string, $isFile, $encoding, $type);
    }

    public function writeToCSV()
    {
        $parser = new Parser();
        $items = $this->getValues();
        $f = "items.csv";
        $fp = fopen($f, 'w');
        foreach ($items as $item) {
            $data = $parser->getData($item);
//            $data = implode("", $data);
//            $data = html_entity_decode($data);
            fputcsv($fp, $data);
        }
        fclose($fp);
    }

    public function getValues(): array
    {
        //Searching for name
        $item[] = ($this->find("a.break-word::text"))[0];

        //Searching for price
        $pricesNode = $this->find("div[class*='productCardCategory']");
        //$pricesNode needs for checking, some goods are haven't price
        foreach ($pricesNode as $price) {
            $price = $price->find("div[data-price]::text()");
            $prices[] = str_replace(" ", "", implode('', $price));
        }
        $item[] = $prices[0];

        //Searching link
        $item[] = "https://www.ctrs.com.ua".($this->find("a.break-word::attr(href)"))[0];

        //Searching image
        $item[] = ($this->find("img[src*='shop']::attr(src*='http')"))[0];

//        $values = [$names, $prices, $links, $images];
        return $item;
    }

}