<?php
namespace src\controllers;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use src\services\ProductService;

class ProductController extends BaseController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getProducts();
        
        Response::view('dashboard/products/products.view');
    }

    public function create()
    {
        Response::view('dashboard/products/create.view');
    }

    public function update()
    {
        Response::view('dashboard/products/update.view');
    }
    public function store()
    {
        Response::view('dashboard/products/producttest.view');
        // Response::redirect('/products');
    }

    public function show($id)
    {
        Response::view('user/products/product.view', ['id' => $id]);
    }

}