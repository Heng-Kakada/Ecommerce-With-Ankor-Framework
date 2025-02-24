<?php
namespace src\controllers;

use AnkorFramework\Core\Http\BaseController;
use AnkorFramework\Core\Http\Response;

class HomeController extends BaseController
{
    public function index()
    {
        Response::view("home.view");
    }
}