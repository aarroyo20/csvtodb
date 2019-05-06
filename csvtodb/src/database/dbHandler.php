<?php

namespace App\database;

use App\html\table;


class dbHandler
{
    public static function build_query($array)
    {
        $query = "create table csvdata(";
        for($i=0; $i<count($array); $i++) {
            if($i==0){
                $query .= "{$array[$i]} varchar(50)";
            }else{
                $query .= ", {$array[$i]} varchar(50)";
            }
        }
        $query .= ")";
        return $query;
    }

    public static function create_table($columns){
        $conn = dbConnection::getInstance();
        $query_check='SELECT 1 FROM csvdata';
        $result_check = $conn->query($query_check);
        if ($result_check !== FALSE){}
        else
        {
            $create_query = self::build_query($columns);
            $conn->query($create_query);
        }
    }

    public static function insert_records($data)
    {
        foreach ($data as $row){
            try{
                self::insert_rows($row);
            }catch(Exception $e) {
                echo '<h4 class="alert alert-danger text-center">\'Error: '.$e->getMessage().'</h4>';
            }
        }
    }

    public static function insert_rows($array)
    {
        $conn = dbConnection::getInstance();
        $query = "INSERT INTO csvdata VALUES (";
        for($i=0; $i<count($array); $i++){
            if(count($array[$i])>50){
                throw new Exception("Field length is too big to store data.");
            }
            if($i==0){
                $query .= "'".mysqli_escape_string($conn,$array[$i])."'";
            }else{
                $query .= ", '".mysqli_escape_string($conn,$array[$i])."'";
            }
        }
        $query .= ")";
        $conn->query($query);
    }

    public static function data_to_table(){
        $conn = dbConnection::getInstance();
        $result_set = $conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'csvtodb' AND TABLE_NAME = 'csvdata'");
        $result = array();
        while($column = $result_set->fetch_assoc()){
            $result[] = $column;
        }
        $columnArr = array_column($result, 'COLUMN_NAME');

        $data = $conn->query('SELECT * FROM csvdata');
        if($data->num_rows>0){
            print_r(table::generate_table($data, $columnArr));
        }else{
        }
    }

}