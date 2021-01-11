<?php

namespace App\Model\UseCase;

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

    public function change($parentId, $status)
    {
        if ($parentId && $status == StatusTask::STATUS_COMPLETE && !$this->statusTaskQuery->hasChildStatusNew($parentId)) {
            $this->taskRepository->changeParentStatusToComplete($parentId);
        }
    }
}