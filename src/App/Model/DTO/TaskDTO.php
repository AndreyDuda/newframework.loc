<?php

namespace App\Model\DTO;

use App\Model\UseCase\DateFormat;

class TaskDTO
{
    /** @var string */
    public $title;
    /** @var string */
    public $content;
    /** @var string */
    public $dateFinish;

    public function __construct(string $title, string $content, string $dateFinish)
    {
        $this->title = $title;
        $this->content = $content;
        $this->dateFinish = (new \DateTimeImmutable($dateFinish))->format(DateFormat::FORMAT_DEFAULT);
    }


}