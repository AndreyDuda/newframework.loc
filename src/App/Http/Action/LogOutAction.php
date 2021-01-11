<?php

namespace App\Http\Action;

use App\Model\UseCase\Auth\AuthData;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

class LogOutAction implements RequestHandlerInterface
{
    private $authManager;

    public function __construct(AuthData $authManager)
    {
        $this->authManager = $authManager;

    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->authManager->logOut();

        return new RedirectResponse('/auth_signup');
    }
}