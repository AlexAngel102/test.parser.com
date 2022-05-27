<?php

//use App\Classes\CitrusDOMLoad as CLoad;
//use App\Classes\CitrusGoodsParser as Parser;

use App\Classes\CitrusDOMLoader;
use \DiDom\Document;
use \DiDom\Query;

require_once "../vendor/autoload.php";
//require_once "../src/errorHandler.php";

$urls = [
    'https://www.ctrs.com.ua/fitnes-trekery-160/',
    'https://www.ctrs.com.ua/naushniki/',
    'https://www.ctrs.com.ua/smartfony/'
    ];

$document = new CitrusDOMLoader($urls, true);
$images = $document->find("img[src*='shop']");
$links = $document->find("a.break-word::attr(href)");
$prices = $document->find("div[class*='productCardCategory']");
$names = $document->find("a.break-word::text");

$items = [$names, $price, $links, $images];
print_r($items);

//$price = $document->find("div[data-price]::text()");
//foreach ($prices as $price){
//    $p[] = $price->find("div[data-price]::text()");
//}
//echo count($p);
//var_dump($price);
