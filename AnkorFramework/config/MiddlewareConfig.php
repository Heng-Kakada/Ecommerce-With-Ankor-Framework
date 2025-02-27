<?php

use AnkorFramework\middleware\Admin;
use AnkorFramework\middleware\Auth;
use AnkorFramework\middleware\Manager;

return [
    'auth' => Auth::class,
    'admin' => Admin::class,
    'manager' => Manager::class
];