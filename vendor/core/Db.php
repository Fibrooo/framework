<?php

namespace vendor\core;

class Db
{ 
  
    protected $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';

        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass']);
    }

    public static function instance(){
        if(self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}
