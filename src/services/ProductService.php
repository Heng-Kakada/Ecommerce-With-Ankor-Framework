<?php
namespace src\services;

use AnkorFramework\App\Validate\ValidationException;
use AnkorFramework\App\Validate\Validator;
use src\repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

}