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


    public function hasChildStatusNew(int $taskId)
    {
        $status = StatusTask::STATUS_NEW;
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(id) FROM tasks p
                    LEFT JOIN tasks c ON (c.parent_id=p.id)
                    WHERE c.status=:status AND p.id=:id"
        );
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
}