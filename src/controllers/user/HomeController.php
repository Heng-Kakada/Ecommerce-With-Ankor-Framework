<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use src\services\user\ProductService;

class HomeController extends BaseController
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getRandomProduct(8);
        Response::view("user/home/home.view", ["products" => $products]);
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