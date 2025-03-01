<?php
namespace src\repositories\dashboard;

use AnkorFramework\App\Database\Database;

class DashBoardCategoryRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function findAllCategory(): array
    {
        return $this->database->query("select * from tbcategory;")->get();
    }

    public function findCategoryById($id): array
    {
        return $this->database->query("select * from tbcategory where id = :id", ['id' => $id])->findAndFail();
    }
    public function save($data): bool
    {
        return $this->database->query(
            "insert into tbcategory(name, description) values(:name, :desc)",
            ['name' => $data['name'], 'desc' => $data['description']]
        )->isExecuted();
    }
    public function update($id, $data): bool
    {
        return $this->database->query(
            'update tbcategory set name = :name, description = :description where id = :id',
            ['id' => $id, 'name' => $data['name'], 'description' => $data['description']]
        )->isExecuted();
    }
    public function delete($id): bool
    {
        return $this->database->query('delete from tbcategory where id = :id', ['id' => $id])->isExecuted();
    }


}