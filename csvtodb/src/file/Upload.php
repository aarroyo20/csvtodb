<?php

namespace App\file;
use App;


class Upload{
    private static $csv_mimetypes = array(
        'text/csv',
        'text/plain',
        'application/csv',
        'text/comma-separated-values',
        'application/excel',
        'application/vnd.ms-excel',
        'application/vnd.msexcel',
        'text/anytext',
        'application/octet-stream',
        'application/txt',
    );

    public static function upload_file($file){
        if (in_array($file['type'], self::$csv_mimetypes)) {
            $target_dir = "../data/";
            $target_file = $target_dir . 'deniro.csv';
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo '<h4 class="alert alert-success text-center headin">The file ' . basename($file["name"]) . ' has been uploaded.</h4>';
                echo '<h4 class="alert alert-success text-center">CSV Data</h4>';
                $object = new App\bootstrap();
                $object->csvdata('../data/deniro.csv');
            } else {
                echo '<h4 class="alert alert-danger text-center headin">Sorry, there was an error uploading your file.';
            }
        }else{
            echo '<h4 class="alert alert-danger text-center headin">Please upload a csv file</h4>';
        }
    }
}
