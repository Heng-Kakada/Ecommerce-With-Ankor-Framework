<?php
namespace src\services\dashboard;

use AnkorFramework\App\Validate\Validator;
use src\repositories\dashboard\DashBoardProductRepository;

class DashBoardProductService
{
    private $productRepository;

    public function __construct(DashBoardProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getProducts(): array
    {
        return $this->productRepository->findAllProducts();
    }
    public function getProductById($id)
    {
        return $this->productRepository->findProductById($id);
    }
    public function createProduct($data): bool
    {
        dd($data);
        dd($_FILES);
        die();
        Validator::validate([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
            'stock' => $data['stock'],
            'category' => $data['category']
        ], [
            'name' => 'required|string|max:100',
            'description' => 'string|max:255',
            'price' => 'required|float',
            'category' => 'required|int',
            'image' => 'string',
            'stock' => 'required|int',
        ]);
        return $this->productRepository->save($data);
    }
}