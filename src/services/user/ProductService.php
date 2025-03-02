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
    public function getAllProducts()
    {
        return $this->productRepository->find("name,description,price,image");
    }
}