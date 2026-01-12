<?php

define('BASE_PATH', dirname(__DIR__) . '/');

require BASE_PATH . 'Routes/web.php';
require_once BASE_PATH . 'App/Function/Functions.php';
require_once BASE_PATH . 'Model/Database.php';

$module = $_GET['module'] ?? 'Client';
$controller = $_GET['controller'] ?? 'HomeController';
$action = $_GET['action'] ?? 'index';

routes($module, $controller, $action);
