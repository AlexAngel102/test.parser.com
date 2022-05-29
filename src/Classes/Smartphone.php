<?php

namespace App\Classes;

use DiDom\Document;

class Smartphone extends CitrusItem
{
    public function __construct($string = 'https://www.ctrs.com.ua/smartfony/', bool $isFile = false, string $encoding = 'UTF-8', string $type = Document::TYPE_HTML)
    {
        parent::__construct($string, true, $encoding, $type);
    }

}