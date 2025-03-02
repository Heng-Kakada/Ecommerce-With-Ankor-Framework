<?php
namespace AnkorFramework\App\Database\Repository;

use AnkorFramework\App\Database\Core\Database;
use AnkorFramework\App\Database\Core\Schema\AbstractSchema;
use AnkorFramework\App\Database\Core\Schema\Schema;
use Exception;
use AnkorFramework\App\Database\Repository\Core\IRepository;
use AnkorFramework\App\Database\Repository\Core\ICrudRepository;
use AnkorFramework\App\Database\Repository\Core\IQueryRepository;
use AnkorFramework\App\Database\Repository\Implementation\CrudRepositoryImpl;
use AnkorFramework\App\Database\Repository\Implementation\QueryRepositoryImpl;

class Repository extends AbstractSchema implements IRepository
{
    private ICrudRepository $crudRepository;
    private IQueryRepository $queryRepository;

    public function __construct(QueryRepositoryImpl $queryRepository, CrudRepositoryImpl $crudRepository, Database $database)
    {
        if (!isset($this->table)) {
            throw new Exception("Table name must be set in the your repository.");
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
    }

    public function delete()
    {
        $this->crudRepository->delete();
    }

    public function find(): array
    {
        return $this->crudRepository->find();
    }

    public function save()
    {
        $this->crudRepository->save();
    }

    public function update()
    {
        $this->crudRepository->update();
    }

    public function count()
    {
        $this->queryRepository->count();
    }

    public function setTableName($tableName)
    {
        $this->table = $tableName;
    }

    public function findById($id): array
    {
        return $this->queryRepository->findById($id);
    }
}