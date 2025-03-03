<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Http\Security\HttpSession;
use AnkorFramework\App\Validate\ValidationException;
use Exception;
use src\services\user\AuthService;

class AuthController extends BaseController
{
    private AuthService $authService;
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
    public function signup()
    {
        if (isset($_SESSION['user'])) {
            Response::redirect('/');
        }
        Response::view('user/register.view');
    }
    public function register()
    {
        $username = pk_request('username');
        $email = pk_request('email');
        $password = pk_request('password');
        $repassword = pk_request('re-password');
        try {
            if ($this->authService->register($username, $email, $password, $repassword)) {
                Response::redirect('/login');
            }
            Response::redirect('/');
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        } catch (Exception $e) {
            Response::errors($e->getMessage())::previousUrl();
        }
    }
    public function logout()
    {
        HttpSession::destroy();
        Response::redirect('/');
    }
    public function forgot()
    {
        if (isset($_SESSION['user'])) {
            Response::redirect('/');
        }
        Response::view('user/forgot.view');
    }
    public function profile($id)
    {
        $user = HttpSession::get('user');
        if ($id != (int) $user['id']) {
            Response::previousUrl();
        }
        $user = $this->authService->getUserById($id);
        Response::view('user/auth/profile.view', ['user' => $user]);
    }

    public function storeProfile()
    {

    }

}