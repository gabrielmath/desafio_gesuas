<?php
require __DIR__ . "./../../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    "driver" => "mysql",
    "host" => CONF_DB_HOST,
    "port" => CONF_DB_PORT,
    "database" => CONF_DB_NAME,
    "username" => CONF_DB_USER,
    "password" => CONF_DB_PASS
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
