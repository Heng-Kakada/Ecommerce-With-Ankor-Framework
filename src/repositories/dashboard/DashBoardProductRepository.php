<?php
namespace src\repositories\dashboard;

use AnkorFramework\App\Database\Database;

class DashBoardProductRepository
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