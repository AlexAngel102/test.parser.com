<?php

namespace App\Classes;

class DataSortHandler
{

    public function sortData($query): array
    {
        foreach ($query as $item) {
            $result[] = $item;
        }
        return $result;
    }

}