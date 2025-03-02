<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use src\repositories\user\ProductRepository;
use src\services\user\ProductService;

class HomeController extends BaseController
{
    public ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        Response::view("user/home.view");
    }
    public function about()
    {
        Response::view('user/about.view');
    }
    public function contact()
    {
        Response::view('user/contact.view');
    }
    public function test()
    {
        $this->productService->getProducts();
    }
}