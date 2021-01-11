<?php

namespace App\Model\Query;

use App\Model\DTO\StatusTaskPDO;
use App\Model\UseCase\StatusTask;

class CheckStatusChangeQuery
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function hasChildStatusNew($parentId)
    {
        $status = StatusTask::STATUS_NEW;
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(id) FROM tasks c
                    WHERE c.status=:status AND parent_id=:parentId"
        );
        $stmt->bindParam(':parentId', $parentId);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
}