<?php
namespace src\services;

use AnkorFramework\App\Http\Security\HttpSession;
use AnkorFramework\App\Validate\ValidationException;
use AnkorFramework\App\Validate\Validator;
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

        $user = $this->authRepository->findEmailPasswordRoleByEmail($email);

        return $this->verifyUserAndPassword($user, $password);
    }

    private function verifyUserAndPassword($user, $password)
    {
        if ($user) {
            if (password_verify($password, $user['password'])) {
                HttpSession::create('user', [
                    'email' => $user['email'],
                    'role' => $user['role']
                ]);
                return true;
            }
        }
        return false;
    }

}