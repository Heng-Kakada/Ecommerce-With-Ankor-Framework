<?php
namespace src\services;

use AnkorFramework\Core\Http\Security\HttpSession;
use AnkorFramework\Core\Validate\ValidationException;
use AnkorFramework\Core\Validate\Validator;
use src\repositories\AuthRepository;

class AuthService
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }


    public function login($email, $password)
    {
        Validator::validate(['email' => $email, 'password' => $password], [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $this->authRepository->findByEmail($email);

        return $this->verifyUserAndPassword($user, $password);
    }

    private function verifyUserAndPassword($user, $password)
    {
        if ($user) {
            if (password_verify($password, $user['password'])) {
                HttpSession::create('user', [
                    'email' => $user['email']
                ]);
                return true;
            }
        }
        return false;
    }

}