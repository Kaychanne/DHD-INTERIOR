<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Cek maintenance mode (diarahkan ke folder storage di root)
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 2. Register Composer autoloader (diarahkan ke folder vendor di root)
require __DIR__.'/../vendor/autoload.php';

// 3. Bootstrap Laravel (diarahkan ke folder bootstrap di root)
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());