<?php

namespace App\html;
use App\factory;


class table
{
    public static function table($rows) {
        return '<table class="table table-bordered table-striped">' . $rows . '</table>';
    }

    public static function th($headings) {
        return '<th>' . $headings . '</th>';
    }
    public static function tr($columns) {
        return '<tr>' . $columns . '</tr>';
    }
    public static function td($data) {
        return '<td>' . $data . '</td>';
    }

    public static function heading($columns){
        $row = '';
        foreach($columns as $key => $value){
            $th = self::th($value);
            $row.= $th;
        }
        return self::tr($row);
    }

    public static function row($record){
        $trdata = '';
        foreach($record as $key => $value){
            $td = self::td($value);
            $trdata.= $td;
        }
        return self::tr($trdata);
    }

    public static function generate_table($data, $columns){
        $tabledata = '';
        $tr = self::heading($columns);
        $tabledata .= $tr;
        foreach ($data as $row){
            $record = factory\recordFactory::create($row);
            $tr = self::row($record);
            $tabledata .= $tr;
        }
        return self::table($tabledata);
    }

}