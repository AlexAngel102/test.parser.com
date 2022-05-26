<?php
use App\Classes\CitrusDOMLoad as CLoad;
use App\Classes\CitrusGoodsParser as Parser;

require_once "../vendor/autoload.php";
require_once "../errorHandler.php";

//try {
//    $xpath = new CLoad("https://www.ctrs.com.ua/fitnes-trekery-160/");
//    $xpath = $xpath->getPath();
//    $parse = new Parser();
//}catch (Exception){
//    echo "Failed connect URL, or doesnt match: 'https://www.ctrs.com.ua/{category}/'".PHP_EOL;
//    die;
//}
//
//$images = $xpath->query("//div[contains(@class,'productCardCategory')]//img[contains(@src,'shop')]/@src");
//$links = $xpath->query("//div[contains(@class,'productCardCategory')]//a[contains(@class,'break-word')]/@href");
//$prices = $xpath->query("//div[contains(@class,'productCardCategory')]//div[contains(@class,'medium fz16'),text()]");
//$names = $xpath->query("//div[contains(@class,'productCardCategory')]//a[contains(@class,'break-word')]");

//$img = $parse->getData($images, "IMG");
//$lnk = $parse->getData($links, "LINK");
//$prcs = $parse->getData($prices, "PRICE");
//$nms = $parse->getData($names, "NAME");


//echo count($img) . PHP_EOL;
//echo count($lnk) . PHP_EOL;
//echo count($prcs) . PHP_EOL;
//echo count($nms) . PHP_EOL;
