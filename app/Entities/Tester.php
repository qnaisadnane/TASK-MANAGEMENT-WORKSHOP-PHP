<?php

namespace App\Entities;

Class Tester extends TeamMember{

    public function canCreateProject():bool{
        return false;
    };

    public function canAssignTasks():bool{
        return false;
    };

    public function canRolePermissions():array{
        return['test_task','view_task'];
    };
    
}