<?php

namespace App\Classes;

use App\Classes\CitrusGoodsParser as Parser;
use DiDom\Document;

class CitrusItem extends Document
{
    public function __construct($string = null, bool $isFile = false, string $encoding = 'UTF-8', string $type = Document::TYPE_HTML)
    {
        parent::__construct($string, $isFile, $encoding, $type);
    }

    public function writeToCSV()
    {
        $parser = new Parser();
        $items = $this->getValues();
        $d = date("Y-m-d_H.i.s");
        $f = "items_$d.csv";
        $fp = fopen($f, 'w');
        foreach ($items as $item) {
            $data = $parser->getData($item);
            $data = mb_convert_encoding($data, 'Windows-1251', 'UTF-8');
            fputcsv($fp, $data, ";","\"", "\n");
        }
        fclose($fp);
    }

    public function getValues(): array
    {
        $counter = count($this->find("div[class*='productCardCategory']"));
        $item = ['Headers' => ['Name','Price','Link','Image']];

        for ($i = 0; $i < $counter; $i++) {

            //Searching for name
            $item[$i][] = ($this->find("a.break-word::text()"))[$i];

            //Searching for price
            $pricesNode = $this->find("div[class*='productCardCategory']");
            //$pricesNode needs for checking, some goods are haven't price
            foreach ($pricesNode as $price) {
                $price = $price->find("div[data-price]::text()");
                $prices[] = str_replace(" ", "", implode('', $price));
            }
            $item[$i][] = $prices[$i];

            //Searching link
            $item[$i][] = "https://www.ctrs.com.ua" . ($this->find("a.break-word::attr(href)"))[$i];

            //Searching image
            $item[$i][] = ($this->find("img[src*='shop']::attr(src)"))[$i];

        }

        return $item;
    }

}