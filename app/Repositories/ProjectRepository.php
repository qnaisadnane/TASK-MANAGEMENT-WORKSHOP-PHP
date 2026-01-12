<?php
namespace App\Repositories;

class ProjectRepository extends BaseRepository
{
    protected string $table = 'projects';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("insert into projects (name, description, team_id, status) VALUES (:name, :description, :team_id, :status)");
        $stmt->execute($data);
        
    }

    public function hasActiveTasks(int $projectId): bool
    {
        $stmt = $this->db->prepare("select count(*) from tasks where project_id = :id and status!='done'");
        $stmt->execute(['id'=>$projectId]);
        return $stmt->fetchColumn() > 0;
    }
}
