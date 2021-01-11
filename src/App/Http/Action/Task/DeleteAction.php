<?php

namespace App\Http\Action\Task;

use App\Model\Repository\TaskRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

class DeleteAction  implements RequestHandlerInterface
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $param = $request->getParsedBody();
        $this->taskRepository->delete($param['id']);

        return new RedirectResponse('/task');
    }
}