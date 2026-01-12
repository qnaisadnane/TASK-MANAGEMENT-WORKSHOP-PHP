<?php

abstract Class Task implements Assignable , Commentable , Prioritizable{

    protected $id;
    protected $title;
    protected $description;
    protected $projectId;
    protected $assigneeId;
    protected $reporterId;
    protected $priority;
    protected $status;
    protected $comment;
    protected $estimatedHours;
    protected $actualHours;
    protected $dueDate;
    protected $createdAt;
    protected $updatedAt;

    public function __construct($id, $title, $description, $projectId, $assigneeId, 
    $reporterId, $priority, $status, $estimatedHours ,$actualHours ,$dueDate ,$createdAt, $updatedAt){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->assigneeId = $assigneeId;
        $this->reporterId = $reporterId;
        $this->priority = $priority;
        $this->status = $status;
        $this->estimatedHours = $estimatedHours;
        $this->actualHours = $actualHours;
        $this->dueDate = $dueDate;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
    
    abstract public function calculateComplexity():int;

    abstract public function getRequiredSkills():array;

    public function assignTo(int $userId):void{
        $this->assigneeId = $userId;
    };

    public function unassign():void{
        $this->assigneeId = null;
    };

    public function isAssigned():bool{
        return $this->assigneeId !== null;
    };

    public function hasComment():bool{

    };

    public function addComment(string $comment):void{

    };

    public function getComment():string;

    public function isPriority():bool;

    public function isPrioritizable():bool;

    public function setPriority(string $priority):void;

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getProjectId(){
        return $this->projectId;
    }
    public function getAssigneeId(){
        return $this->assigneeId;
    }
    public function getReporterId(){
        return $this->reporterId;
    }
    public function getPriority(){
        return $this->priority;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getEstimatedHours(){
        return $this->estimatedHours;
    }
    public function getActualHours(){
        return $this->actualHours;
    }
    public function getDueDate(){
        return $this->dueDate;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function getUpdatedAt(){
        return $this->updatedAt;
    }


}