<?php

use Model\Database;
use Functions;

function routes(string $module, string $controller, string $action = 'index')
{
    $path = BASE_PATH . "App/Controller/{$module}/{$controller}.php";

    if (!file_exists($path)) {
        http_response_code(404);
        exit('Controller não encontrado');
    }

    require_once $path;

    $class = "App\\Controller\\{$module}\\{$controller}";

    if (!class_exists($class)) {
        http_response_code(500);
        exit('Classe não encontrada');
    }

    $helpers = new Functions();
    $db = new Database();

    $instance = new $class($helpers, $db);

    if (!method_exists($instance, $action)) {
        http_response_code(404);
        exit('Método não encontrado');
    }

    $instance->$action();
}
