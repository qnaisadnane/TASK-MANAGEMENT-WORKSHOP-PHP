<?php

Class Developer extends Task{

    public function __construct($$id, $title, $description, $projectId, $assigneeId, 
    $reporterId, $priority, $status, $estimatedHours ,$actualHours ,$dueDate ,$createdAt, $updatedAt){
        parent::__construct($id, $title, $description, $projectId, $assigneeId, 
    $reporterId, $priority, $status, $estimatedHours ,$actualHours ,$dueDate ,$createdAt, $updatedAt);
    }
    
}