<?php

require __DIR__ . "./../../../Core/Eloquent/connect.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('document', 11)->unique();
    $table->timestamps();
});
