<?php
namespace src\controllers\dashboard;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Validate\ValidationException;
use AnkorFramework\App\Resources\FileUpload\FileUpload;
use src\services\dashboard\DashBoardRoleService;
use src\services\dashboard\DashBoardUserService;

class DashBoardUserController extends BaseController
{
    private $userService;
    private $roleService;

    public function __construct(DashBoardUserService $userService, DashBoardRoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $users = $this->userService->getUsers();
        Response::view('dashboard/users/users.view', ['users' => $users]);
    }
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->roleService->getRoleCBO();
        Response::view('dashboard/users/update.view', ['users' => $user, 'roles' => $roles]);
    }
    public function create()
    {
        $roles = $this->roleService->getRoleCBO();
        Response::view('dashboard/users/create.view', ['roles' => $roles]);
    }

    public function update()
    {

        $password = "";
        if (!empty(pk_request('new_password'))) {
            $password = pk_request('new_password');
        }
        $confirm_password = pk_request('confirm_password');


        $role = explode("_", pk_request('role'));
        $role_id = (int) $role[0];
        $role_name = $role[1];

        $data = $this->getUserPostData();
        $data += [
            'password' => $password,
            'role_id' => $role_id,
            'role_name' => $role_name,
        ];



        try {
            $this->queryResponse($this->userService->updateUser(pk_request('id'), $data, $confirm_password));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }

    }
    public function store()
    {
        $role = explode("_", pk_request('role'));
        $role_id = (int) $role[0];
        $role_name = $role[1];

        $password = pk_request('password');
        $confirm_password = pk_request('confirm_password');

        $data = $this->getUserPostData();
        $data += [
            'password' => $password,
            'role_id' => $role_id,
            'role_name' => $role_name,
        ];

        try {
            $this->queryResponse($this->userService->createUser(
                $data
                ,
                $confirm_password
            ));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }
    public function destroy()
    {
        $id = pk_request('id');
        try {
            $this->queryResponse($this->userService->deleteUser($id));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }
    public function show($id)
    {
        Response::view('user/products/product.view', ['id' => $id]);
    }

    private function queryResponse($condition)
    {
        if (!$condition) {
            Response::previousUrl();
        }
        Response::redirect('/admin/users');
    }
    private function getUserPostData()
    {
        return [
            'firstname' => pk_request('firstname'),
            'lastname' => pk_request('lastname'),
            'gender' => pk_request('gender'),
            'age' => (int)pk_request('age'),
            'username' => pk_request('username'),
            'email' => pk_request('email'),
        ];

    }
}