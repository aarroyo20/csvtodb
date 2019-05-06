<?php

namespace App\file;


class csvLoad
{
        public static function returnArray($filePath)
        {
            $file = fopen($filePath,"r");
            $records = array();

            while(! feof($file))
            {
                $records[] = fgetcsv($file);
            }

            fclose($file);
            return $records;
        }
}