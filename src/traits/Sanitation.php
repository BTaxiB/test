<?php

namespace App\Traits;

trait Sanitation
{

    function validInput(string $data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}
