<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;

class CartController extends BaseController
{
    public function index()
    {
        Response::view('user/cart/cart.view');
    }
}