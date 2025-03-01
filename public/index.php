<?php
use AnkorFramework\App\Http\Security\HttpSession;
use Dotenv\Dotenv;
session_start();
const BASE_PATH = __DIR__ . "/../";
require __DIR__ . '/../AnkorFramework/App/Utils/Helper.php';
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$app = require_once __DIR__ . '/../AnkorFramework/bootstrap/app.php';
$app->Handle();

HttpSession::unflash();