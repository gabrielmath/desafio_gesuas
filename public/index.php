<?php
ob_start();

require __DIR__ . './../vendor/autoload.php';

/**
 * BOOTSTRAP
 */

use Leaf\Router;
use Source\Core\Session;

$session = new Session();

/**
 * WEB ROUTES
 */
Router::setNamespace('Source\App\Controller');
Router::get("/", "WebController@index");
Router::post("/store", "WebController@store");

/**
 * This method executes the routes
 */
Router::run();
