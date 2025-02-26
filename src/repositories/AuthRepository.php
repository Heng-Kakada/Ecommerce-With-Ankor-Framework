<?php
namespace src\repositories;

use AnkorFramework\Database\Database;

class AuthRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }


    public function findByEmail($email)
    {
        return $this->database->query('select * from users where email = :email', ['email' => $email])->find();
    }

}