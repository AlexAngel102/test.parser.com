<?php

use App\Classes\CSVWriter;
use DiDom\Document;

use App\Classes\DataSortHandler as Parser;

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
    $write = new CSVWriter();
} catch (Error|Exception $e) {
    die("Cann't connect to source. Error:" . $e->getLine());
}

try {
    $write->writeToCSV($smartphones, "Smartphones");
    $write->writeToCSV($headphones, "Headphones");
    $write->writeToCSV($trackers, "Trackers");
} catch (Error|Exception $e) {
    die("Cann't parse or create file. Error:" . $e->getLine());
}




