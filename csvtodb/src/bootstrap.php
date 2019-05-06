<?php

namespace App;

use App\file\csvLoad;
use App\html\table;
use App\database\dbConnection;
use App\database;

class bootstrap
{
    public function __construct(){}

    public function csvdata($filePath){
        $data =  csvLoad::returnArray($filePath);
        $columns = $data[0];
        array_shift($data);
        $records = $this->array_to_records($data, $columns);
        print_r(table::generate_table($records,$columns));
    }

    public function array_to_records($data, $columns){
        $records = array();
        foreach ($data as $row){
            $i=0;
            $record = array();
            foreach ($columns as $key => $value){
                $record[$value]=$row[$i];
                $i++;
            }
            $records[] = $record;
        }
        return $records;
    }

    public function import($filepath){
        $data =  csvLoad::returnArray($filepath);
        database\dbHandler::create_table($data[0]);
        array_shift($data);
        database\dbHandler::insert_records($data);
        echo '<h4 class="alert alert-success text-center">Data Updated!</h4>';
    }

    public function display_table(){
        database\dbHandler::data_to_table();
    }
}