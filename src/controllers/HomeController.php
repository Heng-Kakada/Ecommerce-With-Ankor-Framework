<?php
namespace src\controllers;

use AnkorFramework\Core\Http\BaseController;
use AnkorFramework\Core\Http\Response;

class HomeController extends BaseController
{
    public function index()
    {

        echo password_hash("piko1234", PASSWORD_BCRYPT);

        Response::view("home.view");
    }
}