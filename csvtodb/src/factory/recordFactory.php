<?php

namespace App\factory;
use App\models\record;

class recordFactory
{
    public static function create($data) {
        return new record($data);
    }
}