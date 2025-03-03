<?php
namespace src\repositories\dashboard;

use AnkorFramework\App\Database\Core\Database;
use AnkorFramework\App\Database\Repository\Repository;

class DashBoardProductRepository extends Repository
{

    public string $table = "tbproducts";
    // private $selectAllQeury = "select p.id, p.name, p.description, p.price, p.stock, c.id as category_id, c.name as category_name, p.image from tbproducts p inner join tbcategory c on p.category_id = c.id";
     
    // public function findAllProducts(): array
    // {
    //     return $this->database->query($this->selectAllQeury . " order by p.id;")->get();
    // }
    // public function findProductById(int $id): array
    // {

    //     return $this->database->query($this->selectAllQeury . " where p.id = :id", ['id' => $id])->findAndFail();
    // }


    // public function save($data):bool
    // {
    //     return $this->database->query("insert into tbproducts(name, description, price, image, stock, category_id) 
    //     values(:name, :description, :price, :image, :stock, :category)",
    //         [
    //             'name' => $data['name'],
    //             'description' => $data['description'],
    //             'price' => $data['price'],
    //             'image' => $data['image'],
    //             'stock' => $data['stock'],
    //             'category' => $data['category']
    //         ]
    //     )->isExecuted();
    // }
}