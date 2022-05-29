<?php

namespace App\Classes;

use DiDom\Document;

class Headphones extends CitrusItem
{
    public function __construct($string = 'https://www.ctrs.com.ua/naushniki/', bool $isFile = false, string $encoding = 'UTF-8', string $type = Document::TYPE_HTML)
    {
        parent::__construct($string, true, $encoding, $type);
    }
}