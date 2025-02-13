<?php


namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{

    private static $instance;

    public function __construct()
    {
        $config = include('../Config/params.php'); // include the configuration file

        $dsn = 'mysql:dbname='.$config['DB_NAME'].';host='.$config['DB_HOST'];
        try{
            
            parent::__construct($dsn, $config['DB_USER'],$config['DB_PASSWORD']);
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