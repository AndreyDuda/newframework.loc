<?php

namespace App\Http\Middleware;

use App\Model\UseCase\Auth\AuthData;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

class BasicAuthMiddleware implements MiddlewareInterface
{
    public const ATTRIBUTE = '_user';

    private $users;
    private $responsePrototype;
    private $authManager;

    public function __construct(array $users, ResponseInterface $responsePrototype)
    {
        $this->users = $users;
        $this->responsePrototype = $responsePrototype;
        $this->authManager = new AuthData();
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($this->authManager->isAuth()) {
            return $handler->handle($request->withAttribute(self::ATTRIBUTE, 'guest'));
        }
        return new RedirectResponse('/auth_login');
    }
}
