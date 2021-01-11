<?php

namespace App\Model\DTO;

class StatusTaskPDO
{
    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }


}