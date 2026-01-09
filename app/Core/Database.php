<?php
declare(strict_types=1);

namespace App\Core;

class Database
{
    private static $instance = null;
    private $host = "localhost"; 
    private $dbname = "task_management"; 
    private $user = "root"; 
    private $pass = "";
    private $conn;
    
    private function __construct(){

        try{ 
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->$dbname};charset=utf8mb4",
        $this->user,
        $this->pass);
        $this->conn->setArribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);
    }catch(PDOException $e){
        echo"erreur" . $e->getMessage();
    }
}
    private function __clone();    
    private function __wakeup();    

    private function getInstance(){
        if(self::$instance==null){
           self::$instance = new Database();
        }
        return self::$instance;
    }
    private function getConnection(){
        return $this->conn;
    } 

}
