<?php
namespace src\controllers;

use AnkorFramework\Core\Http\Response;
use AnkorFramework\Core\Validate\ValidationException;
use src\services\AuthService;


class AuthController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        if()



        Response::view("login.view");
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
        // Logout method code here
    }
}