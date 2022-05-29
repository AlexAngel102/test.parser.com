<?php

namespace App\Classes;

class DataSortHandler
{

    public function getData($query): array
    {
        foreach ($query as $item) {
            $result[] = $item;
        }
        return $result;
    }

}