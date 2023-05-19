<?php

class Database{

    public $prefix = DB_SETTINGS['db_prefix'];

   /*  private $dsn = 'mysql:host=localhost;dbname=simplecommerce';
    private $user_name = 'root';
    private $password = ''; */

    private $dsn        = 'mysql:host='.DB_SETTINGS['db_host'].';dbname='.DB_SETTINGS['db_name'];
    private $user_name  = DB_SETTINGS['db_username'];
    private $password   = DB_SETTINGS['db_password'];

    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
    );
    
    private $conn;

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO($this->dsn , $this->user_name , $this->password , $this->options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo 'Failed to connect to database : ' . $e->getMessage();
        }

        return $this->conn;
    }

}