<?php
namespace src\controllers;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Validate\ValidationException;
use src\services\CategoryService;

class CategoryController extends BaseController
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategories();

        Response::view('dashboard/categories/categories.view', ['categories'=> $categories]);
    }

    public function create()
    {
        Response::view('dashboard/categories/create.view');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        Response::view('dashboard/categories/update.view', ['category'=> $category]);
    }
    public function store()
    {
        $name = pk_request('name');
        $description = pk_request('description');
        try {
            if ($this->categoryService->createCategory(['name' => $name, 'description' => $description])) {
                Response::redirect('/admin/categories');
            }
            // Response::redirect('/admin/categories/create');
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
            if ($this->categoryService->updateCategory($id, ['name' => $name, 'description' => $description])) {
                Response::redirect('/admin/categories');
            }
            // Response::redirect('/admin/categories/create');
        } catch (ValidationException $validationException) {
            
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }

    }
    public function destroy($id)
    {
        if ($this->categoryService->deleteCategory($id)) {
            Response::redirect('/admin/categories');
        }
    }
    public function show($id)
    {
        Response::view('user/products/product.view', ['id' => $id]);
    }

}