<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;

class ProductController extends BaseController
{
    public function index()
    {
        Response::view("/user/shop/shops.view");
    }
}