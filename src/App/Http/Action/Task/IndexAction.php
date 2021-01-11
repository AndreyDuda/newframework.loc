<?php

namespace App\Http\Action\Task;

use App\Model\DTO\TaskDTO;
use App\Model\Query\AllTasksQuery;
use App\Model\Query\ParentTasksAllQuery;
use App\Model\Repository\TaskRepository;
use App\Model\UseCase\TaskCreateChecker;
use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

class IndexAction implements RequestHandlerInterface
{
    private $taskRepository;
    private $template;
    private $taskQuery;

    public function __construct(
        TaskRepository $taskRepository,
        TemplateRenderer $template,
        AllTasksQuery $taskQuery
    )
    {
        $this->taskRepository = $taskRepository;
        $this->template = $template;
        $this->taskQuery = $taskQuery;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tasks = $this->taskQuery->fetchAll();
        return new HtmlResponse($this->template->render('app/task/index', [
            'tasks' => $tasks
        ]));
    }
}