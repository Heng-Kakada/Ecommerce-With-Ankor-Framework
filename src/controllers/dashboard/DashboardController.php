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

    public function file_upload()
    {
        Response::view('dashboard/file_upload.view');
    }
    public function upload()
    {
        Response::view('dashboard/image.view');
    }
}