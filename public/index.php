<?php
use AnkorFramework\App\Http\Security\HttpSession;
session_start();
const BASE_PATH = __DIR__ . "/../";
require __DIR__ . '/../AnkorFramework/App/Utils/Helper.php';
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../AnkorFramework/bootstrap/app.php';
$app->Handle();

HttpSession::unflash();