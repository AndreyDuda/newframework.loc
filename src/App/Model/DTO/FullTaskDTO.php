<?php

namespace App\Model\DTO;

use App\Model\UseCase\DateFormat;
use App\Model\UseCase\StatusTask;

class FullTaskDTO
{
    public $id;
    public $title;
    public $content;
    public $dateFinish;
    public $status;
    public $parent_id;
    public $parentTitle;
    public $nameStatus;

    public function __construct($id, $title, $content, $dateFinish, $status, $parent_id, $parentTitle)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->dateFinish = (new \DateTimeImmutable($dateFinish))->format(DateFormat::FORMAT_DEFAULT);
        $this->status = $status;
        $this->parent_id = $parent_id;
        $this->parentTitle = $parentTitle;
        $this->nameStatus = StatusTask::getTaskNameStatus($status);
    }
}