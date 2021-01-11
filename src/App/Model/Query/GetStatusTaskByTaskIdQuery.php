<?php

namespace App\Model\Query;

use App\Model\DTO\StatusTaskPDO;

class GetStatusTaskByTaskIdQuery
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function fetch(int $id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT status FROM tasks WHERE id=:id"
        );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $res = reset($res);
        $status = new StatusTaskPDO($res['status']);

        return $status;
    }
}