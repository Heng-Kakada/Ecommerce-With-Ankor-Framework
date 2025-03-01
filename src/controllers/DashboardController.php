<?php
namespace src\controllers;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Http\Security\HttpSession;

class DashboardController extends BaseController
{
    public function index()
    {
        Response::view("dashboard/index.view");
    }

    public function contact()
    {
        Response::view('contact.view');
    }

}