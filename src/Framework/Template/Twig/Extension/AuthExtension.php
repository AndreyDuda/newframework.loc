<?php

namespace Framework\Template\Twig\Extension;

use App\Model\UseCase\Auth\AuthData;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AuthExtension extends AbstractExtension
{
    private $authData;

    public function __construct(AuthData $authData)
    {
        $this->authData = $authData;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('auth', [$this, 'isAuth']),
        ];
    }

    public function isAuth(): bool
    {
        return $this->authData->isAuth();
    }
}