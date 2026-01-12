<?php

namespace app\Repositories;


 class TeamMemberRepository extends BaseRepository 
{
    private string $table = 'team_members';
    
    public function create(array $result){
        $stmt = $this->$db->prepare("INSERT INTO team_members(username, email, password_hash, role, team_id)VALUES(:username, :email, :password_hash , :role , :team_id)");
        $result = $stmt->execute([
            'username' => $data['username'],
            'email' => $data['email'],
            'password_hash' => $data['password_hash'],
            'role' => $data['role'],
            'team_id' => $data['team_id']
        ]);
        
    }

}
