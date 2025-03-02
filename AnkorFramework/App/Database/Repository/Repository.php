<?php
namespace AnkorFramework\App\Database\Repository;

use AnkorFramework\App\Database\Core\Database;
use AnkorFramework\App\Database\Core\Schema\AbstractSchema;
use AnkorFramework\App\Database\Repository\Core\IRepository;
use AnkorFramework\App\Database\Repository\Core\ICrudRepository;
use AnkorFramework\App\Database\Repository\Core\IQueryRepository;
use AnkorFramework\App\Database\Repository\Implementation\CrudRepositoryImpl;
use AnkorFramework\App\Database\Repository\Implementation\QueryRepositoryImpl;
use AnkorFramework\App\Exception\ResponeException;
use PDOException;

class Repository extends AbstractSchema implements IRepository
{
    private ICrudRepository $crudRepository;
    private IQueryRepository $queryRepository;

    public function __construct(QueryRepositoryImpl $queryRepository, CrudRepositoryImpl $crudRepository, Database $database)
    {
        try {
            if (!isset($this->table) || $this->table === "") {
                throw new PDOException("Table name must be set in the your repository.");
            }

            $this->crudRepository = $crudRepository;
            $this->queryRepository = $queryRepository;
            $this->database = $database;

            if ($queryRepository instanceof QueryRepositoryImpl) {
                $queryRepository->setTableName($this->table);
                $queryRepository->setDatabase($database);
            }

            if ($crudRepository instanceof CrudRepositoryImpl) {
                $crudRepository->setTableName($this->table);
                $crudRepository->setDatabase($database);
            }
        } catch (PDOException $e) {
            ResponeException::show($e->getMessage());
        }
    }

    public function delete($id): bool
    {
        return $this->crudRepository->delete($id);
    }

    public function find($column = "*", $criteria = "", $clause = ""): array
    {
        return $this->crudRepository->find($column, $criteria, $clause);
    }

    public function save(array $data): bool
    {
        return $this->crudRepository->save($data);
    }

    public function update($id, array $data): bool
    {
        return $this->crudRepository->update($id, $data);
    }

    public function count(): int
    {
        return $this->queryRepository->count();
    }

    public function findById($id, $column = "*"): array
    {
        return $this->queryRepository->findById($id, $column);
    }
    public function findLast()
    {
        return $this->queryRepository->findLast();
    }
}