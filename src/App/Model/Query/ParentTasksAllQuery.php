<?php

namespace App\Model\Query;

use App\Model\DTO\ParentTaskIdNameDTO;

class ParentTasksAllQuery
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return ParentTaskIdNameDTO[]|[]
     */
    public function fetchAll(): array
    {
        $tasks = [];
        $stmt = $this->pdo->prepare(
            "SELECT id, title FROM tasks WHERE parent_id IS NULL"
        );
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($res as $task) {
           $tasks[] = new ParentTaskIdNameDTO($task['id'], $task['title']);
        }
        return $tasks;
    }
}