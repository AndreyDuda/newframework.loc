<?php

namespace App\Model\Query;

use App\Model\DTO\TaskEditDTO;

class GetTaskByIdQuery
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function fetch(int $id): TaskEditDTO
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM tasks WHERE id=:id"
        );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $res = reset($res);

        $task = new TaskEditDTO(
            $res['id'],
            $res['title'],
            $res['content'],
            $res['date_finish'],
            $res['status'],
            $res['parent_id'],
        );

        return $task;
    }
}