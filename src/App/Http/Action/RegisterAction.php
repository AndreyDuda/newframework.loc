<?php


namespace App\Http\Action;

use App\Http\Middleware\BasicAuthMiddleware;
use App\Model\DTO\TaskDTO;
use App\Model\Repository\UserRepository;
use App\Model\UseCase\UserRegisterChecker;
use Framework\Template\TemplateRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

class RegisterAction implements RequestHandlerInterface
{
    private $template;
    private $checker;
    private $userRepository;

    public function __construct(TemplateRenderer $template, UserRegisterChecker $checker, UserRepository $rep)
    {
        $this->template = $template;
        $this->checker = $checker;
        $this->userRepository = $rep;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $errors = [];
        if ($request->getMethod() == 'POST') {
            $user = $request->getParsedBody();
            /*var_dump($user);*/
            $errors = $this->checker->check($user);
            if (empty($errors)) {
                $this->userRepository->save($user);
                return new RedirectResponse('/task');
            }
        }

        $username = $request->getAttribute(BasicAuthMiddleware::ATTRIBUTE);

        return new HtmlResponse($this->template->render('app/register', [
            'name' => $username,
            'errors' => $errors
        ]));
    }
}