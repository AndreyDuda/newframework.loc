<?php

namespace App\Model\Repository;

class UserRepository
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save($userData)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO users (username, password, email) 
                VALUES (:username, :password, :email)'
        );

        $stmt->bindValue(':username', $userData['username']);
        $stmt->bindValue(':password', $userData['password']);
        $stmt->bindValue(':email', $userData['email']);
        $stmt->execute();
    }
}