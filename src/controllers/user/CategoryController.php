<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use src\services\user\CategoryService;

class CategoryController extends BaseController
{
    public CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function show($slug)
    {
        $products = $this->categoryService->getProductByCategoryName($slug);
        Response::view("user/categories/categories.view", ['products' => $products]);
    }
}