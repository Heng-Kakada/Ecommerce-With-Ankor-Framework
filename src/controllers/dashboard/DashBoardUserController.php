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
        $product = $this->userService->getProductById($id);

        Response::view('dashboard/users/update.view', ['products' => $product]);
    }
    public function create()
    {
        $roles = $this->roleService->getRoleCBO();
        Response::view('dashboard/users/create.view', ['roles' => $roles]);
    }

    public function update()
    {
        $role = explode("_", pk_request('role'));

        $username = pk_request('username');
        $email = pk_request('email');
        $password = pk_request('password');
        $confirm_password = pk_request('confirm_password');
        $role_id = (int) $role[0];
        $role_name = $role[1];

        try {
            $this->queryResponse($this->userService->updateUser(pk_request('id'), [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id,
                'role_name' => $role_name,
            ], $confirm_password));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }

    }
    public function store()
    {

        $uploader = new FileUpload();
        $uploader->uploadFile($_FILES['image'], "User" . $this->userService->getLast()['max(id)'] + 1);

        $role = explode("_", pk_request('role'));

        $username = pk_request('username');
        $email = pk_request('email');
        $password = pk_request('password');
        $confirm_password = pk_request('confirm_password');
        $role_id = (int) $role[0];
        $role_name = $role[1];
        $image = $uploader->getImageURL();

        try {
            $this->queryResponse($this->userService->createUser([
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id,
                'role_name' => $role_name,
                'image' => $image,
            ], $confirm_password));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }
    public function destroy()
    {
        $id = pk_request('id');
        try {
            $this->queryResponse($this->userService->deleteCategory($id));
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
}