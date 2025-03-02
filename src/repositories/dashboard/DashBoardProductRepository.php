<?php
namespace src\repositories\dashboard;

use AnkorFramework\App\Database\Core\Database;

class DashBoardProductRepository
{
    private $database;
    private $selectAllQeury = "select p.id, p.name, p.price, p.stock, c.name as category, p.image from tbproducts p inner join tbcategory c on p.category_id = c.id ";

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function findAllProducts(): array
    {
        return $this->database->query($this->selectAllQeury)->get();
    }
    public function findProductById(int $id): array
    {

        return $this->database->query($this->selectAllQeury . "where p.id = :id", ['id' => $id])->findAndFail();
    }
    public function save($data)
    {
        return $this->database->query("insert into tbproducts(name, description, price, image, stock, category_id 
        values(:name, :description, :price, :image, :stock, :category",
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image' => $data['image'],
                'stock' => $data['stock'],
                'category' => $data['category']
            ]
        )->isExecuted();
    }
}