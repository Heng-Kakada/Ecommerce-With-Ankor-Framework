<?php
namespace src\repositories\user;

use AnkorFramework\App\Database\Core\Database;



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

    public function findEmailPasswordRoleByEmail($email)
    {
        return $this->database->query("select 
        users.email,
        users.password, 
        roles.name as role 
        from users join roles on 
        users.role_id = roles.id 
        where users.email = :email", ['email' => $email])->find();
    }

}