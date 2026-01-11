<?php

define('BASE_PATH', __DIR__ . '/../');
require BASE_PATH . "App/Function/Functions.php";
require BASE_PATH . "Model/Database.php";
require BASE_PATH . "Routes/web.php";
routes('Client', 'HomeController');
