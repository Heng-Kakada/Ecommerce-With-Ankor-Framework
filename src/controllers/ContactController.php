<?php

namespace src\controllers;

use AnkorFramework\Core\Http\Response;
use AnkorFramework\Core\Http\BaseController;

class ContactController extends BaseController
{
    public function index()
    {
        Response::view("contact.view");
    }
}