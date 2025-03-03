<?php
namespace src\services\dashboard;

use AnkorFramework\App\Validate\Validator;
use src\repositories\dashboard\DashBoardProductRepository;
use AnkorFramework\App\Resources\FileUpload\FileUpload;

class DashBoardProductService
{
    private $productRepository;

    public function __construct(DashBoardProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getProducts(): array
    {
        return $this->productRepository->find();
    }
    public function getProductById($id)
    {
        return $this->productRepository->findById($id);
    }
    public function createProduct($data): bool
    {
        $this->validateProduct($data);

        if (!empty($_FILES['image']['name'])) {
            $uploader = new FileUpload();
            $uploader->uploadFile($_FILES['image'], $this->productRepository->findLast()['max(id)'] + 1);
            $data['image'] = $uploader->getImageURL();
        }

        return $this->productRepository->save($data);
    }
    public function updateProduct($id, $data): bool
    {
        $this->validateProduct($data);
        if (!empty($_FILES['image']['name'])) {
            $uploader = new FileUpload();
            $uploader->uploadFile($_FILES['image'], $id);
            $data['image'] = $uploader->getImageURL();
        }
        return $this->productRepository->update($id, $data);
    }
    public function deleteCategory($id): bool
    {
        return $this->productRepository->delete($id);
    }
    private function validateProduct($data)
    {
        $rules = [
            'name' => 'required|string|max:100',
            'description' => 'string|max:255',
            'price' => 'required|float',
            'category_id' => 'required|int',
            'stock' => 'required|int',
        ];


        Validator::validate(
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'category_id' => $data['category_id']
            ],
            $rules
        );
    }

}