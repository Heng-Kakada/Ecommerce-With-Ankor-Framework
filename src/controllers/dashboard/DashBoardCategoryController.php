<?php
namespace src\controllers\dashboard;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Validate\ValidationException;
use Exception;
use src\services\dashboard\DashBoardCategoryService;

class DashBoardCategoryController extends BaseController
{
    private $categoryService;

    public function __construct(DashBoardCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategories();

        Response::view('dashboard/categories/categories.view', ['categories' => $categories]);
    }

    public function create()
    {
        Response::view('dashboard/categories/create.view');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        Response::view('dashboard/categories/update.view', ['category' => $category]);
    }

    public function store()
    {
        $name = pk_request('name');
        $description = pk_request('description');
        try {
            $this->queryResponse($this->categoryService->createCategory(['name' => $name, 'description' => $description]));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }

    public function update()
    {
        $id = pk_request('id');
        $name = pk_request('name');
        $description = pk_request('description');

        try {
            $this->queryResponse($isSuccess = $this->categoryService->updateCategory($id, ['name' => $name, 'description' => $description]));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }

    public function destroy()
    {
        $id = pk_request('id');
        try {
            $this->queryResponse($this->categoryService->deleteCategory($id));
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
        Response::redirect('/admin/categories');
    }
}