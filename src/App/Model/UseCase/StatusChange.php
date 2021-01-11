<?php

namespace App\Model\UseCase;

use App\Model\DTO\TaskEditDTO;
use App\Model\Query\CheckStatusChangeQuery;
use App\Model\Repository\TaskRepository;

class StatusChange
{
    private $statusTaskQuery;
    private $taskRepository;

    public function __construct(CheckStatusChangeQuery $statusQuery, TaskRepository $taskRepository)
    {
        $this->statusTaskQuery = $statusQuery;
        $this->taskRepository = $taskRepository;
    }

    public function change(TaskEditDTO $task, $oldStatus)
    {
        if ($task->status == StatusTask::STATUS_COMPLETE && !$this->statusTaskQuery->hasChildStatusNew($task->parentId)) {
            $this->taskRepository->changeParentStatusToComplete($task->parentId);
        }
        if ($oldStatus != $task->status) {
            $this->taskRepository->changeStatusChild($task->id, $task->status);
        }
    }
}