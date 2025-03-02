<?php
namespace AnkorFramework\App\Database\Repository\Implementation;


use PDOException;
use AnkorFramework\App\Exception\ResponeException;
use AnkorFramework\App\Database\Core\Schema\Schema;
use AnkorFramework\App\Database\Repository\Core\IQueryRepository;

class QueryRepositoryImpl extends Schema implements IQueryRepository
{
    public function count(): int
    {
        try {
            $data = $this->database->query("select count(*) as count from $this->table")->findAndFail();
            return $data['count'] ?? 0;
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return 0;
    }
    public function findById($id, $column): array
    {
        try {
            if (empty($column))
                $column = "*";

            $data = $this->database->query("select $column from $this->table where id = :id", ['id' => $id])->findAndFail();

            if ($data !== null) {
                return $data;
            }
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return [];
    }
    public function findLast()
    {
        return $this->database->query("select max(id) from $this->table")->findAndFail();
    }
}