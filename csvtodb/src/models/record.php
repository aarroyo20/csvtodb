<?php

namespace App\models;


class record
{
    public function __construct($data)
    {
        foreach ($data as $key => $value) {

            $this->{$key} = $value;

        }
    }
}