<?php
namespace AnkorFramework\App\Database\Repository\Implementation;

use AnkorFramework\App\Database\Core\Schema\AbstractSchema;
use AnkorFramework\App\Exception\ResponeException;
use PDOException;
use AnkorFramework\App\Database\Core\Schema\Schema;
use AnkorFramework\App\Database\Repository\Core\ICrudRepository;

class CrudRepositoryImpl extends Schema implements ICrudRepository
{
    public function delete($id): bool
    {
        try {
            return $this->database->query("delete from $this->table where id = :id", ['id' => $id])->isExecuted();
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return false;
    }
    public function find($column, $criteria, $clause): array
    {
        try {
            if (empty($column))
                $column = "*";
            $sql = "select " . $column . " from " . $this->table;
            if (!empty($criteria) || !$criteria === "") {
                $sql .= " where " . $criteria;
            }
            if (!empty($clause)) {
                $sql .= " " . $clause;
            }
            $data = $this->database->query("$sql;")->get();
            if ($data !== null) {
                return $data;
            }
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return [];
    }
    public function save(array $data): bool
    {
        try {
            if (empty($data)) {
                return false;
            }
            $fields = implode(",", array_keys($data));
            $value = implode(",:", array_keys($data));
            $sql = "insert into $this->table(" . $fields . ") values(:" . $value . ");";
            return $this->database->query($sql, $data)->isExecuted();
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return false;
    }
    public function update($id, array $data): bool
    {
        try {
            if (empty($id) || empty($data)) {
                return false;
            }
            $fields = [];
            foreach ($data as $field => $value) {
                $fields[] = "$field=:$field";
            }
            $sql = "update $this->table set " . implode(',', $fields) . " where id = :id";
            $data['id'] = $id;
            return $this->database->query($sql, $data)->isExecuted();
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
        return false;
    }
}