<?php

namespace App\Model\DTO;

class ParentTaskIdNameDTO
{
    public $id;

    public $title;

    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}