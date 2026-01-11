<?php

use App\Controller\Client\HomeController;

function routes($module, $controller)
{
    include BASE_PATH . "App/Controller/{$module}/{$controller}.php";
    $action = new HomeController();
    $action->index();
}
