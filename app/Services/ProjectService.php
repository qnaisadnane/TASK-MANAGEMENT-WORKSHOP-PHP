<?php
namespace App\Services;

use App\Repositories\ProjectRepository;
use Exception;

class ProjectService
{
    private ProjectRepository $repo;

    public function __construct()
    {
        $this->repo = new ProjectRepository();
    }

    public function createProject(string $role, array $data): int
    {
        if (!in_array($role, ['manager', 'admin'])) {
            throw new Exception("Permission denied");
        }
        return $this->repo->create($data);
    }

    public function archiveProject(int $projectId): void
    {
        if ($this->repo->hasActiveTasks($projectId)) {
            throw new Exception("Cannot archive project with active tasks");
        }
    }
}
