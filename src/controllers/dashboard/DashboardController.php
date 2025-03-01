<?php
namespace src\controllers\dashboard;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;

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