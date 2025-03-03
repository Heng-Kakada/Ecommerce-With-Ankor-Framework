<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use src\services\user\ProductService;

class ProductController extends BaseController
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getAllProducts();
        Response::view("/user/shop/shops.view", ["products" => $products]);
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        $related = $this->productService->getRelatedProducts($product['category_id']);
        Response::view('/user/products/product-detail.view', ['product' => $product, 'related' => $related]);
    }

}