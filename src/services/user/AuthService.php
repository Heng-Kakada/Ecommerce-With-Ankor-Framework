<?php
namespace src\services\user;

use AnkorFramework\App\Http\Security\HttpSession;
use AnkorFramework\App\Validate\Validator;
use src\repositories\user\AuthRepository;

class AuthService
{
    private AuthRepository $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function getUserById($id)
    {
        return $this->authRepository->findById($id);
    }
    public function login($email, $password)
    {
        Validator::validate(['email' => $email, 'password' => $password], [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = $this->authRepository->findByEmail($email);

        return $this->verifyUserAndPassword($user[0], $password);
    }
    public function register($username, $email, $password, $repassword)
    {
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
        $this->validateUser($data, $repassword);
        $data = $this->setUserData($username, $email, $password);
        return $this->authRepository->save($data);
    }
    private function setUserData($username, $email, $password)
    {
        return [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role_id' => 1,
            'role_name' => "customer"
        ];
    }
    private function validateUser($data, $confirm_password)
    {
        $rules = [
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:tbusers|max:255',
            'password' => 'required',
            'confirm_password' => 'required|match:password',
        ];
        $data['confirm_password'] = $confirm_password;
        Validator::validate($data, $rules);
    }
    private function verifyUserAndPassword($user, $password)
    {
        if ($user) {
            if (password_verify($password, $user['password'])) {
                HttpSession::create('user', [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role_name']
                ]);
                return true;
            }
        }
        return false;


    }
}