<?php

use DiDom\Document;

use App\Classes\CitrusGoodsParser as Parser;

use App\Classes\CitrusDOMLoader;
use App\Classes\FitTracker;
use App\Classes\Headphones;
use App\Classes\Smartphone;

require_once "vendor/autoload.php";

libxml_use_internal_errors(true);

try {
    $smartphones = new Smartphone();
    $trackers = new FitTracker();
    $headphones = new Headphones();
} catch (Error|Exception $e) {
    die("Cann't connect to source. Error:" . $e->getLine());
}

try {
    $trackers->writeToCSV();
    $smartphones->writeToCSV();
    $headphones->writeToCSV();
} catch (Error|Exception $e) {
    die("Cann't parse or create file. Error:" . $e->getLine());
}