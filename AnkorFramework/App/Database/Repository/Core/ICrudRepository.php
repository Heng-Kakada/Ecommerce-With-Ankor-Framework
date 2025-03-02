<?php
namespace AnkorFramework\App\Database\Repository\Core;

use AnkorFramework\App\Database\Core\Schema\AbstractSchema;
interface ICrudRepository
{
    public function save(array $data): bool;
    public function find($column, $criteria, $clause): array;
    public function delete($id): bool;
    public function update($id, array $data): bool;
}