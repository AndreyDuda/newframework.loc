<?php

namespace App\Model\DTO;

use App\Model\UseCase\DateFormat;
use App\Model\UseCase\StatusTask;

class TaskEditDTO
{
    public $id;
    public $title;
    public $content;
    public $dateFinish;
    public $status;
    public $parentId;
    public $nameStatus;

    public function __construct(
        $id,
        $title,
        $content,
        $dateFinish,
        $status,
        $parent_id
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->dateFinish = (new \DateTimeImmutable($dateFinish))->format(DateFormat::FORMAT_DEFAULT);
        $this->status = $status;
        $this->parentId = $parent_id;
        $this->nameStatus = StatusTask::getTaskNameStatus($status);
    }
}