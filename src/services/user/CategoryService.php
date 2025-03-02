<?php
namespace src\services\user;

use src\repositories\user\CategoryRepository;
use src\repositories\user\ProductRepository;

class CategoryService
{
    public CategoryRepository $categoryRepository;
    public ProductRepository $productRepository;
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function getProductByCategoryName($categoryName)
    {
        return $this->productRepository->find("", "category_name = '$categoryName'");
    }
}