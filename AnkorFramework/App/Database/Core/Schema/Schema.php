<?php
namespace AnkorFramework\App\Database\Core\Schema;

use AnkorFramework\App\Database\Core\Database;
use AnkorFramework\App\Database\Core\Schema\AbstractSchema;

class Schema extends AbstractSchema
{
    public function setTableName(string $table)
    {
        $this->table = $table;
    }
    public function setDatabase(Database $database)
    {
        $this->database = $database;
    }
}
