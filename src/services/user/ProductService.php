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
        return $this->productRepository->find("id,name,description,price,image,category_name");
    }
    public function getRandomProduct(int $limit = 4)
    {
        return $this->productRepository->find('id,name,price,image,category_name', '', "order by rand() limit $limit");
    }
    public function getProductById(int $id)
    {
        return $this->productRepository->findById($id);
    }
    public function getRelatedProducts(int $category_id, int $limit = 4)
    {
        return $this->productRepository->find('id,name,price,image,category_name', "category_id = $category_id", "order by rand() limit $limit");
    }

}