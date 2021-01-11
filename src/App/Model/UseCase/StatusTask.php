<?php

namespace App\Model\UseCase;

use App\Model\Repository\TaskRepository;
use phpDocumentor\Reflection\Types\Self_;
use spec\Prophecy\Argument\Token\StringContainsTokenSpec;

class StatusTask
{
    const STATUS_NEW = 0;
    const STATUS_COMPLETE = 1;

    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public static function getTaskStatusesNumber()
    {
        return [
            self::STATUS_NEW,
            self::STATUS_COMPLETE
        ];
    }

    public static function getTaskNameStatus($status)
    {
        $nameStatus = self::getAllTaskStatuses();
        $name = (isset($nameStatus[$status]))? $nameStatus[$status] : 'error';
        return $name;
    }

    public static function getAllTaskStatuses()
    {
        return [
            self::STATUS_NEW => 'new',
            self::STATUS_COMPLETE => 'complete'
        ];
    }

    public function changeStatusTaskToComplete()
    {

    }
}