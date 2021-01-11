<?php


namespace App\Http\Action;


use App\Http\Middleware\BasicAuthMiddleware;
use App\Model\DTO\UserSingUpDTO;
use App\Model\Repository\UserRepository;
use App\Model\UseCase\Auth\AuthData;
use App\Model\UseCase\UserRegisterChecker;
use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

class SignupAction  implements RequestHandlerInterface
{
    private $template;
    private $checker;
    private $userRepository;
    private $authManager;

    public function __construct(
        TemplateRenderer $template,
        UserRegisterChecker $checker,
        UserRepository $rep,
        AuthData $authManager
    )
    {
        $this->template = $template;
        $this->checker = $checker;
        $this->userRepository = $rep;
        $this->authManager = $authManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $errors = [];
        if ($request->getMethod() == 'POST') {
            $user = $request->getParsedBody();
            $userDto = new UserSingUpDTO($user['email'], $user['password']);
            $errors = $this->checker->check($user);
            if (empty($errors)) {
                $this->userRepository->save($userDto);
                $this->authManager->login($user['email']);
                return new RedirectResponse('/task');
            }
        }

        $username = $request->getAttribute(BasicAuthMiddleware::ATTRIBUTE);
        return new HtmlResponse($this->template->render('app/auth/signup', [
            'name' => $username,
            'errors' => $errors
        ]));
    }
}