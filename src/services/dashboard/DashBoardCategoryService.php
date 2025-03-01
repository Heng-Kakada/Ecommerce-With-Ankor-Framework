<?php
namespace src\services\dashboard;

use AnkorFramework\App\Validate\Validator;
use src\repositories\dashboard\DashBoardCategoryRepository;

class DashBoardCategoryService
{
    private $categoryRepository;

    public function __construct(DashBoardCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories(): array
    {
        return $this->categoryRepository->findAllCategory();
    }
    public function getCategoryById($id): array
    {
        return $this->categoryRepository->findCategoryById($id);
    }
    public function createCategory($data): bool
    {
        $this->validateNameAndDesc($data['name'], $data['description']);
        return $this->categoryRepository->save($data);
    }
    public function updateCategory($id, $data): bool
    {
        $this->validateNameAndDesc($data['name'], $data['description']);
        return $this->categoryRepository->update($id, $data);
    }
    public function deleteCategory($id): bool
    {
        return $this->categoryRepository->delete($id);
    }
    private function validateNameAndDesc($name, $description)
    {
        Validator::validate(['name' => $name, 'description' => $description], [
            'name' => 'required|string|max:100',
            'description' => 'string|max:255'
        ]);
        return $this;
    }
}