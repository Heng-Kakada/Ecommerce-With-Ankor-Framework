<?php
namespace AnkorFramework\App\Database\Repository\Implementation;


use PDOException;
use AnkorFramework\App\Exception\ResponeException;
use AnkorFramework\App\Database\Core\Schema\Schema;
use AnkorFramework\App\Database\Repository\Core\IQueryRepository;

class QueryRepositoryImpl extends Schema implements IQueryRepository
{
    public function count()
    {
        echo "cout";
    }
    public function findById($id): array
    {
        try {
            $data = $this->database->query("select * from $this->table where id = :id", ['id' => $id])->findAndFail();

            if ($data !== null) {
                return $data;
            }
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return [];
    }
}