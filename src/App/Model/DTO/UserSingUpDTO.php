<?php

namespace App\Model\DTO;

class UserSingUpDTO
{
    public $email;
    public $passeordhash;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->passeordhash = md5($password);
    }
}