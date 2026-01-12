<?php

namespace app\Repositories;


 class TeamRepository extends BaseRepository 
{
    private string $table = 'team';
    
    public function create(string $name,string $description){
        $stmt = $this->$db->prepare("INSERT INTO Team(name,description)VALUES(:name, :description)");
        $result = $stmt->execute([
            'name'=>$name,
            'description'=>$description
        ]);
        
    }

}
