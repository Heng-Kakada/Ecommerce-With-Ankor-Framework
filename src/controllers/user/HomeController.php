<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\Response;
use src\services\user\ProductService;
use src\services\user\CategoryService;
use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Security\HttpSession;

class HomeController extends BaseController
{
    private ProductService $productService;
    private CategoryService $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $products = $this->productService->getRandomProduct(8);
        $categoies = $this->categoryService->getAllCategoryName();
        HttpSession::create('nav-cat', $categoies);
        Response::view("user/home/home.view", ["products" => $products, "categories" => $categoies]);
    }
    public function about()
    {
        Response::view('user/about.view');
    }
    public function contact()
    {
        Response::view('user/contact.view');
    }
}