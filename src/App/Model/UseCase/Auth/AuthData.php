<?php

namespace App\Model\UseCase\Auth;

class AuthData
{
    private $isAuth;

    public function __construct()
    {
        $this->isAuth = (!empty($_SESSION['user']));
    }

    public function start()
    {
        session_start();
    }

    public function isAuth()
    {
        return $this->isAuth;
    }

    public function login($email)
    {
        $_SESSION['user']['email'] = $email;
    }

    public function logOut()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
}