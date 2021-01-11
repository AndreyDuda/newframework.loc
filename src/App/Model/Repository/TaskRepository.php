<?php

namespace App\Model\Repository;

use App\Model\DTO\TaskDTO;
use App\Model\DTO\TaskEditDTO;
use App\Model\Query\GetStatusTaskByTaskIdQuery;
use App\Model\UseCase\StatusTask;

class TaskRepository
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(TaskDTO $task)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO `tasks` (title, content, date_finish, parent_id) VALUES (:title, :content, :date_finish, :parent_id)'
        );

        $stmt->bindParam(':title', $task->title);
        $stmt->bindParam(':content', $task->content);
        $stmt->bindParam(':date_finish', $task->dateFinish);
        $stmt->bindParam(':parent_id', $task->parentId);
        $stmt->execute();
    }

    public function update(TaskEditDTO $task)
    {
        $stmt = $this->pdo->prepare(
            'UPDATE tasks 
            SET title=:title,
                content=:content,
                date_finish=:date_finish,
                status=:status
            WHERE id=:id');
        $stmt->bindParam(':title', $task->title, \PDO::PARAM_STR);
        $stmt->bindParam(':content', $task->content, \PDO::PARAM_STR);
        $stmt->bindParam(':date_finish', $task->dateFinish);
        $stmt->bindParam(':status', $task->status,\PDO::PARAM_INT);
        $stmt->bindParam(':id', $task->id,\PDO::PARAM_INT);
        $stmt->execute();
    }

    public function changeParentStatusToComplete($id)
    {
        $status = StatusTask::STATUS_COMPLETE;
        $stmt = $this->pdo->prepare(
            'UPDATE tasks 
            SET status=:status
            WHERE id=:id');
        $stmt->bindParam(':id', $id,\PDO::PARAM_INT);
        $stmt->bindParam(':status', $status,\PDO::PARAM_INT);
        $stmt->execute();
    }

    public function changeStatusChild($id, $status)
    {
        $stmt = $this->pdo->prepare(
            'UPDATE tasks 
            SET status=:status
            WHERE parent_id=:id');
        $stmt->bindParam(':id', $id,\PDO::PARAM_INT);
        $stmt->bindParam(':status', $status,\PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id=:id");
        $stmt->bindParam(':id', $id,\PDO::PARAM_INT);
        $stmt->execute();
    }
}