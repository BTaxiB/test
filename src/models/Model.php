<?php

namespace App\Models;

use App\Models\Config\Database;

class Model extends Database
{
    function __construct()
    {
        Database::serve();
    }

    /**
     * Get database instance.
     * 
     * @return Database
     */
    protected function getDB(): Database
    {
        return self::$instance;
    }

  
}
