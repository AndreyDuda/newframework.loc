<?php

namespace App\Http\Action\Task;

use App\Model\DTO\TaskEditDTO;
use App\Model\Query\GetTaskByIdQuery;
use App\Model\Repository\TaskRepository;
use App\Model\UseCase\StatusChange;
use App\Model\UseCase\StatusTask;
use App\Model\UseCase\TaskCreateChecker;
use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

class EditAction implements RequestHandlerInterface
{
    private $taskRepository;
    private $template;
    private $taskQuery;
    private $checker;
    private $statusChange;

    public function __construct(
        TaskRepository $taskRepository,
        TemplateRenderer $template,
        GetTaskByIdQuery $taskQuery,
        TaskCreateChecker $checker,
        StatusChange $statusChange
    )
    {
        $this->taskRepository = $taskRepository;
        $this->template = $template;
        $this->taskQuery = $taskQuery;
        $this->checker = $checker;
        $this->statusChange = $statusChange;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $error = [];
        if ($request->getMethod() == 'POST') {
            $task = $request->getParsedBody();
            $error = $this->checker->check($task);
            if (empty($error)) {
                $updateTask = new TaskEditDTO(
                    $task['id'],
                    $task['title'],
                    $task['content'],
                    $task['date_finish'],
                    $task['status'],
                    $task['parent_id']
                );
                $this->taskRepository->update($updateTask);
                $this->statusChange->change($updateTask, $task['old_status']);
                return new RedirectResponse('/task/show/' . $updateTask->id);
            }
        }
        $task = $this->taskQuery->fetch($request->getAttribute('id'));
        $statuses = StatusTask::getAllTaskStatuses();
        unset($statuses[$task->status]);

        return new HtmlResponse($this->template->render('app/task/edit', [
            'task' => $task,
            'statuses' => $statuses,
            'errors' => $error
        ]));
    }
}