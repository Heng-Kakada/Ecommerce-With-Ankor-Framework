<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;

class HomeController extends BaseController
{
    public function index()
    {
        Response::view("user/home.view");
    }
    public function about()
    {
        Response::view('user/about.view');
    }
    public function contact()
    {
        Response::view('user/contact.view');
    }
}