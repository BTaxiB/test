<?php

namespace App\Traits;

trait Sanitation
{

    static function validInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    static function match($value, $value1)
    {
        return ($value === $value1) ? true : false;
    }
}
