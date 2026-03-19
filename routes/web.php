<?php

use App\Controllers\Client\HomeController;
use App\Controllers\Client\BookController;
use App\Controllers\Client\SaveController;

$router->get("/", [HomeController::class, "index"]);
$router->get("/book", [BookController::class, "index"]);
$router->get("/save", [SaveController::class, "index"]);
