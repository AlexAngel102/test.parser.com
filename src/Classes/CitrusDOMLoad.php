<?php

namespace App\Classes;

use DOMDocument;
use DOMXPath;
use Exception;

class CitrusDOMLoad extends DOMDocument
{
    private $regex = '/^http(s?)\:\/\/("www.ctrs.com.ua")*(:(0-9)*)*(\/?)*([-.\w]*[0-9a-zA-Z])*(\/?)/';
    private string $url;

    public function __construct(string $url, string $version = '1.0', string $encoding = 'utf-8')
    {
        parent::__construct($version, $encoding);
        $this->setURL($url);
    }

    //'https://www.ctrs.com.ua/naushniki/'
    public function getPath(): DOMXPath
    {
        if (!preg_match($this->regex,$this->getUrl())) throw new Exception
            ("Link does't match. Must be like: 'https://www.ctrs.com.ua/{category}/'");
        else {
            $this->getURL();
            $doc = new DOMDocument();
            $doc->loadHTMLFile($this->url);
            $xpath = new DOMXPath($doc);
            return $xpath;
        }
    }
    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
           $this->url = $url;
    }

    public function getUrl():string
    {
        return $this->url;
    }

}