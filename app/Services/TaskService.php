<?php
namespace App\Services;

use App\Repositories\TaskRepository;
use App\Core\Validator;
use Exception;

class TaskService
{
    private TaskRepository $repo;

    public function __construct()
    {
        $this->repo = new TaskRepository();
    }

    public function createTask(array $data): int
    {
        if (!Validator::validateTaskPriority($data['priority'])) {
            throw new Exception("Invalid priority");
        }

        if ($data['priority'] === 'critical' && empty($data['due_date'])) {
            throw new Exception("Critical task must have a due date");
        }

        if ($data['estimated_hours'] <= 0) {
            throw new Exception("Estimated hours must be positive");
        }

        return $this->repo->create($data);
    }

    public function assignTask(string $role, int $taskId, int $assigneeId): void
    {
        if ($role !== 'manager' && $role !== 'admin') {
            throw new Exception("Only managers can assign tasks");
        }
        $this->repo->assignTask($taskId, $assigneeId);
    }

    public function updateStatus(string $current, string $next): void
    {
        $valid = [
            'todo' => ['in_progress'],
            'in_progress' => ['in_review'],
            'in_review' => ['done']
        ];

        if (!in_array($next, $valid[$current] ?? [])) {
            throw new Exception("Invalid status transition");
        }
    }
}
