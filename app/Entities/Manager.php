<?php

namespace App\Entities;

Class Manager extends TeamMember{    

    public function canCreateProject():bool{
        return true;
    };

    public function canAssignTasks():bool{
        return true;
    };

    public function canRolePermissions():array{
        return['create_project', 'assign_tasks'];
    };

}