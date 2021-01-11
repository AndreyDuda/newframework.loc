<?php

namespace App\Model\DTO;

use App\Model\UseCase\DateFormat;
use App\Model\UseCase\StatusTask;

class TaskDTO
{
    /** @var string */
    public $title;
    /** @var string */
    public $content;
    /** @var string */
    public $dateFinish;
    /** @var int */
    public $parentId;

    public function __construct(string $title, string $content, string $dateFinish, $parentId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->dateFinish = (new \DateTimeImmutable($dateFinish))->format(DateFormat::FORMAT_DATETIME);
        $this->parentId = ($parentId) ? $parentId : null;
    }


}