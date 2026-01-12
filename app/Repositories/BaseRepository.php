<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

abstract Class BaseRepository{
    protected PDO $db;
    protected string $table;


    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function find(int $id):?array{
     $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
     $stmt->execute(['id'=>$id]);
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
     
     return $result ?:null;
    }

    public function findAll():?array{
     return $this->db->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_ASSOC);
      
    }

    public function delete(int $id):bool{
     $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
     return $stmt->execute(['id'=>$id]);
     
    }
}
