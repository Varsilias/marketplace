<?php

namespace App\config;

use PDO;

class DB extends PDO
{
    private $DBNAME = 'marketplace';
    private $DBHOST = 'localhost';
    private $DBUSERNAME = 'root';
    private $DBPASSWORD = '';
    private $driver = 'mysql';
    private static $instance = null;


    public function __construct()
    {
        parent::__construct($this->dsn(), $this->getDbUsername(), $this->getDbPassword(), array(
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ));


        //  try {

        //     $pdo = new \PDO($this->dsn(), $this->getDbUsername(), $this->getDbPassword(), array(
        //         \PDO::ATTR_PERSISTENT => true,
        //         \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        //         \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        //     ));

        // } catch (\PDOException $e) {
        //     echo "{$this->connectionErrorMessage()} {$e->getMessage()}";
        // }

        
        // if($pdo) {
        //     echo $this->connectionSuccessMessage();
        // }

        // return $pdo;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }

        return self::$instance;

    }

    public function dsn() 
    {
        $dsn = "$this->driver:host={$this->DBHOST};dbname={$this->DBNAME};charset=UTF8";
        return $dsn;
    }

    public function getDbUsername()
    {
        return $this->DBUSERNAME;
    }

    public function getDbPassword()
    {
        return $this->DBPASSWORD;
    }

    public function connectionSuccessMessage()
    {
        return "Connection to $this->DBNAME database successful";
    }

    public function connectionErrorMessage() 
    {
        return 'An error occurred while connecting to the database';
    }

}