<?php

use App\Core\Router;
use Dotenv\Dotenv;

define('BASE_PATH', dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Autoload do Composer (OBRIGATÓRIO)
|--------------------------------------------------------------------------
*/
require BASE_PATH . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Helpers globais (funções)
|--------------------------------------------------------------------------
*/
require BASE_PATH . '/app/Helpers/inject_view.php';
require BASE_PATH . '/app/Helpers/view.php';

/*
|--------------------------------------------------------------------------
| Variáveis de ambiente
|--------------------------------------------------------------------------
*/
$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

/*
|--------------------------------------------------------------------------
| Configurações do sistema
|--------------------------------------------------------------------------
*/
date_default_timezone_set($_ENV['APP_TIMEZONE'] ?? 'UTC');
setlocale(LC_ALL, $_ENV['APP_LOCALE'] ?? 'pt_BR');

error_reporting(E_ALL);
ini_set(
    'display_errors',
    ($_ENV['APP_DEBUG'] ?? 'false') === 'true' ? '1' : '0'
);

/*
|--------------------------------------------------------------------------
| Banco de dados (SQLite)
|--------------------------------------------------------------------------
*/
$pdo = new PDO('sqlite:' . BASE_PATH . '/' . $_ENV['DB_DATABASE']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/*
|--------------------------------------------------------------------------
| Router
|--------------------------------------------------------------------------
*/
$router = new Router();

/*
|--------------------------------------------------------------------------
| Rotas
|--------------------------------------------------------------------------
*/
require BASE_PATH . '/routes/web.php';

/*
|--------------------------------------------------------------------------
| Dispatch
|--------------------------------------------------------------------------
*/
$router->dispatch();
