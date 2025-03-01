<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Http\Security\HttpSession;
use AnkorFramework\App\Validate\ValidationException;
use src\services\user\AuthService;

class AuthController extends BaseController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            Response::redirect('/');
        }
        Response::view("user/login.view");
    }

    public function store()
    {
        $email = pk_request('email');
        $password = pk_request('password');
        try {
            if ($this->authService->login($email, $password)) {
                Response::redirect('/');
            }
            Response::redirect('/login');
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }

    public function register()
    {
        // Register method code here
    }

    public function logout()
    {
        HttpSession::destroy();
        Response::redirect('/');
    }
}