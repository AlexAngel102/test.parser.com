<?php

namespace App\Classes;

use DiDom\Document;

class FitTracker extends CitrusItem
{
    public function __construct($string = 'https://www.ctrs.com.ua/fitnes-trekery-160/', bool $isFile = false, string $encoding = 'UTF-8', string $type = Document::TYPE_HTML)
    {
        parent::__construct($string, $isFile = true, $encoding, $type);
    }
}