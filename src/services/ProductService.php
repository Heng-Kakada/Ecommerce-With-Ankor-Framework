<?php
namespace src\services;

use AnkorFramework\Core\Validate\ValidationException;
use AnkorFramework\Core\Validate\Validator;
use src\repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

}