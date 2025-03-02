<?php
namespace AnkorFramework\App\Database\Repository\Implementation;

use AnkorFramework\App\Database\Core\Schema\AbstractSchema;
use AnkorFramework\App\Exception\ResponeException;
use PDOException;
use AnkorFramework\App\Database\Core\Schema\Schema;
use AnkorFramework\App\Database\Repository\Core\ICrudRepository;

class CrudRepositoryImpl extends Schema implements ICrudRepository
{
    public function delete()
    {
        echo "delete";
    }
    public function find(): array
    {
        try {
            return $this->database->query("select * from $this->table;")->get();
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return [];
    }
    public function save()
    {
        echo "save";
    }
    public function update(): void
    {
        echo "update";
    }
}