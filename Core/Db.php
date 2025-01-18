<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{
    private const DB_USER = 'sogo0002';
    private const DB_PASSWORD = '9v1M5H7JQL';
    private const DB_NAME = 'blog';
    private const DB_HOST = '10.56.8.65';
    private static $instance;


    public function __construct()
    {
        $dsn = 'mysql:dbname='.self::DB_NAME.';host='.self::DB_HOST;

        try{
            
            parent::__construct($dsn, self::DB_USER,self::DB_PASSWORD);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            die($e->getMessage()."Pas de connexion");
        }
    }

    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}