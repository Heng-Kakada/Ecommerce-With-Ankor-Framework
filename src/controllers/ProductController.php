<?php
namespace src\controllers;

use AnkorFramework\Core\Http\BaseController;
use AnkorFramework\Core\Http\Response;
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
        $products = $this->productService->showAllProducts();

        Response::errors(errors: [])::view('customer/products/products.view', ["products" => $products]);
    }

    public function create()
    {
        Response::view('customer/products/create.view');
    }

    public function store()
    {
        $body = pk_request('body');

        $this->productService->createProduct(['body' => $body]);

        Response::redirect('/products');
    }

    public function show($id)
    {
        Response::view('customer/products/product.view', ['id' => $id]);
    }

}