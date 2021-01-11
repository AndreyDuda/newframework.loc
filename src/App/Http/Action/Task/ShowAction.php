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

class ShowAction implements RequestHandlerInterface
{
    private $taskRepository;
    private $template;
    private $taskQuery;

    public function __construct(
        TaskRepository $taskRepository,
        TemplateRenderer $template,
        GetTaskByIdQuery $taskQuery
    )
    {
        $this->taskRepository = $taskRepository;
        $this->template = $template;
        $this->taskQuery = $taskQuery;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $task = $this->taskQuery->fetch($request->getAttribute('id'));
        $status = StatusTask::getTaskNameStatus($task->status);

        return new HtmlResponse($this->template->render('app/task/show', [
            'task' => $task,
            'status' => $status
        ]));
    }
}