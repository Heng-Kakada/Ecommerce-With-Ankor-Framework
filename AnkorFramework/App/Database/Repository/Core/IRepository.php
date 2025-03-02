<?php
namespace AnkorFramework\App\Database\Repository\Core;

use AnkorFramework\App\Database\Repository\Core\ICrudRepository;
use AnkorFramework\App\Database\Repository\Core\IQueryRepository;

interface IRepository extends ICrudRepository, IQueryRepository
{
}