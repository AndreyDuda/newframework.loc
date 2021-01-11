<?php

namespace App\Model\Query;

use App\Model\DTO\FullTaskDTO;

class AllTasksQuery
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
            "SELECT c.id, c.title, c.content, c.status, c.parent_id, p.title as parent_title, c.date_finish 
                    FROM tasks c
                    LEFT JOIN tasks p ON (c.parent_id=p.id)
                    ORDER BY p.date_finish ASC
                "
        );
        $stmt->execute();

        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($res as $task) {
            $tasks[] = new FullTaskDTO(
                $task['id'],
                $task['title'],
                $task['content'],
                $task['date_finish'],
                $task['status'],
                $task['parent_id'],
                $task['parent_title']
            );
        }
        return $tasks;
    }
}