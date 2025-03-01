<?php
namespace src\repositories;

use AnkorFramework\App\Database\Database;

class ProductRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function get()
    {
        return $this->database->query("SELECT * FROM tbproducts;");
    }
}