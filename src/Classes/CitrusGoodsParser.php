<?php

namespace App\Classes;

use DOMNodeList;

class CitrusGoodsParser
{

    public function getData(DOMNodeList $query, string $type): array
    {
        $regex = '/(.html)$/';
        $i = 0;
        var_dump($query);

        foreach ($query as $item) {
//            echo $item->nodeValue;
            if (!isset($item)) {
                $result["$type$i"] = "0" . PHP_EOL;
            }
            if (preg_match($regex, $item->nodeValue)) {
                $result["$type$i"] = htmlspecialchars("https://www.ctrs.com.ua" . $item->nodeValue . PHP_EOL);
                $i++;
                continue;
            }
            $result["$type$i"] = htmlspecialchars($item->nodeValue . PHP_EOL);
            $i++;
        }
        return $result;
    }

}