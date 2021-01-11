<?php

namespace App\Http\Action\Task;

use App\Model\DTO\TaskDTO;
use App\Model\Query\ParentTasksAllQuery;
use App\Model\UseCase\TaskCreateChecker;
use App\Model\Repository\TaskRepository;
use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

class CreateAction implements RequestHandlerInterface
{
    private $taskRepository;
    private $template;
    private $taskQuery;
    private $checker;

    public function __construct(
        TaskRepository $taskRepository,
        TemplateRenderer $template,
        ParentTasksAllQuery $taskQuery,
        TaskCreateChecker $checker
    )
    {
        $this->taskRepository = $taskRepository;
        $this->template = $template;
        $this->taskQuery = $taskQuery;
        $this->checker = $checker;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $error = [];
        $task = [];
        if ($request->getMethod() == 'POST') {
            $task = $request->getParsedBody();
            $error = $this->checker->check($task);
            if (empty($error)) {
                $task = new TaskDTO($task['title'], $task['content'], $task['date_finish'], $task['parent_id']);
                $this->taskRepository->create($task);
                return new RedirectResponse('/task');
            }
        }
        $tasks = $this->taskQuery->fetchAll();
        return new HtmlResponse($this->template->render('app/task/create', [
            'task' => $task,
            'tasks' => $tasks,
            'errors' => $error
        ]));
    }
}