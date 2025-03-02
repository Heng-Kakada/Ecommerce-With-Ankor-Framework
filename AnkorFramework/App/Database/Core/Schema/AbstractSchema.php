<?php
namespace AnkorFramework\App\Database\Core\Schema;

use AnkorFramework\App\Database\Core\Database;

abstract class AbstractSchema
{
    protected string $table;
    protected Database $database;
}