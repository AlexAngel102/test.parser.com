<?php

namespace App\Classes;

class CitrusGoodsParser
{

    public function getData($query): array
    {
        $regexHTML = '/(.html)$/';

        foreach ($query as $item) {
            if (preg_match($regexHTML, $item)) {
                $result[] = "https://www.ctrs.com.ua" . $item . PHP_EOL;
                continue;
            }
            $result[] = $item . PHP_EOL;
        }
        return $result;
    }

}