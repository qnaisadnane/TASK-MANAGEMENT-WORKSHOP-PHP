<?php

abstract Class TeamMember{
    protected $id;
    protected $username;
    protected $email;
    protected $teamId;
    protected $createdAt;

    public function __construct($id, $username, $email, $teamId, $createdAt){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->teamId = $teamId;
        $this->createdAt = $createdAt;
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

    public function canCreateProject();

    public function canAssignTasks();

    public function canRolePermissions();

    public function verifyPassword();

    public function setPassword();

}