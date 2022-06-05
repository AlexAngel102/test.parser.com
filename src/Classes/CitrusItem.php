<?php

namespace App\Classes;

use App\Classes\DataSortHandler as Handler;
use DiDom\Document;

class CitrusItem extends Document
{
    public function __construct($string = null, bool $isFile = false, string $encoding = 'UTF-8', string $type = Document::TYPE_HTML)
    {
        parent::__construct($string, $isFile, $encoding, $type);
    }

    public function getValues(): array
    {
        $nodes = $this->find("div[class*='productCardCategory']");
        $item = ['Headers' => ['Name', 'Price', 'Link', 'Image']];
        $i = 0;
        foreach ($nodes as $node) {
            $item[$i][] = ($node->find("a.break-word::text()"))[0];
            $price = $node->find("div[data-price]::text()");
            $prices[] = str_replace(" ", "", implode('', $price));
            $item[$i][] = $prices[$i];
            $item[$i][] = "https://www.ctrs.com.ua" . ($this->find("a.break-word::attr(href)"))[$i];
            $item[$i][] = ($node->find("img[src*='shop']::attr(src)"))[0];
            $i++;
        }
        return $item;
    }

}