<?php
namespace src\services\dashboard;

use AnkorFramework\App\Validate\Validator;

use src\repositories\dashboard\DashBoardUserRepository;

class DashBoardUserService
{
    private $userRepository;

    public function __construct(DashBoardUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getLastUserID()
    {
        return $this->userRepository->findLast();
    }
    public function getUsers(): array
    {
        return $this->userRepository->find();
    }
    public function getProductById($id)
    {
        return $this->userRepository->findById($id);
    }
    public function getLast()
    {
        return $this->userRepository->findLast();
    }
    public function createUser($data, $confirm_password): bool
    {
        $this->validateUser($data, $confirm_password);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->userRepository->save($data);
    }
    public function updateUser($id, $data, $confirm_password): bool
    {
        $this->validateUser($data, $confirm_password);
        return $this->userRepository->update($id, $data);
    }
    public function deleteCategory($id): bool
    {
        return $this->userRepository->delete($id);
    }
    private function validateUser($data, $confirm_password)
    {
        $rules = [
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:tbusers|max:255', // unique:$tbname or unique:$tbname, $columnName to specific column to compare
            'password' => 'required', // strong_password
            'confirm_password' => 'required|match:password',
            'role_id' => 'required|integer',
            'role_name' => 'required|string',
            'image' => 'string',
        ];


        Validator::validate(
            [
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'confirm_password' => $confirm_password,
                'role_id' => $data['role_id'],
                'role_name' => $data['role_name'],
                'image' => $data['image'],
            ],
            $rules
        );
    }

}