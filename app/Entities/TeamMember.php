<?php

declare(strict_types=1);

namespace App\Entities;

abstract Class TeamMember{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $teamId;
    protected $createdAt;

    public function __construct($id, $username, $email, $password, $teamId, $createdAt){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->teamId = $teamId;
        $this->createdAt = date('Y-m-d');
    }

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTeamId(){
        return $this->teamId;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }

    abstract public function canCreateProject():bool;

    abstract public function canAssignTasks():bool;

    abstract public function canRolePermissions():array;

    
    public function verifyPassword(string $password):bool{
        return password_verify($password , $this->password)
    }
    public function setPassword():void{
        $this->password = password_hash($password , PASSWORD_DEFAULT);
    }

}