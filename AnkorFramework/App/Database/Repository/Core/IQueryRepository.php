<?php
namespace AnkorFramework\App\Database\Repository\Core;

use AnkorFramework\App\Database\Core\Schema\AbstractSchema;

interface IQueryRepository
{
    public function count();
    public function findById($id);
}