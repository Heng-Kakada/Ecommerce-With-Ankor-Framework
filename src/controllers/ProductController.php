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
        Response::errors([])::view('user/products/products.view');
    }

    public function create()
    {
        Response::view('user/products/create.view');
    }

    public function store()
    {
        Response::redirect('/products');
    }

    public function show($id)
    {
        Response::view('user/products/product.view', ['id' => $id]);
    }

}