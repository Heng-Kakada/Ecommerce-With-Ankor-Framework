<?php
namespace src\services\dashboard;

use AnkorFramework\App\Validate\Validator;

use src\repositories\dashboard\DashBoardUserRepository;
use AnkorFramework\App\Resources\FileUpload\FileUpload;

class DashBoardUserService
{
    private $userRepository;

    public function __construct(DashBoardUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUsers(): array
    {
        return $this->userRepository->find();
    }
    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }
    public function getLast()
    {
        return $this->userRepository->findLast();
    }
    public function createUser($data, $confirm_password): bool
    {
        $this->validateUser($data)->validatePassword($data['password'], $confirm_password);

        if (!empty($_FILES['image']['name'])) {
            $uploader = new FileUpload();
            $uploader->uploadFile($_FILES['image'], "User" . $this->userRepository->findLast()['max(id)'] + 1);
            $data['image'] = $uploader->getImageURL();
        }
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        return $this->userRepository->save($data);
    }
    public function updateUser($id, $data, $confirm_password): bool
    {
        $this->validateUser($data, $id);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $this->validatePassword($data['password'], $confirm_password);
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        if (!empty($_FILES['image']['name'])) {
            $uploader = new FileUpload();
            $uploader->uploadFile($_FILES['image'], $id);
            $data['image'] = $uploader->getImageURL();
        }

        return $this->userRepository->update($id, $data);
    }
    public function deleteUser($id): bool
    {
        return $this->userRepository->delete($id);
    }
    private function validateUser($data, $id = 0)
    {
        $rules = [
            'firstname' => 'string|max:50',
            'lastname' => 'string|max:55',
            'age' => 'integer',
            'gender' => 'string|max:10',
            'username' => "required|string|max:50",
            'email' => "required|max:255|email|unique:tbusers,email,{$id}", // unique:$tbname or unique:$tbname, $columnName to specific column to compare 
            'role_id' => 'required|integer',
            'role_name' => 'required|string',
        ];

        Validator::validate(
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'username' => $data['username'],
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'role_name' => $data['role_name'],
            ],
            $rules
        );
        return $this;
    }
    private function validatePassword($password, $confirm_password)
    {
        $rules = [
            'password' => 'required', // strong_password
            'confirm_password' => 'required|match:password',
        ];
        Validator::validate(
            [
                'password' => $password,
                'confirm_password' => $confirm_password,

            ],
            $rules
        );
    }

}