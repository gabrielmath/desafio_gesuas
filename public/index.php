<?php

//echo "oi";
//exit;
ob_start();

require __DIR__ . './../src/Core/Eloquent/connect.php';
require __DIR__ . './../vendor/autoload.php';

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url());

/**
 * WEB ROUTES
 */
$route->namespace('\Source\App');
$route->get("/home", "WebController:home");
