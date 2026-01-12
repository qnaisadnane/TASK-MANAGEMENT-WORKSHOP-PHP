<?php

namespace App\Entities;

Class Administrator extends TeamMember{

    public function canCreateProject():bool{
        return true;
    };

    public function canAssignTasks():bool{
        return true;
    };

    public function canRolePermissions():array{
        return['manage_teams', 'manage_users'];
    };
    
}