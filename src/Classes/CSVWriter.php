<?php

namespace App\Classes;

use App\Classes\DataSortHandler as Handler;

class CSVWriter
{
    public function writeToCSV(CitrusItem $object, string $fileName)
    {
        $handler = new Handler();
        $items = $object->getValues();
        $f = "$fileName.csv";
        $fp = fopen($f, 'w');
        foreach ($items as $item) {
            $data = $handler->sortData($item);
            $data = mb_convert_encoding($data, 'Windows-1251', 'UTF-8');
            fputcsv($fp, $data, ";","\"", "\n");
        }
        fclose($fp);
    }
}