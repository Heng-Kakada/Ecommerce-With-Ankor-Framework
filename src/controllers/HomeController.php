<?php
namespace src\controllers;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Http\Security\HttpSession;

class HomeController extends BaseController
{
    public function index()
    {
        Response::view("home.view");
    }

    public function contact()
    {
        Response::view('contact.view');
    }

}