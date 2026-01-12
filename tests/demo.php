<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\TaskService;
use App\Services\ProjectService;
use App\Repositories\{TeamRepository, TeamMemberRepository, TaskRepository, ProjectRepository};

echo "=== TASKFLOW PART 2: WORKING DEMO ===\n\n";

// Initialize services
$taskService = new TaskService();
$projectService = new ProjectService();

echo "1. Creating project...\n";
$projectId = $projectService->createProject('manager', [
    'n' => 'Mobile App',
    'd' => 'New mobile app',
    't' => 1,
    's' => 'active'
]);

echo "Project created with ID: $projectId\n";



echo "3. Creating Tasks...\n";
$taskId = $taskService->createTask([
    't' => 'Fix login bug',
    'd' => 'OAuth error',
    'type' => 'bug',
    'p' => $projectId,
    'r' => 3,
    'pri' => 'high',
    'due' => '2026-01-20',
    'estimated_hours' => 4
]);

echo "Task created with ID: $taskId\n";
echo "4. Assigning Tasks...\n";

$taskService->assignTask('manager', $taskId, 1);

echo "Task assigned successfully\n";

echo "\n=== DEMO COMPLETE ===\n";