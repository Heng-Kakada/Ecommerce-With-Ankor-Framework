<?php
namespace src\repositories\user;

use AnkorFramework\App\Database\Repository\Repository;

class AuthRepository extends Repository
{
    public string $table = "tbusers";
    public function findByEmail($email)
    {
        return $this->find('', "email='$email'");
    }
    public function findEmailPasswordRoleByEmail($email)
    {
        return $this->find("id,email,password,username,role_name", "email = '$email'");
    }
}