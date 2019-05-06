<?php

namespace App\database;

use mysqli;

class dbConnection
{
    protected static $instance;

    protected function __construct() {}

    public static function getInstance() {
        if(empty(self::$instance)) {
                $servername = "localhost";
                $username = "ara55@njit.edu";
                $password = "Cookies1";
                $database = "csvtodb";
                self::$instance = new mysqli($servername, $username, $password, $database);
                if (self::$instance->connect_error) {
                    die("Connection failed: " . self::$instance->connect_error);
                }
        }
        return self::$instance;
    }
}