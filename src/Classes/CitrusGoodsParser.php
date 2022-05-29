<?php

namespace App\Classes;

class CitrusGoodsParser
{

    public function getData($query): array
    {
        foreach ($query as $item) {
            $result[] = $item;
        }
        return $result;
    }

}