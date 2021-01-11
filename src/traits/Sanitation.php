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
}
