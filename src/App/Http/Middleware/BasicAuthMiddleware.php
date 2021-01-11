<?php

namespace App\Http\Middleware;

use Aura\Auth\AuthFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class BasicAuthMiddleware implements MiddlewareInterface
{
    public const ATTRIBUTE = '_user';

    private $users;
    private $responsePrototype;
    private $authFactory;

    public function __construct(array $users, ResponseInterface $responsePrototype)
    {
        $this->users = $users;
        $this->responsePrototype = $responsePrototype;
        $this->authFactory = new AuthFactory($_COOKIE);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        var_dump($_COOKIE["visit_count"]);
        die();
        $username = $request->getServerParams()['PHP_AUTH_USER'] ?? null;
        $password = $request->getServerParams()['PHP_AUTH_PW'] ?? null;

        if (!empty($username) && !empty($password)) {
            foreach ($this->users as $name => $pass) {
                if ($username === $name && $password === $pass) {
                    return $handler->handle($request->withAttribute(self::ATTRIBUTE, $name));
                }
            }
        }

        return $this->responsePrototype
            ->withStatus(401)
            ->withHeader('WWW-Authenticate', 'Basic realm=Restricted area');
    }
}
