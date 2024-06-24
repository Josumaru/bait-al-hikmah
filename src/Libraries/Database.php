<?php

namespace Libraries;

use PDO;

class Database
{
    private static $instance = NULL;
    public function __construct()
    {
    }
    public function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $host = "127.0.0.1";
            $dbname = "db_baitalhikmah";
            $username = "root";
            $password = "";
            $dsn = "mysql:host=$host;dbname=$dbname";
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO(dsn: $dsn, username: $username, password: $password, options: $options);
        }
        return self::$instance;
    }
}
