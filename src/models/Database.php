<?php

namespace App\Models;

require_once 'config.php';
class Database extends \PDO
{
    protected static ?Database $instance = null;

    function __construct()
    {
        try {
            parent::__construct(DBTYPE.':host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASS);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Check credentials, something went wrong!" . $e->getMessage();
        }
    }


    protected static function serve(): Database
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    protected function disconnect(): void
    {
        self::$instance = null;
    }
}
