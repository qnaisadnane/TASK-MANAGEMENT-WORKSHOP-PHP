<?php
namespace App\Repositories;

use PDO;

class TaskRepository extends BaseRepository
{
    protected string $table = 'tasks';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("insert into tasks (title, description, task_type, project_id, reporter_id, priority, due_date)values (:t, :d, :type, :p, :r, :pri, :due)"
        );
        $stmt->execute($data);
        
    }

    public function findByAssignee(int $assigneeId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE assignee_id = :id");
        $stmt->execute(['id' => $assigneeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByProject(int $projectId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE project_id = :id");
        $stmt->execute(['id' => $projectId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByStatus(string $status): array
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE status = :s");
        $stmt->execute(['s' => $status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function assignTask(int $taskId, int $assigneeId): bool
    {
        $stmt = $this->db->prepare("UPDATE tasks SET assignee_id = :a WHERE id = :t");
        return $stmt->execute([
            'a' => $assigneeId,
            't' => $taskId
        ]);
    }
}
