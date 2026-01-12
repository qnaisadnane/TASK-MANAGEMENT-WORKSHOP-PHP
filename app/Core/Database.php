<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;


class Database
{
    private static ?Database $instance = null;
    private $host = "localhost"; 
    private $dbname = "task_management"; 
    private $user = "root"; 
    private $pass = "";
    private PDO $conn;
    
    private function __construct(){
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
            $this->user,
            $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "erreur" .$e->getMessage();
        }
    }
    private function __clone() {}    
    public function __wakeup() {}    

    public static function getInstance():Database{
        if(self::$instance===null){
        self::$instance = new Database();   
        }
            return self::$instance;
        
    }
    public function getConnection():PDO{
        return $this->conn;
    } 

}
