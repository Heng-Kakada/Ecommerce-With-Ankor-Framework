<?php
namespace src\repositories;

use AnkorFramework\Database\Database;

class ProductRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAll()
    {
        return $this->database->query("SELECT * FROM notes")->get();
    }

    public function create($body)
    {
        $this->database->query("INSERT INTO notes (body) VALUE (:body)", [
            ':body' => $body
        ]);
    }

}