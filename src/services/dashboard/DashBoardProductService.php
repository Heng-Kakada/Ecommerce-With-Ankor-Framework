<?php
namespace src\services\dashboard;

use src\repositories\dashboard\DashBoardProductRepository;

class DashBoardProductService
{
    private $productRepository;

    public function __construct(DashBoardProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getProducts()
    {
        return $this->productRepository->get();
    }
}