<?php
namespace src\services\user;

use src\repositories\user\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        dd($this->productRepository->findById(1));
    }

}