<?php

use DiDom\Document;

use App\Classes\CitrusGoodsParser as Parser;

use App\Classes\CitrusDOMLoader;
use App\Classes\FitTracker;
use App\Classes\Headphones;
use App\Classes\Smartphone;

require_once "vendor/autoload.php";
//require_once "../src/errorHandler.php";

$smartphones = new Smartphone();
$trackers = new FitTracker();
$headphones = new Headphones();

$trackers->writeToCSV();
$smartphones->writeToCSV();
$headphones->writeToCSV();