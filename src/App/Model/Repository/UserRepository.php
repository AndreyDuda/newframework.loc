<?php

namespace App\Model\Repository;

use App\Model\DTO\UserSingUpDTO;

class UserRepository
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(UserSingUpDTO $user)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO users (password, email) 
                VALUES (:password, :email)'
        );
        $stmt->bindValue(':password', $user->passeordhash);
        $stmt->bindValue(':email', $user->email);
        $stmt->execute();
    }
}